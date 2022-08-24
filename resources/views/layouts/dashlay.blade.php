<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PivoApps Hotel Assist</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dashdir/css/bootstrap.css">

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="/dashdir/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="/dashdir/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/dashdir/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/dashdir/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/dashdir/css/app.css">
    <link rel="stylesheet" href="/dashdir/css/main.css">
    <link rel="stylesheet" href="/maindir/css/feed_style_clean.css">
    <link rel="shortcut icon" href="/dashdir/images/favicon.svg" type="image/x-icon">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="/dashdir/images/logo/logo1.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                
                @yield('sidebar_menu')

                <button class="sidebar-toggler btn x"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div id="main" class='layout-navbar'>
            
            @yield('header_nav')

            <div class="top_space">
            </div>

            {{-- <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> --}}

            <div id="main-content">

                @yield('content')

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    {{-- <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div> --}}
                    <div class="">
                        {{-- <div class="float-end"> --}}
                        <p class="footer_txt">&nbsp;&nbsp;&nbsp;{{Date('Y')}} &copy; <span class="text-danger"></span> - <a
                                href="https://pivoapps.net">PivoApps</a></p>
                    </div>
                </div>
            </footer> 
        </div>
    </div>
    <script src="/dashdir/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/dashdir/js/bootstrap.bundle.min.js"></script>

    <!-- Include Choices JavaScript -->
    <script src="/dashdir/vendors/choices.js/choices.min.js"></script>
    <script src="/dashdir/js/pages/form-element-select.js"></script>

    <script src="/dashdir/vendors/apexcharts/apexcharts.js"></script>
    <script src="/dashdir/js/pages/dashboard.js"></script>

    <script src="/dashdir/js/main.js"></script>

</body>

</html>