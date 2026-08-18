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
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\AttractionController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Frontend\HomeController;

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

        // Country
        Route::get('countries', [CountryController::class, 'countries'])
            ->name('countries.index');

        Route::get('countries/create', [CountryController::class, 'create'])
            ->name('countries.create');

        Route::post('countries', [CountryController::class, 'store'])
            ->name('countries.store');

        Route::get('countries/{country}/edit', [CountryController::class, 'edit'])
            ->name('countries.edit');

        Route::put('countries/{country}', [CountryController::class, 'update'])
            ->name('countries.update');

        Route::delete('countries/{country}', [CountryController::class, 'destroy'])
            ->name('countries.destroy');


        // Province
        Route::get('provinces', [ProvinceController::class, 'index'])
            ->name('provinces.index');

        Route::get('provinces/create', [ProvinceController::class, 'create'])
            ->name('provinces.create');

        Route::post('provinces', [ProvinceController::class, 'store'])
            ->name('provinces.store');

        Route::get('provinces/{province}/edit', [ProvinceController::class, 'edit'])
            ->name('provinces.edit');

        Route::put('provinces/{province}', [ProvinceController::class, 'update'])
            ->name('provinces.update');

        Route::delete('provinces/{province}', [ProvinceController::class, 'destroy'])
            ->name('provinces.destroy');


        // Destinations
        Route::get('destinations', [DestinationController::class, 'index'])
            ->name('destinations.index');

        Route::get('destinations/create', [DestinationController::class, 'create'])
            ->name('destinations.create');

        Route::post('destinations', [DestinationController::class, 'store'])
            ->name('destinations.store');

        Route::get('destinations/{destination}/edit', [DestinationController::class, 'edit'])
            ->name('destinations.edit');

        Route::put('destinations/{destination}', [DestinationController::class, 'update'])
            ->name('destinations.update');

        Route::delete('destinations/{destination}', [DestinationController::class, 'destroy'])
            ->name('destinations.destroy');

        // Hotels
        Route::get('hotels', [HotelController::class, 'index'])
            ->name('hotels.index');

        Route::get('hotels/create', [HotelController::class, 'create'])
            ->name('hotels.create');

        Route::post('hotels', [HotelController::class, 'store'])
            ->name('hotels.store');

        Route::get('hotels/{hotel}/edit', [HotelController::class, 'edit'])
            ->name('hotels.edit');

        Route::put('hotels/{hotel}', [HotelController::class, 'update'])
            ->name('hotels.update');

        Route::delete('hotels/{hotel}', [HotelController::class, 'destroy'])
            ->name('hotels.destroy');


        // Restaurants
        Route::get('restaurants', [RestaurantController::class, 'index'])
            ->name('restaurants.index');

        Route::get('restaurants/create', [RestaurantController::class, 'create'])
            ->name('restaurants.create');

        Route::post('restaurants', [RestaurantController::class, 'store'])
            ->name('restaurants.store');

        Route::get('restaurants/{restaurant}/edit', [RestaurantController::class, 'edit'])
            ->name('restaurants.edit');

        Route::put('restaurants/{restaurant}', [RestaurantController::class, 'update'])
            ->name('restaurants.update');

        Route::delete('restaurants/{restaurant}', [RestaurantController::class, 'destroy'])
            ->name('restaurants.destroy');

        // Attractions
        Route::get('attractions', [AttractionController::class, 'index'])
            ->name('attractions.index');

        Route::get('attractions/create', [AttractionController::class, 'create'])
            ->name('attractions.create');

        Route::post('attractions', [AttractionController::class, 'store'])
            ->name('attractions.store');

        Route::get('attractions/{attraction}/edit', [AttractionController::class, 'edit'])
            ->name('attractions.edit');

        Route::put('attractions/{attraction}', [AttractionController::class, 'update'])
            ->name('attractions.update');

        Route::delete('attractions/{attraction}', [AttractionController::class, 'destroy'])
            ->name('attractions.destroy');


    });



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/lien-he', [HomeController::class, 'contact'])
    ->name('frontend.contact');

    
Route::get('/sitemap.xml', [SitemapController::class, 'index'])
    ->name('frontend.sitemap');


Route::get('/{categorySlug}/{postSlug}', [HomeController::class, 'detail'])
    ->name('frontend.post.show');

Route::get('/{slug}', [HomeController::class, 'resolveOneLevel'])
    ->name('frontend.resolve');


