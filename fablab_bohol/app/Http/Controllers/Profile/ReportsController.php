<?php

namespace App\Http\Controllers\Profile; // Must match folder structure

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index()
    {
        return view('Profile.reports'); 
    }
}