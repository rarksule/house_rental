<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    public function index(): View
    {
        $auth = Auth::user();
        return view('admin.dashboard', [
            'user' => $auth,
            'totalOwner'=>5,
            'totalProperty'=>5,
            'totalUnit'=>5,
            'totalTenant'=>5,
            'yearlyTotalAmount'=>2000,
            'packages'=>[],
            'orders'=>[],

        ]);
    }
}
