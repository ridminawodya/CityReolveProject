<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FundTaxController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;

// Public routes
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

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
    return view('complaints.create');
});
Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
Route::get('/complaints/{id}', [ComplaintController::class, 'show'])->name('complaints.show');

Route::get('/timetable', function () {
    return view('timetable');
});

Route::get('/track', function () {
    return view('track');
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/account', function () {
        return view('account');
    });

    // The main dashboard route now points to a Home Controller
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Admin routes - protected by the admin middleware
    Route::middleware(EnsureUserIsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
        // This is the actual admin dashboard route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Custom route for exporting users. This must be defined BEFORE the resource route.
        Route::get('users/export', [AdminUserController::class, 'export'])->name('users.export');
        
        // This single line handles all user-related CRUD routes (index, create, store, etc.)
        Route::resource('users', AdminUserController::class);

        // Resource routes for departments and fund-taxes
        Route::resource('departments', DepartmentController::class);
        Route::resource('fund-taxes', FundTaxController::class);

        // Custom route for reports
        Route::get('reports', [ReportController::class, 'index'])->name('reports');
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
