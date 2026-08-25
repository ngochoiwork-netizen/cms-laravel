<?php

namespace App\Services;

class SchemaService
{
    /**
     * Tạo Schema JSON-LD từ dữ liệu SEO đã chuẩn hóa.
     */
    public static function make(array $seo): array
    {
        $modelType = $seo['model_type'] ?? null;

        return match ($modelType) {

            'home' => self::home($seo),

            'page' => self::page($seo),

            'category' => self::category($seo),

            'post' => self::post($seo),

            default => [],
        };
    }

    /**
     * Schema cho Homepage.
     */
    protected static function home(array $seo): array
    {
        $website = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',

            'name' => $seo['title'] ?? 'Senverse',

            'description' => $seo['description'] ?? null,

            'url' => $seo['canonical'] ?? url('/'),

            'inLanguage' => $seo['locale'] ?? app()->getLocale(),
        ];

        $organization = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',

            'name' => 'Senverse',

            'url' => route('en.home'),
        ];

        if (!empty($seo['og_image'])) {
            $organization['logo'] = $seo['og_image'];
        }

        return [
            $website,
            $organization,
        ];
    }

    /**
     * Schema cho Page.
     */
    protected static function page(array $seo): array
    {
        $schema = [
            '@context' => 'https://schema.org',

            '@type' => $seo['schema_type'] ?? 'WebPage',

            'name' => $seo['title'] ?? null,

            'description' => $seo['description'] ?? null,

            'url' => $seo['canonical'] ?? url()->current(),

            'inLanguage' => $seo['locale'] ?? app()->getLocale(),
        ];

        if (!empty($seo['og_image'])) {
            $schema['primaryImageOfPage'] = [
                '@type' => 'ImageObject',
                'url' => $seo['og_image'],
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Custom Schema Data
        |--------------------------------------------------------------------------
        */

        if (!empty($seo['schema_data'])) {
            $schema = array_replace_recursive(
                $schema,
                $seo['schema_data']
            );
        }

        return [$schema];
    }

    /**
     * Schema cho Category.
     */
    protected static function category(array $seo): array
    {
        $schema = [
            '@context' => 'https://schema.org',

            '@type' => $seo['schema_type']
                ?? 'CollectionPage',

            'name' => $seo['title'] ?? null,

            'description' => $seo['description'] ?? null,

            'url' => $seo['canonical'] ?? url()->current(),

            'inLanguage' => $seo['locale'] ?? app()->getLocale(),
        ];

        if (!empty($seo['og_image'])) {
            $schema['image'] = $seo['og_image'];
        }

        if (!empty($seo['schema_data'])) {
            $schema = array_replace_recursive(
                $schema,
                $seo['schema_data']
            );
        }

        return [$schema];
    }

    /**
     * Schema cho Blog Post.
     */
    protected static function post(array $seo): array
    {
        $schema = [
            '@context' => 'https://schema.org',

            '@type' => $seo['schema_type']
                ?? 'BlogPosting',

            'headline' => $seo['title'] ?? null,

            'description' => $seo['description'] ?? null,

            'url' => $seo['canonical'] ?? url()->current(),

            'inLanguage' => $seo['locale'] ?? app()->getLocale(),

            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $seo['canonical'] ?? url()->current(),
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Image
        |--------------------------------------------------------------------------
        */

        if (!empty($seo['og_image'])) {
            $schema['image'] = [
                $seo['og_image'],
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Published Date
        |--------------------------------------------------------------------------
        */

        if (!empty($seo['published_at'])) {
            $schema['datePublished'] =
                $seo['published_at']->toIso8601String();
        }

        /*
        |--------------------------------------------------------------------------
        | Updated Date
        |--------------------------------------------------------------------------
        */

        if (!empty($seo['updated_at'])) {
            $schema['dateModified'] =
                $seo['updated_at']->toIso8601String();
        }

        /*
        |--------------------------------------------------------------------------
        | Author
        |--------------------------------------------------------------------------
        */

        if (!empty($seo['author'])) {
            $schema['author'] = [
                '@type' => 'Person',
                'name' => $seo['author']->name
                    ?? 'Senverse',
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Publisher
        |--------------------------------------------------------------------------
        */

        $schema['publisher'] = [
            '@type' => 'Organization',
            'name' => 'Senverse',
        ];

        if (!empty($seo['og_image'])) {
            $schema['publisher']['logo'] = [
                '@type' => 'ImageObject',
                'url' => $seo['og_image'],
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */

        if (!empty($seo['category'])) {
            $schema['articleSection'] =
                $seo['category']->name
                ?? null;
        }

        /*
        |--------------------------------------------------------------------------
        | Custom Schema Data
        |--------------------------------------------------------------------------
        */

        if (!empty($seo['schema_data'])) {
            $schema = array_replace_recursive(
                $schema,
                $seo['schema_data']
            );
        }

        return [$schema];
    }
}