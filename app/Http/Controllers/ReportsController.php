<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use App\Models\Salary;
use App\Models\Taxation;
use App\Models\Employee;
use App\Models\AllowanceOverview;
use DateTime;
use Session;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // return 'Works Perfet!';

        $report_type = $request->input('report_type');
        $region = $request->input('region');
        $bank = $request->input('bank');
        // $month = $request->input('month').'-'.$request->input('year');
        $year = $request->input('year');
        $order = $request->input('order');
        $from = $request->input('from');
        $to = $request->input('to');
        $allow_ov = AllowanceOverview::where('del', 'no')->latest()->first();
        // Date increment by 1
        // $dt = strtotime('1 day', strtotime($dt));
        // $to = date('Y-m-d', strtotime($dt. '+1 day'));
        // $to2 = date('Y-m-d', strtotime($to. '-1 day'));
        // $where = ['store_id' => $store,];

        if ($report_type == '0') {
            return redirect(url()->previous())->with('error', 'Oops..! Choose Report Type to proceed.');
        }

        if ($report_type == 'emp') {
            # For Employees;

            if ($bank == '' || $bank == 'all') {
                $where = ['del' => 'no',];
            } else {
                $where = ['bank' => $bank, 'del' => 'no'];
            }
            
            if ($region == 'all') {
                $employees = Employee::where($where)->orderBy('id', $order)->get();
            } else {
                $employees = Employee::where($where)->where('region', $region)->orderBy('id', $order)->get();
            }

            $send = [
                'c' => 1,
                'report_type' => 'employees',
                'cur_date' => date('D, d-M-Y'),
                'employees' => $employees,
                'region' => $region,
            ];
            return view('dash.report_format')->with($send);

        } elseif ($report_type == 'tax') {
            # For Taxation;
            if ($from == '') {
                return redirect(url()->previous())->with('error', 'Oops..! Select Date From to proceed.');
            }else{
                if ($to == '') {
                    $taxations = Taxation::where('created_at', '>=', $from)->orderBy('id', $order)->get();
                }else {
                    $taxations = Taxation::where('created_at', '>=', $from)->where('created_at', '<=', $to)->orderBy('id', $order)->get();
                }
            }

            $send = [
                'c' => 1,
                'to' => $to,
                'from' => $from,
                'report_type' => 'taxation',
                'cur_date' => date('D, d-M-Y'),
                'taxation' => $taxations,
                'allowoverview' => $allow_ov
                // 'region' => $region,
            ];
            return view('dash.report_format')->with($send);

            # For Consumption & Billing;
            // if ($store == 'All Stores') {
            //     $tarifs = Tarif::where('created_at', 'Like', '%-'.$month.'-%')->orderBy('id', $order)->get();
            //     $query_store = 'All Stores';
            // } else {
            //     $tarifs = Tarif::where('store_id', $store)->where('created_at', 'Like', '%-'.$month.'-%')->orderBy('id', $order)->get();
            //     $query_store = store::find($store);
            // }
        } elseif ($report_type == 'sal') {
            # For Taxation;

            if ($bank == '' || $bank == 'all') {
                $where = ['del' => 'no',];
            } else {
                $where = ['bank' => $bank, 'del' => 'no'];
            }

            if ($from == '') {
                return redirect(url()->previous())->with('error', 'Oops..! Select Date From to proceed.');
            }else{
                if ($to == '') {
                    $salaries = Salary::where($where)->where('created_at', '>=', $from)->orderBy('id', $order)->get();
                }else {
                    $salaries = Salary::where($where)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->orderBy('id', $order)->get();
                }
            }

            $send = [
                'c' => 1,
                'to' => $to,
                'from' => $from,
                'report_type' => 'salaries',
                'cur_date' => date('D, d-M-Y'),
                'salaries' => $salaries,
                'allowoverview' => $allow_ov
                // 'region' => $region,
            ];
            return view('dash.report_format')->with($send);

        } elseif ($report_type == 'bksum') {
            # For Bank Summary;

            if ($bank == '' || $bank == 'all') {
                $where = ['del' => 'no',];
            } else {
                $where = ['bank' => $bank, 'del' => 'no'];
            }
            
            if ($from == '') {
                return redirect(url()->previous())->with('error', 'Oops..! Select Date From to proceed.');
            }else{
                if ($to == '') {
                    $salaries = Salary::where($where)->where('created_at', '>=', $from)->orderBy('id', $order)->get();
                    $banks = Salary::where($where)->where('created_at', '>=', $from)->orderBy('id', $order)->distinct('bank')->get();
                }else {
                    $salaries = Salary::where($where)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->orderBy('id', $order)->get();
                    $banks = Salary::where($where)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->orderBy('id', $order)->distinct('bank')->get();
                }
            }

            $send = [
                'c' => 1,
                'to' => $to,
                'from' => $from,
                'banks' => $banks,
                'report_type' => 'Bank Summary',
                'cur_date' => date('D, d-M-Y'),
                'salaries' => $salaries,
                'allowoverview' => $allow_ov
                // 'region' => $region,
            ];

            return view('dash.report_format')->with($send);

        }
        

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
        $send = [
            'report_type' => 'pay_slip'
        ];
        return view('dash.pay_slip')->with($send);
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
