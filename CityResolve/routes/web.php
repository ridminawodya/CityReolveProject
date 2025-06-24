<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', function () {
    return view('about');
});

Route::get('/', function () {
    return view('account');
});

Route::get('/', function () {
    return view('community');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/', function () {
    return view('payment');
});

Route::get('/', function () {
    return view('profile');
});

Route::get('/', function () {
    return view('submit');
});

Route::get('/', function () {
    return view('timetable');
});

Route::get('/', function () {
    return view('track');
});