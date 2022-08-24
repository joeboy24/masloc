<?php
  
namespace App\Imports;
  
use App\Models\User;
use App\Models\EmployeeRead;
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

        // $search = EmployeeRead::where('fullname', $row[3])->first();
        // $search->acc_no = $row[33];
        // $search->save();
        
        return new EmployeeRead([
            'user_id' => auth()->user()->id,
            // 'taxation_id' => $tx->id,
            // 'employee_id' => $emp->id,
            'staff_id' => $row[1],
            'afis_no' => $row[2],
            'fullname' => $row[3],
            'position' => $row[4],
            'salary' => $row[5],
            'ssf' => $row[6],
            'sal_aft_ssf' => $row[7],
            'rent' => $row[8],
            'prof' => $row[9],
            'taxable_inc' => $row[10],
            'income_tax' => $row[11],
            'net_aft_inc_tax' => $row[12],
            'resp' => $row[13],
            'risk' => $row[14],
            'vma' => $row[15],
            'ent' => $row[16],
            'dom' => $row[17],
            'intr' => $row[18],
            'tnt' => $row[19],
            'back_pay' => $row[20],
            'net_bef_ded' => $row[21],
            'staff_loan' => $row[22],
            'net_aft_ded' => $row[23],
            'ssf_emp_cont' => $row[24],
            'tot_ded' => $row[25],
            'month' => $row[26],
            'ssn' => $row[27],
            'email' => $row[28],
            'dept' => $row[29],
            'region' => $row[30],
            'bank' => $row[31],
            'branch' => $row[32],
            'acc_no' => $row[33],
            'sub_div' => $row[34],

        ]);

    }
}