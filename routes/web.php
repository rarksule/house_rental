<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tenant\TenantController;
use App\Http\Controllers\HomeController;

Route::get('/local/{ln}', function ($ln) {
    // $language = Language::where('code', $ln)->first();
    // if (!$language) {
    //     $language = Language::where('default', 1)->first();
    //     if ($language) {
    //         $ln = $language->code;
    //     }
    // }

    // session(['local' => $ln]);
    // Carbon::setLocale($ln);
    // App::setLocale(session()->get('local'));
    return redirect()->back();
})->name('local');


Route::get('/dashboard', function () {

    return isAdmin() ? redirect(route('admin.dashboard'))
        :( isOwner() ? redirect(route('owner.dashboard')) : redirect(route('home')));

})->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/house_detail/{id}', [HomeController::class, 'show'])->name('house_detail');

require __DIR__ . '/auth.php';