<?php
  
namespace App\Imports;
  
use App\Models\User;
use App\Models\Employee;
use App\Models\SalaryCat;
use App\Models\TaxationRead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Session;
  
// class EmployeeImport implements ToModel, WithStartRow, WithCalculatedFormulas, WithMultipleSheets
class EmployeeImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }

    // public function sheets(): array
    // {
    //     return [
    //         0 => $this,
    //     ];
    // }
    
    public function model(array $row)
    {
        // return new TaxationRead([
        //     'user_id' => auth()->user()->id,
        //     'name' =>  $row[1],
        //     'pos' =>  $row[2],
        //     'basic_sal' =>  $row[3],
        //     'rent_alw' =>  $row[4],
        //     'prof_alw' =>  $row[5],
        //     'total_income' =>  $row[6],
        //     'ssf' =>  $row[7],
        //     'tax_income' =>  $row[8],
        //     'tot_tax_pay' =>  $row[9],
        //     'first319' =>  $row[10],
        //     'next419' =>  $row[11],
        //     'next539' =>  $row[12],
        //     'cum_income' =>  $row[13],
        //     'next3539' =>  $row[14],
        //     'next20000' =>  $row[15],
        //     'net_amt' =>  $row[17],
        // ]);

        // Salary Category Entry
        // return new SalaryCat([
        //     'user_id' => auth()->user()->id,
        //     'title' => $row[0],
        //     'basic_sal' =>  $row[1],
        // ]);
        
        // if ($que_search < 1) {
            # code...
            if(strpos($row[6], ' ') == true){
                $salary = str_replace(" ","",$row[6]);
            }
            return new Employee([
                // 'fname' => auth()->user()->id,
                'user_id' => 1,
                'allowance_id' => 'none',
                'fname' =>  $row[4],
                'sname' =>  $row[3],
                'oname' =>  $row[5],
                'ssn' => $row[1],
                'salary' => doubleval($row[6]),
                'contact' => '001345677898',
                'ssf' => $row[7], 
                // 'photo' => $row[2], 
                '2tier_ssf' => $row[8]


            //     // 'biometric_reg_no' => ,
            //     // 'year' => ,
            //     // 'years_served' => ,
            //     // 'staff_id' => ,
            //     // 'name' => ,
            //     // 'dob' => ,
            //     // 'age' => ,
            //     // 'date_emp' => ,
            //     // 'gender' => ,
            //     // 'position' => ,
            //     // 'cur_pos' => ,
            //     // 'qualification' => ,
            //     // 'prog' => ,
            //     // 'classification' => ,
            //     // 'grade' => ,
            //     // 'level' => ,
            //     // 'ssnit_no' => ,
            //     // 'contact' => ,


            //     // 'photo' => ,
            //     // 'email' => ,
            //     // 'nat_id' => ,
            //     // 'passport' => ,
            //     // 'marital_status' => ,
            //     // 'religion' => ,
            //     // 'region' => ,
            //     // 'res_address' => ,
            //     // 'city' => ,
            //     // 'nok' => ,
            //     // 'nok_contact' => ,
                
            ]);
        // }

    }
}