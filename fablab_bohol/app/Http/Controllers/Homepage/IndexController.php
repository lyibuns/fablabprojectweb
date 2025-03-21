<?php

namespace App\Http\Controllers\Homepage; // Must match folder structure

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('Homepage.index'); 
    }
}