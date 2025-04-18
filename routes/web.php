<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tenant\TenantController;

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
    if (Auth::check()) {
        switch (Auth::user()->role) {
            case USER_ROLE_ADMIN:
                return redirect(route('admin.dashboard'));
            case USER_ROLE_OWNER:
                return redirect(route('owner.dashboard'));
        }
    } else {
        return redirect(route('home'));
    }
})->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/house_detail', [TenantController::class, 'index'])->name('house_detail');

require __DIR__ . '/auth.php';