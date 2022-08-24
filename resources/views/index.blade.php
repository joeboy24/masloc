
@extends('layouts.app')


@section('navlist')

  <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
  <li class="nav-item dropbtn"><a href="/about" class="nav-link">About</a></li>
  <li class="nav-item dropdown"><a href="" class="nav-link dropbtn">Admissions</a>
    <div class="dropdown-content">
      <a class="nav-item dropdown" href="/admissions#apply"><i class="fa fa-send li_icon"></i>&nbsp;&nbsp; How to Apply</a>
      <a class="nav-item dropdown" href="/admissions#programs"><i class="fa fa-graduation-cap li_icon"></i>&nbsp; Programs Offered</a>
    </div>
  </li>
  <li class="nav-item"><a href="/news" class="nav-link">News</a></li>
  {{-- <li class="nav-item dropdown"><a href="" class="nav-link dropbtn">Programs</a>
    <div class="dropdown-content">
      @foreach (session('program') as $program)
        <a href="/student_portal">{{ $program->program_name }}</a>
      @endforeach
    </div>
  </li> --}}
  <li class="nav-item dropdown"><a class="nav-link dropbtn">Portals</a>
    <div class="dropdown-content">
      <a href="https://portal.healthtraining.gov.gh/"><i class="fa fa-university li_icon"></i>&nbsp;&nbsp; HTI</a>
      <a href="/exam_portal"><i class="fa fa-pencil li_icon"></i>&nbsp;&nbsp; Examinations</a>
      <a href="/student_portal"><i class="fa fa-graduation-cap li_icon"></i>&nbsp; Student Portal</a>
      <a href="/staff_portal"><i class="fa fa-user-circle-o li_icon"></i>&nbsp;&nbsp; Staff Portal</a>
      <a href="/admin_portal"><i class="fa fa-unlock-alt li_icon"></i>&nbsp;&nbsp;&nbsp; Administration</a>
    </div>
  </li> 
  <li class="nav-item"><a href="#my_footer" class="nav-link">Contact</a></li>
  {{-- <li class="nav-item"><a href="/gallery" class="nav-link">Gallery</a></li> --}}
  <li class="nav-item cta"><a href="https://apply.healthtraining.gov.gh/application" class="nav-link"><span>Apply Now</span></a></li>
	        
@endsection


@section('content')

<section class="home-slider owl-carousel">
  {{-- @for ($i = 1; $i < 4; $i++) --}}
    <div class="slider-item" style="background-size:100%; background-image: url(/storage/classified/system_use/{{$homepage->img1_photo}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center" data-scrollax-parent="true">
          <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homepage->img1_title}}</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homepage->img1_text}}</p>
            <p class="start_application" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary px-4 py-3">Start Application</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-item" style="background-size:100%; background-image: url(/storage/classified/system_use/{{$homepage->img2_photo}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center" data-scrollax-parent="true">
          <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homepage->img2_title}}</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homepage->img2_text}}</p>
            <p class="start_application" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary px-4 py-3">Start Application</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-item" style="background-size:100%; background-image: url(/storage/classified/system_use/{{$homepage->img3_photo}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center" data-scrollax-parent="true">
          <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homepage->img3_title}}</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homepage->img3_text}}</p>
            <p class="start_application" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary px-4 py-3">Start Application</a></p>
          </div>
        </div>
      </div>
    </div>
  {{-- @endfor --}}
</section>

