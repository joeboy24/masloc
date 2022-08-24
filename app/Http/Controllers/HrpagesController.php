<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveSetup;
use App\Models\Employee;
use Session;

class HrpagesController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth',]);
    } 

    public function pay_leave()
    {
        // return Leave::where('del', 'no')->get();
        $patch = [
            'c' => 1,
            'leaveset' => LeaveSetup::find(1),
            'leaves' => Leave::where('del', 'no')->orderBy('id', 'DESC')->paginate(10)
        ];
        return view('dash.pay_leave')->with($patch);
    }

    public function pay_birthdays(){
        $bdays = Employee::where('dob', 'LIKE', '%'.date('-m-').'%')->paginate(10);
        $patch = [
            'c' => 1,
            'bdays' => $bdays
        ];
        return view('dash.pay_birthdays')->with($patch);
    }
}
