<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $isAdmin = $request->query('role') === 'admin';

        if ($isAdmin) {
            // Render tampilan untuk admin
            return view('home.admin');
        }

        // Render tampilan untuk user biasa
        return view('home.user');
    }

    public function admin()
    {
        return view('home.admin'); // Halaman admin
    }

    public function user()
    {
        return view('home.user'); // Halaman user
    }

    
    }
