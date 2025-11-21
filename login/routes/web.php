<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Tampilan; 

// ----------------------------------------------------------------------
// 1. RUTE HALAMAN STATIS & TAMPILAN DASAR
// ----------------------------------------------------------------------

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

// ----------------------------------------------------------------------
// 2. RUTE AUTENTIKASI (AUTH)
// ----------------------------------------------------------------------

// Login
Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::post('/login', [AuthManager::class,'loginPost'])->name('login.post');

// Registrasi
Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');

Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');


// Resource Recipes (Meliputi index, store, update, destroy, show)
Route::resource('recipes', RecipeController::class);

// Rute create terpisah (jika Anda ingin menimpa rute default resource)
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');


// ----------------------------------------------------------------------
// 4. RUTE KOMENTAR
// ----------------------------------------------------------------------

// Simpan Komentar
Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');

// Hapus Komentar
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth');


// ----------------------------------------------------------------------
// 5. RUTE PROFIL & DASHBOARD (Membutuhkan Otentikasi)
// ----------------------------------------------------------------------

Route::middleware(['auth'])->group(function () {

    // Rute Profil Anda yang bermasalah (Sekarang menggunakan Profile)
    Route::get('/profile', [Tampilan::class, 'show'])->name('profile');

    // Dashboard (Jika menggunakan Laravel Breeze/Jetstream)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CATATAN: Rute /profile-breeze dihapus atau perlu diperbaiki 
    // jika Anda ingin menggunakannya lagi, pastikan Anda telah mendefinisikan
    // ProfileController di tempat lain, atau ganti ke ProfileControllers.
    
    /*
    // Jika Anda ingin menggunakan ProfileControllers untuk edit, update, delete:
    Route::get('/profile/edit', [ProfileControllers::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileControllers::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileControllers::class, 'destroy'])->name('profile.destroy');
    */
});


// ----------------------------------------------------------------------
// 6. AUTENTIKASI BAWAAN (BREEZE/JETSTREAM)
// ----------------------------------------------------------------------

// auth routes (login/forgot/reset/register) - File ini biasanya berisi rute otentikasi
require __DIR__.'/auth.php';