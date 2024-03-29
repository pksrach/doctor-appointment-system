<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        // Check if user exists
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return redirect('/auth/login')->with('error', 'User not found');
        }

        // Check if password is correct
        if (!Hash::check($data['password'], $user->password)) {
            return redirect('/auth/login')->with('error', 'Wrong password');
        }

        // If authentication is successful, redirect to the intended URL or dashboard
        if (Auth::attempt($data)) {
            // Get customer by user id
            $customer = Customer::where('user_id', Auth::id())->first();
            // Set customer to session
            session()->put('customer', $customer);
            Log::info('Customer stored in session:', ['customer' => $customer]);

            $redirectUrl = $req->input('redirect_url', '/');
            return redirect($redirectUrl);
        }

        // If authentication fails, you can return to the login page with an error message
        return redirect('/auth/login')->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function registerSave(Request $req)
    {
        try {
            $data = $req->validate([
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|max:20|confirmed'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failedsss', ['errors' => $e->errors()]);
            throw $e;
        }

        // dd($data);

        $data['password'] = bcrypt($data['password']);

        try {
            // Create user
            $user = User::create([
                'email' => $data['email'],
                'role' => Role::CUSTOMER,
                'password' => $data['password'],
                'created_at' => now(),
            ]);

            // Create customer
            $customer = Customer::create([
                'firstname' => $data['name'],
                'user_id' => $user->id,
                'created_at' => now(),
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create user', ['exception' => $e]);
            throw $e;
        }


        // login user
        Log::info('Logging in user', ['user' => $user]);
        Auth::login($user);

        // Flash customer data to the session
        session()->flash('customer', $customer);

        // redirect to home page
        return redirect('/');
    }

    public function forgotPassword()
    {
        return view('frontend.auth.forgot-password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
