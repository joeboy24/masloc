
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tarrifs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="/maindir/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/maindir/css/animate.css">
    
    <link rel="stylesheet" href="/maindir/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/maindir/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/maindir/css/magnific-popup.css">

    <link rel="stylesheet" href="/maindir/css/aos.css">

    <link rel="stylesheet" href="/maindir/css/ionicons.min.css">

    <link rel="stylesheet" href="/maindir/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/maindir/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/maindir/css/flaticon.css">
    <link rel="stylesheet" href="/maindir/css/icomoon.css">
    <link rel="stylesheet" href="/maindir/css/style.css">
    {{-- <link rel="stylesheet" href="/dashdir/css/bootstrap.css"> --}}
    {{-- <link rel="stylesheet" href="/dashdir/css/app.css">
    <link rel="stylesheet" href="/dashdir/css/main.css"> --}}
    <link rel="stylesheet" href="/maindir/css/feed_style_clean.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('head')

  </head>
  <body>
    
	  {{-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
        <img class="sch_logo" src="/storage/classified/Nursing/n0.png">
	      <a class="navbar-brand" href="/"><span>1</span>-2
        <p class="sch_name">{{ session('company')->id }}</p></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">

                @yield('navlist')

	        </ul>
	      </div>
	    </div>
	  </nav> --}}

    <!-- END nav -->
    
      {{-- @yield('content') --}}

    {{-- <footer class="ftco-footer ftco-bg-dark ftco-section" id="my_footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">CHNTC</h2>
              <p>{{session('homepage')->goals_body}}</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
          

            @if (session('newsblog') != '')
                <div class="col-md-5 pr-md-4">
                    <div class="ftco-footer-widget mb-4">

                        <h2 class="ftco-heading-2">Recent News</h2>

                        @foreach (session('newsblog') as $blog)
                        <div class="block-21 mb-4 d-flex">
                            <a href="/guestpages/{{ $blog->id }}" class="blog-img mr-4" style="background-image: url(/storage/classified/news_blog/{{$blog->dp}}); border-radius: 5px"></a>
                            <div class="text">
                                <h3 class="heading"><a href="/guestpages/{{ $blog->id }}"> {{ substr($blog->text, 0, 60) }}...</a></h3>
                                <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> {{ $blog->date_added }}</a></div>
                                <div><a href="#"><span class="icon-person"></span> {{ $blog->user->name }}</a></div>
                                <div><a href="#"><span class="icon-chat"></span> {{ count($blog->comment) }}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            @endif

          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Office</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">{{ session('company')->location }}</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ session('company')->contact }}</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ session('company')->email }}</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="footer-bottom">
        <div class="container">
            <p class="">Copyright © 2021 PivoApps Inc. All rights reserved. <span class="float_right2">Powered by <a target="_blank" href="/https://www.pivoapps.net">PivoApps</a></span></p>
        </div>
    </div> --}}


  {{-- <section class="test_section">
  </section> --}}


  @yield('header_text')


  @yield('main_content')


  @yield('footer_menu')

  {{-- <div style="background: royalblue; margin:0!important; padding:0!important">
    Clear
  </div> --}}
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Apply Now</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
              <input type="text" class="form-control" id="appointment_name" placeholder="Full Name">
            </div>
            <div class="form-group">
              <!-- <label for="appointment_email" class="text-black">Email</label> -->
              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_date" class="text-black">Date</label> -->
                  <input type="text" class="form-control appointment_date" placeholder="Date">
                </div>    
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_time" class="text-black">Time</label> -->
                  <input type="text" class="form-control appointment_time" placeholder="Time">
                </div>
              </div>
            </div>
            

            <div class="form-group">
              <!-- <label for="appointment_message" class="text-black">Message</label> -->
              <textarea name="" id="appointment_message" class="form-control" cols="30" rows="5" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Apply Now" class="btn btn-primary">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>


  <script src="/maindir/js/jquery.min.js"></script>
  <script src="/maindir/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/maindir/js/popper.min.js"></script>
  <script src="/maindir/js/bootstrap.min.js"></script>
  <script src="/maindir/js/jquery.easing.1.3.js"></script>
  <script src="/maindir/js/jquery.waypoints.min.js"></script>
  <script src="/maindir/js/jquery.stellar.min.js"></script>
  <script src="/maindir/js/owl.carousel.min.js"></script>
  <script src="/maindir/js/jquery.magnific-popup.min.js"></script>
  <script src="/maindir/js/aos.js"></script>
  <script src="/maindir/js/jquery.animateNumber.min.js"></script>
  <script src="/maindir/js/bootstrap-datepicker.js"></script>
  <script src="/maindir/js/jquery.timepicker.min.js"></script>
  <script src="/maindir/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/maindir/js/google-map.js"></script>
  <script src="/maindir/js/main.js"></script>
    
  </body>
</html>