<!-- Appointment -->
<section class="ftco-intro">
  <div class="container">
    <div class="row no-gutters">
            
      <div id="my_appointment" class="col-md-8 color-3 p-4">
        <h3 class="mb-2">Make an Appointment</h3>
        <form action="#" class="appointment-form">
          <div class="row">
              <div class="col-sm-4">
              <div class="form-group">
                  <div class="select-wrap">
              <div class="icon"><span class="ion-ios-arrow-down"></span></div>
              <select name="" id="" class="form-control">
                <option>Department</option>
                @if (count($department) != 0)
                  @foreach ($department as $dept)
                    <option>{{$dept->dept_name}}</option>
                  @endforeach
                @endif
              </select>
              </div>
                  </div>
          </div>
          <div class="col-sm-4">
              <div class="form-group">
                  <div class="icon"><span class="icon-user"></span></div>
                  <input type="text" class="form-control" id="appointment_name" placeholder="Name">
                  </div>
          </div>
          <div class="col-sm-4">
              <div class="form-group">
                  <div class="icon"><span class="icon-paper-plane"></span></div>
                  <input type="text" class="form-control" id="appointment_email" placeholder="Email">
                  </div>
          </div>
          </div>
          <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <div class="icon"><span class="ion-ios-calendar"></span></div>
              <input type="text" class="form-control appointment_date" placeholder="Date">
              </div>    
          </div>
          <div class="col-sm-4">
              <div class="form-group">
                  <div class="icon"><span class="ion-ios-clock"></span></div>
              <input type="text" class="form-control appointment_time" placeholder="Time">
              </div>
          </div>
          <div class="col-sm-4">
              <div class="form-group">
                  <div class="icon"><span class="icon-phone2"></span></div>
              <input type="text" class="form-control" id="phone" placeholder="Phone">
              </div>
          </div>
          </div>
          
          <div class="form-group">
          <input type="submit" value="Make an Appointment" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="col-md-4 color-1 p-4">
        <h3 class="mb-4">Our Contact Details</h3>
        <p>Email: {{$company->email}}<br>Loc. {{$company->location}}</p>
        <span class="phone-number">{{$company->contact}}</span>
      </div>
    </div>
  </div>
</section>

<!-- Our Goal -->
<section class="my_section1 myBg">
  <div class="bg_overlay">
    <div class="blank_space2" style="height: 70px"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 goal_left">
          <h2>Our</h2>
          <h2>Goal</h2>
          {{-- <div class="blank_space" style="height: 30px"></div> --}}
          <p class="phone_globe"><i class="fa fa-globe"></i>&nbsp;&nbsp;{{ $company->website }}</p>
          {{-- <p class="phone_globe">{{ $company->name }}</p> --}}
        </div>

        <div class="col-md-9 goal_right">
          <h2>{{$homepage->goals_body}}</h2>
          <p class="phone_globe">{{ $company->name }}</p>
          <p class="phone_globe"><i class="fa fa-phone-square"></i>&nbsp;&nbsp;{{ $company->contact }}</p>
        </div>
      </div>
    </div>
    <div class="blank_space2" style="height: 70px"></div>
  </div>
</section>

<!-- events and News -->
<section class="my_section1 container">
  <div class="row">
    <div class="col-md-4 events">
      <div class="col-md-8 offset-md-4 heading-section ftco-animate">
        <h2 class="mb-2 float_right"><i class="fa fa-events"></i> Events</h2>
      </div><p class="events_line"></p>

      <div class="row">
        {{-- <div class=""> --}}
          <div class="event_date_container">
            <p class="event_day">{{ date('d', strtotime(session('event')->date_added)) }}<span></span></p>
            <p class="event_month">{{ date('M', strtotime(session('event')->date_added)) }}</p>
          </div>
          <div class="event_container">
            <img src="/storage/classified/events/{{ session('event')->dp }}" width="100%">
            <p class="event_text">{{session('event')->title}}</p>
            <p class="clock_map"><i class="fa fa-clock-o">&nbsp;&nbsp;&nbsp;</i>{{session('event')->duration}}</p>
            <p class="clock_map"><i class="fa fa-map-marker">&nbsp;&nbsp;&nbsp;&nbsp;</i>{{session('event')->venue}}</p>
            <a href="/all_events"><p class="myA">View more...</p></a>
          </div>
        {{-- </div> --}}
      </div>

    </div>

    <div class="col-md-8 events_right">
      <div class="col-md-8 heading-section ftco-animate">
        <h2 class="mb-2">News & Updates</h2>
      </div><p class="events_right_line"></p>
      {{-- <h2 class="mb-2">News & Updates</h2> --}}
      <div class="row">
        @foreach (session('newsblog6') as $blog)
          <a href="/guestpages/{{ $blog->id }}"><div class="col-md-5 block-21 mb-4 d-flex events_right_div">
              <a href="/guestpages/{{ $blog->id }}" class="blog-img mr-4" style="background-image: url(/storage/classified/news_blog/{{$blog->dp}}); border-radius: 5px"></a>
              <div class="text">
                  <h3 class="heading"><a href="/guestpages/{{ $blog->id }}"> <b>{{ substr($blog->title, 0, 35) }}...</b></a></h3>
                  <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> {{ $blog->date_added }}</a></div>
                  {{-- <div><a href="#"><span class="icon-person"></span> {{ $blog->user->name }}</a></div> --}}
                  <div><a href="#"><span class="icon-chat"></span> {{ count($blog->comment) }}</a></div>
                  </div>
              </div>
          </div></a>
        @endforeach
      </div>
        <a href="/news"><button type="button" class="btn_red_inverse">Load More</button></a>
    </div>
  </div>
