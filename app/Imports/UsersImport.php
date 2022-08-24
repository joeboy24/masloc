<?php
  
namespace App\Imports;
  
use App\Models\User;
use App\Models\Question;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Session;
  
class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new User([
        //     'name' => $row[0],
        //     'email' => $row[1], 
        //     //'password' => \Hash::make('123456'),
        //     'contact' => $row[3],
        //     'pass_photo' => $row[4],
        //     'password' => 'No Passwords',
        //     // 'password' => $row[2]
        // ]);

        // return Session::get('ex_id');
        $where = [
            'exam_id' => 8,
            'staff_id' => auth()->user()->staff_id
        ];
        $que_no = Question::where($where)->count() + 1;
        $que_check = Question::where('question', $row[0])->count();
        if ($que_check == 0) {
            # code...
            return new Question([
                'user_id' => auth()->user()->id,
                'exam_id' =>  8,
                'que_no' =>  $que_no,
                'staff_id' => auth()->user()->staff_id,
                'department_id' => auth()->user()->staff->department_id,
                'question' => $row[0],
                'a' => $row[2], 
                'b' => $row[3], 
                'c' => $row[4], 
                'd' => $row[5], 
                'answer' => $row[6]
            ]);
        }

    }

    public function startRow(): int
    {
        return 2;
    }
}