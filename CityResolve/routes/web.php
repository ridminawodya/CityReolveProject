<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/community', function () {
    return view('community');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/profile', function () {
    return view('profile');
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

require __DIR__.'/auth.php';
