<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function Home()
    {
        # code...
        return view('backend.home');   
    }
}
