<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        $productCount = Product::count();
        $categoryCount = Category::count();
        $mediaCount = Media::count();
        $sliderCount = Slider::count();
        $userCount = User::count();

        $activeSliderCount = Slider::where('is_active', 1)->count();

        // Nếu bảng products có field is_active thì dùng dòng này
        $hiddenProductCount = Product::where('status', 'inactive')->count();

        $latestPosts = Post::latest()
            ->take(5)
            ->get();

        $latestProducts = Product::latest()
            ->take(5)
            ->get();

        $latestMedia = Media::latest()
            ->take(6)
            ->get();

        return view('admin.index', compact(
            'postCount',
            'productCount',
            'categoryCount',
            'mediaCount',
            'sliderCount',
            'userCount',
            'activeSliderCount',
            'hiddenProductCount',
            'latestPosts',
            'latestProducts',
            'latestMedia'
        ));
    }
}