<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// front
Route::resource('/', App\Http\Controllers\Front\IndexController::class);
Route::resource('/about-us', App\Http\Controllers\Front\AboutUsController::class);
Route::resource('/blog', App\Http\Controllers\Front\BlogController::class);
Route::resource('/gallery', App\Http\Controllers\Front\GalleryController::class);
Route::resource('/contact-us', App\Http\Controllers\Front\ContactUsController::class);
Route::resource('/tour-package', App\Http\Controllers\Front\TourPackageController::class);
Route::resource('/thank-you', App\Http\Controllers\Front\ThankYouController::class);

// admin
Route::middleware(['auth'])->prefix('panel/admin')->group(function () {
    // Route::prefix('panel/admin')->group(function () {
    Route::resource('dashboard', App\Http\Controllers\Admin\DashboardController::class);
    Route::resource('page', App\Http\Controllers\Admin\PageController::class);
    Route::resource('tour', App\Http\Controllers\Admin\TourController::class);
    Route::resource('why-choose-us', App\Http\Controllers\Admin\WhyChooseUsController::class);
    Route::resource('blog/category', App\Http\Controllers\Admin\BlogCategoryController::class)->names([
        'index' => 'blog.category.index',
        'create' => 'blog.category.create',
        'store' => 'blog.category.store',
        'edit' => 'blog.category.edit',
        'update' => 'blog.category.update',
        'destroy' => 'blog.category.destroy',
    ]);
    Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);
    Route::resource('testimonial', App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('our-client', App\Http\Controllers\Admin\OurClientController::class);
    Route::resource('gallery/category', App\Http\Controllers\Admin\GalleryCategoryController::class)->names([
        'index' => 'gallery.category.index',
        'create' => 'gallery.category.create',
        'store' => 'gallery.category.store',
        'edit' => 'gallery.category.edit',
        'update' => 'gallery.category.update',
        'destroy' => 'gallery.category.destroy',
    ]);
    Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class);
    Route::resource('slider', App\Http\Controllers\Admin\SliderController::class);
    Route::resource('setting', App\Http\Controllers\Admin\SettingController::class);
});

require __DIR__ . '/auth.php';
