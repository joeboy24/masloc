<?php

namespace App\Exports;

use App\Models\Taxation;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Session;


class TaxExport implements FromCollection, WithHeadings, WithColumnWidths, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $taxes = Taxation::select([
            'employee_id','position','salary','rent','prof','tot_income','ssf','taxable_inc',
            'tax_pay','first1','next1','next2','next3','next4','next5','net_amount'
        ])->get();

        foreach ($taxes as $key => $value) {
        // foreach ($taxes as $tax) {
            $taxes[$key]['employee_id'] = $taxes[$key]->employee->fname.' '.$taxes[$key]->employee->sname.' '.$taxes[$key]->employee->oname;
        }

        return $taxes;
       
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
            'Employee Name',
            'Position',
            'Gross Basic Salaries',
            '15% Rent Allow',
            '25% Prof. Allow',
            'Total Income',
            'SSF @5.5%',
            'Taxable Income',
            'Total Tax payable',
            'First GHS319',
            'Next GHS100',
            'Next GHS539',
            // 'Cum. Income ',
            'Next GHS3,539',
            'Next GHS16461',
            'Exc. GHS20,000',
            'Net Amount'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 45,
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
                $event->sheet->getDelegate()->getStyle('A1:P1')->getFont()->setBold(true);
            }
        ];
    }


}

