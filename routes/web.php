<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\PemilihanController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Route untuk Kandidat
Route::resource('kandidat', KandidatController::class);

// Route untuk Setting
Route::resource('setting', SettingController::class);

// Route untuk Token
Route::get('/token', [TokenController::class, 'index'])->name('token.index'); // Tampilkan daftar token
Route::get('/token/create', [TokenController::class, 'create'])->name('token.create'); // Tampilkan form tambah token
Route::post('/token', [TokenController::class, 'store'])->name('token.store'); // Simpan token baru
Route::post('/verifikasi-token', [TokenController::class, 'verifikasiToken'])->name('verifikasi.token'); // Verifikasi token

// Route untuk Generate Token
Route::get('/generate-token', [TokenController::class, 'showGenerateForm'])->name('token.generate'); // Tampilkan form generate token
Route::post('/generate-token', [TokenController::class, 'generateToken'])->name('token.generate.store'); // Generate token baru

// Route untuk Hapus Token
Route::delete('/token/{id}', [TokenController::class, 'destroy'])->name('token.destroy');


// Route untuk Export Token ke PDF
Route::get('/export/pdf', [TokenController::class, 'exportToPDF'])->name('export.pdf'); // Export semua token
Route::get('/token/export-unused-pdf', [TokenController::class, 'exportUnusedTokensPdf'])->name('token.export.unused.pdf'); // Export token yang belum digunakan

// Route untuk Pemilihan
Route::resource('pemilihan', PemilihanController::class);
Route::post('/pemilihan/pilih', [PemilihanController::class, 'pilih'])->name('pemilihan.pilih'); // Pilih kandidat

Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');

Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/pemilihan', [UserController::class, 'pemilihan'])->name('pemilihan');
Route::get('/hasil', [UserController::class, 'hasil'])->name('hasil');

// Route untuk Admin (dengan login)
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/admin/pemilihan', [AdminController::class, 'pemilihan'])->name('admin.pemilihan');
    Route::get('/admin/hasil', [AdminController::class, 'hasil'])->name('admin.hasil');
    Route::get('/admin/kandidat', [AdminController::class, 'kandidat'])->name('admin.kandidat');
    Route::get('/admin/setting', [AdminController::class, 'setting'])->name('admin.setting');
});


