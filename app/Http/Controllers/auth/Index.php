<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    //
    public function index()
    {
        return view('auth/login');
    }
}
