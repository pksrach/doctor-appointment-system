<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BackendAuthController extends Controller
{
    public function backendLogin(): View
    {
        return view('backend.auth.login');
    }

    public function backendDoLogin(Request $req)
    {
        $credentials = $req->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if (!in_array($user->role, [Role::USER, Role::ADMIN, Role::SUPER])) {
                auth()->logout();
                return redirect()->back()->with('error', 'This account is not authorized to access the admin panel.');
            }
            return redirect()->route('backend.dashboard');
        }
        return redirect()->back()->withInput($req->only('email'))->with('error', 'Invalid email or password. Please try again.');
    }

    public function backendLogout(): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();
        return Redirect::route('backend.login');
    }
}
