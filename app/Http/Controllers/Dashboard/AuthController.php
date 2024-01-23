<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\Auth\LoginRequest;

class AuthController extends Controller
{
    function login_form(){
        return view('dashboard.Auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('dashboard'); // Redirect to a protected page after login
        }

        // Authentication failed
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login-form');
    }
}
