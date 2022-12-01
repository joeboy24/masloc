
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item">
                <a href="/" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item active has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-users"></i>
                    <span>Employee</span>
                </a>
                <ul class="submenu active">
                    <li class="submenu-item">
                        <a href="/add_employee">Add Employee</a>
                    </li>
                    <li class="submenu-item active">
                        <!--a href="/pay_employee">Upload Data</a-->
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
                </ul>
            </li>

        </ul>
    </div>
    
@endsection

@section('content')


    <div class="page-heading">
        <h3><i class="fa fa-file-text color6"></i>&nbsp;&nbsp;Employee Management</h3>
        <a href="/emp_report"><p class="print_report">&nbsp;<i class="fa fa-print"></i>&nbsp; Print Emp. Report</p></a>&nbsp;
        {{-- <a href="#"><button type="submit" class="print_btn_small"><i class="fa fa-refresh"></i></button></a> --}}
    </div>

    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">


                    <div class="row black_bottom">
                        
                        <!-- Uploads -->
                        <div class="col-md-12 my_borders">
                            <form class="form form-horizontal" action="{{action('EmployeeController@store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h5>Upload Employees Data</h5>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input type="file" name="ex_file" multiple class="form-control" id="inputGroupFile01" >
                                </div>

                                <div style="height: 20px"></div>
                                <h6>NOTE</h6>
                                {{-- <p class="gray_p">"Gallery Use" means image will be available to the public. ie. on gallery page</p> --}}
                                <p class="mid_p">Check file extention before clicking on upload</p>
                                <p class="small_p">System may only accept Excel files</p>

                                <div style="height: 10px"></div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-dark me-1 mb-1" name="store_action" value="import_employee">Upload</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        

@endsection

 