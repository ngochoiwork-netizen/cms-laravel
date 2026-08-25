<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;

class SitemapController extends Controller
{
    public function index()
    {
        

        $urls = [];

        /*
        |--------------------------------------------------------------------------
        | Homepage
        |--------------------------------------------------------------------------
        */

        $urls[] = $this->item(
            route('en.home'),
            now(),
            'daily',
            '1.0'
        );

        $urls[] = $this->item(
            route('vi.home'),
            now(),
            'daily',
            '1.0'
        );

        /*
        |--------------------------------------------------------------------------
        | Static Pages
        |--------------------------------------------------------------------------
        */

        $this->addStaticPage(
            $urls,
            'about',
            'en.about',
            'vi.about'
        );

        $this->addStaticPage(
            $urls,
            'contact',
            'en.contact',
            'vi.contact'
        );

        /*
        |--------------------------------------------------------------------------
        | Solution Pages
        |--------------------------------------------------------------------------
        */

        $pages = Page::with('translations')
            ->active()
            ->whereNotIn('slug', [
                'about',
                'contact',
                'footer',
                'home',
            ])
            ->get();

        foreach ($pages as $page) {

            if ($this->hasTranslation($page, 'en')) {
                $urls[] = $this->item(
                    route('en.solutions.show', [
                        'slug' => $page->slug,
                    ]),
                    $page->updated_at,
                    'weekly',
                    '0.8'
                );
            }

            if ($this->hasTranslation($page, 'vi')) {
                $urls[] = $this->item(
                    route('vi.solutions.show', [
                        'slug' => $page->slug,
                    ]),
                    $page->updated_at,
                    'weekly',
                    '0.8'
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Resource Categories
        |--------------------------------------------------------------------------
        */

        if (setting('sitemap_category') == 1) {

            $categories = Category::with('translations')
                ->active()
                ->whereHas('parent', function ($query) {
                    $query->where('slug', 'resource');
                })
                ->get();

            foreach ($categories as $category) {

                if ($this->hasTranslation($category, 'en')) {
                    $urls[] = $this->item(
                        route('en.resources.category', [
                            'categorySlug' => $category->slug,
                        ]),
                        $category->updated_at,
                        'weekly',
                        '0.7'
                    );
                }

                if ($this->hasTranslation($category, 'vi')) {
                    $urls[] = $this->item(
                        route('vi.resources.category', [
                            'categorySlug' => $category->slug,
                        ]),
                        $category->updated_at,
                        'weekly',
                        '0.7'
                    );
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Posts
        |--------------------------------------------------------------------------
        */

        if (setting('sitemap_post') == 1) {

            $posts = Post::with([
                'translations',
                'category',
            ])
                ->published()
                ->whereHas('category.parent', function ($query) {
                    $query->where('slug', 'resource');
                })
                ->get();

            foreach ($posts as $post) {

                if (!$post->category) {
                    continue;
                }

                if ($this->hasTranslation($post, 'en')) {
                    $urls[] = $this->item(
                        route('en.resources.show', [
                            'categorySlug' => $post->category->slug,
                            'postSlug' => $post->slug,
                        ]),
                        $post->updated_at,
                        'weekly',
                        '0.8'
                    );
                }

                if ($this->hasTranslation($post, 'vi')) {
                    $urls[] = $this->item(
                        route('vi.resources.show', [
                            'categorySlug' => $post->category->slug,
                            'postSlug' => $post->slug,
                        ]),
                        $post->updated_at,
                        'weekly',
                        '0.8'
                    );
                }
            }
        }

        return response()
            ->view(
                'frontend.sitemap.sitemap',
                compact('urls')
            )
            ->header(
                'Content-Type',
                'application/xml; charset=UTF-8'
            );
    }

    /**
     * Static Page.
     */
    protected function addStaticPage(
        array &$urls,
        string $slug,
        string $enRoute,
        string $viRoute
    ): void {
        $page = Page::with('translations')
            ->active()
            ->where('slug', $slug)
            ->first();

        if (!$page) {
            return;
        }

        if ($this->hasTranslation($page, 'en')) {
            $urls[] = $this->item(
                route($enRoute),
                $page->updated_at,
                'monthly',
                '0.8'
            );
        }

        if ($this->hasTranslation($page, 'vi')) {
            $urls[] = $this->item(
                route($viRoute),
                $page->updated_at,
                'monthly',
                '0.8'
            );
        }
    }

    /**
     * Kiểm tra model có translation hay không.
     */
    protected function hasTranslation(
        object $model,
        string $locale
    ): bool {
        return $model->translations
            ->contains('locale', $locale);
    }

    /**
     * Chuẩn hóa sitemap item.
     */
    protected function item(
        string $url,
        $updatedAt,
        string $changefreq,
        string $priority
    ): array {
        return [
            'loc' => $url,

            'lastmod' => $updatedAt
                ? $updatedAt->toAtomString()
                : now()->toAtomString(),

            'changefreq' => $changefreq,

            'priority' => $priority,
        ];
    }
}