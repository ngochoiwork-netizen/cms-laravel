<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PageSectionController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\SolutionController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Media
        Route::get('/media', [MediaController::class, 'media'])
            ->name('media.index');
        Route::post('/media/upload', [MediaController::class, 'upload'])
            ->name('media.upload');
        Route::delete('/media/{media}', [MediaController::class, 'destroy'])
            ->name('media.destroy');
        Route::get('media/popup', [MediaController::class, 'popup'])
            ->name('media.popup');
        Route::post('media/ajax-upload', [MediaController::class, 'ajaxUpload'])
            ->name('media.ajax-upload');
    
        // Settings
        Route::get('/settings', [SettingController::class, 'settings'])
            ->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])
            ->name('settings.update');

        // Sliders
        Route::get('sliders', [SliderController::class, 'sliders'])
            ->name('sliders.index');
        Route::get('sliders/create', [SliderController::class, 'create'])
            ->name('sliders.create');
        Route::post('sliders', [SliderController::class, 'store'])
            ->name('sliders.store');
        Route::get('sliders/{slider}/edit', [SliderController::class, 'edit'])
            ->name('sliders.edit');
        Route::put('sliders/{slider}', [SliderController::class, 'update'])
            ->name('sliders.update');
        Route::delete('sliders/{slider}', [SliderController::class, 'destroy'])
            ->name('sliders.destroy');

        // Category
        Route::get('categories', [CategoryController::class, 'categories'])
            ->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])
            ->name('categories.create');
        Route::post('categories', [CategoryController::class, 'store'])
            ->name('categories.store');
         Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');
        Route::put('categories/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');

        // Post
        Route::get('posts', [PostController::class, 'post'])
            ->name('posts.index');
        Route::get('posts/create', [PostController::class, 'create'])
            ->name('posts.create');
        Route::post('posts', [PostController::class, 'store'])
            ->name('posts.store');
        Route::get('posts/{post}/edit', [PostController::class, 'edit'])
            ->name('posts.edit');
        Route::put('posts/{post}', [PostController::class, 'update'])
            ->name('posts.update');
        Route::delete('posts/{post}', [PostController::class, 'destroy'])
            ->name('posts.destroy');

        // Products
        Route::get('products', [ProductController::class, 'product'])
            ->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])
            ->name('products.create');
        Route::post('products', [ProductController::class, 'store'])
            ->name('products.store');
        Route::get('products/{product}', [ProductController::class, 'show'])
            ->name('products.show');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])
            ->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])
            ->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])
            ->name('products.destroy');

        // User
        Route::get('user', [UserController::class, 'users'])
            ->name('users.index');
        Route::get('user/create', [UserController::class, 'create'])
            ->name('users.create');
        Route::post('user', [UserController::class, 'store'])
            ->name('users.store');
        Route::get('user/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');
        Route::put('user/{user}', [UserController::class, 'update'])
            ->name('users.update');
        Route::delete('user/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        // Khóa / mở user
        Route::patch('user/{user}/toggle-active', [UserController::class, 'toggleActive'])
            ->name('users.toggle-active');

        // Reset password
        Route::get('user/{user}/reset-password', [UserController::class, 'showResetPassword'])
            ->name('users.reset-password');

        Route::put('user/{user}/reset-password', [UserController::class, 'resetPassword'])
            ->name('users.update-password');


        // Page
        Route::get('pages', [PageController::class, 'index'])
            ->name('pages.index');

        Route::get('pages/create', [PageController::class, 'create'])
            ->name('pages.create');

        Route::post('pages', [PageController::class, 'store'])
            ->name('pages.store');

        Route::get('pages/{page}/edit', [PageController::class, 'edit'])
            ->name('pages.edit');

        Route::put('pages/{page}', [PageController::class, 'update'])
            ->name('pages.update');

        Route::delete('pages/{page}', [PageController::class, 'destroy'])
            ->name('pages.destroy');

        // Page Sections
        Route::get('pages/{page}/sections', [PageSectionController::class, 'index'])
            ->name('pages.sections.index');

        Route::get('pages/{page}/sections/create', [PageSectionController::class, 'create'])
            ->name('pages.sections.create');

        Route::post('pages/{page}/sections', [PageSectionController::class, 'store'])
            ->name('pages.sections.store');

        Route::get('page-sections/{section}/edit', [PageSectionController::class, 'edit'])
            ->name('page-sections.edit');

        Route::put('page-sections/{section}', [PageSectionController::class, 'update'])
            ->name('page-sections.update');

        Route::delete('page-sections/{section}', [PageSectionController::class, 'destroy'])
            ->name('page-sections.destroy');
    });

    Route::get('/language/{locale}', [LanguageController::class, 'switch'])
        ->name('frontend.language.switch');


    Route::get('/', [HomeController::class, 'index'])
        ->name('home');


    Route::get('/about-us', [AboutController::class, 'index'])
    ->name('about');


    Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

    Route::post('/contact', [ContactController::class, 'submit'])
    ->name('contact.submit');


    Route::get('/solutions/{slug}',[SolutionController::class, 'show'])
        ->name('solutions.show');

    Route::get('/sitemap.xml', [SitemapController::class, 'index'])
        ->name('frontend.sitemap');
