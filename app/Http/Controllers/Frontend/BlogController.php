<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\SeoService;

class BlogController extends Controller
{
    protected array $view = [];

    /**
     * Blog listing.
     */
    public function index($categorySlug)
    {
        $category = Category::with([
            'translation',
            'parent.translation',
        ])
            ->active()
            ->where('slug', $categorySlug)
            ->whereHas('parent', function ($query) {
                $query->where('slug', 'resource');
            })
            ->firstOrFail();
        $this->view['category'] = $category;

        /*
        |--------------------------------------------------------------------------
        | SEO
        |--------------------------------------------------------------------------
        */

        $this->view['seo'] = SeoService::make($category);

        $posts = Post::with([
            'translation',
            'thumbnail',
            'author',
        ])
            ->published()
            ->where('category_id', $category->id)
            ->orderByDesc('published_at')
            ->paginate(12);
        $this->view['posts'] = $posts;
        $breadcrumbs = [
            [
                'label' => app()->getLocale() === 'vi'
                    ? 'Trang Chủ'
                    : 'Home',

                'url' => localized_route('home'),
            ],
            [
                'label' => app()->getLocale() === 'vi'
                    ? 'Tài Nguyên'
                    : 'Resources',

                'url' => null,
            ],
            [
                'label' => $category->name,
                'url' => null,
            ],
        ];
        $this->view['breadcrumbs'] = $breadcrumbs;

         /*
        |--------------------------------------------------------------------------
        | Sidebar Categories
        |--------------------------------------------------------------------------
        |
        | Lấy các category con của Resource
        |
        */

        $categories = Category::with('translation')
            ->active()
            ->whereHas('parent', function ($query) {
                $query->where('slug', 'resource');
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $this->view['categories'] = $categories;

        /*
        |--------------------------------------------------------------------------
        | Recent Posts
        |--------------------------------------------------------------------------
        */

        $recentPosts = Post::with([
            'translation',
            'thumbnail',
            'category.translation',
        ])
        ->published()
        ->where('category_id', $category->id)
        ->orderByDesc('published_at')
        ->featured()
        ->limit(3)
        ->get();
        $this->view['recentPosts'] = $recentPosts;

        /*
        |--------------------------------------------------------------------------
        | Popular Tags
        |--------------------------------------------------------------------------
        */

        $tags = Tag::with('translation')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(10)
            ->get();
        $this->view['tags'] = $tags;


        return view('frontend.blog.index',$this->view);
    }

    /**
     * Blog detail.
     */
    public function show($categorySlug, $postSlug)
    {

      
        $category = Category::with([
            'translation',
            'parent.translation',
        ])
            ->active()
            ->where('slug', $categorySlug)
            ->whereHas('parent', function ($query) {
                $query->where('slug', 'resource');
            })
            ->firstOrFail();
        $this->view['category'] = $category;
    
        $post = Post::with([
            'translation',
            'thumbnail',
            'banner',
            'author',
            'category.translation',
            'tags.translation',
        ])
            ->published()
            ->where('category_id', $category->id)
            ->where('slug', $postSlug)
            ->firstOrFail();
        $this->view['post'] = $post;

        /*
        |--------------------------------------------------------------------------
        | SEO
        |--------------------------------------------------------------------------
        */

        $this->view['seo'] = SeoService::make($post);

        /*
        |--------------------------------------------------------------------------
        | Increment View
        |--------------------------------------------------------------------------
        */

        $post->incrementViewCount();


        /*
        |--------------------------------------------------------------------------
        | Sidebar Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::with('translation')
            ->active()
            ->whereHas('parent', function ($query) {
                $query->where('slug', 'resource');
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $this->view['categories'] = $categories;
        /*
        |--------------------------------------------------------------------------
        | Recent Posts
        |--------------------------------------------------------------------------
        */

        $recentPosts = Post::with([
            'translation',
            'thumbnail',
            'category.translation',
        ])
            ->published()
            ->whereHas('category.parent', function ($query) {
                $query->where('slug', 'resource');
            })
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        $this->view['recentPosts'] = $recentPosts;
        /*
        |--------------------------------------------------------------------------
        | Breadcrumb
        |--------------------------------------------------------------------------
        */

        $breadcrumbs = [
            [
                'label' => 'Home',
                'url' => localized_route('home'),
            ],
            [
                'label' => 'Resources',
                'url' => null,
            ],
            [
                'label' => $category->name,
                'url' => localized_route('resources.category', [
                    'categorySlug' => $category->slug,
                ]),
            ],
            [
                'label' => $post->title,
                'url' => null,
            ],
        ];
        $this->view['breadcrumbs'] = $breadcrumbs;

        return view('frontend.blog.show',$this->view);
    }
}
