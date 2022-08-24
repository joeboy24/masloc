
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
    {{-- <body class="login_body" style="background-image: url('/storage/classified/Nursing/n3.jpeg');"> --}}
    <body class="login_body" style="background-image: url('/storage/classified/Nursing/img4.jpg');">
    {{-- <body class="login_body" style="background-image: url('/storage/classified/Nursing/img3.jpg');"> --}}
        <div class="my_overlay">
            <div class="row">
                <div class="login_container">
                    <div class="col-md-12 login_container_inner">
                    @include('inc.messages')
                        {{-- <img src="/storage/classified/Nursing/n0.png"> --}}
                      @if (session('staff_reg_status')==1)
                        <h5 class="small_p">PROCEED LOGIN TO...</h5>
                        <div class="row mb-0">
                            <div class="col-md-5 offset-md-3">
                                <p>&nbsp;</p>
                                <a href="/ldashboard"><button type="submit" class="sign_in">STAFF PORTAL</button></a>
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
                                    <div class="input-group mb-8">
                                        <label>Title</label>
                                        <select name="title" class="" id="inputGroupSelect01">
                                            <option selected>Mr.</option>
                                            <option>Mrs.</option>
                                            <option>Miss</option>
                                            <option>Dr.</option>
                                            <option>Ing.</option>
                                            <option>Prof.</option>
                                        </select>
                                    </div>

                                    <div class="">
                                        <label>Firstname</label>
                                        <div class="position-relative">
                                            <input onkeyup="mailcon()" type="text" id="fname" name="fname" class="" placeholder="eg. John" required>
                                            
                                        </div>
                                    </div>

                                    <div class="">
                                        <label>Othernames</label>
                                        <div class="position-relative">
                                            <input onkeyup="mailcon()" type="text" id="sname" name="sname" class="" placeholder="eg. Doe" required>
                                            
                                        </div>
                                    </div>

                                    <div class="">
                                        <label>Date of Birth</label>
                                        <div class="position-relative">
                                            <input type="date" name="dob" class="" placeholder="dd/mm/yyyy" required>
                                            
                                        </div>
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

                                </div>

                                <div class="col-md-6">
                                    
                                    <div class="">
                                        <label>Mobile</label>
                                        <div class="position-relative">
                                            <input type="number" name="contact" class="" placeholder="Mobile" required>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-8">
                                        <label>Role</label>
                                        <select name="role" class="" id="inputGroupSelect01">
                                            <option selected>Lecturer</option>
                                            <option>Staff</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    

                                    <div class="input-group mb-8">
                                        <label>Faculty/Department</label>
                                        <select name="dept" class="form-select" id="basicSelect">
                                            @foreach ($departments as $item)
                                                @if($item->del == 'no')
                                                    <option value="{{$item->id}}">{{$item->dept_name}}</option>
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
                                        <label>Choose Password <p class="small_p"> NOTE: This password will be used to login to the Staff Portal</p></label>
                                        <div class="position-relative">
                                            <input type="password" class="" placeholder="Password" name="password" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="">
                                        <label>Confirm Password</label>
                                        <div class="position-relative">
                                            <input onkeyup="passCheck()" id="confirm_password" placeholder="Confirm Password" type="password" name="confirm_password" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    <p id="note1" class="warn_p">gfjhg</p>

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
                                    <button type="submit" name="store_action" value="add_staff2" class="sign_in">{{ __('SUBMIT') }}</button>
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