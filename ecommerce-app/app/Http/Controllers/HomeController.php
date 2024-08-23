<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function __construct()
    {

    }
    
    public function show()
    {
        return view('home')->with('user', Auth::user());
    }
}
