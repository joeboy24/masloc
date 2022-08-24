<?php
  
namespace App\Imports;
  
use App\Models\User;
use App\Models\Question;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Session;
  
class QuestionsImport implements ToModel, WithStartRow
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
    
    public function model(array $row)
    {
        
        $where = ['exam_id' => session('import_ex_id'), 'staff_id' => auth()->user()->staff_id];
        $que_no = Question::where($where)->count() + 1;

        $que_where = ['exam_id' => session('import_ex_id'),];
        $que_search = Question::where($que_where)->where('question', 'LIKE', '%'.substr($row[0], 0,30).'%')->count();
        if ($que_search < 1) {
            # code...
            return new Question([
                'user_id' => auth()->user()->id,
                'exam_id' =>  session('import_ex_id'),
                'que_no' =>  $que_no,
                'staff_id' => auth()->user()->staff_id,
                'department_id' => auth()->user()->staff->department_id,
                'question' => $row[0],
                'a' => $row[1], 
                'b' => $row[2], 
                'c' => $row[3], 
                'd' => $row[4], 
                'answer' => $row[5]
            ]);
        }

    }
}