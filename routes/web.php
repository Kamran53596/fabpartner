<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalog\CategoryController;
use App\Http\Controllers\Catalog\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;

// Route::get('/fab_backend/', function () {
//     return redirect('fab_backend/login');
// });

Auth::routes(['login' => false, 'register' => 'false']);

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect', 'localize'] ], function() {

    Route::controller(CategoryController::class)->group(function () {
        Route::get(LaravelLocalization::transRoute('routes.category'), 'category')->name('category');
    });
    //Route::get(LaravelLocalization::transRoute('routes.product'), [ProductController::class, 'index'])->name('product');

    //Search
    Route::controller(SearchController::class)->group(function () {
        //Route::get(LaravelLocalization::transRoute('routes.search'), 'index')->name('search');
        Route::get('search/autocomplete', 'autocomplete')->name('search.autocomplete');
    });

    //Pages
    Route::controller(PageController::class)->group(function () {
        Route::get(LaravelLocalization::transRoute('routes.home'), 'home')->name('home');
        //Route::get(LaravelLocalization::transRoute('routes.about'), 'about')->name('about');
        //Route::get(LaravelLocalization::transRoute('routes.contact'), 'contact')->name('contact');
    });
});

// Route::controller(FormController::class)->group(function () {
//     Route::post('contact/form', 'contactForm')->name('contact.form');
// });
