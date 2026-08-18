<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Post;
use App\Models\Page;
use App\Models\Product;

class HomeController extends Controller
{
    protected $view;
    public function __construct() {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    private function buildBreadcrumbs($type, $model)
    {
        $items = [
            [
                'label' => 'Trang chủ',
                'url'   => route('home'),
            ],
        ];

        if ($type === 'page') {
            $items[] = [
                'label' => $model->title ?? 'Trang',
                'url'   => null,
            ];
        }

        if ($type === 'category') {
            if ($model->parent) {
                $items[] = [
                    'label' => $model->parent->name,
                    'url'   => route('frontend.resolve', $model->parent->slug),
                ];
            }

            $items[] = [
                'label' => $model->name,
                'url'   => null,
            ];
        }

        if ($type === 'post') {
            if ($model->category) {
                $items[] = [
                    'label' => $model->category->name,
                    'url'   => route('frontend.resolve', $model->category->slug),
                ];
            }

            $items[] = [
                'label' => $model->title,
                'url'   => null,
            ];
        }

        if ($type === 'product') {
            if ($model->category) {
                $items[] = [
                    'label' => $model->category->name,
                    'url'   => route('frontend.resolve', $model->category->slug),
                ];
            }

            $items[] = [
                'label' => $model->name,
                'url'   => null,
            ];
        }

        return $items;
    }


    public function index()
    {

        $sliders = Slider::with('image')
        ->where('is_active', 1)
        ->where('position', 'home')
        ->orderBy('sort_order')
        ->get();

        $this->view['sliders'] = $sliders;

        $solutionParent = Category::where('slug', 'giai-phap')
        ->where('type', 'post') // 👈 đúng
        ->where('is_active', 1)
        ->first();

        $featureSolutions = collect();

        if ($solutionParent) {
            $featureSolutions = Category::with('thumbnail')
                ->where('parent_id', $solutionParent->id)
                ->where('is_active', 1)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->take(3)
                ->get();
        }

        $this->view['featureSolutions'] = $featureSolutions;


        $serviceCategory = Category::where('type', 'post')
            ->where('slug', 'dich-vu')
            ->where('is_active', 1)
            ->first();

        $services = collect();

        if ($serviceCategory) {
           
            $services = Post::with(['category', 'thumbnail'])
                ->where('category_id', $serviceCategory->id)
                ->published()
                ->latest('published_at')
                ->take(6)
                ->get();
             //dd($services);
        }
        $this->view['services'] = $services;

        $newsCategory = Category::where('type', 'post')
        ->where('slug', 'tin-tuc')
        ->where('is_active', 1)
        ->first();

        $categoryIds = collect([$newsCategory->id]) // cha
            ->merge(
                Category::where('parent_id', $newsCategory->id)
                    ->pluck('id') // con
            );

        $latestPosts = Post::with(['category', 'thumbnail', 'user'])
            ->whereIn('category_id', $categoryIds)
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();
        //dd($services);
        $this->view['latestPosts'] = $latestPosts;
        
        return view('frontend.pages.home', $this->view);
    }

    public function resolveOneLevel($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', 1)
            ->first();

        if ($category) {

            // Category đặc biệt: giới thiệu dùng Page
            if ($category->slug === 'gioi-thieu') {
                $page = Page::with([
                    'banner',
                    'sections' => function ($query) {
                        $query->where('is_active', 1)
                            ->with(['image', 'background'])
                            ->orderBy('sort_order', 'asc');
                    }
                ])
                ->where('slug', 'gioi-thieu')
                ->where('status', 'published')
                ->firstOrFail();
                $this->view['category'] = $category;
                $this->view['page'] = $page;
                //dd($page->banner);
                $breadcrumbs = $this->buildBreadcrumbs('page', $page);
                $this->view['breadcrumbs'] = $breadcrumbs;

                $aboutIntro = $page->sections->firstWhere('section_key', 'about_intro');
                $this->view['aboutIntro'] = $aboutIntro;

                $aboutWorks = $page->sections->firstWhere('section_key', 'works_about');
                $this->view['aboutWorks'] = $aboutWorks;

                $aboutProcess = $page->sections->firstWhere('section_key', 'process');
                $this->view['aboutProcess'] = $aboutProcess;

                $aboutChoose = $page->sections->firstWhere('section_key', 'why_choose');
                $this->view['aboutChoose'] = $aboutChoose;

                $aboutTimeline = $page->sections->firstWhere('section_key', 'timeline');
                $this->view['aboutTimeline'] = $aboutTimeline;

                return view('frontend.pages.about', $this->view);

            }

            // Category dịch vụ
            if ($category->slug === 'dich-vu') {

                $this->view['category'] = $category;


                $breadcrumbs = $this->buildBreadcrumbs('category', $category);
                $this->view['breadcrumbs'] = $breadcrumbs;

                $services = Post::with(['category', 'thumbnail'])
                    ->where('category_id', $category->id)
                    ->published()
                    ->latest('published_at')
                    ->take(6)
                    ->get();
                $this->view['services'] = $services;

                $page = Page::with([
                        'banner',
                        'sections' => function ($query) {
                            $query->where('is_active', 1)
                                ->with(['image', 'background'])
                                ->orderBy('sort_order', 'asc');
                            }
                        ])
                    ->where('slug', 'gioi-thieu')
                    ->where('status', 'published')
                    ->firstOrFail();
                $aboutChoose = $page->sections->firstWhere('section_key', 'why_choose');
                $this->view['aboutChoose'] = $aboutChoose;


                return view('frontend.pages.category.service', $this->view);
            }

            // Category tin tức
            if ($category->slug === 'tin-tuc' || $category->type === 'post') {

                $this->view['category'] = $category;

                $breadcrumbs = $this->buildBreadcrumbs('category', $category);
                $this->view['breadcrumbs'] = $breadcrumbs;

                $categoryIds = collect([$category->id]) // cha
                    ->merge(
                        Category::where('parent_id', $category->id)
                            ->pluck('id') // con
                    );


                $posts = Post::with(['thumbnail', 'category', 'user'])
                ->whereIn('category_id', $categoryIds)
                ->where('status', 'published')
                ->latest('published_at')
                ->paginate(9);
                $this->view['posts'] = $posts;


                return view('frontend.pages.category.blog',  $this->view);
            }

            // Category sản phẩm
            if ($category->type === 'product') {

                $this->view['category'] = $category;


                $breadcrumbs = $this->buildBreadcrumbs('category', $category);
                $this->view['breadcrumbs'] = $breadcrumbs;

                 // 👉 Lấy category con (Cable, Switch…)
                $childCategories = Category::where('parent_id', $category->id)
                    ->where('type', 'product')
                    ->where('is_active', 1)
                    ->orderBy('sort_order')
                    ->get();

                // 👉 Gom tất cả ID (cha + con)
                $categoryIds = collect([$category->id]);

                if ($childCategories->count()) {
                    $categoryIds = $categoryIds->merge($childCategories->pluck('id'));
                }

                // 👉 Lấy sản phẩm
                $products = Product::with('thumbnail')
                    ->whereIn('category_id', $categoryIds)
                    ->where('status', 'published')
                    ->latest()
                    ->paginate(9);

                $this->view['products'] = $products;

                return view('frontend.pages.category.product',  $this->view);
            }

            abort(404);
        }

        abort(404);
    }

    public function postDetail($categorySlug, $postSlug)
    {
        $blogBanner = Slider::with('image')
            ->where('is_active', 1)
            ->where('position', 'blog')
            ->orderBy('sort_order')
            ->first();

        $category = Category::with('parent')
            ->where('slug', $categorySlug)
            ->where('type', 'post')
            ->where('is_active', 1)
            ->firstOrFail();

        $rootCategory = $category;

        while ($rootCategory->parent) {
            $rootCategory = $rootCategory->parent;
        }

        $categoryIds = collect([$category->id])
            ->merge(
                Category::where('parent_id', $category->id)
                    ->where('is_active', 1)
                    ->pluck('id')
            );

        $post = Post::with(['thumbnail', 'category.thumbnail', 'user'])
            ->where('slug', $postSlug)
            ->whereIn('category_id', $categoryIds)
            ->where('status', 'published')
            ->firstOrFail();

        $post->increment('view_count');

        $this->view['post'] = $post;
        $this->view['category'] = $category;
        $this->view['rootCategory'] = $rootCategory;
        $this->view['blogBanner'] = $blogBanner;
        $this->view['breadcrumbs'] = $this->buildBreadcrumbs('post', $post);

        // ===== SERVICE =====
        if ($rootCategory->slug === 'dich-vu') {

            $services = Post::with(['category', 'thumbnail'])
                ->where('category_id', $post->category_id)
                ->where('status', 'published')
                ->latest('published_at')
                ->take(6)
                ->get();

            $this->view['services'] = $services;

            return view('frontend.pages.posts.service', $this->view);
        }

        // ===== BLOG + GIẢI PHÁP =====
        $relatedPosts = Post::with(['thumbnail', 'category'])
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(6)
            ->get();

        $recentPosts = Post::with(['thumbnail', 'category'])
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        $sidebarCategories = Category::with([
                'children' => function ($query) {
                    $query->where('is_active', 1)
                        ->where('type', 'post')
                        ->withCount(['posts' => function ($q) {
                            $q->where('status', 'published');
                        }])
                        ->orderBy('sort_order');
                }
            ])
            ->withCount(['posts' => function ($query) {
                $query->where('status', 'published');
            }])
            ->whereNull('parent_id')
            ->where('type', 'post')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $previousPost = Post::with('category')
            ->where('category_id', $post->category_id)
            ->where('status', 'published')
            ->where('id', '<', $post->id)
            ->latest('id')
            ->first();

        $nextPost = Post::with('category')
            ->where('category_id', $post->category_id)
            ->where('status', 'published')
            ->where('id', '>', $post->id)
            ->orderBy('id')
            ->first();

        $this->view['relatedPosts'] = $relatedPosts;
        $this->view['recentPosts'] = $recentPosts;
        $this->view['sidebarCategories'] = $sidebarCategories;
        $this->view['previousPost'] = $previousPost;
        $this->view['nextPost'] = $nextPost;

        return view('frontend.pages.posts.blog', $this->view);
    }


    public function detail($categorySlug, $slug)
    {
        $category = Category::with('parent')
            ->where('slug', $categorySlug)
            ->where('is_active', 1)
            ->firstOrFail();

        $rootCategory = $category;

        while ($rootCategory->parent) {
            $rootCategory = $rootCategory->parent;
        }

        $categoryIds = collect([$category->id])
            ->merge(
                Category::where('parent_id', $category->id)
                    ->where('is_active', 1)
                    ->pluck('id')
            );

        $blogBanner = Slider::with('image')
            ->where('is_active', 1)
            ->where('position', 'blog')
            ->orderBy('sort_order')
            ->first();

        $this->view['category'] = $category;
        $this->view['rootCategory'] = $rootCategory;
        $this->view['blogBanner'] = $blogBanner;

        // PRODUCT DETAIL
        if ($category->type === 'product') {

            $product = Product::with(['thumbnail', 'category.thumbnail'])
                ->where('slug', $slug)
                ->whereIn('category_id', $categoryIds)
                ->where('status', 'published')
                ->firstOrFail();

            $product->increment('view_count');

            $relatedProducts = Product::with(['thumbnail', 'category'])
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->where('status', 'published')
                ->latest()
                ->take(3)
                ->get();

            $sidebarProductCategories = Category::with([
                    'children' => function ($query) {
                        $query->where('is_active', 1)
                            ->where('type', 'product')
                            ->withCount(['products' => function ($q) {
                                $q->where('status', 'published');
                            }])
                            ->orderBy('sort_order');
                    }
                ])
                ->withCount(['products' => function ($query) {
                    $query->where('status', 'published');
                }])
                ->whereNull('parent_id')
                ->where('type', 'product')
                ->where('is_active', 1)
                ->orderBy('sort_order')
                ->get();

            $this->view['product'] = $product;
            $this->view['relatedProducts'] = $relatedProducts;
            $this->view['sidebarProductCategories'] = $sidebarProductCategories;
            $this->view['breadcrumbs'] = $this->buildBreadcrumbs('product', $product);

            return view('frontend.pages.posts.product', $this->view);
        }

        // POST DETAIL
        if ($category->type === 'post') {

            $post = Post::with(['thumbnail', 'category.thumbnail', 'user'])
                ->where('slug', $slug)
                ->whereIn('category_id', $categoryIds)
                ->where('status', 'published')
                ->firstOrFail();

            $post->increment('view_count');

            $this->view['post'] = $post;
            $this->view['breadcrumbs'] = $this->buildBreadcrumbs('post', $post);

            // SERVICE DETAIL
            if ($rootCategory->slug === 'dich-vu') {

                $services = Post::with(['category', 'thumbnail'])
                    ->where('category_id', $post->category_id)
                    ->where('status', 'published')
                    ->latest('published_at')
                    ->take(6)
                    ->get();

                $this->view['services'] = $services;

                return view('frontend.pages.posts.service', $this->view);
            }

            // BLOG + GIẢI PHÁP DETAIL
            $relatedPosts = Post::with(['thumbnail', 'category'])
                ->where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->where('status', 'published')
                ->latest('published_at')
                ->take(6)
                ->get();

            $recentPosts = Post::with(['thumbnail', 'category'])
                ->where('id', '!=', $post->id)
                ->where('status', 'published')
                ->latest('published_at')
                ->take(3)
                ->get();

            $sidebarCategories = Category::with([
                    'children' => function ($query) {
                        $query->where('is_active', 1)
                            ->where('type', 'post')
                            ->withCount(['posts' => function ($q) {
                                $q->where('status', 'published');
                            }])
                            ->orderBy('sort_order');
                    }
                ])
                ->withCount(['posts' => function ($query) {
                    $query->where('status', 'published');
                }])
                ->whereNull('parent_id')
                ->where('type', 'post')
                ->where('is_active', 1)
                ->orderBy('sort_order')
                ->get();

            $previousPost = Post::with('category')
                ->where('category_id', $post->category_id)
                ->where('status', 'published')
                ->where('id', '<', $post->id)
                ->latest('id')
                ->first();

            $nextPost = Post::with('category')
                ->where('category_id', $post->category_id)
                ->where('status', 'published')
                ->where('id', '>', $post->id)
                ->orderBy('id')
                ->first();

            $this->view['relatedPosts'] = $relatedPosts;
            $this->view['recentPosts'] = $recentPosts;
            $this->view['sidebarCategories'] = $sidebarCategories;
            $this->view['previousPost'] = $previousPost;
            $this->view['nextPost'] = $nextPost;

            return view('frontend.pages.posts.blog', $this->view);
        }

        abort(404);
    }

    public function contact()
    {
        $breadcrumbs = [
            [
                'label' => 'Trang chủ',
                'url' => route('home'),
            ],
            [
                'label' => 'Liên hệ',
                'url' => null,
            ],
        ];

        return view('frontend.pages.contact', compact('breadcrumbs'));
    }
}