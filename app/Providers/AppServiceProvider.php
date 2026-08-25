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

            /*
            |--------------------------------------------------------------------------
            | Current Locale
            |--------------------------------------------------------------------------
            |
            | Locale đã được SetLocale middleware xử lý.
            |
            | EN:
            | /about-us
            |
            | VI:
            | /vi/about-us
            |
            */

            $locale = app()->getLocale();


            /*
            |--------------------------------------------------------------------------
            | Header Categories
            |--------------------------------------------------------------------------
            */

            $headerCategories = Category::with([

                /*
                |--------------------------------------------------------------------------
                | Parent Translation
                |--------------------------------------------------------------------------
                */

                'translations' => function ($query) use ($locale) {

                    $query->where('locale', $locale);

                },


                /*
                |--------------------------------------------------------------------------
                | Children
                |--------------------------------------------------------------------------
                */

                'children' => function ($query) use ($locale) {

                    $query
                        ->where('is_active', 1)
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


            /*
            |--------------------------------------------------------------------------
            | Footer Page
            |--------------------------------------------------------------------------
            */

            $footerPage = Page::with([

                'sections.translations',
                'sections.image',

            ])
                ->active()
                ->where('slug', 'footer')
                ->first();


            /*
            |--------------------------------------------------------------------------
            | Footer Company
            |--------------------------------------------------------------------------
            */

            $footerCompany = $footerPage?->sections
                ->where('key', 'footer_company')
                ->where('is_active', true)
                ->first();


            /*
            |--------------------------------------------------------------------------
            | Footer Service
            |--------------------------------------------------------------------------
            */

            $footerService = $footerPage?->sections
                ->where('key', 'footer_service')
                ->where('is_active', true)
                ->first();


            /*
            |--------------------------------------------------------------------------
            | Footer Policy
            |--------------------------------------------------------------------------
            */

            $footerPolicy = $footerPage?->sections
                ->where('key', 'footer_policy')
                ->where('is_active', true)
                ->first();


            /*
            |--------------------------------------------------------------------------
            | Share Data To Frontend Views
            |--------------------------------------------------------------------------
            */

            $view->with([

                'headerCategories' => $headerCategories,

                'footerCompany' => $footerCompany,

                'footerService' => $footerService,

                'footerPolicy' => $footerPolicy,

            ]);

        });
    }
}