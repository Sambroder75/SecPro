<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', function ($token) {
        return view('forgetPass2', [
            'token' => $token,
            'email' => request()->email
        ]);
    })->name('password.reset');


    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});
