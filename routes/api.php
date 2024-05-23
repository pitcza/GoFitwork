<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// sample
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EnquiryController;

// logged in user tester
Route::get('authenticate', [AdminController::class, 'authenticate'])->middleware('auth:sanctum');

// Auth Routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/refresh', [AdminController::class, 'refreshToken']);
    Route::post('/logout', [AdminController::class, 'logout']);
});

Route::group(['prefix' => 'account'], function() {
    // STAFF LOGIN
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');

        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    });

    // STAFF AUTHENTICATED
    Route::group(['middleware' => 'auth'], function() {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    });
});

Route::group(['prefix' => 'admin'], function() {
    // ADMIN LOGIN
    Route::group(['middleware' => 'admin.guest'], function() {
        Route::get('adminlogin', [AdminController::class, 'index'])->name('admin.adminlogin');
        Route::post('authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });

    // ADMIN AUTHENTICATED
    Route::group(['middleware' => 'admin.auth'], function() {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // FOR ENQUIRIES
        Route::get('dashboard', [EnquiryController::class, 'getEnquiries'])->name('admin.dashboard');
    });
});