</section>

<!-- Covid Notice -->
<section class="my_section2 container">
  <img src="/storage/classified/system_use/0122_4bbdcc0.png" width="100%">
  <div class="blank_space" style="height: 70px"></div>
</section>

<!-- Fresher's -->
<section class="my_section1">
  <div class="freshers">
    
    <div class="freshers_left">
      <h2>FRESHER'S GUIDE</h2>
      <h3>The School currently runs a 3year 
        HND Nursing programme with options in the final year. 
        The options are: Dip. Public Health Nursing, Dip. Post Basic Midwifery, 
        Cert. Community Health Nursing.
      </h3>
    </div>

    <div class="freshers_center">
      <img src="/storage/classified/nursing/n2.jpeg" width="100%">
      {{-- <img src="/storage/classified/system_use/0222_6a182a1.jpeg" width="100%"> --}}
      <p>PHOTOSHOOT TRIVIAL</p>
    </div>

    <div class="freshers_right">
    </div>

  </div>
</section>

<!-- Admissions -->
<section class="my_section1 myBlue2">
  <div class="blank_space" style="height: 70px"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 admi_left">
        <h2>{{ date('Y') }}</h2>
        <h2>Registration</h2>
        <h3>Gone Digital</h3>
        <a href="/sregister_course"><button type="button" class="admi_inverse">Register Now</button></a>
        <p class="phone_globe">chntc-akimoda.edu.gh/apply-now</p>
        <p class="phone_globe"><i class="fa fa-phone-square"></i>&nbsp;&nbsp;&nbsp;+233 (0)24 265 6449 &nbsp;&nbsp;&nbsp; 
        <i class="fa fa-globe"></i>&nbsp;&nbsp;chntc-akimoda.edu.gh</p>
      </div>

      <div class="col-md-6 admi_right">
        <img src="/storage/classified/system_use/admi_right_yellow.png" width="100%">
      </div>
    </div>
  </div>
  <div class="blank_space" style="height: 70px"></div>
</section>

