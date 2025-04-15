<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $field = 'email';
        if (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } elseif (is_numeric($request->input('email'))) {
            $field = 'contact_number';
        }

        $request->merge([$field => $request->input('email')]);

        $credentials = $request->only($field, 'password');

        $remember = request('remember');
        if (!Auth::attempt($credentials)) {
            return back()->with('error', __('Email or password is incorrect'));
        }

        $user = User::where('email', $request->email)->first();
        if (isset($user) && ($user->status == USER_STATUS_UNVERIFIED && $user->role != USER_ROLE_ADMIN)) {
            // if (getOption('email_verification_status', 0) == 1) {
            if (is_null($user->verify_token)) {
                $user->verify_token = str_replace('-', '', Str::uuid()->toString());
                $user->save();
            }
            $token = $user->verify_token;
            Auth::logout();
            return redirect()->route('useremailverify', $token)->with('error', __('Verify Your Account'));
            // } else {
            //     $user->status = USER_STATUS_ACTIVE;
            //     $user->email_verified_at = Carbon::now()->format("Y-m-d H:i:s");
            //     $user->save();
            // }
        } elseif (isset($user) && ($user->status == USER_STATUS_INACTIVE)) {
            Auth::logout();
            return back()->with('error', __('Your account is inactive. Please contact with admin'));
        } elseif (isset($user) && ($user->status == USER_STATUS_DELETED)) {
            Auth::logout();
            return back()->with('error', __('Your account has been deleted.'));
        } elseif (isset($user) && ($user->status == USER_STATUS_ACTIVE)) {
            return redirect()->route('dashboard');
        } else {
            Auth::logout();
            return back()->with('error', __(SOMETHING_WENT_WRONG));
        }
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}



// public function store(LoginRequest $request): RedirectResponse
// {
//     $request->authenticate();

//     $request->session()->regenerate();

//     $field = 'email';
//     if (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
//         $field = 'email';
//     } elseif (is_numeric($request->input('email'))) {
//         $field = 'contact_number';
//     }

//     $request->merge([$field => $request->input('email')]);

//     $credentials = $request->only($field, 'password');

//     $remember = request('remember');
//     if (!Auth::attempt($credentials, $remember)) {
//         return redirect("login")->with('error', __('Email or password is incorrect'));
//     }

//     $user = User::where('email', $request->email)->first();
//     if (isset($user) && ($user->status == USER_STATUS_UNVERIFIED && $user->role != USER_ROLE_ADMIN)) {
//         if ('phone_verification_status' == 0) {
//             if ($user->verify_token==null) {
//                 $user->verify_token = str_replace('-', '', Str::uuid()->toString());
//                 $user->save();
//             }
//             $token = $user->verify_token;
//             Auth::logout();
//             return redirect()->route('user.email.verify', $token)->with('error', __('Verify Your Account'));
//         } else {
//             $user->status = USER_STATUS_ACTIVE;
//             $user->email_verified_at = Carbon::now()->format("Y-m-d H:i:s");
//             $user->save();
//         }
//     } elseif (isset($user) && ($user->status == USER_STATUS_INACTIVE)) {
//         Auth::logout();
//         return redirect("login")->with('error', __('Your account is inactive. Please contact with admin'));
//     } elseif (isset($user) && ($user->status == USER_STATUS_DELETED)) {
//         Auth::logout();
//         return redirect("login")->with('error', __('Your account has been deleted.'));
//     } elseif (isset($user) && ($user->status == USER_STATUS_ACTIVE)) {
//         return redirect()->route('/');
//     } else {
//         Auth::logout();
//         return redirect("login")->with('error', __(SOMETHING_WENT_WRONG));
//     }
//     return redirect()->intended(RouteServiceProvider::HOME);
// }