
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
                        <!--a href="/pay_employee">Upload Data</a-->
                    </li>
                    <li class="submenu-item">
                        <a href="/view_employee">View/Edit Data</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/allowance">Allowance</a>
                    </li>
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

            <li class="sidebar-item active">
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
        <h3><i class="fa fa-clipboard color2"></i>&nbsp;&nbsp;Leave</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="#"><p class="print_report">&nbsp;<i class="fa fa-leaf"></i>&nbsp; Leave Requests</p></a>
            {{-- <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="print_report">&nbsp;<i class="fa fa-file-text"></i>&nbsp; Allowance Overview</p></a> --}}
            <a data-bs-toggle="modal" data-bs-target="#leave_setup"><p class="view_daily_report">&nbsp;<i class="fa fa-gears color5"></i>&nbsp; Leave Setup</p></a>
            {{-- <a data-bs-toggle="modal" data-bs-target="#add_leave"><p class="view_daily_report">&nbsp;<i class="fa fa-plus-circle color5"></i>&nbsp; Add Leave</p></a> --}}
            <button type="submit" name="store_action" value="calc_taxation" class="print_btn_small"><i class="fa fa-refresh"></i></button>
        </form>
    </div>

    {{ $leaves->links() }}

    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <!-- Leaves View -->
                    <div class="table-responsive">
                        @if (count($leaves) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Name</th>
                                        <th>No. of Days</th>
                                        <th>Issue Date</th>
                                        <th>Resume Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($leaves as $lv)
                                        @if ($lv->employee != '')
                                            
                                            @if ($c % 2 == 1)
                                                <tr class="bg9">
                                            @else
                                                <tr>
                                            @endif
                                                <td>{{$c++}}</td>
                                                <td class="text-bold-500">{{ $lv->employee->fname.' '.$lv->employee->sname.' '.$lv->employee->oname }}</td>
                                                <td class="text-bold-500">{{$lv->days}}</td>
                                                <td class="text-bold-500">@if ($lv->issue_date != '') {{date('d M, Y', strtotime($lv->issue_date))}} @endif</td>
                                                <td class="text-bold-500">@if ($lv->resume_date != '') {{date('d M, Y', strtotime($lv->resume_date))}} 
                                                    @else

                                                        <form action="{{ action('HrdashController@update', $lv->id) }}" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            @csrf
                
                
                                                            @if ($lv->status == 'inactive')
                                                                {{-- <td class="text-bold-500 align_right action_size">
                                                                    <button type="submit" name="update_action" value="restore_employee" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                                </td> --}}
                                                            @else
                                                                {{-- <td class="text-bold-500 align_right action_size"> --}}
                                                                <button type="submit" name="update_action" value="resume_leave" class="my_trash2 bg7 color10 genhover" onclick="return confirm('Are you sure you want to resume leave?')"><i class="fa fa-clipboard"></i> &nbsp;Resume Now</button>
                                                                {{-- </td> --}}
                                                            @endif
                                                        </form>

                                                    @endif</td>
                                                <td class="text-bold-500">{{$lv->status}}</td>
                                            </tr>
                                        {{-- @else
                                            <tr>
                                                <div class="alert alert-danger">
                                                    No records found on {{$lv->leave_type}} leaves
                                                </div>
                                            </tr> --}}
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $leaves->links() }}
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Leaves
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Leave Setup -->
    <div class="modal fade" id="leave_setup" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">Leave Setup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ action('HrdashController@store') }}" method="POST">
                    @csrf

                    <div class="filter_div">
                        <i class="fa fa-user-md"></i>&nbsp;&nbsp; Maternity
                        <input type="text" @if ($leaveset!='') value="{{$leaveset->maternity}}" @endif placeholder="No. of Days" name="maternity">
                    </div>

                    <div class="filter_div">
                        <i class="fa fa-black-tie"></i>&nbsp;&nbsp; Casual
                        <input type="text" @if ($leaveset!='') value="{{$leaveset->casual}}" @endif placeholder="No. of Days" name="casual">
                    </div>

                    <div class="filter_div">
                        <i class="fa fa-calendar"></i>&nbsp;&nbsp; Annual
                        <input type="text" @if ($leaveset!='') value="{{$leaveset->annual}}" @endif placeholder="No. of Days" name="annual">
                    </div>

                    <div class="filter_div">
                        <i class="fa fa-book"></i>&nbsp;&nbsp; Study
                        <input type="text" @if ($leaveset!='') value="{{$leaveset->study}}" @endif placeholder="No. of Days" name="study">
                    </div>

                    <div class="filter_div">
                        <i class="fa fa-stethoscope"></i>&nbsp;&nbsp; Sick
                        <input type="text" @if ($leaveset!='') value="{{$leaveset->sick}}" @endif placeholder="No. of Days" name="sick">
                    </div>

                    <div class="filter_div">
                        <i class="fa fa-tasks"></i>&nbsp;&nbsp; Others
                        <input type="text" @if ($leaveset!='') value="{{$leaveset->others}}" @endif placeholder="No. of Days" name="others">
                    </div>
                    
                    {{-- <div class="filter_div" id="orderby">
                        <i class="fa fa-suitcase"></i>&nbsp;&nbsp; Payment
                        <select name="payment">
                            <option value="1" selected>With Pay</option>
                            <option value="0">Without Pay</option>
                        </select>
                    </div> --}}
                    
                    <div class="form-group modal_footer">
                        <button type="submit" name="store_action" value="leave_setup" class="load_btn" onclick="return confirm('Are you sure you want to update Leaves Settings!?')"><i class="fa fa-save"></i>&nbsp; Update</button>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
    </div>

    <!-- Add Leave -->
    <div class="modal fade" id="add_leave" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">Add Leave</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>

            <div class="modal-body">
                <form action="{{ action('HrdashController@store') }}" method="POST">
                    @csrf
                    
                    <div class="filter_div" id="orderby">
                        <i class="fa fa-user"></i>&nbsp;&nbsp; Staff
                        <select name="staff_id">
                            <option value="1" selected>With Pay</option>
                            <option value="0">Without Pay</option>
                        </select>
                    </div>
                    
                    <div class="filter_div" id="orderby">
                        <i class="fa fa-suitcase"></i>&nbsp;&nbsp; Leave Type
                        <select name="leave_type" id="leave_type">
                            <option value="maternity">Maternity</option>
                            <option value="casual" selected>Casual</option>
                            <option value="annual">Annual</option>
                            <option value="study">Study</option>
                            <option value="sick">Sick</option>
                            <option value="others">Others</option>
                        </select>
                    </div>

                    <div class="filter_div">
                        <i class="fa fa-black-tie"></i>&nbsp;&nbsp; Others
                        <input type="text" placeholder="Define no. of days" name="others">
                    </div>
                    
                    <div class="filter_div" id="orderby">
                        <i class="fa fa-suitcase"></i>&nbsp;&nbsp; Payment
                        <select name="payment">
                            <option value="1" selected>With Pay</option>
                            <option value="0">Without Pay</option>
                        </select>
                    </div>
                    
                    <div class="form-group modal_footer">
                        <button type="submit" name="store_action" value="add_leave" class="load_btn" onclick="return confirm('Are you sure you want to update Leaves Settings!?')"><i class="fa fa-save"></i>&nbsp; Update</button>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
    </div>
        

@endsection

 