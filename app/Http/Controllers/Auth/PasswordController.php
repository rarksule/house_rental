<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PasswordController extends Controller
{
    public function index(): View
    {
        return view('common.profile.change-password',['pageTitle'=>'change_password']);
    }

    public function store()
    {
    }
}
