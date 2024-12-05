<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;

class User extends Controller
{
    use Notifiable;

    

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',    // Tambahkan kolom role
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
