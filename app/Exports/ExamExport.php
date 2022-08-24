<?php

namespace App\Exports;

use App\Models\ExamSub;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Session;


class ExamExport implements FromCollection, WithHeadings, WithColumnWidths, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $exam->examsub[0]->student->fname.' '.$exam->examsub[0]->student->fname
        return ExamSub::where('exam_id', session::get('exel_exam_id'))->get();
        // return ExamSub::where('del', 'no')->get();
       
    }

    public function map($row): array
    {
        $exSub = ExamSub::where('exam_id', session::get('exel_exam_id'))->get();
        $fields = [
            $row->exam_id,
            $row->student_id,
            $row->score
        ];
        return $fields;
    }

    public function headings(): array
    {
        return [
            'Std.ID',
            'FULLNAME',
            'SCORE'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,    
            'C' => 30,       
        ];
    }

    public function registerEvents() : array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);           
            }
        ];
    }


}

