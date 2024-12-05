<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Hapus $guarded, jika Anda ingin menggunakan $fillable saja
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Pastikan password dan remember_token disembunyikan untuk alasan keamanan
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Jika Anda membutuhkan aksesors atau mutators untuk password atau atribut lainnya, Anda dapat menambahkannya di sini
}
