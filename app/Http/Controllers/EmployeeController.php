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
use App\Models\Leave;
use App\Models\LoanSetup;
use App\Models\SalaryCat;
use App\Models\Department;
use App\Models\AllowanceList;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // return sprintf('%.f', 1.0120000398707E+15);

        // Salary share to Employee & Allowances
        $emprs = EmployeeRead::where('del', 'no')->limit(5)->get();
        // $emprs = EmployeeRead::All();
        // return $emprs;
        foreach ($emprs as $empr) {
        
            $full = explode(' ', $empr->fullname);
            $fname = $full[0];
            $sname = str_replace($full[0],"",$empr->fullname);
            // if(str_contains($full[1], ' ')){
            //     $sname = explode(' ', $full[1]);
            //     $oname = $sname[1];
            // }else {
            //     $oname = '';
            // }

            $emp_insert = Employee::firstOrCreate([
                'user_id' => auth()->user()->id,
                'afis_no' => $empr->afis_no,
                'fname' => $fname,
                'sname' => $sname,
                // 'oname' => $oname,
                'position' => $empr->position,
                'ssn' => $empr->ssn,
                'salary' => $empr->salary,
                'dept' => $empr->dept,
                'region' => $empr->region,
                'bank' => $empr->bank,
                'branch' => $empr->branch,
                'acc_no' => $empr->acc_no,
                'sub_div' => $empr->sub_div,
                'staff_loan' => $empr->staff_loan
                // 'loan_date_started','loan_bal','loan_montly_ded'
            ]);

            // Allowances Insert
            $alw_check = Allowance::where('employee_id', $emp_insert->id)->count();
            if ($alw_check == 0) {
                # code...
                if ($empr->rent != '' && $empr->rent != 0) {
                    $rent = 'yes';
                } else {
                    $rent = 'no';
                }
                    // $prof = $empr->prof;
                if ($empr->prof != '' && $empr->prof != 0) {
                    $prof = 'yes';
                } else {
                    $prof = 'no';
                }
                if ($empr->resp != '' && $empr->resp != 0) {
                    $resp = 'yes';
                } else {
                    $resp = 'no';
                }
                if ($empr->risk != '' && $empr->risk != 0) {
                    $risk = 'yes';
                } else {
                    $risk = 'no';
                }
                if ($empr->vma != '' && $empr->vma != 0) {
                    $vma = 'yes';
                } else {
                    $vma = 'no';
                }
                if ($empr->ent != '' && $empr->ent != 0) {
                    $ent = 'yes';
                } else {
                    $ent = 'no';
                }
                if ($empr->dom != '' && $empr->dom != 0) {
                    $dom = 'yes';
                } else {
                    $dom = 'no';
                }
                if ($empr->intr != '' && $empr->intr != 0) {
                    $intr = 'yes';
                } else {
                    $intr = 'no';
                }
                if ($empr->tnt != '' && $empr->tnt != 0) {
                    $tnt = 'yes';
                } else {
                    $tnt = 'no';
                }
                
                $alw_insert = Allowance::firstOrCreate([
                    'user_id' => auth()->user()->id,
                    'employee_id' => $emp_insert->id,
                    'fname' => $full[0],
                    'rent' => $rent,
                    'prof' => $prof,
                    'resp' => $resp,
                    'risk' => $risk,
                    'vma' => $vma,
                    'ent' => $ent,
                    'dom' => $dom,
                    'intr' => $intr,
                    'tnt' => $tnt,
                ]);
                // Insert Allowance ID
                // $all_ins = Employee::find($emp_insert->id);
                $emp_insert->allowance_id = $alw_insert->id;
                $emp_insert->save();
            }
            
        }

        // Loan Insert
        // 'user_id','employee_id','elig_amt','lump_sum','dur','monthly_ded','bal','date_started','months_left','status'
        
        
        $emps = Employee::all();
        foreach ($emps as $emp) {
            $loan_insert = Loan::firstOrCreate([
                'user_id' => auth()->user()->id,
                'employee_id' => $emp->id,
            ]);

            // $leave_insert = Leave::firstOrCreate([
            //     'user_id' => auth()->user()->id,
            //     'employee_id' => $emp->id,
            // ]);
        }
        // return 'Loan & Leave Insert Done!';

        // Get Banks
        $banks = Employee::distinct('bank')->get();
        foreach ($banks as $bank) {
            # code...
            $bank_insert = Bank::firstOrCreate([
                'user_id' => auth()->user()->id,
                'bank_abr' => $bank->bank,
                'bank_fullname' => $bank->bank,
            ]);
            $bank->bank_id = $bank_insert->id;
            $bank->save();
        }

        return 'Employee, Allowance, Loans & Banks Insert Done!';




        $emps = Employee::All();
        foreach ($emps as $emp) {
            // $tax_search = TaxationRead::where('name', 'Like', '%'.$emp->fname.'%'.$emp->sname.'%')->first();
            $emp_search = EmployeeRead::where('fullname', 'Like', '%'.$emp->fname.'%')->where('ssn', 'Like', '%'.$emp->ssn.'%')->first();
            // return $emp_search;
            if ($emp_search) {
                // 'email', 'dept', 'region', 'bank', 'branch', 'acc_no', 'sub_div'
                $emp_search->staff_id = $emp->id;
                $emp_search->save();

                $emp->email = $emp_search->email;
                $emp->dept = $emp_search->dept;
                $emp->region = $emp_search->region;
                $emp->bank = $emp_search->bank;
                $emp->branch = $emp_search->branch;
                $emp->acc_no = $emp_search->acc_no;
                $emp->sub_div = $emp_search->sub_div;
                $emp->save();
            }
        }
        // Get Banks
        $banks = Employee::distinct('bank')->get();
        foreach ($banks as $bank) {
            # code...
            $bank_insert = Bank::firstOrCreate([
                'user_id' => auth()->user()->id,
                'bank_abr' => $bank->bank,
                'bank_fullname' => $bank->bank,
            ]);
            $bank->bank_id = $bank_insert->id;
            $bank->save();
        }
        // return 'Employees / Loans / Get Banks..!';
        // $banks = Bank::all();
        // foreach ($banks as $item) {
        //     $emp_search = Employee::where('bank', $item->bank->abr)->get();
        //     foreach ($emp_search as $sr) {
        //         $sr->bank_id = $item->id;
        //         $sr->save();
        //     }
        // }
        return 'Done';



        

        $emps = Employee::All();
        // return TaxationRead::where('employee_id', '==', '')->count();
        foreach ($emps as $emp) {
            // $tax_search = TaxationRead::where('name', 'Like', '%'.$emp->fname.'%'.$emp->sname.'%')->first();
            $tax_search = TaxationRead::where('name', 'Like', '%'.$emp->sname.'%')->where('basic_sal', '%'.$emp->sname.'%')->first();
            // return $tax_search;
            if ($tax_search) {
                $tax_search->employee_id = $emp->id;
                $tax_search->save();
            }
        }
        return redirect(url()->previous())->with('Success', 'Mapping Successfull!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        switch ($request->input('store_action')) {

            case 'create_user':

                $ps1 = $request->input('password');
                $ps2 = $request->input('password_confirmation');
                $username = $request->input('name');
                $email = $request->input('email');
                $contact = $request->input('contact');
                $status = $request->input('status');
                // $pass_photo = $request->input('pass_photo');

                if ($status == 0) {
                    return redirect(url()->previous())->with('error', 'Oops..! Select Status to procceed.');
                }

                if ($ps1 == $ps2){

                    try {
                        // $this->validate($request, [
                        //     'pass_photo'  => 'max:5000|mimes:jpeg,jpg,png'
                        // ]);
                        //     $filenameWithExt = $request->file('pass_photo')->getClientOriginalName();
                        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        //     $fileExt = $request->file('pass_photo')->getClientOriginalExtension();
                        //     $filenameToStore = $username.substr( $contact, -4).'.'.$fileExt;
                        //     $path = $request->file('pass_photo')->storeAs('public/classified/users', $filenameToStore);
                        
                    } catch (Exception $ex) {
                        // return redirect(previous()->url())->with('error', 'Ooops..! File Error');
                    }

                    try {

                        $create_user = User::firstOrCreate([
                            'name' => $username,
                            'email' => $email,
                            'contact' => $contact,
                            'status' => $status,
                            'password' => Hash::make($ps1),
                            'pass_photo' => 'noimage.png',
                            // 'pass_photo' => $filenameToStore
                        ]);
                        return redirect(url()->previous())->with('success', 'User `'.$username.'` successfully added!');
                        
                    }catch(\Throwable $th){
                        // return $th;
                        return redirect(url()->previous())->with('error', 'Oops..! Something is wrong! Could be duplicate entry.');
                    }
                }else{
                    return redirect(url()->previous())->with('error', 'Oops..! Passwords do not match');
                }

            break;

            case 'import_employee':

                // return 'Im in!';

                try {
                    $this->validate($request, [
                        'ex_file'   => 'required|max:5000|mimes:xlsx,xls,csv'
                    ]);

                    Excel::import(new EmployeeImport,request()->file('ex_file'));
                    // Excel::import(new TaxationImport,request()->file('ex_file'))->selectSheets('TAXATION');
                    // Excel::selectSheetsByIndex(0)->load();
                    return redirect(url()->previous())->with('success', 'Employee Data successfully uploaded');

                } catch (ValidationException $exception) {
                    return redirect(url()->previous())->with('Error', $exception->errors());
                }

            break;

            case 'insert_allowances':
                // return 987;

                $employees = Employee::where('allowance_id', 'none')->get();
                // return $employees;
                foreach ($employees as $item) {
                    $alw_check = Allowance::where('employee_id', $item->employee_id)->count();
                    // return $alw_check;
                    if ($alw_check == 0) {
                        # code...
                        $alw_insert = Allowance::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'employee_id' => $item->id,
                            'fname' => $item->fname,
                        ]);
                        $item->allowance_id = $alw_insert->id;
                        $item->save();
                    }
                }
                return redirect(url()->previous());
                // return redirect(url()->previous())->with('success', 'Page Refresh Successful');

            break;

            case 'add_allow_ssnit':
                // return 777;
                try {
                    $alwovr_insert = AllowanceOverview::firstOrCreate([
                        'user_id' => auth()->user()->id,
                        'rent' => $request->input('rent'),
                        'prof' => $request->input('prof'),
                        'resp' => $request->input('resp'),
                        'risk' => $request->input('risk'),
                        'vma' => $request->input('vma'),
                        'ent' => $request->input('ent'),
                        'dom' => $request->input('dom'),
                        'intr' => $request->input('intr'),
                        'tnt' => $request->input('tnt'),
                        'ssf' => $request->input('ssf'),
                        'ssf1' => $request->input('ssf1'),
                        'ssf2' => $request->input('ssf2'),
                    ]);
                } catch (\Throwable $th) {
                    // throw $th;
                }

                return redirect(url()->previous())->with('success', 'Allowances / SSNIT (%) Successfully Updated');
                // return redirect(url()->previous())->with('success', 'Page Refresh Successful');

            break;

            case 'calc_taxation':
                // return 777;
                $alo = AllowanceOverview::where('del', 'no')->latest()->first();
                $rent = $alo->rent;
                $prof = $alo->prof;
                $ssf = $alo->ssf;
                
                $employees = Employee::where('del', 'no')->get();

                foreach ($employees as $emp) {
                    if ($emp->allowance->rent == 'no') {
                        $rent = 0;
                    }else {
                        $rent = $alo->rent;
                    }
                    if ($emp->allowance->prof == 'no') {
                        $prof = 0;
                    }else {
                        $prof = $alo->prof;
                    }
                    
                    $send_rent = ($rent/100) * $emp->salary;
                    $send_prof = ($prof/100) * $emp->salary;
                    $send_ssf = ($ssf/100) * $emp->salary;
                    $total_income = $emp->salary + $send_rent + $send_prof;
                    $taxable_inc = $total_income - $send_ssf;
                    $first1 = 0;
                    $next1 = 0;
                    $next2 = 0;
                    $next3 = 0;
                    $next4 = 0;
                    $next5 = 0;
                    $tax_pay = 0;
                    // return $send_prof;

                    if ($emp->salary <= 319) {
                        // $first1 = 0;
                        // } elseif ($emp->salary > 319 && $emp->salary <= 419) {
                        //     $first1 = 0;
                        //     $next1 = 5;
                        // } elseif ($emp->salary > 419 && $emp->salary <= 539) {
                        //     $first1 = 0;
                        //     $next1 = 5;
                        //     $next2 = (10/100) * ($taxable_inc - 419);
                        //     $tax_pay = $next2;
                        //     // if ($next2 > 12) {
                        //     //     $next2 = 12;
                        //     // }
                        // } elseif ($emp->salary > 539 && $emp->salary <= 3000) {
                        //     $first1 = 0;
                        //     $next1 = 5;
                        //     $next2 = 12;
                        //     $next3 = (17.5/100) * ($taxable_inc - 539);
                        //     $tax_pay = $next1 + $next2 + $next3;
                        // } elseif ($emp->salary > 3000 && $emp->salary <= 16461) {
                        //     $first1 = 0;
                        //     $next1 = 5;
                        //     $next2 = 12;
                        //     $next3 = (17.5/100) * ($taxable_inc - 539);
                        //     $next4 = (25.5/100) * ($taxable_inc - 3000);
                        //     $tax_pay = $next1 + $next2 + $next3 + $next4;
                        // } elseif ($emp->salary > 16461 && $emp->salary <= 20000) {
                        //     $first1 = 0;
                        //     $next1 = 5;
                        //     $next2 = 12;
                        //     $next3 = (17.5/100) * ($taxable_inc - 539);
                        //     $next4 = (25.5/100) * ($taxable_inc - 3000);
                        //     $next5 = (30/100) * ($taxable_inc - 16461);
                        //     $tax_pay = $next1 + $next2 + $next3 + $next4 + $next5;
                    }

                    // Next 1 Calc
                    if (($taxable_inc - 319) > 100) {
                        $next1 = (5/100) * 100;
                    } else {
                        $next1 = ($taxable_inc - 319) * (5/100);
                    }

                    // Next 2 Calc
                    if (($taxable_inc - 419) > 120) {
                        $next2 = (10/100) * 120;
                    } else {
                        $next2 = ($taxable_inc - 419) * (10/100);
                    }

                    // Next 3 Calc
                    if (($taxable_inc - 539) < 3000) {
                        $next3 = ($taxable_inc - 539) * (17.5/100);
                    } else {
                        $next3 = (17.5/100) * 3000;
                    }

                    // Next 4 Calc
                    if (($taxable_inc - 3539) < 16461) {
                        $next4 = ($taxable_inc - 3539) * (25/100);
                    } else {
                        $next4 = (25/100) * 16461;
                    }

                    // Next 5 Calc
                    if (($taxable_inc - 20000) > 0) {
                        $next5 = ($taxable_inc - 20000) * (30/100);
                    } else {
                        $next5 = 0;
                    }

                    // Total Tax Payable
                    // $tax_pay = $next1 + $next2 + $next3 + $next4 + $next5;
                    if ($emp->salary <= 319) {
                        $tax_pay = 0;
                    } elseif ($emp->salary > 319 && $emp->salary <= 419) {
                        $tax_pay = $next1;
                    } elseif ($emp->salary > 419 && $emp->salary <= 539) {
                        $tax_pay = $next2;
                        $next3 = 0;
                        $next4 = 0;
                        $next5 = 0;
                        // $tax_pay = $next1 + $next2;
                    } elseif ($emp->salary > 539 && $emp->salary <= 3000) {
                        $tax_pay = $next1 + $next2 + $next3;
                        $next4 = 0;
                        $next5 = 0;
                    } elseif ($emp->salary > 3000 && $emp->salary <= 16461) {
                        $tax_pay = $next1 + $next2 + $next3 + $next4;
                        $next5 = 0;
                    } elseif ($emp->salary > 16461 && $emp->salary <= 20000) {
                        $tax_pay = $next1 + $next2 + $next3 + $next4 + $next5;
                    }

                    // Salary Workings
                    $sal_aft_ssf = $emp->salary - $send_ssf;
                    $sal_taxable_inc = $sal_aft_ssf + $send_rent + $send_prof;
                    $income_tax = $tax_pay;
                    $net_aft_inc_tax = $sal_taxable_inc - $income_tax;
                    // Get Resp Allow
                    if ($emp->allowance->resp == 'no') {
                        $resp = 0;
                    }else {
                        $resp = ($alo->resp/100) * $emp->salary;
                    }
                    // Get Risk Allow
                    if ($emp->allowance->risk == 'no') {
                        $risk = 0;
                    }else {
                        $risk = ($alo->risk/100) * $emp->salary;
                    }
                    // Get VMA Allow
                    if ($emp->allowance->vma == 'no') {
                        $vma = 0;
                    }else {
                        $vma = ($alo->vma/100) * $emp->salary;
                    }
                    // Get Ent Allow
                    if ($emp->allowance->ent == 'no') {
                        $ent = 0;
                    }else {
                        $ent = ($alo->ent/100) * $emp->salary;
                    }
                    // Get Dom Allow
                    if ($emp->allowance->dom == 'no') {
                        $dom = 0;
                    }else {
                        $dom = ($alo->dom/100) * $emp->salary;
                    }
                    // Get Intr Allow
                    if ($emp->allowance->intr == 'no') {
                        $intr = 0;
                    }else {
                        $intr = $alo->intr;
                    }
                    // Get T&T Allow
                    if ($emp->allowance->tnt == 'no') {
                        $tnt = 0;
                    }else {
                        $tnt = $alo->tnt;
                    }
                    $back_pay = 0;
                    $net_bef_ded = $net_aft_inc_tax + $resp + $risk + $vma + $ent + $dom + $intr + $tnt;
                    $staff_loan = $emp->staff_loan;
                    $net_aft_ded = $net_bef_ded - $staff_loan;
                    $ssf_emp_cont = ((18.5 - $ssf) / 100) * $emp->salary;
                    $tot_ded = $send_ssf + $income_tax + $staff_loan;
                    

                    $where = [
                        'month' => date('m-Y'),
                        'employee_id' => $emp->id
                    ];
                    $taxation_check = Taxation::where($where)->first();
                    $sal_check = Salary::where($where)->first();
                    
                    // $send_ssf = number_format($send_ssf, 2);
                    // return $send_ssf;
                    try {
                        if ($taxation_check) {
                            $tx = Taxation::find($taxation_check->id);
                            // $tx->month = date('m-Y');
                            // $tx->employee_id = $emp->id;
                            // $tx->position = 'No Position';
                            $tx->salary = $emp->salary;
                            $tx->rent = $send_rent;
                            $tx->prof = $send_prof;
                            $tx->tot_income = $total_income;
                            $tx->ssf = $send_ssf;
                            $tx->taxable_inc = $taxable_inc;
                            $tx->tax_pay = $tax_pay;
                            $tx->first1 = $first1;
                            $tx->next1 = $next1;
                            $tx->next2 = $next2;
                            $tx->next3 = $next3;
                            $tx->next4 = $next4;
                            $tx->next5 = $next5;
                            $tx->net_amount = $taxable_inc - $tax_pay;
                            $tx->save();

                            // Calc & Insert in Salary as well
                            $sl = Salary::find($sal_check->id);
                            // $sl->user_id = $xyz;
                            // $sl->month = $xyz;
                            // $sl->employee_id = $xyz;
                            // $sl->position = $xyz;
                            $sl->salary = $emp->salary;
                            $sl->ssf = $send_ssf;
                            $sl->sal_aft_ssf = $sal_aft_ssf;
                            $sl->rent = $send_rent;
                            $sl->prof = $send_prof;
                            $sl->taxable_inc = $sal_taxable_inc;
                            $sl->income_tax = $income_tax;
                            $sl->net_aft_inc_tax = $net_aft_inc_tax;
                            $sl->resp = $resp;
                            $sl->risk = $risk;
                            $sl->vma = $vma;
                            $sl->ent = $ent;
                            $sl->dom = $dom;
                            $sl->intr = $intr;
                            $sl->tnt = $tnt;
                            $sl->back_pay = $back_pay;
                            $sl->net_bef_ded = $net_bef_ded;
                            $sl->staff_loan = $staff_loan;
                            $sl->net_aft_ded = $net_aft_ded;
                            $sl->ssf_emp_cont = $ssf_emp_cont;
                            $sl->tot_ded = $tot_ded;
                            $sl->ssn = $emp->ssn;
                            $sl->email = $emp->email;
                            $sl->dept = $emp->dept;
                            $sl->region = $emp->region;
                            $sl->bank = $emp->bank;
                            $sl->branch = $emp->branch;
                            $sl->acc_no = $emp->acc_no;
                            $sl->save();
                        } else {
                            $tx = Taxation::firstOrCreate([
                                'user_id' => auth()->user()->id,
                                'month' => date('m-Y'),
                                'employee_id' => $emp->id,
                                'position' => $emp->position,
                                'salary' => $emp->salary,
                                'rent' => $send_rent,
                                'prof' => $send_prof,
                                'tot_income' => $total_income,
                                'ssf' => $send_ssf,
                                'taxable_inc' => $taxable_inc,
                                'tax_pay' => $tax_pay,
                                'first1' => $first1,
                                'next1' => $next1,
                                'next2' => $next2,
                                'next3' => $next3,
                                'next4' => $next4,
                                'next5' => $next5,
                                'net_amount' => $taxable_inc - $tax_pay,
                            ]);

                            // Calc & Insert in Salary as well
                            $sl = Salary::firstOrCreate([
                                'user_id' => auth()->user()->id,
                                'month' => date('m-Y'),
                                'taxation_id' => $tx->id,
                                'employee_id' => $emp->id,
                                'position' => $emp->position,
                                'salary' => $emp->salary,
                                'ssf' => $send_ssf,
                                'sal_aft_ssf' => $sal_aft_ssf,
                                'rent' => $send_rent,
                                'prof' => $send_prof,
                                'taxable_inc' => $sal_taxable_inc,
                                'income_tax' => $income_tax,
                                'net_aft_inc_tax' => $net_aft_inc_tax,
                                'resp' => $resp,
                                'risk' => $risk,
                                'vma' => $vma,
                                'ent' => $ent,
                                'dom' => $dom,
                                'intr' => $intr,
                                'tnt' => $tnt,
                                'back_pay' => $back_pay,
                                'net_bef_ded' => $net_bef_ded,
                                'staff_loan' => $staff_loan,
                                'net_aft_ded' => $net_aft_ded,
                                'ssf_emp_cont' => $ssf_emp_cont,
                                'tot_ded' => $tot_ded,
                                'ssn' => $emp->ssn,
                                'email' => $emp->email,
                                'dept' => $emp->dept,
                                'region' => $emp->region,
                                'bank' => $emp->bank,
                                'branch' => $emp->branch,
                                'acc_no' => $emp->acc_no,
                            ]);
                        }
                        
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }

                return redirect(url()->previous())->with('success', 'Taxation & Salaries Recalculated!');
                // return redirect(url()->previous())->with('success', 'Page Refresh Successful');

            break;

            case 'calc_salaries':
                // // return 777;
                // $alo = AllowanceOverview::where('del', 'no')->latest()->first();
                
                // $employees = Employee::where('del', 'no')->get();

                // foreach ($employees as $emp) {
                //     if ($emp->allowance->rent == 'no') {
                //         $rent = 0;
                //     }else {
                //         $rent = $alo->rent;
                //     }
                //     if ($emp->allowance->prof == 'no') {
                //         $prof = 0;
                //     }else {
                //         $prof = $alo->prof;
                //     }
                    
                //     $send_rent = ($rent/100) * $emp->salary;
                //     $send_prof = ($prof/100) * $emp->salary;
                //     $send_ssf = ($ssf/100) * $emp->salary;
                //     $total_income = $emp->salary + $send_rent + $send_prof;
                //     $taxable_inc = $total_income - $send_ssf;

                //     // 'user_id','month','employee_id','position','salary','rent','prof','tot_income','ssf','taxable_inc',
                //     // 'tax_pay','first1','next1','next2','next3','next4','next5','net_amount'
                //     $salary = $emp->salary;
                //     $ssf = ($alo->ssf/100) * $salary;
                //     $sal_aft_ssf = $salary - $ssf;
                //     $rent = ($alo->rent/100) * $salary;
                //     $prof = ($alo->prof/100) * $salary;
                //     $taxable_inc = $sal_aft_ssf + $rent + $prof;
                //     $income_tax = $emp->taxation->tax_pay;

                //     $where = [
                //         'month' => date('m-Y'),
                //         'employee_id' => $emp->id
                //     ];
                //     $sal_check = Salary::where($where)->first();
                    
                //     try {
                //         if ($sal_check) {
                //             $sl = Salary::find($sal_check->id);
                //             // $sl->user_id = $xyz;
                //             // $sl->month = $xyz;
                //             // $sl->employee_id = $xyz;
                //             // $sl->position = $xyz;
                //             $sl->salary = $salary;
                //             $sl->ssf = $ssf;
                //             $sl->sal_aft_ssf = $sal_aft_ssf;
                //             $sl->rent = $rent;
                //             $sl->prof = $prof;
                //             $sl->taxable_inc = $taxable_inc;
                //             $sl->income_tax = $xyz;
                //             $sl->net_aft_inc_tax = $xyz;
                //             $sl->resp = $xyz;
                //             $sl->risk = $xyz;
                //             $sl->vma = $xyz;
                //             $sl->ent = $xyz;
                //             $sl->dom = $xyz;
                //             $sl->intr = $xyz;
                //             $sl->tnt = $xyz;
                //             $sl->back_pay = $xyz;
                //             $sl->net_bef_ded = $xyz;
                //             $sl->staff_loan = $xyz;
                //             $sl->net_aft_ded = $xyz;
                //             $sl->ssf_emp_cont = $xyz;
                //             $sl->tot_ded = $xyz;
                //             $sl->ssn = $xyz;
                //             $sl->email = $xyz;
                //             $sl->dept = $xyz;
                //             $sl->region = $xyz;
                //             $sl->bank = $xyz;
                //             $sl->branch = $xyz;
                //             $sl->acc_no = $xyz;
                //             $sl->save();
                //         } else {
                //             $sl = Salary::firstOrCreate([
                //                 'user_id' => auth()->user()->id,
                //                 'month' => date('m-Y'),
                //                 'employee_id' => $emp->id,
                //                 'position' => 'No Position',
                //                 'salary' => $emp->salary,
                //                 'rent' => $send_rent,
                //                 'prof' => $send_prof,
                //                 'tot_income' => $total_income,
                //                 'ssf' => $send_ssf,
                //                 'taxable_inc' => $taxable_inc,
                //                 'tax_pay' => $tax_pay,
                //                 'first1' => $first1,
                //                 'next1' => $next1,
                //                 'next2' => $next2,
                //                 'next3' => $next3,
                //                 'next4' => $next4,
                //                 'next5' => $next5,
                //                 'net_amount' => $taxable_inc - $tax_pay,

                //                 'user_id' => $next1,
                //                 'month' => $next1,
                //                 'employee_id' => $next1,
                //                 'position' => $next1,
                //                 'salary' => $next1,
                //                 'ssf' => $next1,
                //                 'sal_aft_ssf' => $next1,
                //                 'rent' => $next1,
                //                 'prof' => $next1,
                //                 'taxable_inc' => $next1,
                //                 'income_tax' => $next1,
                //                 'net_aft_inc_tax' => $next1,
                //                 'resp' => $next1,
                //                 'risk' => $next1,
                //                 'vma' => $next1,
                //                 'ent' => $next1,
                //                 'dom' => $next1,
                //                 'intr' => $next1,
                //                 'tnt' => $next1,
                //                 'back_pay' => $next1,
                //                 'net_bef_ded' => $next1,
                //                 'staff_loan' => $next1,
                //                 'net_aft_ded' => $next1,
                //                 'ssf_emp_cont' => $next1,
                //                 'tot_ded' => $next1,
                //                 'ssn' => $next1,
                //                 'email' => $next1,
                //                 'dept' => $next1,
                //                 'region' => $next1,
                //                 'bank' => $next1,
                //                 'branch' => $next1,
                //                 'acc_no' => $next1,
                //             ]);
                //         }
                        
                //     } catch (\Throwable $th) {
                //         throw $th;
                //     }
                // }

                // return redirect(url()->previous())->with('success', 'Salaries Recalculated!');
                // // return redirect(url()->previous())->with('success', 'Page Refresh Successful');

            break;

            case 'loan_setup':

                try {
                    $loanset = LoanSetup::firstOrCreate([
                        'user_id' => auth()->user()->id,
                        'interest' => $request->input('interest'),
                        'dur' => $request->input('dur'),
                    ]);
                } catch (\Throwable $th) {
                    // throw $th;
                }
                return redirect(url()->previous())->with('success', 'Loan Interest and Duration successfully set');

            break;

            case 'grant_loan2':

                try {
                    $loanset = LoanSetup::firstOrCreate([
                        'user_id' => auth()->user()->id,
                        'interest' => $request->input('interest'),
                        'dur' => $request->input('dur'),
                    ]);
                } catch (\Throwable $th) {
                    // throw $th;
                }
                return redirect(url()->previous())->with('success', 'Loan Interest and Duration successfully set');

            break;

            case 'add_salary_cat':
                
                $title = $request->input('title');
                $position = $request->input('position');
                $basic_sal = $request->input('basic_sal');
                $where = [
                    'title' => $title,
                    'position' => $position,
                ];
                $sc_check = SalaryCat::where($where)->count();

                if ($position == 0 && $title == 0) {
                    return redirect(url()->previous())->with('error', 'Oops..! Choose Title & Position to Proceed');
                }
                if ($sc_check > 0) {
                    return redirect(url()->previous())->with('error', 'Position `'.$position.'` Already Exists');
                }
                
                try {
                    if ($title == 'na') {
                        $title = $request->input('title2');
                    }
                    if ($position == 'na') {
                        $position = $request->input('position2');
                    }
                    
                    $salcat = SalaryCat::firstOrCreate([
                        'user_id' => auth()->user()->id,
                        'title' => $title,
                        'position' => $position,
                        'basic_sal' => $basic_sal,
                    ]);
                } catch (\Throwable $th) {
                    throw $th;
                }
                return redirect(url()->previous())->with('success', 'Salary Category Added Successfully');

            break;

            case 'add_dept':
                
                try {
                    $loanset = Department::firstOrCreate([
                        'user_id' => auth()->user()->id,
                        'dept_name' => $request->input('dept_name'),
                    ]);
                } catch (\Throwable $th) {
                    throw $th;
                }
                return redirect(url()->previous())->with('success', '`'.$request->input('dept_name').'` Successfully Added to Departments');

            break;

            case 'add_allow':
                
                try {
                    $allowlist = AllowanceList::firstOrCreate([
                        'user_id' => auth()->user()->id,
                        'allow_name' => $request->input('allow_name'),
                        'allow_perc' => $request->input('allow_perc'),
                    ]);
                } catch (\Throwable $th) {
                    throw $th;
                }
                return redirect(url()->previous())->with('success', '`'.$request->input('allow_name').'` Successfully Added to Allowances');

            break;

            case 'search_emp':

                // Search Employee Data
                $src = $request->input('search_emp');
                // return $src;
                $employees = Employee::where('fname', 'LIKE', '%'.$src.'%')->orwhere('sname', 'LIKE', '%'.$src.'%')->orwhere('oname', 'LIKE', '%'.$src.'%')->orwhere('staff_id', 'LIKE', '%'.$src.'%')->orwhere('contact', 'LIKE', '%'.$src.'%')->orwhere('position', 'LIKE', '%'.$src.'%')->paginate(20);
                $patch = [
                    'c' => 1,
                    'employees' => $employees
                ];
                return view('dash.pay_employee_view')->with($patch);
                // End Search

            break;

            case 'add_emp':

                // return 789;
                if ($request->input('rent_allow')) {
                    $rent = 'yes';
                } else {
                    $rent = 'no';
                }
                    // $prof = $empr->prof;
                if ($request->input('prof_allow')) {
                    $prof = 'yes';
                } else {
                    $prof = 'no';
                }
                if ($request->input('resp_allow')) {
                    $resp = 'yes';
                } else {
                    $resp = 'no';
                }
                if ($request->input('risk_allow')) {
                    $risk = 'yes';
                } else {
                    $risk = 'no';
                }
                if ($request->input('vma_allow')) {
                    $vma = 'yes';
                } else {
                    $vma = 'no';
                }
                if ($request->input('ent_allow')) {
                    $ent = 'yes';
                } else {
                    $ent = 'no';
                }
                if ($request->input('dom_allow')) {
                    $dom = 'yes';
                } else {
                    $dom = 'no';
                }
                if ($request->input('intr_allow')) {
                    $intr = 'yes';
                } else {
                    $intr = 'no';
                }
                if ($request->input('tnt_allow')) {
                    $tnt = 'yes';
                } else {
                    $tnt = 'no';
                }




                if ($request->input('bank') == 'all' || $request->input('bank_branch') == 'all') {
                    return redirect(url()->previous())->with('error', 'Oops..! Select Bank & Branch to Proceed');
                }
                if ($request->input('position') == 'all' || $request->input('sub_div') == 'all' || $request->input('salary_cat') == 'all' || $request->input('dept') == 'all') {
                    return redirect(url()->previous())->with('error', 'Oops..! Position / Sub Div. / Salary Cat. & Department fields are required');
                }

                if ($request->input('bank') == 'na') {
                    $bank = $request->input('bank2');
                } else {
                    $bank = $request->input('bank');
                }

                if ($request->input('bank_branch') == 'na') {
                    $branch = $request->input('branch2');
                } else {
                    $branch = $request->input('branch');
                }


                $sal_id = $request->input('position');
                $salCat = SalaryCat::find($sal_id);
                $contact = $request->input('contact');
                $email = $request->input('email');
                $ssn = $request->input('ssn');
                $emp_check = Employee::where('contact', $contact)->orwhere('email', $email)->orwhere('ssn', $ssn)->get();
                
                if (count($emp_check) > 0) {
                    return redirect(url()->previous())->with('error', 'Oops..! Details already exist');
                } else {
                
                    try {
                        $emp_insert = Employee::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'salary_id' => $sal_id,
                            'afis_no' => $request->input('afis_no'),
                            'fname' => $request->input('fname'),
                            'sname' => $request->input('sname'),
                            'oname' => $request->input('oname'),
                            'email' => $email,
                            'contact' => $contact,
                            // 'oname' => $oname,
                            'position' => $salCat->position,
                            'ssn' => $ssn,
                            'salary' => $request->input('basic_sal'),
                            'dept' => $request->input('dept'),
                            'region' => $request->input('region'),
                            'bank' => $bank,
                            'branch' => $branch,
                            'acc_no' => $request->input('acc_no'),
                            'sub_div' => $request->input('sub_div'),
                            'staff_loan' => 0,
                            // 'loan_date_started','loan_bal','loan_montly_ded'
                        ]);
                
                        $alw_insert = Allowance::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'employee_id' => $emp_insert->id,
                            'fname' => $request->input('fname'),
                            'rent' => $rent,
                            'prof' => $prof,
                            'resp' => $resp,
                            'risk' => $risk,
                            'vma' => $vma,
                            'ent' => $ent,
                            'dom' => $dom,
                            'intr' => $intr,
                            'tnt' => $tnt,
                        ]);
                        // Insert Allowance ID
                        // $all_ins = Employee::find($emp_insert->id);
                        $emp_insert->allowance_id = $alw_insert->id;
                        $emp_insert->save();

                        if ($request->input('bank2') != '') {
                            $bank_insert = Bank::firstOrCreate([
                                'user_id' => auth()->user()->id,
                                'bank_abr' => $emp_insert->bank,
                                'bank_fullname' => $emp_insert->bank,
                            ]);
                            $emp_insert->bank_id = $bank_insert->id;
                            $emp_insert->save();
                        }
                        

                    } catch (\Throwable $th) {
                        throw $th;
                    }

                    return redirect(url()->previous())->with('success', $request->input('fname').'`s details successfully added');
                }

            break;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $emp = Employee::find($id);
        $send = [
            'emp' => $emp
        ];
        return view('dash.emp_profile')->with($send);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        switch ($request->input('update_action')) {


            // Update
            case 'update_employee':
                try {
                    $emp = Employee::find($id);
                    $emp->fname = $request->input('fname');
                    $emp->sname = $request->input('sname');
                    $emp->oname = $request->input('oname');
                    $emp->contact = $request->input('contact');
                    $emp->save();
                    return redirect(url()->previous())->with('success', $request->input('fname')."'s details successfully updated!");
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'grant_loan':
                // return 'Grant Loan';
                // 841.99804131162

                $emp = Employee::find($id);
                $loan = Loan::where('employee_id', $id)->latest()->first();
                $loanset = LoanSetup::latest()->first();
                $interest = $loanset->interest;
                $dur = $loanset->dur;
                $elig_calc = $emp->salary * 12;
                $lump_sum = $elig_calc + (($interest/100) * $elig_calc);
                $amt_paid = Salary::where('employee_id', $id)->sum('staff_loan');

                if ($loan->interest != '') {
                    // Employee promotions may affect $lump_sum & others
                    $interest = $loan->interest;
                    $dur = $loan->dur;
                    $lump_sum = $elig_calc + (($interest/100) * $elig_calc);
                }
                
                $bal = $lump_sum - $amt_paid;

                try {
                    // $loan = Loan::firstOrCreate([
                    //     'user_id' => auth()->user()->id,
                    //     'interest' => $request->input('interest'),
                    //     'dur' => $request->input('dur'),
                    // ]);
                    // 'user_id','employee_id','elig_amt','lump_sum','dur','interest','monthly_ded','bal','date_started','months_left','status'
                    
                    if ($bal <= 0) {
                        $loan->elig_amt = '';
                        $loan->lump_sum = '';
                        $loan->dur = '';
                        $loan->interest = '';
                        $loan->monthly_ded = 0;
                        $loan->bal = 0;
                        $loan->status = 'paid';
                        $loan->date_started = '';
                    } else {
                        $loan->elig_amt = $elig_calc;
                        $loan->lump_sum = $lump_sum;
                        $loan->dur = $dur;
                        $loan->interest = $interest;
                        $loan->monthly_ded = $lump_sum / $dur;
                        $loan->bal = $bal;
                        $loan->status = 'active';
                    }
                    if ($loan->date_started == '') {
                        $loan->date_started = date('d-m-Y');
                        $emp->loan_date_started = date('d-m-Y');
                    }
                    $loan->save();
                    $emp->staff_loan = $lump_sum / $dur;
                    $emp->loan_bal = $bal;
                    // $emp->loan_monthly_ded = $lump_sum / $dur;
                    $emp->save();

                } catch (\Throwable $th) {
                    throw $th;
                }

                $patch = [
                    'loans' => Loan::all(),
                    'success' => 'Loan granted for '.$emp->fname.' with an interest of '.$interest.'% through '.$dur.' months.',
                ];
                return redirect(url()->previous())->with($patch);

            break;

            case 'update_dept':
                $dept = Department::find($id);
                $dept->dept_name = $request->input('dept_name');
                $dept->save();
                return redirect(url()->previous())->with('Success', $dept->name.' Updated Successfully!');
            break;

            case 'update_user':
                $user = User::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->contact = $request->input('contact');
                $user->status = $request->input('status');
                $user->save();
                return redirect(url()->previous())->with('Success', $user->name.' Updated Successfully!');
            break;

            case 'update_sal_cat':
                $scat = SalaryCat::find($id);
                $scat->title = $request->input('title');
                $scat->position = $request->input('position');
                $scat->basic_sal = $request->input('basic_sal');
                $scat->save();
                return redirect(url()->previous())->with('Success', 'Position `'.$scat->position.'` Successfully Updated!');
            break;

            case 'update_allow':
                $allow = AllowanceList::find($id);
                $allow->allow_name = $request->input('allow_name');
                $allow->allow_perc = $request->input('allow_perc');
                $allow->save();
                return redirect(url()->previous())->with('Success', $allow->name.' Updated Successfully!');
            break;



            // Delete
            case 'del_loan':
                $emp = Employee::find($id);
                $loan = Loan::where('employee_id', $id)->latest()->first();
                $loan->elig_amt = '';
                $loan->lump_sum = '';
                $loan->dur = '';
                $loan->interest = '';
                $loan->monthly_ded = 0;
                $loan->bal = 0;
                $loan->status = 'active';
                $loan->date_started = '';
                $loan->save();

                $emp->staff_loan = 0;
                $emp->loan_bal = 0;
                $emp->save();
                return redirect(url()->previous())->with('Success', 'Loan details successfully cleared!');
            break;

            case 'del_employee':
                $emp = Employee::find($id);
                $emp->del = 'yes';
                $emp->save();
                return redirect(url()->previous())->with('Success', $emp->name.' Deleted!');
            break;
            
            // Restore
            case 'restore_employee':
                $emp = Employee::find($id);
                $emp->del = 'no';
                $emp->save();
                return redirect(url()->previous())->with('Success', $emp->name.' Successfully Restored!');
            break;





            // Rent Allowance
            case 'set_rent':
                $allow = Allowance::find($id);
                $allow->rent = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Rent Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_rent':
                $allow = Allowance::find($id);
                $allow->rent = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Rent Allowance for '.$allow->fname.' has been Removed!');
            break;

            // Professional Allowance
            case 'set_prof':
                $allow = Allowance::find($id);
                $allow->prof = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Professional Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_prof':
                $allow = Allowance::find($id);
                $allow->prof = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Professional Allowance for '.$allow->fname.' has been Removed!');
            break;

            // Responsible Allowance
            case 'set_resp':
                $allow = Allowance::find($id);
                $allow->resp = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Responsible Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_resp':
                $allow = Allowance::find($id);
                $allow->resp = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Responsible Allowance for '.$allow->fname.' has been Removed!');
            break;

            // Risk Allowance
            case 'set_risk':
                $allow = Allowance::find($id);
                $allow->risk = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Risk Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_risk':
                $allow = Allowance::find($id);
                $allow->risk = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Risk Allowance for '.$allow->fname.' has been Removed!');
            break;

            // VMA Allowance
            case 'set_vma':
                $allow = Allowance::find($id);
                $allow->vma = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'VMA Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_vma':
                $allow = Allowance::find($id);
                $allow->vma = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'VMA Allowance for '.$allow->fname.' has been Removed!');
            break;

            // Entertainment Allowance
            case 'set_ent':
                $allow = Allowance::find($id);
                $allow->ent = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Entertainment Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_ent':
                $allow = Allowance::find($id);
                $allow->ent = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Entertainment Allowance for '.$allow->fname.' has been Removed!');
            break;

            // Domestic Allowance
            case 'set_dom':
                $allow = Allowance::find($id);
                $allow->dom = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Domestic Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_dom':
                $allow = Allowance::find($id);
                $allow->dom = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Domestic Allowance for '.$allow->fname.' has been Removed!');
            break;

            // Internet & Other Utilities Allowance
            case 'set_intr':
                $allow = Allowance::find($id);
                $allow->intr = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Internet & Other Utilities Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_intr':
                $allow = Allowance::find($id);
                $allow->intr = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'Internet & Other Utilities Allowance for '.$allow->fname.' has been Removed!');
            break;

            // T&T Allowance
            case 'set_tnt':
                $allow = Allowance::find($id);
                $allow->tnt = 'yes';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'T&T Allowance for '.$allow->fname.' Successfully Set!');
            break;
            case 'remove_tnt':
                $allow = Allowance::find($id);
                $allow->tnt = 'no';
                $allow->save();
                return redirect(url()->previous())->with('Success', 'T&T Allowance for '.$allow->fname.' has been Removed!');
            break;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
