<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',    // Tambahkan kolom role
        'is_aktif', // Tambahkan kolom is_aktif
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
