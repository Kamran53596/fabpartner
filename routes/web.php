<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/fab_backend', function () {
    return redirect('fab_backend/login');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect', 'localize'] ], function() {

    //Route::get(LaravelLocalization::transRoute('routes.category'), [CategoryController::class, 'index'])->name('category');
    //Route::get(LaravelLocalization::transRoute('routes.product'), [ProductController::class, 'index'])->name('product');

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
