<?php

use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\owner\OwnerController;
use App\Http\Controllers\owner\HouseController;
use App\Http\Controllers\MessageController;

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
    
    
    Route::get('/addHouse', [HouseController::class, 'create'])->name('addHouse');
    Route::post('/addHouse', [HouseController::class, 'store'])->name('storeHouse');
    Route::get('/allHouse', [HouseController::class, 'index'])->name('allHouse');
    Route::get('/rentedHouse', [HouseController::class, 'index'])->name('rentedHouse');
    Route::get('/setting', [OwnerController::class, 'index'])->name('setting');
    Route::get('/dashboard', [OwnerController::class, 'index'])->name('dashboard');
    Route::get('/notification', [ProfileController::class, 'edit'])->name('notification');
    Route::get('/profile', [ProfileController::class, 'index'])->name(name: 'profile');
    Route::get('/information', [ProfileController::class, 'destroy'])->name('information.index');
    Route::get('/search', [ProfileController::class, 'destroy'])->name('top.search');
    Route::get('/message',[MessageController::class,'index'])->name('message');
});