<?php

namespace App\Http\Controllers\Homepage; // Must match folder structure

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return view('Homepage.News'); 
    }
}