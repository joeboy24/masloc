
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active">
                <a href="/" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-users"></i>
                    <span>Employee</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="/add_employee">Add Employee</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/pay_employee">Upload Data</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/view_employee">View/Edit Data</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/allowance">Allowance</a>
                    </li>
                    {{-- <li class="submenu-item ">
                        <a href="#">Accounts</a>
                    </li> --}}
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="/taxation" class='sidebar-link'>
                    <i class="fa fa-bar-chart"></i>
                    <span>Taxation</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/salaries" class='sidebar-link'>
                    <i class="fa fa-pie-chart"></i>
                    <span>Salary</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/loans" class='sidebar-link'>
                    <i class="fa fa-money"></i>
                    <span>Staff Loans</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/banksummary" class='sidebar-link'>
                    <i class="fa fa-bank"></i>
                    <span>Banks Summary</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/leaves" class='sidebar-link'>
                    <i class="fa fa-clipboard"></i>
                    <span>Leave Mgt.</span><b class="menu_figure yellow_bg">{{session('leave_count')}}</b>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/birthdays" class='sidebar-link'>
                    <i class="fa fa-gift"></i>
                    <span>Birthdays</span><b class="menu_figure green_bg">{{session('bday_count')}}</b>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/reports" class='sidebar-link'>
                    <i class="fa fa-file-text"></i>
                    <span>Reports</span>
                </a>
            </li>

            <!--li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-calendar"></i>
                    <span>Calendar</span>
                </a>
            </li-->

            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="/companysetup">Company Setup</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/adduser">Manage User</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/add_dept">Add Department</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/sal_cat">Salary Category</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/allowance_mgt">Manage Allowance</a>
                    </li>
                    {{-- <li class="submenu-item ">
                        <a href="#">Accounts</a>
                    </li> --}}
                </ul>
            </li>

        </ul>
    </div>
    
@endsection

@section('content')


    <div class="page-heading">
        @include('inc.messages') 
        <h3><i class="fa fa-th-large color2"></i>&nbsp;&nbsp;Dashboard</h3>
        {{-- <a href="/emp_report"><p class="print_report">&nbsp;<i class="fa fa-print"></i>&nbsp; Print Emp. Report</p></a>&nbsp; --}}
        <div class="dash_header">
            <div class="bg7 color8">
                <i class="fa fa-address-book"></i>
                <p>Employees</p>
                <h4>{{session('emp_count')}}</h4>
            </div>
            <div class="green_bg color8">
                <i class="fa fa-area-chart"></i>
                <p>Net {{date('M')}}. Salary</p>
                <h4>{{session('sal_sum')}}</h4>
            </div>
            <div class="bg1 color8">
                <i class="fa fa-gift"></i>
                <p>{{date('M')}}. Birthdays</p>
                <h4>{{session('bday_count')}}</h4>
            </div>
            <div class="bg3 color8">
                <i class="fa fa-unlock-alt"></i>
                <p>System Users</p>
                <h4>{{session('system_users')}}</h4>
            </div>
        </div>
    </div>

    <section class="menu_content">
        <a href="/view_employee"><button class="menu_btn"><i class="fa fa-address-card color5"></i><p>Employee Mgt</p></button></a>
        <a href="/leaves"><button class="menu_btn"><i class="fa fa-clipboard color2"></i><p>Leave Mgt</p></button></a>
        <a href="/birthdays"><button class="menu_btn"><i class="fa fa-gift color1"></i><p>Birthdays</p></button></a>
        <a href="/taxation"><button class="menu_btn"><i class="fa fa-bar-chart color7"></i><p>Taxation</p></button></a>
        <a href="/salaries"><button class="menu_btn"><i class="fa fa-credit-card-alt"></i><p>Salaries</p></button></a>
        <a href="/banksummary"><button class="menu_btn"><i class="fa fa-bank color5"></i><p>Bank Summary</p></button></a>
        <a href="/loans"><button class="menu_btn"><i class="fa fa-suitcase color4"></i><p>Staff Loans</p></button></a>
        {{-- <button class="menu_btn"><i class="fa fa-cc-visa"></i><p>Payments</p></button></a> --}}
        <a href="/reports"><button class="menu_btn"><i class="fa fa-file-text color6"></i><p>Reports</p></button></a>
        <a href="/settings"><button class="menu_btn"><i class="fa fa-gears color3"></i><p>Settings</p></button></a>
    </section>
        

@endsection

 