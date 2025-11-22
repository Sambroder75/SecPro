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
Route::post('/login', [AuthManager::class, 'loginPost'])
    ->middleware('throttle:5,1') 
    ->name('login.post');


Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');

Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::resource('recipes', RecipeController::class);


Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [Tampilan::class, 'show'])->name('profile');

    Route::get('/profile/edit', [Tampilan::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [Tampilan::class, 'update'])->name('profile.update');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});



require __DIR__.'/auth.php';

