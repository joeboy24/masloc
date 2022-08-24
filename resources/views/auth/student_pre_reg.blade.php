
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CHNTC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="/maindir/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/maindir/css/animate.css">
    
    <link rel="stylesheet" href="/maindir/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/maindir/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/maindir/css/magnific-popup.css">

    <link rel="stylesheet" href="/maindir/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  </head>
    <body class="login_body" style="background-image: url('/storage/classified/Nursing/n3.jpeg');">
    {{-- <body class="login_body" style="background-image: url('/storage/classified/Nursing/img4.jpg');"> --}}
    {{-- <body class="login_body" style="background-image: url('/storage/classified/Nursing/img3.jpg');"> --}}
        <div class="my_overlay">
            <div class="row">
                <div class="login_container">
                    <div class="col-md-12 login_container_inner">
                    @include('inc.messages')
                        {{-- <img src="/storage/classified/Nursing/n0.png"> --}}
                      @if (session('std_reg_status')==1)
                        <h5 class="small_p">PROCEED LOGIN TO...</h5>
                        <div class="row mb-0">
                            <div class="col-md-5 offset-md-3">
                                <p>&nbsp;</p>
                                <a href="/sdashboard"><button type="submit" class="sign_in">STUDENT PORTAL</button></a>
                                <a href="/"><button type="submit" class="sign_in">BACK TO HOME</button></a>
                            </div>
                        </div>
                      @else
                        <form action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h5 class="staff_portal_p">SIGN UP HERE</h5>
                            <p class="warning_p" style="margin-top: -15px"><i class="fa fa-warning"></i>&nbsp;&nbsp;&nbsp;All fields are required</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <label>Firstname</label>
                                        <div class="position-relative">
                                            <input onkeyup="mailcon()" id="fname" type="text" name="fname" class="" placeholder="eg. John" required>
                                        </div>
                                    </div>

                                    <div class="">
                                        <label>Othernames</label>
                                        <div class="position-relative">
                                            <input onkeyup="mailcon()" id="sname" type="text" name="sname" class="" placeholder="eg. Doe" required>
                                        </div>
                                    </div>

                                    <div class="input-group mb-8">
                                        <label>Gender</label>
                                        <select name="sex" class="" id="inputGroupSelect01">
                                            <option value="M" selected>Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>

                                    <div class="">
                                        <label>Date of Birth</label>
                                        <div class="position-relative">
                                            <input type="date" name="dob" class="" placeholder="dd/mm/yyyy" required>
                                        </div>
                                    </div>

                                    <div class="input-group mb-8">
                                        <label>Current Level</label>
                                        <select name="class" class="" id="inputGroupSelect01">
                                            <option value="1" selected>1st Year</option>
                                            <option value="2">2nd Year</option>
                                            <option value="3">3rd Year</option>
                                            <option value="4">4th Year</option>
                                        </select>
                                    </div>
                                    
                                    <div class="">
                                        <label>Email</label>
                                        <div class="position-relative">
                                            <input type="email" name="email" class="" placeholder="Email" required>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                        <label>School Email <p class="small_p"> NOTE: This email will be used to login to the Students Portal</p></label>
                                        <div class="position-relative">
                                            <input type="email" id="sch_email" name="sch_email" class="" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                        <label>Mobile</label>
                                        <div class="position-relative">
                                            <input type="number" name="contact" class="" placeholder="Mobile" required>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                        <label>Residence</label>
                                        <div class="position-relative">
                                            <input type="text" name="residence" class="" placeholder="eg. Lapas, Accra" required>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                        <label>Residential / Digital Address</label>
                                        <div class="position-relative">
                                            <input type="text" name="res_address" class="" placeholder="eg. Box AC3552, Accra or Dig. Address" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    
                                    <div class="">
                                        <label>Guardian's Name</label>
                                        <div class="position-relative">
                                            <input type="text" name="guardian" class="" placeholder="Guardian's Full Name" required>
                                        </div>
                                    </div>

                                    <div class="input-group mb-8">
                                        <label>Relation to Guardian</label>
                                        <select name="guard_rel" class="" id="inputGroupSelect01">
                                            <option selected>Father</option>
                                            <option>Mother</option>
                                            <option>Brother</option>
                                            <option>Sister</option>
                                            <option>Uncle</option>
                                            <option>Aunty</option>
                                        </select>
                                    </div>
                                    
                                    <div class="">
                                        <label>Guardian's Contact</label>
                                        <div class="position-relative">
                                            <input type="number" name="guard_contact" class="" placeholder="Mobile" required>
                                        </div>
                                    </div>

                                    <div class="input-group mb-8">
                                        <label>Program</label>
                                        <select name="program" class="form-select" id="basicSelect">
                                            @foreach ($programs as $item)
                                                @if($item->del == 'no')
                                                    <option value="{{$item->id}}">{{$item->program_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    
                                    <div class="">
                                        <label>Choose Passport Photo</label>
                                        <div class="position-relative">
                                            <input name="pass_photo" type="file" class="" placeholder="Photo" id="inputGroupFile01" required>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="">
                                        <label>Choose Password <p class="small_p"> NOTE: This password will be required to login to the Students Portal</p></label>
                                        <div class="position-relative">
                                            <input type="password" id="password" class="" name="password" placeholder="Password" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="">
                                        <label>Confirm Password</label>
                                        <div class="position-relative">
                                            <input onkeyup="passCheck()" id="confirm_password" type="password" placeholder="Confirm Password" name="confirm_password" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    <p id="note1" class="warn_p">jj</p>

                                    <script>

                                        function mailcon() {
                                           fname = document.getElementById("fname").value;
                                           sname = document.getElementById("sname").value;
                                           sch_email = document.getElementById("sch_email");

                                           fname = fname.replace(/\s/g, '');
                                           sname = sname.replace(/\s/g, '');

                                           init = fname.charAt(0) + sname + '@chntc-akimoda.edu.gh';
                                           sch_email.value = init;
                                        }

                                        // document.getElementById("password").value = "5678";
                                        function passCheck() {
                                            note2 = document.getElementById("note2");
                                            pass1 = document.getElementById("password").value;
                                            pass2 = document.getElementById("confirm_password").value;
                                            // text = 'Hello World!';
                                            //     alert(pass2.length);
                                            // alert(document.getElementById("password").value);

                                            if (pass1.length == pass2.length && pass1 != pass2) {
                                                alert('Oops..! Passwords do not match');
                                                // document.getElementById("note2").style.display = "block";
                                                // document.getElementById("note2").innerHtml = "Passwords do not match";
                                            }
                                        }
                                    </script>

                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-4 offset-md-5">
                                    <p>&nbsp;</p>
                                    <button type="submit" name="store_action" value="add_student" class="sign_in">{{ __('SUBMIT') }}</button>
                                </div>
                            </div>
                        </form>
                      @endif

                    </div> 
                    <p class="rights">Copyright © 2021 PivoApps Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>