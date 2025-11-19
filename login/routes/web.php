<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/comment', function () {
    return view('comment');
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

Route::get('/mainpage', function () {
    return view('mainPage');
})->name('mainPage');

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::post('/login', [AuthManager::class,'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::resource('recipes', RecipeController::class);
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth');