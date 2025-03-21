<?php

namespace App\Http\Controllers\Homepage; // Must match folder structure

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        return view('Homepage.events'); 
    }
}