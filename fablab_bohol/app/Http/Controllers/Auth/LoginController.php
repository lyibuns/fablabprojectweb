<?php

namespace App\Http\Controllers\Auth; // Must match folder structure

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login'); 
    }
}