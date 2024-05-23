<?php

use Illuminate\Support\Facades\Route;

// added
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// admin contents controllers
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('adminlogin');
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
        Route::get('enquiriestab', [EnquiryController::class, 'viewtab'])->name('admin.enquiries');
        Route::get('enquiries', [EnquiryController::class, 'getEnquiries'])->name('admin.enquiries');
        Route::get('enquiries/{id}', [EnquiryController::class, 'getEnquiry'])->name('admin.enquiries.view');
        // add
        Route::get('enquiries/create', [EnquiryController::class, 'create'])->name('admin.enquiries.create');
        Route::post('enquiries/store', [EnquiryController::class, 'addEnquiry'])->name('admin.enquiries.store');
        // edit
        Route::get('enquiries/edit/{id}', [EnquiryController::class, 'edit'])->name('admin.enquiries.edit');
        Route::put('enquiries/update/{id}', [EnquiryController::class, 'updateEnquiry'])->name('admin.enquiries.update');
        // delete
        Route::delete('enquiries/delete/{id}', [EnquiryController::class, 'deleteEnquiry'])->name('admin.enquiries.delete');
        // approve
        Route::post('admin/enquiries/{id}/approve', [EnquiryController::class, 'approveEnquiry'])->name('admin.enquiries.approve');

        // FOR SUBSCRIPTION
        Route::get('subscriptionstab', [SubscriptionController::class, 'viewtab'])->name('admin.subscriptions');
        Route::get('subscriptions', [SubscriptionController::class, 'getSubscriptions'])->name('admin.subscriptions');

        Route::get('admin/subscriptions/{id}/add', [SubscriptionController::class, 'addSubscription'])->name('admin.subscriptions.add');
        Route::post('admin/subscriptions/store', [SubscriptionController::class, 'storeSubscription'])->name('admin.subscriptions.store');

        // FOR MEMBERS
        Route::get('memberstab', [MemberController::class, 'viewtab'])->name('admin.members');
        Route::get('members', [MemberController::class, 'getMembers'])->name('admin.members');
    });
});

