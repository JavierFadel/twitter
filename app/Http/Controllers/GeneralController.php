<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {   
        $tweets = Tweet::all();
        return view('dashboard', compact('tweets'));
    }
}
