<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Page;

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
                    'about-us',
                ])
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();


            $footerPage = Page::with([
                'sections.translations',
                'sections.image',
            ])
                ->active()
                ->where('slug', 'footer')
                ->first();

            $footerCompany = $footerPage?->sections
                ->where('key', 'footer_company')
                ->where('is_active', true)
                ->first();

            $footerService = $footerPage?->sections
                ->where('key', 'footer_service')
                ->where('is_active', true)
                ->first();

            $footerPolicy = $footerPage?->sections
                ->where('key', 'footer_policy')
                ->where('is_active', true)
                ->first();
                
            $view->with([
                'headerCategories' => $headerCategories,
                'footerCompany' => $footerCompany,
                'footerService' => $footerService,
                'footerPolicy' => $footerPolicy,
            ]);

        });
    }
}
