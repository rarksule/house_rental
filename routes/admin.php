<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::get('/add', [ProfileController::class, 'edit'])->name('add');
        Route::get('/allUnit', [ProfileController::class, 'edit'])->name('allUnit');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('allProperty');
        Route::get('/ownProperty', [ProfileController::class, 'edit'])->name('ownProperty');
        Route::get('/leaseProperty', [ProfileController::class, 'edit'])->name('leaseProperty');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('allProperty');
    });
    Route::group(['prefix' => 'tenant', 'as' => 'tenant.'], function () {

        Route::get('/index', [ProfileController::class, 'edit'])->name('index');
    });
    Route::get('/notification', [ProfileController::class, 'edit'])->name('notification');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile');
    Route::delete('/listing', [ProfileController::class, 'destroy'])->name('listing.index');
    Route::delete('/listing', [ProfileController::class, 'destroy'])->name('listing.create');
    Route::delete('/listing', [ProfileController::class, 'destroy'])->name('listing.contact');
    Route::delete('/information', [ProfileController::class, 'destroy'])->name('information.index');
    Route::delete('/search', [ProfileController::class, 'destroy'])->name('top.search');
    Route::delete('/search', [ProfileController::class, 'destroy'])->name('setting');
});