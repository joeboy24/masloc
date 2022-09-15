
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active">
                <a href="/wdash" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-address-book"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-clipboard"></i>
                    <span>Leave Mgt.</span><b class="menu_figure yellow_bg"><i class="fa fa-warning"></i></b>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-credit-card-alt"></i>
                    <span>Pay Status</span><b class="menu_figure green_bg"><i class="fa fa-check"></i></b>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-envelope"></i>
                    <span>Inbox</span><b class="menu_figure green_bg">&nbsp;73&nbsp;</b>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-suitcase"></i>
                    <span>Loan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-file-text"></i>
                    <span>Report</span>
                </a>
            </li>

        </ul>
    </div>
    
@endsection

@section('content')


    <div class="page-heading">
        <h3><i class="fa fa-th-large color2"></i>&nbsp;&nbsp;My Dashboard</h3>
    </div>

    <section class="menu_content">
        <a href="#"><button class="menu_btn"><i class="fa fa-address-card color5"></i><p>Profile</p></button></a>
        <a href="#"><button class="menu_btn"><i class="fa fa-clipboard color2"></i><p>Apply Leave</p></button></a>
        <a href="#"><button class="menu_btn"><i class="fa fa-suitcase color3"></i><p>Apply Loan</p></button></a>
        <a href="#"><button class="menu_btn"><i class="fa fa-envelope-o color7"></i><p>Inbox</p></button></a>
        <a href="#"><button class="menu_btn"><i class="fa fa-credit-card-alt"></i><p>Pay Status</p></button></a>
        <a href="#"><button class="menu_btn"><i class="fa fa-file-text color6"></i><p>Reports</p></button></a>
    </section>

    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages') 
            <div class="">
                
            </div>
        </div>
    </div>
        

@endsection

 