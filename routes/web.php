<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'account'], function (){
    //Guest Middleware
    Route::group(['middleware'=>'guest'], function (){
        Route::get('login',[\App\Http\Controllers\LoginController::class,'index'])->name('account.login');
        Route::get('register',[\App\Http\Controllers\LoginController::class, 'register'])->name('account.register');
        Route::post('process-register',[\App\Http\Controllers\LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[\App\Http\Controllers\LoginController::class, 'authenticate'])->name('account.authenticate');
    });
    //Authenticated Middleware
    Route::group(['middleware'=>'auth'], function (){
        Route::get('logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard',[\App\Http\Controllers\DashboardController::class, 'index'])->name('account.dashboard');
    });
});


Route::group(['prefix' => 'admin'], function (){
    //Guest Middleware for admin
    Route::group(['middleware'=>'admin.guest'], function (){
        Route::get('login',[\App\Http\Controllers\admin\LoginController::class,'index'])->name('admin.login');
        Route::post('authenticate',[\App\Http\Controllers\admin\LoginController::class, 'authenticate'])->name('admin.authenticate');
    });
    //Authenticated Middleware for admin
    Route::group(['middleware'=>'admin.auth'], function (){
        Route::get('dashboard',[\App\Http\Controllers\admin\DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[\App\Http\Controllers\admin\LoginController::class,'logout'])->name('admin.logout');
    });
});












