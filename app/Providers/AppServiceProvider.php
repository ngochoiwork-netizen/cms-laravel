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
            if (session()->has('locale')) {
                app()->setLocale(session('locale'));
            }
            $locale = app()->getLocale();
            $headerCategories = Category::with([
                'translations' => function ($query) use ($locale) {
                    $query->where('locale', $locale);
                },
                'children' => function ($query) use ($locale) {
                    $query->where('is_active', 1)
                        ->orderBy('sort_order')
                        ->orderBy('id')
                        ->with([
                            'translations' => function ($query) use ($locale) {
                                $query->where('locale', $locale);
                            }
                        ]);
                }
            ])
                ->whereNull('parent_id')
                ->where('type', 'post')
                ->where('is_active', 1)
                ->whereIn('slug', [
                    'pos-system',
                    'merchant-services',
                    'growth-services',
                    'resource',
                    've-chung-toi',
                ])
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            $view->with('headerCategories', $headerCategories);
        });
    }
}