<!-- Our Goals -->
{{-- <section class="ftco-section ftco-services">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-2">{{$homepage->goals_header}}</h2>
        <p>{{$homepage->goals_body}}</p>
      </div>
    </div>

    <div class="row">

        @if ($homepage->goal1_title != '')
          @if ($homepage->goal2_title == '' && $homepage->goal3_title == '' && $homepage->goal4_title == '')
            <div class="col-md-10 offset-md-1 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title == '' && $homepage->goal3_title != '' && $homepage->goal4_title != '' || $homepage->goal2_title != '' && $homepage->goal3_title == '' && $homepage->goal4_title != '' || $homepage->goal2_title != '' && $homepage->goal3_title != '' && $homepage->goal4_title == '')
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title == '' && $homepage->goal3_title == '' && $homepage->goal4_title != '' || $homepage->goal2_title == '' && $homepage->goal3_title != '' && $homepage->goal4_title == '' || $homepage->goal2_title != '' && $homepage->goal3_title == '' && $homepage->goal4_title == '')
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title != '' && $homepage->goal3_title != '' && $homepage->goal4_title != '')
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          @endif
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="flaticon-anesthesia"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{$homepage->goal1_title}}</h3>
                <p>{{$homepage->goal1_text}}</p>
              </div>
            </div>      
          </div>
        @endif

        @if ($homepage->goal2_title != '')
          @if ($homepage->goal1_title == '' && $homepage->goal3_title == '' && $homepage->goal4_title == '')
            <div class="col-md-10 offset-md-1 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal1_title == '' && $homepage->goal3_title != '' && $homepage->goal4_title != '' || $homepage->goal1_title != '' && $homepage->goal3_title == '' && $homepage->goal4_title != '' || $homepage->goal1_title != '' && $homepage->goal3_title != '' && $homepage->goal4_title == '')
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal1_title == '' && $homepage->goal3_title == '' && $homepage->goal4_title != '' || $homepage->goal1_title == '' && $homepage->goal3_title != '' && $homepage->goal4_title == '' || $homepage->goal1_title != '' && $homepage->goal3_title == '' && $homepage->goal4_title == '')
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal1_title != '' && $homepage->goal3_title != '' && $homepage->goal4_title != '')
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          @endif
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="flaticon-tooth-1"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{$homepage->goal2_title}}</h3>
                <p>{{$homepage->goal2_text}}</p>
              </div>
            </div>    
          </div>
        @endif

        @if ($homepage->goal3_title != '')
          @if ($homepage->goal2_title == '' && $homepage->goal1_title == '' && $homepage->goal4_title == '')
            <div class="col-md-10 offset-md-1 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title == '' && $homepage->goal1_title != '' && $homepage->goal4_title != '' || $homepage->goal2_title != '' && $homepage->goal1_title == '' && $homepage->goal4_title != '' || $homepage->goal2_title != '' && $homepage->goal1_title != '' && $homepage->goal4_title == '')
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title == '' && $homepage->goal1_title == '' && $homepage->goal4_title != '' || $homepage->goal2_title == '' && $homepage->goal1_title != '' && $homepage->goal4_title == '' || $homepage->goal2_title != '' && $homepage->goal1_title == '' && $homepage->goal4_title == '')
            <div class="col-md-5 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title != '' && $homepage->goal1_title != '' && $homepage->goal4_title != '')
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          @endif
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="flaticon-tooth-with-braces"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{$homepage->goal3_title}}</h3>
                <p>{{$homepage->goal3_text}}</p>
              </div>
            </div>      
          </div>
        @endif

        @if ($homepage->goal4_title != '')
          @if ($homepage->goal2_title == '' && $homepage->goal3_title == '' && $homepage->goal1_title == '')
            <div class="col-md-10 offset-md-1 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title == '' && $homepage->goal3_title != '' && $homepage->goal1_title != '' || $homepage->goal2_title != '' && $homepage->goal3_title == '' && $homepage->goal1_title != '' || $homepage->goal2_title != '' && $homepage->goal3_title != '' && $homepage->goal1_title == '')
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title == '' && $homepage->goal3_title == '' && $homepage->goal1_title != '' || $homepage->goal2_title == '' && $homepage->goal3_title != '' && $homepage->goal1_title == '' || $homepage->goal2_title != '' && $homepage->goal3_title == '' && $homepage->goal1_title == '')
            <div class="col-md-5 d-flex align-self-stretch ftco-animate">
          @elseif ($homepage->goal2_title != '' && $homepage->goal3_title != '' && $homepage->goal1_title != '')
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          @endif
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="flaticon-dental-care"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{$homepage->goal4_title}}</h3>
                <p>{{$homepage->goal4_text}}</p>
              </div>
            </div>      
          </div>
        @endif

    </div>

  </div>
  <div class="container-wrap mt-5">
    <div class="row d-flex no-gutters">
      <div class="col-md-6 img" style="background-image: url(/storage/classified/system_use/{{$homepage->headteacher_photo}});">
      </div>
      <div class="col-md-6 d-flex">
        <div class="about-wrap">
          <div class="heading-section heading-section-white mb-5 ftco-animate">
            <h2 class="mb-2">{{$homepage->meet_header}}</h2>
            <p>{{$homepage->meet_body}}</p>
          </div>

          @if ($homepage->meet1_title != '')
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>{{$homepage->meet1_title}}</h3>
                <p>{{$homepage->meet1_text}}</p>
              </div>
            </div>
          @endif

          @if ($homepage->meet2_title != '')
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>{{$homepage->meet2_title}}</h3>
                <p>{{$homepage->meet2_text}}</p>
              </div>
            </div>
          @endif

          @if ($homepage->meet3_title != '')
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>{{$homepage->meet3_title}}</h3>
                <p>{{$homepage->meet3_text}}</p>
              </div>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</section> --}}

