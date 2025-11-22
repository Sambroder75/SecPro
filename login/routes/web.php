<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Tampilan;

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

Route::get('/forgetpass', function () {
    return view('forgetPass');
});

Route::get('/forgetpass2', function () {
    return view('forgetPass2');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/mainpage', [MainPageController::class, 'index'])->name('mainpage');

Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::post('/login', [AuthManager::class,'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');

Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::resource('recipes', RecipeController::class);

Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [Tampilan::class, 'show'])->name('profile');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
