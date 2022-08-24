<?php
  
namespace App\Imports;
  
use App\Models\User;
use App\Models\TaxationRead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Session;
  
class TaxImport implements ToModel, WithStartRow, WithCalculatedFormulas, WithMultipleSheets
// class TaxationImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 5;
    }

    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
    
    public function model(array $row)
    {

        // $basic_sal = $row[3];
        // $rent_alw = $basic_sal * 0.15;
        // $prof_alw = $basic_sal * 0.25;

        // TaxationReed Entry
        return new TaxationRead([
            'user_id' => auth()->user()->id,
            'name' =>  $row[1],
            'pos' =>  $row[2],
            'basic_sal' =>  $row[3],
            'rent_alw' =>  $row[4],
            'prof_alw' =>  $row[5],
            'total_income' =>  $row[6],
            'ssf' =>  $row[7],
            'tax_income' =>  $row[8],
            'tot_tax_pay' =>  $row[9],
            'first319' =>  $row[10],
            'next419' =>  $row[11],
            'next539' =>  $row[12],
            'cum_income' =>  $row[13],
            'next3539' =>  $row[14],
            'next20000' =>  $row[15],
            'net_amt' =>  $row[17],

            // 'rent_alw' =>  $row[4],
            // 'prof_alw' =>  $row[5],
            // 'total_income' =>  $row[6],
            // 'ssf' =>  $row[7],
            // 'tax_income' =>  $row[8],
            // 'tot_tax_pay' =>  $row[9],
            // 'first319' =>  $row[10],
            // 'next419' =>  $row[11],
            // 'next539' =>  $row[12],
            // 'cum_income' =>  $row[13],
            // 'next3539' =>  $row[14],
            // 'next20000' =>  $row[15],
            // 'net_amt' =>  $row[17],
        ]);
        
    }
}