<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class WorkersPagesController extends Controller
{
    //

    public function index(){

        if (Session::get('https') != 'https'){
            Session::put('https', 'https');
            return redirect('https://payroll.pivoapps.net');
        }

        return view('worker.dashboard');
    }

}
