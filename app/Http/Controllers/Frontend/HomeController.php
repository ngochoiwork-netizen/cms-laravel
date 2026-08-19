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


    public function index()
    {

        return view('frontend.home.index',);
    }


}