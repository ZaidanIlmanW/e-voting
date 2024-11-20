<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or not an admin']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function kandidat()
    {
        return view('admin.kandidat');
    }

    public function setting()
    {
        return view('admin.setting');
    }
}
