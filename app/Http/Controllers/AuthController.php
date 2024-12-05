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
        return view('admin.login');
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
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // Buat user baru dengan role admin
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => true, // Admin
        ]);

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        if ($request->is('admin/*')) {
            return route('auth.admin.login'); // Redirect ke login admin
        }
        return route('admin.login'); // Redirect ke login default
    }
}

}
