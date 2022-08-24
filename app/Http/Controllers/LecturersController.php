<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Room;
use App\Models\Exam;
use App\Models\Staff;
use App\Models\Course;
use App\Models\Company;
use App\Models\Program;
use App\Models\MyUpload;
use App\Models\Department;
use App\Models\RoomType;
use Session;

class LecturersController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'lecturer_auth']);
    } 

    // Lecturers Portal

    public function lect_dash(){
        $patch = [
            'my_ups' => MyUpload::where('staff_id', auth()->user()->staff_id)->count(),
            'quizes' => Exam::where('staff_id', auth()->user()->staff_id)->count()
        ];
        return view('dash.lect_dashboard')->with($patch);
    }

    public function lect_confirm(){
        return view('dash.lect_confirm');
    }

    // public function lect_register(){
    //     $patch = [
    //         'departments' => Department::all(),
    //         'staff' => Staff::find(2)
    //     ];
    //     return view('auth.lect_register')->with($patch);
    // }

    public function lect_profile(){
        // return $hh = explode('.', 'jayb.pdf');
        // return $jay[1];
        // auth()->loginUsingId(24);
        // return auth()->user()->id;
        // Session::put('one', 'One1');
        // return Session::get('one');
        $user = User::find(auth()->user()->id);
        $patch = [
            'departments' => Department::all(),
            'staff' => $user->staff
        ];
        return view('dash.lect_profile')->with($patch);
    } 

    public function lect_exam(){
        $patch = [
            'exams' => Exam::where('staff_id', auth()->user()->staff_id)->orderBy('id', 'DESC')->get(),
            'courses' => Course::where('staff_id', auth()->user()->staff_id)->get()
        ];
        // return count(Staff::all())+1;
        return view('dash.lect_exam')->with($patch);
    }

    public function lect_score(){
        $patch = [
            'exams' => Exam::where('staff_id', auth()->user()->staff_id)->orderBy('id', 'DESC')->get(),
            'courses' => Course::where('staff_id', auth()->user()->staff_id)->get()
        ];
        // return count(Staff::all())+1;
        return view('dash.lect_score')->with($patch);
    }

    public function lect_uploads(){
        // Music Notes Diagram
        $where = [
            'staff_id' => auth()->user()->staff_id
        ];
        $patch = [
            'uploads' => MyUpload::where($where)->orderBy('id', 'DESC')->where($where)->get(),
            'courses' => Course::where($where)->get()
        ];
        // return count(Staff::all())+1;
        return view('dash.lect_uploads')->with($patch);
    }

    public function paper(){
        $patch = [
            'departments' => Department::all(),
            'staff' => Staff::find(auth()->user()->staff_id)
        ];
        // return view('dash.lect_profile')->with($patch);
        return view('dash.paper');
    }
}
