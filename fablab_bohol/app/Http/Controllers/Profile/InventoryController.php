<?php

namespace App\Http\Controllers\Profile; // Must match folder structure

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function index()
    {
        return view('Profile.inventory'); 
    }


    public function view($category)
    {
        // You can pass the category to the view
        return view('Profile.inventory-view', ['category' => $category]);
    }
}