<!-- Out Team -->
{{-- <section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-3">Meet Our Experience Lecturers</h2>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        <div class="staff">
          <div class="img mb-4" style="background-image: url(/maindir/images/person_5.jpg);"></div>
          <div class="info text-center">
            <h3><a href="teacher-single.html">Tom Smith</a></h3>
            <span class="position">Lecturers</span>
            <div class="text">
              <p>Far far away, behind the word mountains, far from the countries Vokalia</p>
              <ul class="ftco-social">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        <div class="staff">
          <div class="img mb-4" style="background-image: url(/maindir/images/person_6.jpg);"></div>
          <div class="info text-center">
            <h3><a href="teacher-single.html">Mark Wilson</a></h3>
            <span class="position">Lecturers</span>
            <div class="text">
              <p>Far far away, behind the word mountains, far from the countries Vokalia</p>
              <ul class="ftco-social">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        <div class="staff">
          <div class="img mb-4" style="background-image: url(/maindir/images/person_7.jpg);"></div>
          <div class="info text-center">
            <h3><a href="teacher-single.html">Patrick Jacobson</a></h3>
            <span class="position">Lecturers</span>
            <div class="text">
              <p>Far far away, behind the word mountains, far from the countries Vokalia</p>
              <ul class="ftco-social">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        <div class="staff">
          <div class="img mb-4" style="background-image: url(/maindir/images/person_8.jpg);"></div>
          <div class="info text-center">
            <h3><a href="teacher-single.html">Ivan Dorchsner</a></h3>
            <span class="position">System Analyst</span>
            <div class="text">
              <p>Far far away, behind the word mountains, far from the countries Vokalia</p>
              <ul class="ftco-social">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row  mt-5 justify-conten-center">
      <div class="col-md-8 ftco-animate">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi vero accusantium sunt sit aliquam ipsum molestias autem perferendis, incidunt cumque necessitatibus cum amet cupiditate, ut accusamus. Animi, quo. Laboriosam, laborum.</p>
      </div>
    </div>
  </div>
</section> -->

<!-- News -->
<section class="ftco-section"> 
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-2">CHNTC NEWS</h2>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20" style="background-image: url('/storage/classified/Nursing/n4.jpeg');">
            </a>
            <div class="text d-flex py-4">
              <div class="meta mb-3">
                <div><a href="#">Sep. 20, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <div class="desc pl-3">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry" data-aos-delay="100">
            <a href="blog-single.html" class="block-20" style="background-image: url('/maindir/images/image_2.jpg');">
            </a>
            <div class="text d-flex py-4">
              <div class="meta mb-3">
                <div><a href="#">Sep. 20, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <div class="desc pl-3">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry" data-aos-delay="200">
            <a href="blog-single.html" class="block-20" style="background-image: url('/storage/classified/Nursing/n6.jpeg');">
            </a>
            <div class="text d-flex py-4">
              <div class="meta mb-3">
                <div><a href="#">Sep. 20, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <div class="desc pl-3">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Achievements -->
<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('/storage/classified/Nursing/n7.jpeg');" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-md-3 aside-stretch py-5">
        <div class=" heading-section heading-section-white ftco-animate pr-md-4">
          <h2 class="mb-3">Our History</h2>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
        </div>
      </div>
      <div class="col-md-9 py-5 pl-md-5">
        <div class="row">
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="14">0</strong>
                <span>Years of Experience</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="4500">0</strong>
                <span>Qualified Lecturers</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="4200">0</strong>
                <span>Happy Smiling Customer</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="320">0</strong>
                <span>Patients Per Year</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Section -->
{{-- <section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-3">Our Best Pricing</h2>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 ftco-animate">
        <div class="pricing-entry pb-5 text-center">
          <div>
            <h3 class="mb-4">Basic</h3>
            <p><span class="price">$24.50</span> <span class="per">/ session</span></p>
          </div>
          <ul>
            <li>Diagnostic Services</li>
            <li>Professional Consultation</li>
            <li>Tooth Implants</li>
            <li>Surgical Extractions</li>
            <li>Teeth Whitening</li>
          </ul>
          <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        </div>
      </div>
      <div class="col-md-3 ftco-animate">
        <div class="pricing-entry pb-5 text-center">
          <div>
            <h3 class="mb-4">Standard</h3>
            <p><span class="price">$34.50</span> <span class="per">/ session</span></p>
          </div>
          <ul>
            <li>Diagnostic Services</li>
            <li>Professional Consultation</li>
            <li>Tooth Implants</li>
            <li>Surgical Extractions</li>
            <li>Teeth Whitening</li>
          </ul>
          <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        </div>
      </div>
      <div class="col-md-3 ftco-animate">
        <div class="pricing-entry active pb-5 text-center">
          <div>
            <h3 class="mb-4">Premium</h3>
            <p><span class="price">$54.50</span> <span class="per">/ session</span></p>
          </div>
          <ul>
            <li>Diagnostic Services</li>
            <li>Professional Consultation</li>
            <li>Tooth Implants</li>
            <li>Surgical Extractions</li>
            <li>Teeth Whitening</li>
          </ul>
          <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        </div>
      </div>
      <div class="col-md-3 ftco-animate">
        <div class="pricing-entry pb-5 text-center">
          <div>
            <h3 class="mb-4">Platinum</h3>
            <p><span class="price">$89.50</span> <span class="per">/ session</span></p>
          </div>
          <ul>
            <li>Diagnostic Services</li>
            <li>Professional Consultation</li>
            <li>Tooth Implants</li>
            <li>Surgical Extractions</li>
            <li>Teeth Whitening</li>
          </ul>
          <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<!-- Students Testimony -->
@if (count($testimonies) > 0)
  <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-2">Students Say!</h2>
          <span class="subheading">Comments From Our Humble Students</span>
        </div>
      </div>
      <div class="row justify-content-center ftco-animate">
        <div class="col-md-8">
          <div class="carousel-testimony owl-carousel ftco-owl">

            @foreach ($testimonies as $testimony)
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(/storage/classified/gallery/{{ $testimony->photo }})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5">{{ $testimony->text }}</p>
                    <p class="name">{{ $testimony->name }}</p>
                    <span class="position">{{ $testimony->position }}</span>
                  </div>
                </div>
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

<!-- Curious -->
<section class="ftco-quote">
  <div class="container">
    <div class="row">
      <div class="col-md-6 pr-md-5 aside-stretch py-5 choose">
        <div class="heading-section heading-section-white mb-5 ftco-animate">
          <h2 class="mb-2">{{ $homepage->curious_header }}</h2>
        </div>
        <div class="ftco-animate">
          <p>{{ $homepage->curious_body }}</p>
          <ul class="un-styled my-5">
            @if ($homepage->cur_bul1 != '')<li><span class="icon-check"></span>{{ $homepage->cur_bul1 }}</li>@endif
            @if ($homepage->cur_bul2 != '')<li><span class="icon-check"></span>{{ $homepage->cur_bul2 }}</li>@endif
            @if ($homepage->cur_bul3 != '')<li><span class="icon-check"></span>{{ $homepage->cur_bul3 }}</li>@endif
            @if ($homepage->cur_bul4 != '')<li><span class="icon-check"></span>{{ $homepage->cur_bul4 }}</li>@endif
          </ul>
        </div>
      </div>
      <div class="col-md-6 py-5 pl-md-5">
        @include('inc.messages')
        <div class="heading-section mb-5 ftco-animate">
          <h2 class="mb-2">Ask a Question?</h2>
        </div>
        <form action="{{ action('GuestPagesController@store') }}" class="ftco-animate" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="contact" name="phone" class="form-control" placeholder="Phone" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
            </div>
              {{-- <div class="col-md-6"> --}}
            <div class="col-md-12">
              <div class="form-group">
                  <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <button type="submit" name="store_action" value="Ask_Us" class="btn btn-primary py-3 px-5">Ask Us</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Gallery -->
<section class="ftco-gallery">
  <div class="container-wrap">
    <div class="row no-gutters">
      @foreach ($gallery as $item)
        <div class="col-md-3 ftco-animate">
          {{-- <li class="nav-item cta"><a class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Apply Now</span></a></li> --}}
            <a href="#" class="gallery img d-flex align-items-center" data-toggle="modal" data-target="#imgRequest{{$item->id}}" style="background-image: url(/storage/classified/gallery/{{$item->photo}});">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                  <span class="icon-search"></span>
              </div>
            </a>
        </div>

        <div class="modal fade" id="imgRequest{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="imgRequestLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="imgRequestLabel">Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              
                <img src="/storage/classified/gallery/{{$item->photo}}" width="100%">
                
              </div>
              
            </div>
          </div>
        </div>

      @endforeach
      <a href="/gallery"  class="gallery_btn"><span>View More..</span></a>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="ftco-section-parallax">
  <div class="parallax-img d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
        <div class="col-md-8 offset-md-2 text-center heading-section heading-section-white ftco-animate">
          <h2>Subcribe to our Newsletter</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
              <form action="{{ action('GuestPagesController@store') }}" class="subscribe-form" method="POST">
                @csrf
                <div class="form-group d-flex">
                  <input type="email" name="email" class="form-control" placeholder="Enter email address">
                  <input type="submit" name="store_action" value="Subscribe" class="submit px-3" onclick="alert('Subscription Successful!')">
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- <div id="map"></div> --}}


@endsection
    
  