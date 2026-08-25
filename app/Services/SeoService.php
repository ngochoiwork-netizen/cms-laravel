<?php

namespace App\Services;

use App\Seo\Resolvers\PageSeoResolver;
use App\Seo\Resolvers\CategorySeoResolver;
use App\Seo\Resolvers\PostSeoResolver;
use InvalidArgumentException;

class SeoService
{
    /**
     * SEO cho Page / Category / Post.
     */
    public static function make(
        object $model,
        array $override = []
    ): array {
        $locale = app()->getLocale();

        /*
        |--------------------------------------------------------------------------
        | Resolver
        |--------------------------------------------------------------------------
        */

        $resolver = self::resolveResolver($model);

        $seo = $resolver->resolve(
            $model,
            $locale
        );

        /*
        |--------------------------------------------------------------------------
        | Setting Fallback
        |--------------------------------------------------------------------------
        */

        $defaults = SettingSeoService::get($locale);

        $seo = self::applyDefaults(
            $seo,
            $defaults
        );

        /*
        |--------------------------------------------------------------------------
        | Missing Translation
        |--------------------------------------------------------------------------
        |
        | Nếu model không có translation của locale hiện tại,
        | không cho Google index URL đó.
        |
        */

        if (
            array_key_exists('has_translation', $seo)
            && !$seo['has_translation']
        ) {
            $seo['robots'] = 'noindex, follow';
        }

        /*
        |--------------------------------------------------------------------------
        | URLs
        |--------------------------------------------------------------------------
        */

        $urls = self::resolveUrls(
            $model,
            $seo['model_type']
        );

        /*
        |--------------------------------------------------------------------------
        | Canonical
        |--------------------------------------------------------------------------
        */

        $seo['canonical'] =
            !empty($seo['canonical_url'])
                ? $seo['canonical_url']
                : ($urls[$locale] ?? url()->current());

        /*
        |--------------------------------------------------------------------------
        | Hreflang
        |--------------------------------------------------------------------------
        */

        $seo['hreflang'] = array_filter([
            'en' => $urls['en'] ?? null,
            'vi' => $urls['vi'] ?? null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | X Default
        |--------------------------------------------------------------------------
        |
        | English là ngôn ngữ mặc định.
        |
        */

        $seo['x_default'] =
            $urls['en'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Override
        |--------------------------------------------------------------------------
        */
        $seo['schema'] = SchemaService::make($seo);

        return array_replace(
            $seo,
            $override
        );
    }

    /**
     * SEO dành riêng cho Homepage.
     *
     * Homepage lấy SEO hoàn toàn từ Setting.
     */
    public static function home(
        array $override = []
    ): array {
        $locale = app()->getLocale();

        $seo = SettingSeoService::home($locale);

        /*
        |--------------------------------------------------------------------------
        | Homepage URLs
        |--------------------------------------------------------------------------
        */

        $urls = [
            'en' => route('en.home'),
            'vi' => route('vi.home'),
        ];

        /*
        |--------------------------------------------------------------------------
        | Canonical
        |--------------------------------------------------------------------------
        */

        $seo['canonical'] =
            $urls[$locale] ?? $urls['en'];

        /*
        |--------------------------------------------------------------------------
        | Hreflang
        |--------------------------------------------------------------------------
        */

        $seo['hreflang'] = [
            'en' => $urls['en'],
            'vi' => $urls['vi'],
        ];

        /*
        |--------------------------------------------------------------------------
        | X Default
        |--------------------------------------------------------------------------
        */

        $seo['x_default'] =
            $urls['en'];

            $seo['schema'] = SchemaService::make($seo);
            
        return array_replace(
            $seo,
            $override
        );
    }

    /**
     * Áp dụng SEO mặc định từ Setting.
     */
    protected static function applyDefaults(
        array $seo,
        array $defaults
    ): array {
        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        */

        $seo['title'] =
            $seo['title']
            ?: ($defaults['title'] ?? null);

        /*
        |--------------------------------------------------------------------------
        | Description
        |--------------------------------------------------------------------------
        */

        $seo['description'] =
            $seo['description']
            ?: ($defaults['description'] ?? null);

        /*
        |--------------------------------------------------------------------------
        | Keywords
        |--------------------------------------------------------------------------
        */

        $seo['keywords'] =
            $seo['keywords']
            ?: ($defaults['keywords'] ?? null);

        /*
        |--------------------------------------------------------------------------
        | Open Graph Title
        |--------------------------------------------------------------------------
        */

        $seo['og_title'] =
            $seo['og_title']
            ?: ($defaults['og_title'] ?? null)
            ?: $seo['title'];

        /*
        |--------------------------------------------------------------------------
        | Open Graph Description
        |--------------------------------------------------------------------------
        */

        $seo['og_description'] =
            $seo['og_description']
            ?: ($defaults['og_description'] ?? null)
            ?: $seo['description'];

        /*
        |--------------------------------------------------------------------------
        | Open Graph Image
        |--------------------------------------------------------------------------
        */

        $seo['og_image'] =
            self::resolveOgImage($seo['og_image'] ?? null)
            ?: ($defaults['og_image'] ?? null);

        /*
        |--------------------------------------------------------------------------
        | Robots
        |--------------------------------------------------------------------------
        */

        $seo['robots'] =
            $seo['robots']
            ?: ($defaults['robots'] ?? null)
            ?: 'index, follow';


        $seo['schema'] = SchemaService::make($seo);

        return $seo;
    }

    /**
     * Chuẩn hóa OG Image từ Media model thành URL.
     */
    protected static function resolveOgImage(
        $image
    ): ?string {
        if (!$image) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | URL string
        |--------------------------------------------------------------------------
        */

        if (
            is_string($image)
            && filter_var($image, FILTER_VALIDATE_URL)
        ) {
            return $image;
        }

        /*
        |--------------------------------------------------------------------------
        | Media Model / Object
        |--------------------------------------------------------------------------
        */

        if (is_object($image)) {
            return $image->url ?? null;
        }

        return null;
    }

    /**
     * Chọn Resolver theo model.
     */
    protected static function resolveResolver(
        object $model
    ) {
        $resolvers = [
            app(PageSeoResolver::class),
            app(CategorySeoResolver::class),
            app(PostSeoResolver::class),
        ];

        foreach ($resolvers as $resolver) {
            if ($resolver->supports($model)) {
                return $resolver;
            }
        }

        throw new InvalidArgumentException(
            'SEO resolver not found for model: '
            . get_class($model)
        );
    }

    /**
     * Sinh URL theo loại model.
     */
    protected static function resolveUrls(
        object $model,
        string $modelType
    ): array {
        return match ($modelType) {

            'page' => self::pageUrls($model),

            'category' => self::categoryUrls($model),

            'post' => self::postUrls($model),

            default => [],
        };
    }

    /**
     * URL cho Page.
     */
    protected static function pageUrls(
        object $page
    ): array {
        return match ($page->slug) {

            'about-us' => [
                'en' => route('en.about'),
                'vi' => route('vi.about'),
            ],

            'contact' => [
                'en' => route('en.contact'),
                'vi' => route('vi.contact'),
            ],

            default => [
                'en' => route(
                    'en.solutions.show',
                    [
                        'slug' => $page->slug,
                    ]
                ),

                'vi' => route(
                    'vi.solutions.show',
                    [
                        'slug' => $page->slug,
                    ]
                ),
            ],
        };
    }

    /**
     * URL cho Category.
     */
    protected static function categoryUrls(
        object $category
    ): array {
        return [
            'en' => route(
                'en.resources.category',
                [
                    'categorySlug' => $category->slug,
                ]
            ),

            'vi' => route(
                'vi.resources.category',
                [
                    'categorySlug' => $category->slug,
                ]
            ),
        ];
    }

    /**
     * URL cho Post.
     */
    protected static function postUrls(
        object $post
    ): array {
        $category = $post->category;

        if (!$category) {
            return [];
        }

        return [
            'en' => route(
                'en.resources.show',
                [
                    'categorySlug' => $category->slug,
                    'postSlug' => $post->slug,
                ]
            ),

            'vi' => route(
                'vi.resources.show',
                [
                    'categorySlug' => $category->slug,
                    'postSlug' => $post->slug,
                ]
            ),
        ];
    }
}