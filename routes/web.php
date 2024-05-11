<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::view('/dashboard2', 'admin.dashboard2');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    //Public webpage route

    //redirect to homepage
    Route::get('/', function () {
        return redirect(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/home'));
    });
    Route::get('/home', [\App\Http\Controllers\PublicController::class, 'index'])->name('home');
    Route::get('/about', [\App\Http\Controllers\PublicController::class, 'about'])->name('about');
    Route::get('/products', [\App\Http\Controllers\PublicController::class, 'products'])->name('products');
    Route::get('/mazoon45', [\App\Http\Controllers\PublicController::class, 'mazoon45'])->name('mazoon45');
    Route::get('/mazoon60', [\App\Http\Controllers\PublicController::class, 'mazoon60'])->name('mazoon60');
    Route::get('/mazooncw', [\App\Http\Controllers\PublicController::class, 'mazooncw'])->name('mazooncw');
    Route::get('/contact', [\App\Http\Controllers\PublicController::class, 'contact'])->name('contact');
    Route::post('/contact_store', [\App\Http\Controllers\PublicController::class, 'contact_store'])->name('contact.store');
    Route::get('/news', [\App\Http\Controllers\PublicController::class, 'blog'])->name('news');
    Route::get('/testimonials', [\App\Http\Controllers\PublicController::class, 'testimonials']);
    Route::get('/portfolio', [\App\Http\Controllers\PublicController::class, 'portfolio']);
    Route::get('/faq', [\App\Http\Controllers\PublicController::class, 'faq']);
    Route::get('/terms', [\App\Http\Controllers\PublicController::class, 'terms']);



    //Blog routes
    Route::get('/blog', [\App\Http\Controllers\blog\BlogController::class, 'index'])->name('blog');
    /*Route::resource('news', NewsController::class);*/

    Route::resource('post', \App\Http\Controllers\blog\PostController::class);
    Route::post('comments', [\App\Http\Controllers\blog\CommentController::class, 'store'])->name('comments.store');







    Route::group(['prefix' => 'account'], function () {
        //Guest Middleware
        Route::group(['middleware' => 'guest'], function () {
            Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('account.login');
            Route::get('register', [\App\Http\Controllers\LoginController::class, 'register'])->name('account.register');
            Route::post('process-register', [\App\Http\Controllers\LoginController::class, 'processRegister'])->name('account.processRegister');
            Route::post('authenticate', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('account.authenticate');
        });
        //Authenticated Middleware
        Route::group(['middleware' => 'auth'], function () {
            Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('account.logout');
            Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('account.dashboard');
        });
    });


    Route::group(['prefix' => 'admin'], function () {
        //Guest Middleware for admin
        Route::group(['middleware' => 'admin.guest'], function () {
            Route::get('login', [\App\Http\Controllers\admin\LoginController::class, 'index'])->name('admin.login');
            Route::post('authenticate', [\App\Http\Controllers\admin\LoginController::class, 'authenticate'])->name('admin.authenticate');
        });
        //Authenticated Middleware for admin
        Route::group(['middleware' => 'admin.auth'], function () {
            Route::get('dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index'])->name('admin.dashboard');
            Route::get('logout', [\App\Http\Controllers\admin\LoginController::class, 'logout'])->name('admin.logout');
        });
    });


});
