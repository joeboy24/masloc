<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StdCourseReg;
use App\Models\CourseReg;
use App\Models\Question;
use App\Models\MyUpload;
use App\Models\Program;
use App\Models\ExamSub;
use App\Models\Student;
use App\Models\Company;
use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use DateTime;
use Session;

class StdPagesController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth', 'student_auth']);
    } 

    public function index(){

        // $exams = Exam::where($where)->where('duration_from', '<=', date('Y-m-d'))->where('duration_to', '>=', date('Y-m-d'))->get();
        // $comp = Company::find(1);
        // if ($comp->reg_date < date('d-m-Y')) {
        //     return 1;
        // } else {
        //     return 2;
        // }
        
        // return $comp->reg_date;
        
        return view('dash.std_dashboard');
    }

    public function profile(){
        $student = Student::find(auth()->user()->student_id);
        return view('dash.std_profile')->with('student', $student);
    }

    public function examview(){

        // return 12;
        $ex = Session::get('ex');
        // return $ex;
        $student_id = auth()->user()->student_id;

        $patch = ['id' => $ex, 'status' => 'open'];
        $exam = Exam::where($patch)->first();
        
        // Check existence / create exam record first in ExamSub
        
        $where = ['student_id'=>$student_id, 'exam_id'=>$ex];
        $eSubCheck = ExamSub::where($where)->count();
        $ExamSub = ExamSub::where($where)->first();

        if($ExamSub == ''){
            return redirect(url()->previous())->with('warning', 'Oops..! Cannot be accessed now. Try again later');
        }

        if ($exam->no_of_qs == $ExamSub->que_count || $ExamSub->status == 'closed') {
            $patch = [
                'exam' => $exam,
                'eSub' => $ExamSub
            ];
            return view('dash.exam_complete')->with($patch);
        }

        // if($eSubCheck < 1){
    
        //     // Random select question.... Return exam closed if status = closed
        //     $x = [];
        //     for ($i=1; $i <= $exam->no_of_qs; $i++) { 
        //         array_push($x,$i);
        //     }
        //     shuffle($x); shuffle($x);
        //     $y = '';
        //     for ($i=0; $i < $exam->no_of_qs; $i++) { 
        //         $y = $x[$i].','.$y;
        //     }

        //     $cur_que = $x[$exam->no_of_qs-1];           // Current Question
        //     // return $y.' ---- '.$cur_que;
        //     $eSub = ExamSub::firstOrCreate([
        //         'exam_id' => $ex,
        //         'student_id' => $student_id,
        //         'que_seq' => $y,
        //         'start_time' => date('h:i'),
        //         'stop_time' => date('h:i'),
        //         'cur_que' => $cur_que,
        //         'que_count' => 0
        //     ]);
        //     // }else {
        // }

        // return 'Data Exists';

        $where3 = ['student_id'=>$student_id, 'exam_id'=>$ex];
        $eSub2 = ExamSub::where($where3)->first();
        
        $cur_que = $eSub2->cur_que;

        $where2 = ['exam_id'=>$ex, 'que_no'=>$cur_que];
        $question = Question::where($where2)->first();
        // return $question->question;


        // Get time left
        // if (1 == 7) {
            $cur_time = Date('H:i:s');
            $d1 = new DateTime($eSub2->start_time);
            $d2 = new DateTime($cur_time);
            $interval = $d1->diff($d2);
            $used_sec = $interval->s; //45
            $used_min = $interval->i; //23
            $used_hr   = $interval->h; //8
            $used_time = $used_hr.':'.$used_min.':'.$used_sec;
            $used_secs = (($used_hr * 60) * 60) + ($used_min * 60) + $used_sec;
            // return $used_time.' - '.$used_secs;

            $ex_tot_secs = $exam->duration * 60;
            // return $used_time.' - '.$used_secs.' --- Exam total secs '.$ex_tot_secs;

            // Get total seconds used / stop time and current time difference
            $tot_seconds_rem = $ex_tot_secs - $used_secs;
            Session::put('tot_seconds_rem', $tot_seconds_rem);
            
            if($tot_seconds_rem <= 0){
                Session::put('tot_seconds_rem', 'time_up');
                $eSub2->status = 'closed';
                $eSub2->save();
                return redirect('/sexamview');
            }

            if ($exam->no_of_qs == $eSub2->que_count || $tot_seconds_rem > 0 && $eSub2->status == 'closed') {
                return redirect('/sexamview');
            }
            // Get total seconds used / start and current time difference to exam time 
            $ex_tot_seconds_rem = ((Date('h') * 60) * 60) + (Date('i') * 60) + Date('s');
            // return $ex_tot_seconds_rem;
        // }


        // return date('h-i-s');
        $date = date('2021-12-22'); 
        $time = date('11:25:00');
        $patch = [
            'date' => $date,
            'time' => $time,
            'exam' => $exam,
            'eSub' => $eSub2,
            'que' => $question,
            'date_today' => $date.' '.$time
        ];
        // return $question;
        return view('dash.examview')->with($patch);
    }

    public function sregister_course(){
        $company = Company::find(1);
        $program = Program::find(auth()->user()->student->program_id);

        // Check if Student is Registered

        $where2 = [
            'sem' => $company->ac_term,
            'year' => auth()->user()->student->class,
            'student_id' => auth()->user()->student_id,
            'program_id' => $program->id,
        ];
        $check = StdCourseReg::where($where2)->get();
        // return count($check);

        // return $company->ac_term.' - '.auth()->user()->student->class;
        
        $where = [
            'sem' => $company->ac_term,
            'year' => auth()->user()->student->class,
            'program_id' => $program->id,
        ];
        $course_reg = CourseReg::where($where)->get();
        $send = [
            'check' => $check,
            'company' => $company,
            'program' => $program,
            'course_reg' => $course_reg
        ];
        if ($company->reg_status == 'open') {
            return view('dash.std_reg')->with($send);
        } else {
            return redirect('/sdashboard')->with('error', 'Oops..! Registration Closed');
        }
        
    }

    public function registration_slip(){
        $company = Company::find(1);
        $program = Program::find(auth()->user()->student->program_id);
        
        $where = [
            'sem' => $company->ac_term,
            'year' => auth()->user()->student->class,
            'student_id' => auth()->user()->student_id,
            'program_id' => $program->id,
        ];
        $course_reg = StdCourseReg::where($where)->get();
        // return $course_reg;
        // return $company->ac_term.' - '.auth()->user()->student->class;
        $send = [
            'current_sem' => '',
            'current_year' => '',
            'company' => $company,
            'program' => $program,
            'course_reg' => $course_reg
        ];
        return view('dash.reg_slip')->with($send);
    }

    public function sreg_slip(){
        $company = Company::find(1);
        return view('dash.std_regslip')->with('company', $company);
    }

    public function svclassroom(){
        return view('dash.virtualclassroom');
    }

    public function sslides(){
        $where = [
            // 'program_id' => auth()->user()->student->program_id
            'type' => 'slide',
            'del' => 'no'
        ];
        // $course = Course::find(5);
        // return $course->myupload
        // $courses = Course::where($where)->get();
        $myuploads = MyUpload::where($where)->get();
        // $myupload = MyUpload::find(1);
        // return $myupload->course->course_name;
        return view('dash.std_slidelist')->with('myuploads', $myuploads);
    }

    public function sexam(){

        $std_prg = auth()->user()->student->program->id;

        // Session::put('ex_complete'.session('ex'), 'time_up');
        $ex_status_check = Exam::where('duration_to', '<', date('Y-m-d'))->get();
        foreach ($ex_status_check as $item) {
            $item->status = 'closed';
            $item->save();
        }

        $where = [
            'status' => 'open',
            'del' => 'no'
        ];
        $exams = Exam::where($where)->where('duration_from', '<=', date('Y-m-d'))->where('duration_to', '>=', date('Y-m-d'))->get();
        // $exam = Exam::where($where)->get();

        $where2 = ['status'=>'closed', 'student_id'=>auth()->user()->student_id];
        $eSub = ExamSub::where($where2)->get();

        // Get student's registered courses
        $where3 = ['status'=>'active', 'student_id'=>auth()->user()->student_id, 'program_id'=>auth()->user()->student->program->id];
        $cur_reg_crs = StdCourseReg::where($where3)->get();
        $reg_crs = ',';
        foreach ($cur_reg_crs as $item) {
            # code...
            $reg_crs = $reg_crs.$item->course_id.',';
        }
        
        // return $eSub;
         
        $patch = [
            'exams' => $exams,
            'eSub' => $eSub,
            'reg_crs' => $reg_crs
        ];
        // return $exams->course;
        return view('dash.std_examlist')->with($patch);
    }

    public function sgrades(){

        $where = ['status' => 'open','del' => 'no'];
        $exams = Exam::where($where)->where('duration_from', '<=', date('Y-m-d'))->where('duration_to', '>=', date('Y-m-d'))->get();
        
        $where2 = ['status'=>'closed', 'student_id'=>auth()->user()->student_id];
        $eSub = ExamSub::where($where2)->orderBy('id', 'DESC')->get();
        
        $patch = [
            'exams' => $exams,
            'eSub' => $eSub
        ];
        return view('dash.std_grades')->with($patch);
    }

}
