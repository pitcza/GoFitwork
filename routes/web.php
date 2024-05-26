<?php

use Illuminate\Support\Facades\Route;

// hindi need
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// admin controllers
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('adminlogin');
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

        //----- ENQUIRIES -----//
        Route::get('enquiries', [EnquiryController::class, 'getEnquiries'])->name('admin.enquiries');
        Route::get('enquiries/{id}', [EnquiryController::class, 'getEnquiry'])->name('admin.enquiries.view');
        
        // ADD ENQUIRIES
        Route::get('enquiry/create', [EnquiryController::class, 'createEnquiry'])->name('admin.enquiry.create');
        Route::post('enquiry/store', [EnquiryController::class, 'addEnquiry'])->name('admin.enquiry.store');
        
        // EDIT ENQUIRY
        Route::get('enquiry/edit/{id}', [EnquiryController::class, 'edit'])->name('admin.enquiry.edit');
        Route::put('enquiry/update/{id}', [EnquiryController::class, 'updateEnquiry'])->name('admin.enquiry.update');
        
        // DELETE ENQUIRY
        Route::delete('enquiries/delete/{id}', [EnquiryController::class, 'deleteEnquiry'])->name('admin.enquiries.delete');

        // APPROVE ENQUIRY
        Route::post('enquiries/{enquiry}/approve', [EnquiryController::class, 'approveEnquiry'])->name('admin.enquiries.approve');

        //----- SUBSCRIPTION -----//
        Route::get('subscriptions', [SubscriptionController::class, 'getSubscriptions'])->name('admin.subscriptions');

        // ADD SUBSCRIPTION
        Route::get('subscription/create/{id}', [SubscriptionController::class, 'createSubs'])->name('admin.subscription.create');
        Route::post('subscription/add/{id}', [SubscriptionController::class, 'addSubscription'])->name('admin.subscription.add');

        // EDIT SUBSCRIPTION
        Route::get('subscription/{id}/edit', [SubscriptionController::class, 'editSubscription'])->name('admin.subscription.edit');
        Route::put('subscription/{id}', [SubscriptionController::class, 'updateSubscription'])->name('admin.subscription.update');

        // ENDING MEMBERS SUBSCRIPTION
        Route::get('subscriptions/expiring', [SubscriptionController::class, 'showEndingAndEndedSubs'])->name('admin.subscriptions.expiring');

        // RENEW MEMBER SUBSCRIPTION
        Route::get('subscription/renew/{id}', [SubscriptionController::class, 'renewSubsForm'])->name('admin.subscription.renewsubs');
        Route::put('subscription/renewprocess/{id}', [SubscriptionController::class, 'renewSubscriptions'])->name('admin.subscription.renew');

        // DELETE SUSCRIPTION
        Route::delete('subscriptions/{id}', [SubscriptionController::class, 'deleteSubscription'])->name('admin.subscriptions.delete');

        //----- MEMBERS -----//
        Route::get('members', [MemberController::class, 'showMembers'])->name('admin.members');
        Route::get('member/{id}', [MemberController::class, 'getMember'])->name('admin.member.view');

    });
});

// HINDI NEED (1)
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
