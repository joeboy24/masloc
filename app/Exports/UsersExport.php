<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
        // return User::where('status', 'Lecturer')->get();
        //Set width for a single column
        // $sheet->setWidth('A', 5);

        // //Set width for multiple cells
        // $sheet->setWidth(array(
        //     'A'     =>  5,
        //     'B'     =>  10
        // ));
        // return [

        //     User::all()=>function(User $event) {
    
        //         $event->sheet->getColumnDimension('A')->setWidth(50);
        //     }
        // ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'EMAIL',
            'PASSWORD',
            'DATE CREATED',
            'DATE UPDATED'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 50,    
            'C' => 50,
            'D' => 70, 
            'E' => 70,
            'F' => 70,         
        ];
    }

    public function registerEvents() : array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(50);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);           
            }
        ];
    }


}

