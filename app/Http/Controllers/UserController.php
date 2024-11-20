<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function pemilihan()
    {
        return view('user.pemilihan');
    }

    public function hasil()
    {
        return view('user.hasil');
    }
}
