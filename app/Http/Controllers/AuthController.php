<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Proses registrasi
    

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        if ($request->is('admin/*')) {
            return route('login'); // Redirect ke login admin
        }
        return route('login'); // Redirect ke login default
    }
}

}
