<?php

use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\tenant\TenantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix' => 'tenant', 'as' => 'tenant.', 'middleware' => ['auth', 'tenant']], function () {
    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::get('/add', [ProfileController::class, 'edit'])->name('add');
        Route::get('/allUnit', [ProfileController::class, 'edit'])->name('allUnit');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('allProperty');
        Route::get('/ownProperty', [ProfileController::class, 'edit'])->name('ownProperty');
        Route::get('/leaseProperty', [ProfileController::class, 'edit'])->name('leaseProperty');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('allProperty');
    });
    Route::post('/request',[MessageController::class,'store'])->name('request');
    Route::group(['prefix' => 'tenant', 'as' => 'tenant.'], function () {

        Route::get('/index', [ProfileController::class, 'edit'])->name('index');
    });
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('/notification', [ProfileController::class, 'edit'])->name('notification');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::delete('/listing', [ProfileController::class, 'destroy'])->name('listing.index');
    Route::delete('/listing', [ProfileController::class, 'destroy'])->name('listing.create');
    Route::delete('/listing', [ProfileController::class, 'destroy'])->name('listing.contact');
    Route::delete('/information', [ProfileController::class, 'destroy'])->name('information.index');
    
    Route::get('/message',[MessageController::class,'index'])->name('message');
    Route::delete('/search', [ProfileController::class, 'destroy'])->name('top.search');
});