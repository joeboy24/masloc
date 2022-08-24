<?php

namespace App\Exports;

use App\Models\Salary;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Session;


class SalExport implements FromCollection, WithHeadings, WithColumnWidths, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $salary = Salary::select([
            'month','taxation_id','employee_id','position','salary','ssf','sal_aft_ssf','rent','prof',
            'taxable_inc','income_tax','net_aft_inc_tax','resp','risk','vma','ent','dom','intr','tnt','back_pay',
            'net_bef_ded','staff_loan','net_aft_ded','ssf_emp_cont','tot_ded','ssn','email','dept','region','bank','branch','acc_no'
        ])->get();

        foreach ($salary as $key => $value) {
        // foreach ($salary as $sal) {
            $salary[$key]['taxation_id'] = $salary[$key]->employee->afis_no;
            $salary[$key]['employee_id'] = $salary[$key]->employee->fname.' '.$salary[$key]->employee->sname.' '.$salary[$key]->employee->oname;
        }

        return $salary;
       
    }

    public function map($row): array
    {
        //     $exSub = Tarif::where('month', session::get('exel_exam_id'))->get();
        //     $fields = [
        //         $row->exam_id,
        //         $row->student_id,
        //         $row->score
        //     ];
        //     return $fields;
    }

    public function headings(): array
    {
        return [
            'MONTH','AFIS NO','Employee Name','Position','Basic Salary','SSF 5.5%','BASIC AFTER SSF','15% Rent Allow',
            '25% Prof. Allow','Total Taxable Income','Income Tax','NET AFTER INCOME TAX','10% Resp. Allow','15% Risk Allow',
            '10% V.M.A','15% Entertaiment Allow','10% Domestic Help','Internet & Other Utilities','T&T Allowance','BACK PAY',
            'Net Salary Before Deductions','Staff Loan','Net Salary After Deductions','13%/12.5% SSF EMPLOYERS CONT.',
            'TOTAL DEDUCTIONS','SOCIAL SECURITY NUMBER','EMAIL ADDRESS','DEPARTMENT','REGION','BANK','BRANCH','A/C NO'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 30,    
            'C' => 40,    
            'D' => 30,    
            'E' => 30,    
            'F' => 30,    
            'G' => 30,    
            'H' => 30,    
            'I' => 30,    
            'J' => 30,    
            'K' => 30,    
            'L' => 30,    
            'M' => 30,    
            'N' => 30,    
            'O' => 30,    
            'P' => 30,    
            'Q' => 30,    
            'R' => 30,    
            'S' => 30,    
            'T' => 30,    
            'U' => 30,    
            'V' => 30,    
            'W' => 30,    
            'X' => 30,  
            'Z' => 30, 
            'AA' => 45,
            'AB' => 30,    
            'AC' => 40,    
            'AD' => 30,    
            'AE' => 30,    
            'AF' => 30,   
            // 'Q' => 30,       
        ];
    }

    public function registerEvents() : array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(10);
                // $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                // $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);     
                
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(17);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getStyle('A1:AF1')->getFont()->setBold(true);
            }
        ];
    }


}

