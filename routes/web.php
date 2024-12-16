<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\PemilihanController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThanksController;
use App\Models\Setting;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {

    $setting = Setting::all();
    return view('home', compact('setting'));
});



// Rute register admin
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');

// Rute dashboard admin (dengan middleware auth admin)
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');



// Route untuk dashboard admin dengan middleware auth
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    

    Route::resource('setting', SettingController::class);
    Route::resource('kandidat', KandidatController::class);
    Route::resource('pemilihan', PemilihanController::class);
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
     Route::get('/token', [TokenController::class, 'index'])->name('token.index');
    Route::get('/token/create', [TokenController::class, 'create'])->name('token.create');
    Route::post('/token', [TokenController::class, 'store'])->name('token.store');
   
    Route::delete('/token/delete-all', [TokenController::class, 'deleteAll'])->name('token.delete.all');
    Route::delete('/token/{id}', [TokenController::class, 'destroy'])->name('token.destroy');

    // Export Token
    Route::get('/export/pdf', [TokenController::class, 'exportToPDF'])->name('export.pdf');
    Route::get('/token/export-unused-pdf', [TokenController::class, 'exportUnusedTokensPdf'])->name('token.export.unused.pdf');

    // Generate Token
    Route::get('/generate-token', [TokenController::class, 'showGenerateForm'])->name('token.generate');
    Route::post('/generate-token', [TokenController::class, 'generateToken'])->name('token.generate.store');

    Route::resource('pemilihan', PemilihanController::class);
    Route::post('/pemilihan/pilih', [PemilihanController::class, 'pilih'])->name('pemilihan.pilih'); // Pilih kandidat
// Route untuk Pemilihan

});

Route::resource('pemilihan', PemilihanController::class);
Route::post('/pemilihan/pilih', [PemilihanController::class, 'pilih'])->name('pemilihan.pilih'); // Pilih kandidat
Route::resource('pemilihan', PemilihanController::class);

    
Route::post('/verifikasi-token', [TokenController::class, 'verifikasiToken'])->name('verifikasi.token');


    
    // Rute Token
   

Auth::routes();


Route::get('/terimakasih', [ThanksController::class, 'index'])->name('thanks.index');



