<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminComplaintController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FundTaxController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CookieController;
use Illuminate\Support\Facades\Route;

// Authentication routes
require __DIR__.'/auth.php';

// Public routes
// This route now uses the CookieController to handle the homepage and pass the cookie status
Route::get('/', [CookieController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/community', function () {
    return view('community');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/profileweb', function () {
    return view('profileweb');
});

Route::get('/submit', function () {
    return view('submit');
});

Route::get('/timetable', function () {
    return view('timetable');
});

Route::get('/track', function () {
    return view('track');
});

// Cookie policy routes
Route::post('/accept-cookie', [CookieController::class, 'accept'])->name('accept-cookie');
Route::post('/delete-cookie', [CookieController::class, 'deleteCookie'])->name('delete-cookie');


// Public complaint routes (for form submission and tracking)
Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
Route::get('/api/complaints/{id}/status', [ComplaintController::class, 'getComplaintStatus'])->name('complaints.status');

// ADD THIS NEW ROUTE FOR POST-based tracking
Route::post('/track-complaint', [ComplaintController::class, 'trackComplaint'])->name('track.complaint');

// Protected routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Complaint management routes
        Route::get('/complaints', [AdminComplaintController::class, 'index'])->name('complaints.index');
        Route::get('/complaints/{complaint}', [AdminComplaintController::class, 'show'])->name('complaints.show');
        Route::patch('/complaints/{complaint}/status', [AdminComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');
        Route::delete('/complaints/{complaint}', [AdminComplaintController::class, 'destroy'])->name('complaints.destroy');
        Route::get('/complaints/export', [AdminComplaintController::class, 'export'])->name('complaints.export');
        Route::post('/complaints/bulk-update', [AdminComplaintController::class, 'bulkUpdateStatus'])->name('complaints.bulkUpdate');

        // Other admin routes
        Route::get('users/export', [AdminUserController::class, 'export'])->name('users.export');
        Route::resource('users', AdminUserController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('fund-taxes', FundTaxController::class);
    });

    // Citizen routes
    Route::middleware(['role:citizen'])->prefix('citizen')->name('citizen.')->group(function () {
        Route::get('/dashboard', [CitizenController::class, 'index'])->name('dashboard');
        Route::get('profile/edit', [CitizenController::class, 'editProfile'])->name('profile.edit');
        Route::put('profile', [CitizenController::class, 'updateProfile'])->name('profile.update');

        // Payment routes
        Route::prefix('payments')->name('payments.')->group(function () {
            Route::get('create', [CitizenController::class, 'createPayment'])->name('create');
            Route::post('store', [CitizenController::class, 'storePayment'])->name('store');
            
            // New routes for success and download
            Route::get('success/{transaction}', [CitizenController::class, 'successPayment'])->name('success');
            Route::get('receipt/{transaction}', [CitizenController::class, 'downloadReceipt'])->name('downloadReceipt');
        });
    });
});
