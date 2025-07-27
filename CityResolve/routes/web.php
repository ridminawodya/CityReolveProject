<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::group(['middleware' => 'web'], function () {
    // Set the application locale if stored in the session
    Route::get('/', function () {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        return view('home'); // Or whatever your default landing view is
    });
});


// Add the POST route for language switching
Route::post('/language/switch', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/register', function () {
    return view('register');
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
