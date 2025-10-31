<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/createpage', function () {
    return view('createPage');
});

Route::get('/detailresep', function () {
    return view('detailResep');
});

Route::get('/editprofile', function () {
    return view('editProfile');
});

Route::get('/forgetpass', function () {
    return view('forgetPass');
});

Route::get('/forgetpass2', function () {
    return view('forgetPass2');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/mainpage', function () {
    return view('mainPage');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/register', function () {
    return view('register');
});
