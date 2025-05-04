<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    if (Auth::check()) {
        switch (Auth::user()->role) {
            case USER_ROLE_ADMIN:
                return redirect(route('admin.dashboard'));
            case USER_ROLE_OWNER:
                return redirect(route('owner.dashboard'));
            case USER_ROLE_TENANT:
                return redirect(route('tenant.dashboard'));
        }

    } else {
        return view('welcome');
    }
})->name('home');

Route::patch('/profile', [ProfileController::class, 'update'])->name('profile');

Route::patch('/change', [ProfileController::class, 'update'])->name('change-password');


require __DIR__ . '/auth.php';