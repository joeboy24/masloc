<?php
  
namespace App\Imports;
  
use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Exception;
  
class StdImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        try{
            if ($row[3] == null){
                $dob = '1999-01-01';
            }else{
                $dob = str_replace('.', '-', $row[3]);
            }
    
            if ($row[5] == null){
                $guardian = 'null';
            }else{
                $guardian = $row[5];
            }
    
            if ($row[6] == null){
                $contact = 'null';
            }else{
                $contact = $row[6];
            }
    
            if ($row[7] == null){
                $email = 'null@null';
            }else{
                $email = $row[7];
            }
    
            if ($row[8] == null){
                $residence = 'null';
            }else{
                $residence = $row[8];
            }
    
            if ($row[9] == null){
                $bill = '0.00';
            }else{
                $bill = $row[9];
            }
    
    
            $std_count = Student::All();
            $std_count = count($std_count);
    
            $matchThese = ['fname' => $row[0], 'sname' => $row[1], 'dob' => $dob, 'del' => 'no'];
            $results = Student::where($matchThese)->get();
            if (count($results) > 0){
                //return redirect('/addstudent')->with('error', 'Oops..! File already added');
            }else{
                
                
                if ($std_count < 1){
                    $final = date('Y').'1';
                }else{
                    $calc = Student::latest('id')->first();
                    $calc = $calc->id;
                    $final = date('Y').($calc + 1);
                }
    
                $std_insert = Student::firstOrCreate([
                    'std_id'     => $final,
                    'user_id'     => auth()->user()->id,
                    'fname'     => $row[0],
                    'sname'     => $row[1],
                    'sex'     => $row[2],
                    'dob'     => $dob,
                    'class'     => $row[4],
                    'guardian'     => $guardian,
                    'contact'     => $contact,
                    'email'    => $email, 
                    'residence'    => $residence,
                    'photo'    => 'no_image.jpg',
                    'bill'    => $bill
                ]);
    
            }
        }catch(Exception $ex){
            return redirect('/addstudent')->with('error', 'Oops..! Error with file content');
        }

    }

    public function startRow(): int
    {
        # code...
        return 2;
    }


}