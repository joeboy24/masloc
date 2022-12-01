<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarpagesController extends Controller
{
    //

    public function index(){ 
        return view('car_index');
    }
    
}
