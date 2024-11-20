<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Token;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //   * Create a new controller instance.
    //  *
    //  * @return void
    //  */
   
    public function index()
    {
        return view('home');
    }
    
}
