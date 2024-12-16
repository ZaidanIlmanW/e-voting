<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index(){
        return view('admin.dashboard');
    }
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login'); // Pastikan Anda memiliki view ini
    }

    // Proses login
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->flash('success', 'Login berhasil! Selamat datang di Dashboard.');
        return redirect()->intended('/admin/dashboard');
    }

    $request->session()->flash('error', 'Login gagal! Email atau password salah.');
    return redirect()->route('login');
}


    // Menampilkan form registrasi admin
    public function showRegisterForm()
    {
        return view('auth.admin.register'); // Pastikan Anda membuat view ini
    }

    // Proses registrasi admin
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Buat admin baru
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // Logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }


}
