<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\owner\OwnerController;

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



Route::group(['prefix' => 'owner', 'as' => 'owner.', 'middleware' => ['auth', 'owner']], function () {
    
    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::get('/add', [ProfileController::class, 'edit'])->name('add');
        Route::get('/allUnit', [ProfileController::class, 'edit'])->name('allUnit');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('allProperty');
        Route::get('/ownProperty', [ProfileController::class, 'edit'])->name('ownProperty');
        Route::get('/leaseProperty', [ProfileController::class, 'edit'])->name('leaseProperty');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('allProperty');
    });
    Route::group(['prefix' => 'listing', 'as' => 'listing.'], function () {
        Route::get('/add', [ProfileController::class, 'edit'])->name('create');
        Route::get('/allUnit', [ProfileController::class, 'edit'])->name('index');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('contact');
    });
    Route::group(['prefix' => 'subscription', 'as' => 'subscription.'], function () {
        Route::get('/index', [ProfileController::class, 'edit'])->name('index');
        Route::get('/allUnit', [ProfileController::class, 'edit'])->name('expenses');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('lease');
        Route::get('/allocc', [ProfileController::class, 'edit'])->name('occupancy');
        Route::get('/allearn', [ProfileController::class, 'edit'])->name('earning');
        Route::get('/alltent', [ProfileController::class, 'edit'])->name('tenant');
    });

    
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('/add', [ProfileController::class, 'edit'])->name('loss-profit.by.month');
        Route::get('/allUnit', [ProfileController::class, 'edit'])->name('expenses');
        Route::get('/allProperty', [ProfileController::class, 'edit'])->name('lease');
        Route::get('/allocc', [ProfileController::class, 'edit'])->name('occupancy');
        Route::get('/allearn', [ProfileController::class, 'edit'])->name('earning');
        Route::get('/alltent', [ProfileController::class, 'edit'])->name('tenant');
    });
    
    Route::group(['prefix' => 'tenant', 'as' => 'tenant.'], function () {

        Route::get('/index', [ProfileController::class, 'edit'])->name('index');
    });
    
    
    Route::get('/setting', [OwnerController::class, 'index'])->name('setting');
    Route::get('/dashboard', [OwnerController::class, 'index'])->name('dashboard');
    Route::get('/notification', [ProfileController::class, 'edit'])->name('notification');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile');
    Route::get('/information', [ProfileController::class, 'destroy'])->name('information.index');
    Route::get('/search', [ProfileController::class, 'destroy'])->name('top.search');
});