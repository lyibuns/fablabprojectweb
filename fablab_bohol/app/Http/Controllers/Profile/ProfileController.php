<?php

namespace App\Http\Controllers\Profile; // Must match folder structure

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('Profile.profile'); 
    }
}