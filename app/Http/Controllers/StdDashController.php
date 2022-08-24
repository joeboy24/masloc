<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\StdCourseReg;
use App\Models\CourseReg;
use App\Models\Question;
use App\Models\Program;
use App\Models\ExamSub;
use App\Models\Student;
use App\Models\Company;
use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use DateTime;
use Session;

class StdDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth', 'student_auth']);
    } 

    public function index()
    {
        //
        return redirect('/');
        $exam = Exam::find(1);
        $rand_qs = [
            'kjlj' => 'fdfd'
        ];
       
        $x = [];
        for ($i=1; $i <= $exam->no_of_qs; $i++) { 
            array_push($x,$i);
        }
        shuffle($x);
        $y = '';
        for ($i=0; $i < $exam->no_of_qs; $i++) { 
            $y = $x[$i].','.$y;
        }
        // $p = '9,7';
        // $y = ['2','7','5',$p];

        $exSub = new ExamSub;
        $exSub->exam_id = 1;
        $exSub->student_id = 1;
        $exSub->que_seq = $y;
        $exSub->save();

        $split = explode(',', $y);

        // $y = [$x];
        // return date('h:i');
        return $split[0];
        return $x;
        return count($x);

        $patch = [
            'exam_id' => 1,
            'del' => 'no'
        ];
        $question = Question::where($patch)->inRandomOrder()->first();
        return $question->question;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 

        switch ($request->input('store_action')) {

            case 'update_std_student':
                $std = Student::find($id);
                try {
                    $std->contact = $request->input('room_no');
                    $std->email = $request->input('roomtype');
                    $std->sch_contact = $request->input('status');
                    $std->sch_email = $request->input('status');
                    $std->save();
                    return redirect(url()->previous())->with('success', 'Room '.$request->input('room_no').' Update Successful!');
                } catch (\Throwable $th) {
                    // throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'std_course_reg':
                
                $company = Company::find(1);
                $reg_vals = $request->input('reg_vals');
                if ($reg_vals == '') {
                    return redirect(url()->previous())->with('error', 'Oops..! Select Courses to Register');
                }
                if(strpos($reg_vals, ',')){
                    $reg_vals = explode(',', $reg_vals);
                    $creg = Course::find($reg_vals[0]);
                }

                // Delete if exists or updated
                $where2 = [
                    'sem' => $company->ac_term,
                    'year' => auth()->user()->student->class,
                    'student_id' => auth()->user()->student_id,
                    'program_id' => auth()->user()->student->program_id,
                ];
                $check = StdCourseReg::where($where2)->get();
                foreach ($check as $key) {
                    $key->delete();
                }

                // return $reg_vals;
                // return $sem.' - '.$year;
                try {
                    for ($i=0; $i < count($reg_vals)-1; $i++) { 
                        $cid = $reg_vals[$i];
                        
                        $std_reg = StdCourseReg::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'student_id' => auth()->user()->student_id,
                            'year' => auth()->user()->student->class,
                            'sem' => $company->ac_term,
                            'program_id' => $creg->program_id,
                            'course_id' => $cid,
                        ]);
                    }
                    return redirect(url()->previous())->with('success', 'Registration Successful!');
                } catch (\Throwable $th) {
                    // throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'std_reg_load':
                // return $request->input('year');
                $company = Company::find(1);
                $program = Program::find(auth()->user()->student->program_id);

                $where = [
                    'sem' => $request->input('sem'),
                    'year' => $request->input('year'),
                    'student_id' => auth()->user()->student_id,
                    'program_id' => $program->id,
                ];
                $course_reg = StdCourseReg::where($where)->get();

                $send = [
                    'current_sem' => $request->input('sem'),
                    'current_year' => $request->input('year'),
                    'company' => $company,
                    'program' => $program,
                    'course_reg' => $course_reg
                ];
                // if($course_reg != ''){
                //     return redirect(url()->previous())->with('warning', 'Oops..! No data found');
                // }
                return view('dash.reg_slip')->with($send);
                // return redirect(url()->previous())->with('course_reg', $course_reg);
                
            break;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // session::put('ex_complete'.session('ex'), 'no');
        if (Session::get('ex_start'.$id)) {
            // return Session::get('ex_start'.$id);
        }else{
            Session::put('ex_start'.$id, 'yes');
            // return 'Just Started';
        }
        Session::put('ex', $id);
        // return 777;
        $student_id = auth()->user()->student_id;
        $patch = ['id' => $id, 'status' => 'open'];
        $exam = Exam::where($patch)->first();
        
        // Check existence / create exam record first in ExamSub
        $where = ['student_id'=>$student_id, 'exam_id'=>$id];
        $eSubCheck = ExamSub::where($where)->count();
        $ExamSub = ExamSub::where($where)->first();

        if($eSubCheck < 1){
    
            // Random select question.... Return exam closed if status = closed
            $x = [];
            for ($i=1; $i <= $exam->no_of_qs; $i++) { 
                array_push($x,$i);
            }
            shuffle($x); shuffle($x);
            $y = '';
            for ($i=0; $i < $exam->no_of_qs; $i++) { 
                $y = $x[$i].','.$y;
            }

            $cur_que = $x[$exam->no_of_qs-1];           // Current Question
            // return $y.' ---- '.$cur_que;
            $eSub = ExamSub::firstOrCreate([
                'exam_id' => $id,
                'student_id' => $student_id,
                'que_seq' => $y,
                'start_time' => date('H:i:s'),
                'stop_time' => date('H:i:s'),
                'cur_que' => $cur_que,
                'que_count' => 0
            ]);
        }

        // return 'Data Exists';
        $where3 = ['student_id'=>$student_id, 'exam_id'=>$id];
        $eSub2 = ExamSub::where($where3)->first();
        $cur_que = $eSub2->cur_que;

        $where2 = ['exam_id'=>$id, 'que_no'=>$cur_que];
        $question = Question::where($where2)->first();
        // return $question->question;

        // New Update                           $exam->que_per_page
        if ($exam->randomize == 'yes') {
            $ques = Question::where('exam_id', $id)->limit($exam->no_of_qs)->get();
        }else{
            $ques = Question::where('exam_id', $id)->limit($exam->no_of_qs)->paginate($exam->que_per_page);
        }
        // $ques = Question::where('exam_id', $id)->inRandomOrder()->limit($exam->no_of_qs)->paginate($exam->que_per_page);
        // paginate($exam->que_per_page);
        $que_split = explode(',', $eSub2->que_seq);
        // Close New Update

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
                // $eSub2->status = 'closed';
                // $eSub2->save(); 
                if ($eSub2->status == 'closed') {
                    return redirect('/sexamview');
                }else {
                    return view('dash.confirm_ex_complete')->with('exam', $exam);
                }
            }

            if ($exam->no_of_qs == $eSub2->que_count || $tot_seconds_rem > 0 && $eSub2->status == 'closed') {
                return redirect('/sexamview');
            }
            // Get total seconds used / start and current time difference to exam time 
            $ex_tot_seconds_rem = ((Date('h') * 60) * 60) + (Date('i') * 60) + Date('s');
            // return $ex_tot_seconds_rem;
        // }
        
        $date = date('2021-12-22'); 
        $time = date('11:25:00');
        Session::put('t', 1);
        
        // $que_split = explode(',', $eSub2->que_seq);
        $que_split_id = '';
        for ($v=0; $v < $exam->no_of_qs; $v++) { 
            # code...
            $ww = ['exam_id'=>$id, 'que_no'=>$que_split[$v]];
            $qq = Question::where($ww)->first();
            $que_split_id = $que_split_id.$qq->id.',';
        }

        $patch = [
            // 'date' => $date,
            // 'time' => $time,
            'c' => 1,
            'k' => 0,
            'exam' => $exam,
            'eSub' => $eSub2,
            'ques' => $ques,
            'que' => $question,
            'que_split' => $que_split,
            'que_split_id' => explode(',', $que_split_id),
            'tot_seconds_rem' => $tot_seconds_rem,
            'date_today' => $date.' '.$time
        ];
        // return $question;
        // if ($exam->que_per_page > 1) {
            // return $ques[1];
            return view('dash.examview_multiple')->with($patch);
        // } else {
        //     return view('dash.examview')->with($patch);
        // }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        switch ($request->input('update_action')) {

            case 'update_ExSub':

                $ans_val = $request->input('ans_val');
                // return $ans_val;
                try {
                    $que = Question::find($id);
                    $exam = Exam::find($que->exam_id);
                    // return $que->answer.' - '.$ans_val;
                    if ($que->answer == $ans_val) {
                        // return 'Correct';
                        $where = ['exam_id'=>$exam->id, 'student_id'=>auth()->user()->student_id];
                        $eSub = ExamSub::where($where)->first();
                        $qc = $eSub->que_count + 1;

                        if ($exam->no_of_qs != ($qc)) {
                            # code...
                            $qs = explode(',', $eSub->que_seq);
                            $cur_que = $qs[$qc];
                            $eSub->cur_que = $cur_que;
                        }else {
                            $eSub->status = 'closed';
                        }
                    
                        $eSub->ans_seq = $eSub->ans_seq.$ans_val.',';
                        $eSub->stop_time = date('H:i:s');
                        $eSub->score = $eSub->score + 1;
                        $eSub->que_count = $qc;

                        if (Session::get('tot_seconds_rem') <= 0) {
                            $eSub->status = 'closed';
                            $eSub->save();
                            return redirect('/sexam')->with('error', 'Oops..! Time Up!');
                        }
                        $eSub->save();
                        return redirect('/sexamview');

                    }else {
                        // return 'Wrong';
                        $where = ['exam_id'=>$exam->id, 'student_id'=>auth()->user()->student_id];
                        $eSub = ExamSub::where($where)->first();
                        $qc = $eSub->que_count + 1;
                        
                        if ($exam->no_of_qs != ($qc)) {
                            # code...
                            $qs = explode(',', $eSub->que_seq);
                            $cur_que = $qs[$qc];
                            $eSub->cur_que = $cur_que;
                        }else {
                            $eSub->status = 'closed';
                        }

                        $eSub->ans_seq = $eSub->ans_seq.$ans_val.',';
                        $eSub->stop_time = date('H:i:s');
                        $eSub->que_count = $qc;
                        $eSub->save();

                        return redirect('/sexamview');
                    }
                    // return redirect(url()->previous())->with('success', 'Update Successful!');
                } catch (\Throwable $th) {
                    // throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'update_std_student':
                $std = Student::find($id);
                try {
                    $std->contact = $request->input('contact');
                    $std->email = $request->input('email');
                    $std->residence = $request->input('residence');
                    $std->res_address = $request->input('res_address');
                    if (Hash::make($request->input('password')) != $std->password) {
                        $std->password = Hash::make($request->input('password'));
                    }
                    $std->save();
                    $user_psw = User::where('student_id', $std->id)->first();
                    $user_psw->password = Hash::make($request->input('password'));
                    $user_psw->save();
                    // auth()->loginUsingId($id);
                    return redirect(url()->previous())->with('success', 'Profile Update Successful!');
                } catch (\Throwable $th) {
                    // throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong '.$th);
                }
            break;

            case 'submit_exam':

                $ans_seq = $request->input('gen_ans_val');

                // Calculate Scores Here    Ans_Seq -> (8=True)(2=True)
                $score = 0;
                if ($ans_seq != '') {
                    # code...
                    if (preg_match('/[(]/', $ans_seq)){
                    // if(strpos($ans_seq, '/(/') == true){
                        $ans_seq = str_replace("(","",$ans_seq);
                        $ans_split = explode(')', $ans_seq);
            
                        for ($c=0; $c < count($ans_split) - 1 ; $c++) { 
                            # code...
                            $dissolve = explode('=', $ans_split[$c]);
                            $que = $dissolve[0];
                            $ans = $dissolve[1];
                            
                            if (Question::find($que)->answer == $ans) {
                                $score++;
                            }
                        }
                        // return $score;
                    }
                // }else {
                //     $ans_seq = '';
                }

                $ex = Exam::find(session('ex'));
                $where = ['student_id'=>$id, 'exam_id'=>session('ex')];
                $eSub = ExamSub::where($where)->first();
                $eSub->ans_seq = $request->input('gen_ans_val');
                $eSub->stop_time = date('H:i:s');
                $eSub->que_count = $ex->no_of_qs;
                $eSub->score = $score;
                $eSub->status = 'closed';
                $eSub->save();
                session::put('ex_complete'.session('ex'), 'yes');

                return redirect('/sexam')->with('success', 'Exam successfully submitted');
                // return $request->input('gen_ans_val');
                return session('ex');

            break;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
