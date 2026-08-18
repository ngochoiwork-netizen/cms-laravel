<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        if (setting('sitemap_enable') != 1) {
            abort(404);
        }

        $urls = [];

        $urls[] = [
            'loc' => url('/'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => setting('sitemap_changefreq', 'weekly'),
            'priority' => setting('sitemap_priority', '1.0'),
        ];

        if (setting('sitemap_post') == 1) {
            foreach (Post::latest()->get() as $post) {
                $urls[] = [
                    'loc' => route('post.show', $post->slug),
                    'lastmod' => $post->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            }
        }

        if (setting('sitemap_product') == 1) {
            foreach (Product::latest()->get() as $product) {
                $urls[] = [
                    'loc' => route('product.show', $product->slug),
                    'lastmod' => $product->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            }
        }

        if (setting('sitemap_category') == 1) {
            foreach (Category::latest()->get() as $category) {
                $urls[] = [
                    'loc' => route('category.show', $category->slug),
                    'lastmod' => $category->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.6',
                ];
            }
        }

        return response()
            ->view('frontend.sitemap.sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}