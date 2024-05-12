<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\blog\BlogController;
use App\Http\Controllers\blog\CommentController;
use App\Http\Controllers\blog\PostController;
use App\Http\Controllers\PublicController;
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
    Route::group(['middleware' => 'seo'], function () {
        Route::get('/home', [PublicController::class, 'index'])->name('home');
        Route::get('/about', [PublicController::class, 'about'])->name('about');
        Route::get('/products', [PublicController::class, 'products'])->name('products');
        Route::get('/mazoon45', [PublicController::class, 'mazoon45'])->name('mazoon45');
        Route::get('/mazoon60', [PublicController::class, 'mazoon60'])->name('mazoon60');
        Route::get('/mazooncw', [PublicController::class, 'mazooncw'])->name('mazooncw');
        Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
        Route::post('/contact_store', [PublicController::class, 'contact_store'])->name('contact.store');
        Route::get('/news', [PublicController::class, 'blog'])->name('news');
        Route::get('/testimonials', [PublicController::class, 'testimonials']);
        Route::get('/portfolio', [PublicController::class, 'portfolio']);
        Route::get('/faq', [PublicController::class, 'faq']);
        Route::get('/terms', [PublicController::class, 'terms']);
        //Blog routes
        Route::get('/blog', [BlogController::class, 'index'])->name('blog');
        /*Route::resource('news', NewsController::class);*/

        Route::resource('post', PostController::class);
    });
/*    Route::get('/tags/{tag}', [TagController::class, 'showPosts'])->name('tag.posts');*/


    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');







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
            Route::get('login', [LoginController::class, 'index'])->name('admin.login');
            Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
        });
        //Authenticated Middleware for admin
        Route::group(['middleware' => 'admin.auth'], function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
        });
    });


});
