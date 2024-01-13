<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function loginMe(Request $req)
    {
        // check invalid data
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        // If authentication is successful, redirect to the intended URL or dashboard
        if (Auth::attempt($data)) {
            $redirectUrl = $req->input('redirect_url', '/');
            dd($redirectUrl); // Add this line to inspect the redirect URL
            return redirect($redirectUrl);
        }

        // If authentication fails, you can return to the login page with an error message
        return redirect('/auth/login')->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function forgotPassword()
    {
        return view('frontend.auth.forgot-password');
    }
}
