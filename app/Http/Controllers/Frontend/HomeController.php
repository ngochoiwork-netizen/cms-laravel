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
    protected $view = [];

    public function index()
    {

        $sliders = Slider::with([
            'image',
            'translations',
        ])
            ->active()
            ->position('home')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $this->view['sliders'] = $sliders;
        
        $home = Page::with([
            'sections.translations',
            'sections.image',
        ])
            ->active()
            ->where('slug', 'home')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | About Section
        |--------------------------------------------------------------------------
        */

        $aboutSection = $home?->sections
            ->where('key', 'about')
            ->where('is_active', true)
            ->first();

        $this->view['aboutSection'] = $aboutSection;

        $serviceSection = $home?->sections
        ->where('key', 'service')
        ->where('is_active', true)
        ->first();
        $this->view['serviceSection'] = $serviceSection;

        $productSection = $home?->sections
        ->where('key', 'solution')
        ->where('is_active', true)
        ->first();
        $this->view['productSection'] = $productSection;

        $workflowSection = $home?->sections
        ->where('key', 'workflow')
        ->where('is_active', true)
        ->first();
        $this->view['workflowSection'] = $workflowSection;

        $whySection = $home?->sections
        ->where('key', 'why_senverse')
        ->where('is_active', true)
        ->first();
        $this->view['whySection'] = $whySection;

        $testimonials = Post::with([
            'translation',
            'thumbnail',
        ])
            ->whereHas('category', function ($query) {
                $query->where('slug', 'khach-hang');
            })
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->take(5)
            ->get();
        //dd($testimonials);
        $this->view['testimonials'] = $testimonials;


        $posts = Post::with([
            'translation',
            'thumbnail',
            'category',
        ])
        ->active()
        ->whereHas('category', function ($query) {
            $query->where('slug', 'blog');
        })
        ->orderByDesc('created_at')
        ->take(3)
        ->get();

        $this->view['posts'] = $posts;


        return view('frontend.home.index',$this->view);
    }


}