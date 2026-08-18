<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {

            $headerCategories = Category::with('children')
                ->whereNull('parent_id')
                ->where('type', 'post')
                ->where('is_active', 1)
                ->whereIn('slug', [
                    'dich-vu',
                    'giai-phap',
                    'tin-tuc',
                ])
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            $view->with('headerCategories', $headerCategories);
        });
    }
}
