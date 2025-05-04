<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\UserController;

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])
                ->name('register');

    Route::post('register', [UserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
                ->name('login');

    Route::post('login', [LoginController::class, 'store']);   
             Route::post('login', [LoginController::class, 'store'])->name('password.request');
    

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //             ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //             ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //             ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
                // ->name('password.store');
});

Route::middleware('auth')->group(function () {
//     Route::get('verify-email', EmailVerificationPromptController::class)
//                 ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//                 ->middleware(['signed', 'throttle:6,1'])
//                 ->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware('throttle:6,1')
//                 ->name('verification.send');


    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile');

    Route::patch('/change', [ProfileController::class, 'update'])->name('change-password');

    Route::get('change-password', [PasswordController::class, 'index'])
                ->name('change-password');

    Route::post('confirm-password', [PasswordController::class, 'store'])->name('confirm-password');

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('delete-my-account', [LoginController::class, 'destroy'])
                ->name('delete-my-account');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('logout', [LoginController::class, 'destroy'])
                ->name('logout');
});
