<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use App\Post;
use DB;
use Session;
use Validator;
use App\Expense;

use App\Models\Taxation;
use App\Exports\ExamExport;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Imports\StdImport;
use App\Exports\TaxExport;
use App\Exports\SalExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller 
{
    
    public function importFile(){
        return view('uploadtest');
    }

    public function pay_sal_export() 
    {
        return Excel::download(new SalExport, 'Salary.xlsx');
    }

    public function pay_tax_export() 
    {
        return Excel::download(new TaxExport, 'Taxation.xlsx');
        // $taxes = Taxation::all();
        // $taxation = [];
        // $tx = [];
        // foreach ($taxes as $tax) {
        //     array_push($tx, [
        //         'A' => $tax->employee->fname.' '.$tax->employee->sname.' '.$tax->employee->oname,
        //         'B' => $tax->position,
        //         'C' => $tax->salary,
        //         'D' => $tax->rent,
        //         'E' => $tax->prof,
        //         'F' => $tax->tot_income,
        //         'G' => $tax->ssf,
        //         'H' => $tax->taxable_inc,
        //         'I' => $tax->tax_pay,
        //         'J' => $tax->first1,
        //         'K' => $tax->next1,
        //         'L' => $tax->next2,
        //         'M' => $tax->next3,
        //         'N' => $tax->next4,
        //         'O' => $tax->next5,
        //         'P' => $tax->net_amount
        //     ]);
        // }
        // // $x = [];
        // // array_push($x, [
        // //     'A' => 'New Data'
        // // ]);
        // session::put('tx', $tx);
        // return session::get('tx');
        // // return session('bills');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users_export.xlsx');
    }


    public function exam_export() 
    {
        return Excel::download(new ExamExport, 'users_export.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {

        try {
            $this->validate($request, [
                'file'   => 'required|max:5000|mimes:xlsx,xls,csv'
            ]);

            Excel::import(new UsersImport,request()->file('file'));
            return redirect('/importfile')->with('success', 'File successfully uploaded');

        } catch (ValidationException $exception) {
            return redirect('/importfile')->with('Error', $exception->errors());
        }

    }


    public function importquestion(Request $request) 
    {

        try {
            $this->validate($request, [
                'file'   => 'required|max:5000|mimes:xlsx,xls,csv'
            ]);

            Excel::import(new UsersImport,request()->file('file'));
            return redirect(url()->previous())->with('success', 'Questions successfully uploaded');

        } catch (ValidationException $exception) {
            return redirect(url()->previous())->with('Error', $exception->errors());
        }

    }

    public function importStd(Request $request) 
    {

        // try {
        //     $this->validate($request, [
        //         'file'   => 'required|max:5000|mimes:xlsx,xls,csv'
        //     ]);

        //     Excel::import(new StdImport,request()->file('file'));
        //     return redirect('/addstudent')->with('success', 'File successfully uploaded');

        // } catch (ValidationException $exception) {
        //     return redirect('/addstudent')->with('Error', $exception->errors());
        // }

        switch ($request->input('store_action')) {

            case 'import_std':
                $class = $request->input('imp_std_cls');

                // if ($class != 'Click here to choose class'){
                    try {
                        $this->validate($request, [
                            'import_file'   => 'required|max:5000|mimes:xlsx,xls,csv'
                        ]);
            
                        Excel::import(new StdImport,request()->file('import_file'));
                        return redirect('/addstudent')->with('success', 'File successfully uploaded');
            
                    } catch (ValidationException $exception) {
                        return redirect('/addstudent')->with('error', $exception->errors());
                    }
                // }else{
                //     return redirect('/addstudent')->with('error', 'Oops..! Select Class To Proceed.');
                // }
            break;

        }

    }


    


}
