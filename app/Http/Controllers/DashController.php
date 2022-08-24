<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Faqs;
use App\Models\User;
use App\Models\Room;
use App\Models\Exam;
use App\Models\Staff;
use App\Models\Event;
use App\Models\About;
use App\Models\Course;
use App\Models\Student;
use App\Models\Company;
use App\Models\Program;
use App\Models\MyUpload;
use App\Models\Question;
use App\Models\RoomType;
use App\Models\CourseReg;
use App\Models\Department;
use App\Models\NewsBlog;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Homepage;
use App\Models\Testimony;
use App\Models\SubComment;
use App\Models\SubComment2;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Session;
use Auth;
use App\Exports\ExamExport;
use App\Exports\UsersExport;

class DashController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 177;
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
        // try {

            switch ($request->input('store_action')) {

                case 'add_faculty':
                    try {
                        $dept = Department::firstOrCreate([
                            'dept_name' => $request->input('dept_name'),
                        ]);
                        return redirect(url()->previous())->with('success', $request->input('dept_name').' Added Successfully!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'add_program':
                    try {
                        $program = Program::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'department_id' => $request->input('dept'),
                            'program_name' => $request->input('program_name'),
                        ]);
                        return redirect(url()->previous())->with('success', $request->input('program_name').' Added Successfully!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'add_course':
                    try {
                        $course = Course::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'program_id' => $request->input('program_id'),
                            'course_name' => $request->input('course_name'),
                            'course_code' => $request->input('course_code'),
                            'staff_id' => $request->input('lect_id'),
                        ]);
                        return redirect(url()->previous())->with('success', $request->input('course_name').' Added Successfully!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'create_user':

                    // $user = new User;
                    $ps1 = $request->input('password');
                    $ps2 = $request->input('password_confirmation');
                    $username = $request->input('name');
                    $email = $request->input('email');
                    $contact = $request->input('contact');
                    $pass_photo = $request->input('pass_photo');
    
                    if ($ps1 == $ps2){

                        try {
                            $this->validate($request, [
                                'pass_photo'  => 'max:5000|mimes:jpeg,jpg,png'
                            ]);
                            // if($request->hasFile('pass_photo')){
                                //get filename with ext
                                $filenameWithExt = $request->file('pass_photo')->getClientOriginalName();
                                //get filename
                                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                                //get file ext
                                $fileExt = $request->file('pass_photo')->getClientOriginalExtension();
                                //filename to store
                                $filenameToStore = $username.substr( $contact, -4).'.'.$fileExt;
                                //upload path
                                $path = $request->file('pass_photo')->storeAs('public/classified/users', $filenameToStore);
                            // }else{
                            //     return 171819;
                            //     $filenameToStore = $company->logo;
                            // }
                
                        } catch (Exception $ex) {
                            return redirect('/companysetup')->with('error', 'Ooops..! File Error');
                        }

                        try {

                            $create_user = User::firstOrCreate([
                                'name' => $username,
                                'email' => $email,
                                'contact' => $contact,
                                'status' => 'Administrator',
                                'password' => Hash::make($ps1),
                                'pass_photo' => $filenameToStore
                            ]);

                            // $backup = User::firstOrCreate(
                            //     ['name' => 'Code80',
                            //     'email' => 'code80@pivoapps.net', 
                            //     'contact' => '-', 
                            //     'status' => 'Administrator', 
                            //     'password' => Hash::make('code.8080')]
                            // );
                            return redirect(url()->previous())->with('success', 'User '.$username.' successfully added!');
                            
                        }catch(\Throwable $th){
                            throw $th;
                            return redirect(url()->previous())->with('error', 'Oops..! Something is wrong! Could be duplicate entry.');
                        }
                    }else{
                        return redirect(url()->previous())->with('error', 'Oops..! Passwords do not match');
                    }
    
                break;

                case 'admi_config':

    
                    $name = $request->input('name');
                    $loc = $request->input('loc');
                    // $matchThese = ['name' => $name, 'location' => $loc, 'del' => 'no'];

                    // $company = new Company;
                    // $company = Company::find(1);
                    // $company->user_id = auth()->user()->id;
                    // $company->name = $name;
                    // $company->comp_add = $request->input('company_add');

                    // $company->location = '4';
                    // $company->contact = '5';

                    // $company->email = $request->input('email');
                    // $company->website = $request->input('company_web');
                    // $company->reg_date = Date('d-m-Y');
                    // $company->logo = '9';

                    // $company->save();
                    // $company->save();
                    // return 123;
    
                    $results = Company::find(1);
    
                    if ($results){

                        $company = Company::find(1);
                        try {
                            $this->validate($request, [
                                'company_logo'  => 'max:5000|mimes:jpeg,jpg,png'
                            ]);
                            if($request->hasFile('company_logo')){
                                //get filename with ext
                                $filenameWithExt = $request->file('company_logo')->getClientOriginalName();
                                //get filename
                                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                                //get file ext
                                $fileExt = $request->file('company_logo')->getClientOriginalExtension();
                                //filename to store
                                $filenameToStore = $company->logo;
                                //upload path
                                $path = $request->file('company_logo')->storeAs('public/classified/company', $filenameToStore);
                            }else{
                                $filenameToStore = $company->logo;
                            }
                
                        } catch (Exception $ex) {
                            return redirect('/companysetup')->with('error', 'Ooops..! File Error');
                        }

                        try {
                            // $company = Company::find(1);
                            $company->user_id = auth()->user()->id;
                            $company->name = $name;
                            $company->comp_add = $request->input('company_add');
    
                            $company->location = $loc;
                            $company->contact = $request->input('contact');
    
                            $company->email = $request->input('email');
                            $company->website = $request->input('company_web');
                            $company->reg_date = Date('d-m-Y');
                            $company->logo = $filenameToStore;
    
                            $company->save();
                            return redirect('/companysetup')->with('success', 'Company`s details successfully updated');
                        } catch(Exception $ex){
                            return redirect('/companysetup')->with('error', 'Oops..! Something went wrong');
                        }
    
                    }else{
    
                        try {
                            $this->validate($request, [
                                'company_logo'   => 'required|max:5000|mimes:jpeg,jpg,png'
                            ]);
                            if($request->hasFile('company_logo')){
                                //get filename with ext
                                $filenameWithExt = $request->file('company_logo')->getClientOriginalName();
                                //get filename
                                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                                //get file ext
                                $fileExt = $request->file('company_logo')->getClientOriginalExtension();
                                //filename to store
                                $filenameToStore = 'company_logo.'.$fileExt;
                                //upload path
                                $path = $request->file('company_logo')->storeAs('public/classified/company', $filenameToStore);
                            }else{
                                $filenameToStore = '';
                            }
                
                        } catch (Exception $ex) {
                            return redirect('/companysetup')->with('error', 'Ooops..! Something went wrong');
                        }
                        
    
                        try {
                            $company = new Company;
                            $company->user_id = auth()->user()->id;
                            $company->name = $name;
                            $company->comp_add = $request->input('company_add');
    
                            $company->location = $loc;
                            $company->contact = $request->input('contact');
    
                            $company->email = $request->input('email');
                            $company->website = $request->input('company_web');
                            $company->reg_date = Date('d-m-Y');
                            $company->logo = $filenameToStore;
    
                            $company->save();
                            return redirect('/companysetup')->with('success', 'Company`s details successfully added');
                        } catch(Exception $ex){
                            return redirect('/companysetup')->with('error', 'Ooops..! Something went wrong');
                        }
                        
                    }
                    
                break;

                case 'add_staff':

                    $fname = $request->input('fname');
                    $contact = $request->input('contact');

                    $random = rand(78777, 100000);
                    $xter = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
                    $xter2 = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 3)), 0, 3);
                    $token = date('is').$xter.$random;

                    $role = $request->input('role');
                    // if($role == 'Lecturer'){
                    //     $field = 'staff_id';
                        $staff_count = count(Staff::all())+1;
                    // }

                    try {
                        $this->validate($request, [
                            'pass_photo'  => 'max:5000|mimes:jpeg,jpg,png'
                        ]);
                        //get filename with ext
                        $filenameWithExt = $request->file('pass_photo')->getClientOriginalName();
                        //get filename
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        //get file ext
                        $fileExt = $request->file('pass_photo')->getClientOriginalExtension();
                        //filename to store
                        $filenameToStore = $fname.substr( $contact, -4).'.'.$fileExt;
                        //upload path
                        $path = $request->file('pass_photo')->storeAs('public/classified/staff', $filenameToStore);
            
                    } catch (Exception $ex) {
                        return redirect(url()->previous())->with('error', 'Ooops..! File Error. Maximum file size = 5mb & File types = jpeg,jpg,png.');
                    }

                    try {
                        //code...
                        $addStaff = Staff::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'staff_id' => 'AK'.date('y').'0'.$staff_count,
                            'title' => $request->input('title'),
                            'fname' => $fname,
                            'sname' => $request->input('sname'),
                            'dob' => $request->input('dob'),
                            'email' => $request->input('email'),
                            'contact' => $contact,
                            'department_id' => $request->input('dept'),
                            'role' => $role,
                            'token' => $token,
                            'pass_photo' => $filenameToStore
                        ]);
                        session::put('staff_reg_status', 1);
                    } catch (\Throwable $th) {
                        throw $th;
                        return redirect(url()->previous())->with('error', 'Ooops..! An error occured.');
                    }

                    return redirect(url()->previous())->with('success', $fname.'`s details successfully added!');
                    

                break;

                case 'add_staff2':

                    $pass1 = $request->input('password');
                    $pass2 = $request->input('confirm_password');

                    if ($pass1 != $pass2) {
                        return redirect(url()->previous())->with('error', 'Oops..! Passwords do not match.');
                    }

                    $fname = $request->input('fname');
                    $sname = $request->input('sname');
                    if(strpos($fname, ' ') == true){
                        $fname = str_replace(" ","",$fname);
                    }
                    if(strpos($sname, ' ') == true){
                        $sname = str_replace(" ","",$sname);
                    }
                    $contact = $request->input('contact');

                    $random = rand(78777, 100000);
                    $xter = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
                    $xter2 = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 3)), 0, 3);
                    $token = date('is').$xter.$random;

                    $role = $request->input('role');
                    // if($role == 'Lecturer'){
                    //     $field = 'staff_id';
                        $staff_count = count(Staff::all())+1;
                    // }

                    try {
                        $this->validate($request, [
                            'pass_photo'  => 'max:5000|mimes:jpeg,jpg,png'
                        ]);
                        //get filename with ext
                        $filenameWithExt = $request->file('pass_photo')->getClientOriginalName();
                        //get filename
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        //get file ext
                        $fileExt = $request->file('pass_photo')->getClientOriginalExtension();
                        //filename to store
                        // $filenameToStore = $fname.substr( $contact, -4).'.'.$fileExt;
                        $filenameToStore = 'AK'.date('y').'0'.$staff_count.'.'.$fileExt;
                        //upload path
                        $path = $request->file('pass_photo')->storeAs('public/classified/staff', $filenameToStore);
            
                    } catch (Exception $ex) {
                        return redirect(url()->previous())->with('error', 'Ooops..! File Error. Maximum file size = 5mb & File types = jpeg,jpg,png.');
                    }

                    try {
                        //code...
                        $email_split = explode('@', $request->input('email'));
                        $day = date('d', strtotime($request->input('dob')));
                        $addStaff = Staff::firstOrCreate([
                            'user_id' =>  auth()->user()->id,
                            'staff_id' => 'AK'.date('y').'0'.$staff_count,
                            'title' => $request->input('title'),
                            'fname' => $fname,
                            'sname' => $request->input('sname'),
                            'dob' => $request->input('dob'),
                            'email' => $request->input('email'),
                            'sch_email' => substr($fname, 0, 1).$sname.$day.'@chntc-akimoda.edu.gh',
                            'contact' => $contact,
                            'department_id' => $request->input('dept'),
                            'role' => $role,
                            'token' => $token,
                            'pass_photo' => $filenameToStore
                        ]);
                        session::put('staff_reg_status', 1);

                        $user = User::firstOrCreate([
                            'staff_id' => $addStaff->id,
                            'name' => $fname,
                            'email' => substr($fname, 0, 1).$sname.'@chntc-akimoda.edu.gh',
                            'status' => $role,
                            'contact' => $contact,
                            'password' => Hash::make($pass1),
                            'pass_photo' => $addStaff->pass_photo
                        ]);
                        auth()->loginUsingId($user->id);
                        
                    } catch (\Throwable $th) {
                        //throw $th;
                        return redirect(url()->previous())->with('error', 'Ooops..! An error occured.');
                    }

                    return redirect(url()->previous())->with('success', 'Your details have been saved successfully!');
                    

                break;

                case 'add_student':

                    $pass1 = $request->input('password');
                    $pass2 = $request->input('confirm_password');

                    if ($pass1 != $pass2) {
                        return redirect(url()->previous())->with('error', 'Oops..! Passwords do not match.');
                    }

                    $fname = $request->input('fname');
                    $sname = $request->input('sname');
                    if(strpos($fname, ' ') == true){
                        $fname = str_replace(" ","",$fname);
                    }
                    if(strpos($sname, ' ') == true){
                        $sname = str_replace(" ","",$sname);
                    }
                    $contact = $request->input('contact');

                    $random = rand(78777, 100000);
                    $xter = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
                    $xter2 = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 3)), 0, 3);
                    $token = date('is').$xter.$random;

                    $role = $request->input('role');
                    // if($role == 'Lecturer'){
                    //     $field = 'staff_id';
                        $std_count = count(Student::all())+1;
                    // }

                    try {
                        $this->validate($request, [
                            'pass_photo'  => 'max:5000|mimes:jpeg,jpg,png'
                        ]);
                        //get filename with ext
                        $filenameWithExt = $request->file('pass_photo')->getClientOriginalName();
                        //get filename
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        //get file ext
                        $fileExt = $request->file('pass_photo')->getClientOriginalExtension();
                        //filename to store
                        // $filenameToStore = $fname.substr( $contact, -4).'.'.$fileExt;
                        $filenameToStore = 'ST'.date('ys').'0'.$std_count.'.'.$fileExt;
                        //upload path
                        $path = $request->file('pass_photo')->storeAs('public/classified/student', $filenameToStore);
            
                    } catch (Exception $ex) {
                        return redirect(url()->previous())->with('error', 'Ooops..! File Error. Maximum file size = 5mb & File types = jpeg,jpg,png.');
                    }

                    try {
                        //code...
                        $email_split = explode('@', $request->input('email'));
                        $day = date('d', strtotime($request->input('dob')));
                        $addStudent = Student::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'std_id' => 'ST'.date('y').'0'.$std_count,
                            'program_id' => $request->input('program'),
                            'index_no' => 'ST'.date('y').'0'.$std_count,
                            'fname' => $fname,
                            'sname' => $request->input('sname'),
                            'dob' => $request->input('dob'),
                            'sex' => $request->input('sex'),
                            'class' => $request->input('class'),
                            'email' => $request->input('email'),
                            'sch_email' => substr($fname, 0, 1).$sname.$day.'@chntc-akimoda.edu.gh',
                            'contact' => $contact,
                            'sch_contact' => '',
                            'residence' => $request->input('residence'),
                            'res_address' => $request->input('res_address'),
                            'guardian' => $request->input('guardian'),
                            'guard_rel' => $request->input('guard_rel'),
                            'guardian_cont' => $request->input('guard_contact'),
                            'password' => Hash::make($pass1),
                            'photo' => $filenameToStore
                        ]);
                        session::put('std_reg_status', 1);

                        $user = User::firstOrCreate([
                            'student_id' => $addStudent->id,
                            'name' => $fname,
                            'email' => substr($fname, 0, 1).$sname.$day.'@chntc-akimoda.edu.gh',
                            'status' => 'Student',
                            'contact' => $contact,
                            'password' => Hash::make($pass1),
                            'pass_photo' => $addStudent->photo
                        ]);
                        // auth()->loginUsingId($user->id);
                        
                    } catch (\Throwable $th) {
                        //throw $th;
                        return redirect(url()->previous())->with('error', 'Ooops..! An error occured.');
                    }

                    return redirect(url()->previous())->with('success', 'Your details have been saved successfully!');
                    

                break;

                case 'lect_register':


                    // $user = new User;
                    $ps1 = $request->input('password');
                    $ps2 = $request->input('password_confirmation');
                    $username = $request->input('name');
                    $email = $request->input('email');
                    $contact = $request->input('contact');
                    // $pass_photo = $request->input('pass_photo');
    
                    if ($ps1 == $ps2){

                        $where = [
                            'email' => $email,
                            'contact' => $contact,
                        ];
                        $staff_check = Staff::where($where)->first();
                        $user_log = User::where($where)->first();

                        try {

                            $user = User::firstOrCreate([
                                'staff_id' => $staff_check->id,
                                'name' => $username,
                                'email' => $email,
                                'status' => 'Lecturer',
                                'contact' => $contact,
                                'password' => Hash::make($ps1),
                                'pass_photo' => $staff_check->pass_photo
                            ]);
                            auth()->loginUsingId($user->id);
                            // return $user->id;
                            // return $staff_check->id.' '.$username.' '.$email.' '.$contact.' '.Hash::make($ps1);

                            // Clear Lecturer's Token && Update Staff's User_id
                            $up_token = Staff::find($staff_check->id);
                            $up_token->user_id = $user->id;
                            $up_token->token = '';
                            $up_token->save();

                            return redirect('/lprofile')->with('success', 'Account Activated!');
                            
                        }catch(\Throwable $th){
                            throw $th;
                            return redirect(url()->previous())->with('error', 'Oops..! Something is wrong! Could be duplicate entry.');
                        }
                    }else{
                        return redirect(url()->previous())->with('error', 'Oops..! Passwords do not match');
                    }

                break;

                case 'staff_confirm':
                    try {
                        $where = [
                            'staff_id' => $request->input('staff_id'),
                            'token' => $request->input('token'),
                        ];
                        $staff = Staff::where($where)->first();
                        Session::put('staff_confirm', $staff);
                        $patch = [
                            // 'success' => 'Credentials Confirmed!', 19191BARR94694
                            'staff' => $staff
                        ];
                        if($staff){
                            return view('auth.lect_register')->with($patch);
                        }else {
                            return redirect(url()->previous())->with('error', 'Wrong Id/Token');
                        }
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'reg_exam':

                    $user = User::find(auth()->user()->id);
                    try {
                        $exam = Exam::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'staff_id' => $user->staff->id,
                            'course_id' => $request->input('course_id'),
                            'department_id' => $user->staff->department_id,
                            'exam_title' => $request->input('exam_title'),
                            'exam_type' => $request->input('exam_type'),
                            'no_of_qs' => $request->input('no_of_qs'),
                            'duration' => $request->input('duration'),
                            'duration_from' => $request->input('duration_from'),
                            'duration_to' => $request->input('duration_to'),
                            'que_per_page' => $request->input('que_per_page'),
                            'display_ans' => $request->input('display_ans'),
                        ]);
                        return redirect(url()->previous())->with('success', 'New '.$request->input('exam_type').' Registered!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'add_multiple_questions':
                    $id = $request->input('ex_id');
                    Session::put('import_ex_id', $id);
                    $exam = Exam::find($id);
                    $txt = $request->input('txt');
                    $ex_file = $request->file('ex_file');

                    $where = ['exam_id' => $exam->id,'staff_id' => $exam->staff_id];
                    // $err_que = Question::where($where)->orderBy('id', 'DESC')->first();
                    // return substr($err_que->question, 0, 52).'...';
                    
                    if($txt == '' && $ex_file == ''){
                        return redirect(url()->previous())->with('warning', 'Note: Paste questions for `Text` option or Select file for `Excel` option');
                    }elseif($txt != ''){
                        
                        $txt_split = explode('}', $txt);
                        $optA = '';
                        $optB = '';
                        $optC = '';
                        $optD = '';
                        // $que_split = explode('{', $txt_split[2]);
                        // $ans_split = explode('~', $que_split[1]);
                        // $send_que = str_replace("Select one:","",$que_split[0]);
                        // return $ans_split[3];
                        
                        for ($i=0; $i < count($txt_split)-1; $i++) { 
                            # code...

                            try {

                                $que_split = explode('{', $txt_split[$i]);
                                $ans_split = explode('~', $que_split[1]);
                                $qno = Question::where($where)->count();
                                $send_que = str_replace("Select one:","",$que_split[0]);
                                if ($ans_split[0] != '') {
                                    // return '|'.substr($ans_split[0], 0, 1).'|';
                                    if(str_contains($ans_split[0], '=')){
                                        $cans_split = explode('=', $ans_split[0]);
                                        $correct_ans = $cans_split[1];
                                        $optA = $correct_ans;
                                        $optB = $ans_split[1];
                                        $optC = $ans_split[2];
                                        if (!empty($ans_split[3])) {
                                            $optD = $ans_split[3];
                                        }
                                    }

                                }else{
                                    // Get Option A/Correct Ans
                                    if(str_contains($ans_split[1], '=')){
                                        $cans_split = explode('=', $ans_split[1]);
                                        $correct_ans = $cans_split[1];
                                        $optA = $cans_split[0];
                                        $optB = $cans_split[1];
                                        // return $ans_split[2];
                                        $optC = $ans_split[2];
                                        if (!empty($ans_split[3])) {
                                            $optD = $ans_split[3];
                                        }
                                    }

                                    // Get Option B/Correct Ans
                                    if(str_contains($ans_split[2], '=')){
                                        $cans_split = explode('=', $ans_split[2]);
                                        $correct_ans = $cans_split[1];
                                        $optA = $ans_split[1];
                                        $optB = $cans_split[0];
                                        $optC = $cans_split[1];

                                        if (!empty($ans_split[3])) {
                                            $optD = $ans_split[3];
                                        }
                                    }

                                    if (!empty($ans_split[3])) {
                                        // Get Option C/Correct Ans
                                        if(str_contains($ans_split[3], '=')){
                                            $cans_split = explode('=', $ans_split[3]);
                                            $correct_ans = $cans_split[1];
                                            $optA = $ans_split[1];
                                            $optB = $ans_split[2];
                                            $optC = $cans_split[0];
                                            $optD = $cans_split[1];
                                        }
                                    }else{
                                        $optD = '';
                                    }
                                    // return 'Empty for now!';
                                
                                }


                                if ($correct_ans == $optA) {
                                    $correct_ans = 'A';
                                } else if ($correct_ans == $optB) {
                                    $correct_ans = 'B';
                                } else if ($correct_ans == $optC) {
                                    $correct_ans = 'C';
                                } else if ($correct_ans == $optD) {
                                    $correct_ans = 'D';
                                }

                                try {

                                    $que_where = ['exam_id' => $exam->id,];
                                    $que_search = Question::where($que_where)->where('question', 'LIKE', '%'.substr($send_que, 0,30).'%')->count();

                                    if ($que_search == 0) {
                                        // return $que_search;
                                        # code...
                                        $question = Question::firstOrCreate([
                                            'user_id' => auth()->user()->id,
                                            'exam_id' => $exam->id,
                                            'staff_id' => $exam->staff_id,
                                            'department_id' => $exam->department_id,
                                            'que_no' => $qno + 1,
                                            'question' => $send_que,
                                            'que_inst' => '',
                                            'diagram' => '',
                                            'dia_inst' => '',
                                            'a' => $optA,
                                            'b' => $optB,
                                            'c' => $optC,
                                            'd' => $optD,
                                            'answer' => $correct_ans,
                                        ]);
                                    // }else {
                                    //     return '|'.$send_que.'|';
                                    }
            
                                    // return redirect(url()->previous())->with('success', 'Question '.$qno.' Added Successfully!');
                                } catch (\Throwable $th) {
                                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                                }

                                // Get last question before error
                                $err_que = Question::where($where)->orderBy('id', 'DESC')->first();
                            } catch (\Throwable $th) {
                                return redirect(url()->previous())->with('error', 'Oops..! There is an error with the question which comes after: "'.substr($err_que->question, 0, 52).'..." '.$th);
                            }
                            
                        }

                        return redirect(url()->previous())->with('success', 'Questions Added Successfully!');

                    }elseif(!empty($request->file('ex_file'))){
                        // return $ex_file;
                        try {
                            $this->validate($request, [
                                'ex_file'   => 'required|max:5000|mimes:xlsx,xls,csv'
                            ]); 
                
                            Excel::import(new QuestionsImport,request()->file('ex_file'));
                            return redirect(url()->previous())->with('success', 'Questions successfully uploaded');
                
                        } catch (ValidationException $exception) {
                            return redirect(url()->previous())->with('Error', $exception->errors());
                        }
                    }
                    // return $txt;
                break;

                case 'add_question':
                    $id = $request->input('ex_id');
                    $exam = Exam::find($id);
                    $where = [
                        'exam_id' => $exam->id,
                        'staff_id' => $exam->staff_id
                    ];
                    $ques = Question::where($where)->get();


                    // Session::put('exam_id', $exam->id);
                    // Session::put('staff_id', $exam->staff_id);
                    // Session::put('examdepartment_id_id', $exam->department_id);
                    // Session::put('que_no', count($ques)+1);
                    Session::put('question', $request->input('question'));
                    Session::put('que_inst', $request->input('dia_inst'));
                    Session::put('a', $request->input('a'));
                    Session::put('b', $request->input('b'));
                    Session::put('c', $request->input('c'));
                    Session::put('d', $request->input('d'));
                    // Session::put('qans', $request->input('qans'));

                    if($request->input('ans_type') == '-- Choose --'){
                        return redirect(url()->previous())->with('error', 'Oops..! Answer Type Required!!!');
                    }elseif($request->input('ans_type') == 0){
                        if($request->input('true_false') == '-- Choose --'){
                            return redirect(url()->previous())->with('error', 'Oops..! Choose Correct Answer');
                        }
                        $answer = $request->input('true_false');
                    }else {
                        if($request->input('multi_a') == '' or $request->input('multi_b') == '' or $request->input('multi_c') == ''){
                            return redirect(url()->previous())->with('error', 'Oops..! Question requires 3 possible answers at least.');
                        }
                        if($request->input('qans') == '-- Choose Option --'){
                            return redirect(url()->previous())->with('error', 'Oops..! Choose Correct Answer');
                        }else {
                            $answer = $request->input('qans');
                        }
                    }

                    if($request->input('diagram') == '-- Choose from uploads --'){
                        $diagram = '';
                    }else {
                        $diagram = $request->input('diagram');
                    }

                    $qno = count($ques)+1;
                    try {
                        $question = Question::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'exam_id' => $exam->id,
                            'staff_id' => $exam->staff_id,
                            'department_id' => $exam->department_id,
                            'que_no' => $qno,
                            'question' => $request->input('question'),
                            'que_inst' => $request->input('question_inst'),
                            'diagram' => $diagram,
                            'dia_inst' => $request->input('diagram_inst'),
                            'a' => $request->input('multi_a'),
                            'b' => $request->input('multi_b'),
                            'c' => $request->input('multi_c'),
                            'd' => $request->input('multi_d'),
                            'answer' => $answer,
                        ]);
                        Session::put('question', '');
                        Session::put('que_inst', '');
                        Session::put('a', '');
                        Session::put('b', '');
                        Session::put('c', '');
                        Session::put('d', '');

                        return redirect(url()->previous())->with('success', 'Question '.$qno.' Added Successfully!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong'.$th);
                    }
                break;
 
                case 'lect_uploads':

                    try {
                        $this->validate($request, [
                            'photo'  => 'max:7000'
                        ]);
                        //get filename with ext
                        $filenameWithExt = $request->file('photo')->getClientOriginalName();
                        //get filename
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        //get file ext
                        $fileExt = $request->file('photo')->getClientOriginalExtension();
                        //filename to store
                        $filenameToStore = auth()->user()->staff_id.date('is').'.'.$fileExt;
                        //upload path
                        $path = $request->file('photo')->storeAs('public/classified/lect_uploads', $filenameToStore);
            
                    } catch (Exception $ex) {
                        return redirect(url()->previous())->with('error', 'Ooops..! File Error');
                    }

                    try {
                        $myupload = MyUpload::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'staff_id' => auth()->user()->staff_id,
                            'course_id' => $request->input('course_id'),
                            'department_id' => auth()->user()->staff->department_id,
                            'title' => $request->input('title').'.'.$fileExt,
                            'type' => $request->input('type'),
                            'photo' => $filenameToStore,
                        ]);
                        return redirect(url()->previous())->with('success', 'File Added Successfully!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }

                break;

                case 'programs_course_reg':
                    $sem = $request->input('reg_sem');
                    $year = $request->input('reg_year');
                    $reg_vals = $request->input('reg_vals');
                    if(strpos($reg_vals, ',')){
                        $reg_vals = explode(',', $reg_vals);
                        // return '|'.$reg_vals.'|';
                        $pid = Course::find($reg_vals[0]);
                        $pid = $pid->program->id;
                        // return $pid;
                    }
                    // return $sem.' - '.$year;
                    try {
                        for ($i=0; $i < count($reg_vals)-1; $i++) { 
                            $cid = $reg_vals[$i];
                            $opt = 'no';
                            if(strpos($reg_vals[$i], '=')){
                                $opt = explode('=', $reg_vals[$i]);
                                $cid = $opt[0];
                                $opt = 'yes';
                            }
                            // Check if exists
                            $check = ['program_id' => $pid, 'course_id' => $cid, 'year' => $year, 'sem' => $sem
                                // 'optional' => $opt,
                            ];
                            $cid_check = CourseReg::where($check)->count();
                            if($cid_check < 1){
                                // return 'Does not exist';`
                                $course_reg = CourseReg::firstOrCreate([
                                    'user_id' => auth()->user()->id,
                                    'program_id' => $pid,
                                    'course_id' => $cid,
                                    'year' => $year,
                                    'sem' => $sem,
                                    'optional' => $opt,
                                ]);
                            }
                        }
                        return redirect(url()->previous())->with('success', 'Course Registration Successful!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong'.$th);
                    }
                break;

                case 'add_newsblog':
    
                    try {
                        // $this->validate($request, [
                        //     'dp'   => 'max:9000|mimes:jpeg,jpg,png'
                        // ]);
                        $this->validate($request, [
                            'dp'  => 'max:5000|mimes:jpeg,jpg,png'
                        ]);
                        // if($request->hasFile('dp')){
                            //get filename with ext
                            $filenameWithExt = $request->file('dp')->getClientOriginalName();
                            //get filename
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            //get file ext
                            $fileExt = $request->file('dp')->getClientOriginalExtension();
                            //filename to store
                            $filenameToStore = 'img'.date('is').'.'.$fileExt;
                            //upload path
                            $path = $request->file('dp')->storeAs('public/classified/news_blog', $filenameToStore);
                    } catch (\Throwable $th) {
                        // throw $th;
                        return redirect(url()->previous())->with('error', 'Ooops..! Unable to save. Check image resolution, size and extension!');
                    }

                    try {
                        
                        $create_user = NewsBlog::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'title' => $request->input('title'),
                            'text' => $request->input('text'),
                            'category' => $request->input('category'),
                            'tags' => $request->input('tags'),
                            'date_added' => Date('M. d, Y'),
                            'dp' => $filenameToStore
                        ]);

                        // $nb = new NewsBlog;
                        // $nb->user_id = auth()->user()->id;
                        // $nb->title = $request->input('title');
                        // $nb->text = $request->input('text');
                        // $nb->tags = $request->input('tags');
                        // $nb->date_added = Date('M. d, Y');
                        // $nb->dp = $filenameToStore;
                        // $nb->save();
                        return redirect(url()->previous())->with('success', 'Blog successfully published');
                    } catch (\Throwable $th) {
                        // throw $th;
                        return redirect(url()->previous())->with('error', 'Ooops..! Something went wrong');
                    }
                        
                break;

                case 'add_events':
    
                    try {
                        // $this->validate($request, [
                        //     'dp'   => 'max:9000|mimes:jpeg,jpg,png'
                        // ]);
                        $this->validate($request, [
                            'dp'  => 'max:5000|mimes:jpeg,jpg,png'
                        ]);
                        // if($request->hasFile('dp')){
                            //get filename with ext
                            $filenameWithExt = $request->file('dp')->getClientOriginalName();
                            //get filename
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            //get file ext
                            $fileExt = $request->file('dp')->getClientOriginalExtension();
                            //filename to store
                            $filenameToStore = 'img'.date('is').'.'.$fileExt;
                            //upload path
                            $path = $request->file('dp')->storeAs('public/classified/events', $filenameToStore);
                    } catch (Exception $ex) {
                        return redirect(url()->previous())->with('error', 'Ooops..! Unable to save. Check image resolution, size and extension!');
                    }

                    try {
                        
                        $create_user = Event::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'title' => $request->input('title'),
                            'text' => $request->input('text'),
                            'date_added' => $request->input('ev_date'),
                            'venue' => $request->input('venue'),
                            'duration' => $request->input('duration'),
                            // 'date_added' => Date('M. d, Y'),
                            'dp' => $filenameToStore
                        ]);

                        // $nb = new NewsBlog;
                        // $nb->user_id = auth()->user()->id;
                        // $nb->title = $request->input('title');
                        // $nb->text = $request->input('text');
                        // $nb->tags = $request->input('tags');
                        // $nb->date_added = Date('M. d, Y');
                        // $nb->dp = $filenameToStore;
                        // $nb->save();
                        return redirect(url()->previous())->with('success', 'Event successfully published');
                    } catch(Exception $ex){
                        return redirect(url()->previous())->with('error', 'Ooops..! Something went wrong'.$ex);
                    }
                        
                break;

                case 'comment':
                    try {
                        $comment = Comment::firstOrCreate([
                            'news_blog_id' => $request->input('nb_id'),
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'message' => $request->input('message'),
                            'date_added' => date('M d, Y ').' at '.date('h:i a'),
                        ]);
                        return redirect(url()->previous())->with('success', 'Comment Published!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'sub_comment':
                    // return $request->input('nb_id2').' '.$request->input('name2').' '.$request->input('email2').' '.$request->input('message2');
                    try {
                        $sub_comment = SubComment::firstOrCreate([
                            'comment_id' => $request->input('nb_id2'),
                            'name' => $request->input('name2'),
                            'email' => $request->input('email2'),
                            'message' => $request->input('message2'),
                            'date_added' => date('M d, Y ').' at '.date('h:i a'),
                        ]);
                        return redirect(url()->previous())->with('success', 'Comment Published!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'sub_comment2':
                    // return $request->input('nb_id2').' '.$request->input('name2').' '.$request->input('email2').' '.$request->input('message2');
                    try {
                        $sub_comment2 = SubComment2::firstOrCreate([
                            'sub_comment_id' => $request->input('nb_id3'),
                            'name' => $request->input('name3'),
                            'email' => $request->input('email3'),
                            'message' => $request->input('message3'),
                            'date_added' => date('M d, Y ').' at '.date('h:i a'),
                        ]);
                        return redirect(url()->previous())->with('success', 'Comment Published!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'about':
                    // return $request->input('nb_id2').' '.$request->input('name2').' '.$request->input('email2').' '.$request->input('message2');
                    $check = About::where('header', $request->input('header'))->first();
                    if ($check) {
                        $about = About::find($check->id);
                        $about->user_id = auth()->user()->id;
                        if ($request->input('title') != '') {
                            $about->title = $request->input('title');
                        }
                        if ($request->input('text') != '') {
                            $about->text = $request->input('text');
                        }
                        $about->save();
                    }else{
                        try {
                            $about = About::firstOrCreate([
                                'user_id' => auth()->user()->id,
                                'header' => $request->input('header'),
                                'title' => $request->input('title'),
                                'text' => $request->input('text'),
                            ]);
                        } catch (\Throwable $th) {
                            return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                        }
                    }

                    return redirect(url()->previous())->with('success', 'Entry Successful!');

                break;

                case 'Ask_Us':
                    try {
                        $faqs = Faqs::firstOrCreate([
                            'name' => auth()->user()->name,
                            'phone' => auth()->user()->contact,
                            // 'email' => auth()->user()->email,
                            'message' => $request->input('message'),
                            'answer' => $request->input('answer'),
                        ]);
                        return redirect(url()->previous())->with('success', 'Successfull!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                    }
                break;

                case 'newsletter':
                    return redirect(url()->previous())->with('success', 'Newsletter broadcast unavailable at the moment!');
                break;

                case 'gallery_uploads':
                    // return 1234;
                    // dd($request->all());

                    try {
                        if($files = $request->file('photo')){
                            foreach ($files as $file) {
                                # code...
                            $this->validate($request, [
                                'photo'  => 'max:7000'
                            ]);
                            $filenameWithExt = $file->getClientOriginalName();
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            $fileExt = $file->getClientOriginalExtension();
                            $filenameToStore = date('my_').substr(md5(rand(1000, 10000)), 0, 7).'.'.$fileExt;
                                if($request->input('use') == 'Gallery Use'){
                                    $path = $file->storeAs('public/classified/gallery', $filenameToStore);
                                }else {
                                    $path = $file->storeAs('public/classified/system_use', $filenameToStore);
                                }
                                
                                $gallery = Gallery::firstOrCreate([
                                    'user_id' => auth()->user()->id,
                                    'photo' => $filenameToStore,
                                    'loc_use' => $request->input('use'),
                                ]);
                            }
                        }
                        return redirect(url()->previous())->with('success', 'Upload Successfull!');
                    } catch (Exception $ex) {
                        return redirect(url()->previous())->with('error', 'Ooops..! Check file type and size');
                    }

                    return redirect(url()->previous())->with('success', 'Newsletter broadcast unavailable at the moment!');
                break;

                case 'add_homepage':
                    try {
                        $homepage = Homepage::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'img1_title' => $request->input('img1_title'),
                            'img2_title' => $request->input('img2_title'),
                            'img3_title' => $request->input('img3_title'),
                            'img1_text' => $request->input('img1_text'),
                            'img2_text' => $request->input('img2_text'),
                            'img3_text' => $request->input('img3_text'),
                            'img1_photo' => $request->input('slider1'),
                            'img2_photo' => $request->input('slider2'),
                            'img3_photo' => $request->input('slider3'),

                            'goals_header' => $request->input('goals_header'),
                            'goals_body' => $request->input('goals_body'),
                            'goal1_title' => $request->input('goal1_title'),
                            'goal2_title' => $request->input('goal2_title'),
                            'goal3_title' => $request->input('goal3_title'),
                            'goal4_title' => $request->input('goal4_title'),
                            'goal1_text' => $request->input('goal1_text'),
                            'goal2_text' => $request->input('goal2_text'),
                            'goal3_text' => $request->input('goal3_text'),
                            'goal4_text' => $request->input('goal4_text'),

                            'meet_header' => $request->input('meet_header'),
                            'meet_body' => $request->input('meet_body'),
                            'headteacher_photo' => $request->input('ht_photo'),
                            'meet1_title' => $request->input('meet1_title'),
                            'meet2_title' => $request->input('meet2_title'),
                            'meet3_title' => $request->input('meet3_title'),
                            'meet1_text' => $request->input('meet1_text'),
                            'meet2_text' => $request->input('meet2_text'),
                            'meet3_text' => $request->input('meet3_text'),
                            
                            'curious_header' => $request->input('curious_header'),
                            'curious_body' => $request->input('curious_body'),
                            'cur_bul1' => $request->input('cur_bul1'),
                            'cur_bul2' => $request->input('cur_bul2'),
                            'cur_bul3' => $request->input('cur_bul3'),
                            'cur_bul4' => $request->input('cur_bul4'),
                        ]);
                        return redirect(url()->previous())->with('success', 'Update Successful!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Something went wrong'.$th);
                    }
                break;

                case 'add_testimony':
                    try {
                        $testimony = Testimony::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'name' => $request->input('name'),
                            'position' => $request->input('position'),
                            'text' => $request->input('message'),
                            'photo' => $request->input('test_img'),
                        ]);
                        return redirect(url()->previous())->with('success', 'Testimony Successfully Added!');
                    } catch (\Throwable $th) {
                        return redirect(url()->previous())->with('error', 'Oops..! Select photo to proceed..!');
                    }
                break;

            }


        // }catch(\Throwable $th) {
        //     return redirect(url()->previous())->with('error', 'Ooops..! Something went wrong');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        Session::put('ex_id', $id);
        // return session('ex_id');
        $exam = Exam::find($id);
        $where = [
            'exam_id' => $exam->id,
            'staff_id' => $exam->staff_id
        ];
        $question = Question::orderBy('id', 'DESC')->where($where)->get();
        $myups = MyUpload::orderBy('title', 'ASC')->where('staff_id', $exam->staff_id)->get();
        $patch = [
            'exam' => $exam,
            'ques' => $question, 
            'myups' => $myups
        ];
        return view('dash.paper')->with($patch);


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
        try {

            switch ($request->input('store_action')) {

            }

        }catch(\Throwable $th) {
            return redirect(url()->previous())->with('error', 'Ooops..! Something went wrong');
        }
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

            case 'bugfixes':
                # code... Fetch All Students
                $students = Student::all();
                // foreach ($students as $std) {

                //     # code... Fetch Duplicates
                //     // $where1 = ['dob' => $std->dob, 'fname' => $std->fname];
                //     // $where2 = ['dob' => $std->dob, 'sname' => $std->sname];
                //     // $where3 = ['dob' => $std->dob, 'contact' => $std->contact];
                //     // $where4 = ['dob' => $std->dob, 'fname' => $std->fname, 'sname' => $std->sname];
                //     // $std_dup = Student::where($where4)->get();
                //     // if (count($std_dup)>1) {
                //     //     # code... Delete all duplicates and leave first one
                //     //     for ($i=1; $i < count($std_dup); $i++) {
                //     //         # code...
                //     //         $item = Student::find($std_dup[$i]->id);
                //     //         $item->delete();
                //     //     }
                //     // }else{
                //         // return 'Duplicates Found!';
                //         $day = date('d', strtotime($std->dob));
                //         // $item = Student::find($std_dup[0]->id);
                //         // $item->sch_email = substr($std_dup[0]->fname, 0, 1).$std_dup[0]->sname.$day.'@chntc-akimoda.edu.gh';
                //         // $item->save();

                //         // $where2 = ['dob' => $std->dob, 'contact' => $std->contact];
                //         $newmail = substr($std->fname, 0, 1).$std->sname.$day.'@chntc-akimoda.edu.gh';
                //         $uwhere = ['email' => $newmail, 'contact' => $std->contact];
                //         $user_check = User::where($uwhere)->get();
                //         if (count($user_check) > 0) {}else{
                //             $user = User::firstOrCreate([
                //                 'student_id' => $std->id,
                //                 'name' => $std->fname,
                //                 'email' => $newmail,
                //                 'status' => 'Student',
                //                 'contact' => $std->contact,
                //                 'password' => Hash::make($std->contact),
                //                 'pass_photo' => $std->photo
                //             ]);
                //         }


                //     // }
                // }

                // $user = User::all();
                // foreach ($user as $key) {
                //     if(strpos($key->email, ' ') == true){
                //         $fuser = User::find($key->id);
                //         $fuser->email = str_replace(" ","",$key->email);
                //         $fuser->save();
                //     }
                // }

                foreach ($students as $std) {
                    // $std_up = Student::find($std->id);
                    $day = date('d', strtotime($std->dob));
                    // $std->sch_email = substr($std->fname, 0, 1).$std->sname.$day.'@chntc-akimoda.edu.gh';
                    // $std->save();

                    $newmail = substr($std->fname, 0, 1).$std->sname.$day.'@chntc-akimoda.edu.gh';
                    $user_search = User::where('student_id', $std->id)->get();
                    // $user_search = User::where('email', 'like', '%'.substr($std->fname, 0, 1).$std->sname.'%')->where('pass_photo', $std->photo)->get();
                    
                    // foreach ($user_search as $val) {
                    //     # code...
                    //     for ($i=1; $i < count($user_search); $i++) {
                    //         # code...
                    //         $val = User::find($user_search[$i]->id);
                    //         $val->delete();
                    //     }
                    // return count($user_search);
                        if(count($user_search)>0){
                            if ($user_search[0]->email != $std->email) {
                                $up = User::find($user_search[0]->id);
                                $up->email = $std->email;
                                $up->save();
                            }
                            
                            // $rep = User::find($std->id);
                            // $rep->email = substr($std->fname, 0, 1).$std->sname.$day.'@chntc-akimoda.edu.gh';
                            // $rep->save();
                        }else{
                            $user_search2 = User::where('email', $std->email)->get();
                            if(count($user_search2)==0){
                                $user = User::firstOrCreate([
                                    'student_id' => $std->id,
                                    'name' => $std->fname,
                                    'email' => $newmail,
                                    'status' => 'Student',
                                    'contact' => $std->contact,
                                    'password' => Hash::make($std->contact),
                                    'pass_photo' => $std->photo
                                ]);
                            }
                        }
                    // }
                }

                return 'Duplicates Successfully Deleted!';

            break;

            case 'add_room':
                $rm = Room::find($id);
                try {
                    $rm->room_no = $request->input('room_no');
                    $rm->room_type = $request->input('roomtype');
                    $rm->status = $request->input('status');
                    $rm->save();
                    return redirect(url()->previous())->with('success', 'Room '.$request->input('room_no').' Update Successful!');
                } catch (\Throwable $th) {
                    // throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'add_roomtype':
                $rt = RoomType::find($id);
                try {
                    $rt->room_type = $request->input('room_type');
                    $rt->price = $request->input('price');
                    $rt->status = $request->input('status');
                    $rt->save();
                    return redirect(url()->previous())->with('success', $request->input('room_type').' Room Type Update Successful!');
                } catch (\Throwable $th) {
                    throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            // Update
            case 'faculty_update':
                try {
                    $dept = Department::find($id);
                    $dept->dept_name = $request->input('dept_name');
                    $dept->save();
                    return redirect(url()->previous())->with('success', $request->input('dept_name').' Successfully updated!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'program_update':
                try {
                    $item = Program::find($id);
                    $item->department_id = $request->input('dept');
                    $item->program_name = $request->input('program_name');
                    $item->save();
                    return redirect(url()->previous())->with('success', $request->input('program_name').' Successfully updated!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'course_update':
                try {
                    $item = Course::find($id);
                    $item->course_name = $request->input('course_name');
                    $item->program_id = $request->input('program_id');
                    $item->course_code = $request->input('course_code');
                    $item->staff_id = $request->input('lect_id');
                    $item->save();
                    return redirect(url()->previous())->with('success', $request->input('course_name').' Successfully updated!');
                } catch (\Throwable $th) {
                    throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'staff_update':

                $fname = $request->input('fname');
                $contact = $request->input('contact');
                $old_name = $request->input('pass_photo_hold');

                if (!empty($request->file('pass_photo'))) {
                    try {
                        $this->validate($request, [
                            'pass_photo'  => 'max:1000|mimes:jpeg,jpg,png'
                        ]);
                            $path = $request->file('pass_photo')->storeAs('public/classified/staff', $old_name);
                    } catch (Exception $ex) {
                        return redirect(url()->previous())->with('error', 'Ooops..! Unable to save. Check image resolution, size(max:1mb) and extension!');
                    }
                }

                $item = Staff::find($id);
                $item->title = $request->input('title');
                $item->fname = $fname;
                $item->sname = $request->input('sname');
                $item->email = $request->input('email');
                if ($request->input('dob') != '') {
                    $item->dob = $request->input('dob'); 
                } else {
                    $item->dob = $request->input('dob_hidden'); 
                }
                
                $item->contact = $contact;
                $item->department_id = $request->input('dept');
                $item->role = $request->input('role');
                // if (Hash::make($request->input('password')) != $item->password) {
                //     $item->password = Hash::make($request->input('password'));
                // }
                $item->save();
                $user_psw = User::where('staff_id', $item->id)->first();
                $user_psw->password = Hash::make($request->input('password'));
                $user_psw->save();
                return redirect(url()->previous())->with('success', $fname.'`s details updated successfully!');
        
            break;

            case 'student_update':
                // return 'Works Perfect!';

                try {
                    $day = date('d', strtotime($request->input('dob')));
                    $std = Student::find($id);
                    $std->user_id = auth()->user()->id;
                    $std->program_id = $request->input('program');
                    $std->fname = $request->input('fname');
                    $std->sname = $request->input('sname');
                    $std->dob = $request->input('dob');
                    $std->sex = $request->input('sex');
                    $std->class = $request->input('class');
                    $std->email = $request->input('email');
                    // $std->sch_contact = '';
                    $std->sch_email = substr($request->input('fname'), 0, 1).$request->input('sname').$day.'@chntc-akimoda.edu.gh';
                    $std->contact = $request->input('contact');
                    $std->residence = $request->input('residence');
                    $std->res_address = $request->input('res_address');
                    $std->guardian = $request->input('guardian');
                    $std->guard_rel = $request->input('guard_rel');
                    $std->guardian_cont = $request->input('guard_contact');
                    $std->save();
                    // auth()->loginUsingId($user->id);
                    
                } catch (\Throwable $th) {
                    //throw $th;
                    return redirect(url()->previous())->with('error', 'Ooops..! An error occured. '.$th);
                }

                return redirect(url()->previous())->with('success', $request->input('fname').'`s details successfully updated!');
                
            break;

            case 'update_reg_exam':

                $exam = Exam::find($id);
                try {
                    $exam->exam_title = $request->input('exam_title');
                    $exam->course_id = $request->input('course_id');
                    $exam->exam_type = $request->input('exam_type');
                    $exam->no_of_qs = $request->input('no_of_qs');
                    $exam->duration = $request->input('duration');
                    $exam->duration_from = $request->input('duration_from');
                    $exam->duration_to = $request->input('duration_to');
                    $exam->que_per_page = $request->input('que_per_page');
                    $exam->display_ans = $request->input('display_ans');
                    $exam->save();
                    return redirect(url()->previous())->with('success', $request->input('exam_title').' updated!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'update_question':

                if($request->input('diagram') == '-- Choose from uploads --'){
                    $diagram = '';
                }else {
                    $diagram = $request->input('diagram');
                }

                if($request->input('ans_type') == '-- Choose --'){
                    return redirect(url()->previous())->with('error', 'Oops..! Answer Type Required!!!');
                }elseif($request->input('ans_type') == 0){
                    if($request->input('true_false') == '-- Choose --'){
                        return redirect(url()->previous())->with('error', 'Oops..! Choose Correct Answer');
                    }
                    $answer = $request->input('true_false');
                }else {
                    if($request->input('multi_a') == '' or $request->input('multi_b') == '' or $request->input('multi_c') == ''){
                        return redirect(url()->previous())->with('error', 'Oops..! Question requires 3 possible answers at least.');
                    }
                    if($request->input('qans') == '-- Choose Option --'){
                        return redirect(url()->previous())->with('error', 'Oops..! Choose Correct Answer');
                    }else {
                        $answer = $request->input('qans');
                    }
                }

                $id = $request->input('ex_id');
                $que = Question::find($id);
                try {
                    $que->question = $request->input('question');
                    $que->que_inst = $request->input('question_inst');
                    $que->diagram = $diagram;
                    $que->dia_inst = $request->input('diagram_inst');
                    $que->a = $request->input('multi_a');
                    $que->b = $request->input('multi_b');
                    $que->c = $request->input('multi_c');
                    $que->d = $request->input('multi_d');
                    $que->answer = $answer;
                    $que->save();
                    return redirect(url()->previous())->with('success', 'Update Successful!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong '.$th);
                }
            break;

            case 'update_file_upload':

                $myup = MyUpload::find($id);
                $up_split = explode('.', $myup->photo);
                $title = $request->input('title');
                if(strpos($title, $up_split[1])){}else {
                    $title = $title.'.'.$up_split[1];
                }
                try {
                    $myup->title = $title;
                    $myup->type = $request->input('type');
                    $myup->save();
                    return redirect(url()->previous())->with('success', 'File Updated Successfully!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
                
            break;

            case 'blog_update':

                $nb = NewsBlog::find($id);
                try {
                    $nb->title = $request->input('title');
                    $nb->text = $request->input('text');
                    $nb->category = $request->input('category');
                    $nb->tags = $request->input('tags_up');
                    $nb->save();
                    return redirect(url()->previous())->with('success', 'Blog Update Successful!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
                
            break;

            case 'event_update':
                
                $nb = Event::find($id);
                try {
                    $nb->title = $request->input('ev_title');
                    $nb->text = $request->input('ev_text');
                    if($request->input('ev_date_added') != ''){
                        $nb->date_added = $request->input('ev_date_added');
                    }
                    $nb->venue = $request->input('ev_venue');
                    $nb->duration = $request->input('ev_duration');
                    $nb->save();
                    return redirect(url()->previous())->with('success', 'Event Update Successful!');
                } catch (\Throwable $th) {
                    throw $th;
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
                
            break;

            case 'update_faq':
                try {
                    $faqs = Faqs::find($id);
                    $faqs->message = $request->input('message');
                    $faqs->answer = $request->input('answer');
                    $faqs->save();
                    return redirect(url()->previous())->with('success', $request->input('dept_name').' Successfully updated!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'exam_ex_download':
                session::put('exel_exam_id', $id);
                $title = Exam::find($id)->exam_title;
                // return $title;
                return Excel::download(new ExamExport, $title.'_'.date('h-i-s').'.xlsx');
                // return session::get('exel_exam_id');
            break;

            // Delete
            case 'del_dept':
                $dept = Department::find($id);
                $dept->del = 'yes';
                $dept->save();
                return redirect(url()->previous())->with('Success', $dept->name.' Deleted!');
            break;

            case 'del_program':
                $item = Program::find($id);
                $item->del = 'yes';
                $item->save();
                return redirect(url()->previous())->with('Success', $item->name.' Deleted!');
            break;

            case 'del_course':
                $item = Course::find($id);
                $item->del = 'yes';
                $item->save();
                return redirect(url()->previous())->with('Success', $item->name.' Deleted!');
            break;

            case 'del_staff':
                $item = Staff::find($id);
                $item->del = 'yes';
                $item->save();
                return redirect(url()->previous())->with('Success', $item->fname.' Deleted!');
            break;

            case 'del_exam':
                $item = Exam::find($id);
                $item->status = 'closed';
                $item->del = 'yes';
                $item->save();
                return redirect(url()->previous())->with('Success', 'Ex'.date('y').$item->id.' Deleted!');
            break;

            case 'del_lect_upload':

                try {
                    $myup = MyUpload::find($id);
                    $myup->del = 'yes';
                    $myup->save();
                    return redirect(url()->previous())->with('success', 'File Deleted Successfully!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
                
            break;

            case 'del_blog':
                $nb = NewsBlog::find($id);
                $nb->del = 'yes';
                $nb->save();
                return redirect(url()->previous())->with('Success', 'Blog Deleted!');
            break;

            case 'del_event':
                $nb = Event::find($id);
                $nb->del = 'yes';
                $nb->save();
                return redirect(url()->previous())->with('Success', 'Event Deleted!');
            break;

            case 'del_faq':
                $faq = Faqs::find($id);
                $faq->del = 'yes';
                $faq->save();
                return redirect(url()->previous())->with('Success', 'Record Deleted!');
            break;

            case 'del_question':
                $que = Question::find($id);
                $que->del = 'yes';
                $que->save();
                return redirect(url()->previous())->with('Success', 'Question Deleted!');
            break;

            case 'del_std':
                $std = Student::find($id);
                $std->del = 'yes';
                $std->save();
                return redirect(url()->previous())->with('Success', 'Student Deleted!');
            break;
            
            // Restore
            case 'restore_dept':
                $dept = Department::find($id);
                $dept->del = 'no';
                $dept->save();
                return redirect(url()->previous())->with('Success', $dept->name.' Successfully Restored!');
            break;

            case 'restore_program':
                $item = Program::find($id);
                $item->del = 'no';
                $item->save();
                return redirect(url()->previous())->with('Success', $item->name.' Successfully Restored!');
            break;

            case 'restore_course':
                $item = Course::find($id);
                $item->del = 'no';
                $item->save();
                return redirect(url()->previous())->with('Success', $item->name.' Successfully Restored!');
            break;

            case 'restore_staff':
                $item = Staff::find($id);
                $item->del = 'no';
                $item->save();
                return redirect(url()->previous())->with('Success', $item->fname.' Successfully Restored!');
            break;

            case 'restore_exam':
                $item = Exam::find($id);
                $item->del = 'no';
                $item->save();
                return redirect(url()->previous())->with('Success', 'Ex'.date('y').$item->id.' Restored!');
            break;

            case 'restore_lect_upload':
                try {
                    $myup = MyUpload::find($id);
                    $myup->del = 'no';
                    $myup->save();
                    return redirect(url()->previous())->with('success', 'File Successfully Restored!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'close_exam':
                try {
                    $exam = Exam::find($id);
                    $exam->status = 'closed';
                    $exam->save();
                    return redirect(url()->previous())->with('success', 'Exam/Quiz Closed. NB:Students won`t have access!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'open_exam':
                try {
                    $exam = Exam::find($id);
                    $exam->status = 'open';
                    $exam->save();
                    return redirect(url()->previous())->with('success', 'Exam/Quiz Opened. NB:Students will have access!');
                } catch (\Throwable $th) {
                    return redirect(url()->previous())->with('error', 'Oops..! Something went wrong');
                }
            break;

            case 'restore_blog':
                $nb = NewsBlog::find($id);
                $nb->del = 'no';
                $nb->save();
                return redirect(url()->previous())->with('Success', 'Blog Restored!');
            break;

            case 'restore_event':
                $nb = Event::find($id);
                $nb->del = 'no';
                $nb->save();
                return redirect(url()->previous())->with('Success', 'Event Restored!');
            break;

            case 'restore_faq':
                $faq = Faqs::find($id);
                $faq->del = 'no';
                $faq->save();
                return redirect(url()->previous())->with('Success', 'Record Restored!');
            break;

            case 'restore_question':
                $que = Question::find($id);
                $que->del = 'no';
                $que->save();
                return redirect(url()->previous())->with('Success', 'Question Restored!');
            break;

            case 'restore_question':
                $que = Question::find($id);
                $que->del = 'no';
                $que->save();
                return redirect(url()->previous())->with('Success', 'Question Restored!');
            break;

            case 'restore_std':
                $std = Student::find($id);
                $std->del = 'no';
                $std->save();
                return redirect(url()->previous())->with('Success', 'Student Restored!');
            break;

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request, $id)
    {
        //
        switch ($request->input('del_action')) {

            case 'del_user':
                $user = User::find($id);
                $user->del = 'yes';
                $user->save();
                // $user->delete();
                return redirect(url()->previous())->with('Success', 'User '.$user->name.' Deleted!');
            break;
       
        }

    }
}
