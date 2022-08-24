<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;
use App\Imports\TaxationImport;
use App\Models\Employee;
use App\Models\EmployeeRead;
use App\Models\Allowance;
use App\Models\AllowanceOverview;
use App\Models\TaxationRead;
use App\Models\Taxation;
use App\Models\Salary;
use App\Models\Bank;
use App\Models\Loan;
use App\Models\User;
use App\Models\Leave;
use App\Models\LoanSetup;
use Session;

class GeneralController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth',]);
    } 
    
    public function index(){
        $system_users = User::where('del', 'no')->count();
        $emp_count = Employee::where('del', 'no')->count();
        $leave_count = Leave::where('status', 'active')->count();
        $sal_sum = Salary::where('del', 'no')->sum('net_aft_ded');
        $bday_count = Employee::where('dob', 'LIKE', '%'.date('-m-').'%')->count();
        // return $bday_count;

        Session::put('system_users', $system_users);
        Session::put('emp_count', $emp_count);
        Session::put('leave_count', $leave_count);
        Session::put('sal_sum', number_format($sal_sum, 2));
        Session::put('bday_count', $bday_count);

        return view('dash.pay_dashboard');
    }
    
    public function pay_employee(){
        return view('dash.pay_employee');
    }

    public function pay_employee_view(){
        // $users = User::where('status', '!=', 'Student')->get();
        $employees = Employee::orderBy('fname', 'ASC')->paginate(20);
        $patch = [
            'c' => 1,
            'employees' => $employees
        ];
        return view('dash.pay_employee_view')->with($patch);
    }

    public function pay_allowance(){
        // $users = User::where('status', '!=', 'Student')->get();
        // $employees = Employee::where('del', 'no')->get();
        // return $employees;
        // foreach ($employees as $item) {}

        $allowances = Allowance::orderBy('fname', 'ASC')->paginate(20);
        $allowoverview = AllowanceOverview::where('del', 'no')->latest()->first();
        $patch = [
            'allowances' => $allowances,
            'allowoverview' => $allowoverview
        ];
        return view('dash.pay_allowance')->with($patch);
    }
}
