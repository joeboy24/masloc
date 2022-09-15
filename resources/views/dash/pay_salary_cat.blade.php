
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

            <li class="sidebar-item active has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <ul class="submenu active">
                    <li class="submenu-item">
                        <a href="/companysetup">Company Setup</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/adduser">Manage User</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/add_dept">Add Department</a>
                    </li>
                    <li class="submenu-item active">
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
        <h3><i class="fa fa-dot-circle-o color6"></i>&nbsp;&nbsp;Add Salary Category / Positions</h3>
        {{-- <a href="/emp_report"><p class="print_report">&nbsp;<i class="fa fa-print"></i>&nbsp; Print Emp. Report</p></a>
        <a href="#"><button type="submit" class="print_btn_small"><i class="fa fa-refresh"></i></button></a> --}}
    </div>

    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <p>&nbsp;</p>
                    <div class="col-md-10 offset-md-1">

                        <!-- Add Employee -->
                        <form action="{{ action('EmployeeController@store') }}" method="POST">
                            @csrf
                    
                            <div class="filter_div" id="title_div">
                                <i class="fa fa-th-large"></i> &nbsp; Title
                                <select name="title" id="title" onchange="title_check()">
                                    <option value="0" selected>Choose Title</option>
                                    <option value="na">Not Available</option>
                                    @foreach ($salarycat as $st)
                                        <option>{{$st->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="filter_div" id="newtitle">
                                <i class="fa fa-th"></i> &nbsp; New Title
                                <input type="text" name="title2" placeholder="Type Title Here">
                            </div>

                            <div class="filter_div" id="pos_div">
                                <i class="fa fa-dot-circle-o"></i> &nbsp; Position
                                <select name="position" id="position" onchange="pos_check()">
                                    <option value="0" selected>Choose Position</option>
                                    <option value="na">Not Available</option>
                                    @foreach ($possalarycat as $pt)
                                        <option>{{$pt->cur_pos}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="filter_div" id="newposition">
                                <i class="fa fa-circle"></i> &nbsp; New Position
                                <input type="text" name="position2" placeholder="Type Position Here">
                            </div>

                            <script>
                                title_div = document.getElementById('title_div');
                                title = document.getElementById('title');
                                pos_div = document.getElementById('pos_div');
                                pos = document.getElementById('position');

                                newtitle = document.getElementById('newtitle');
                                newpos = document.getElementById('newposition');
                                newtitle.style.display = 'none';
                                newpos.style.display = 'none';
                                function title_check() {
                                    // alert(bank.value);
                                    if (title.value == 'na') {
                                        newtitle.style.display = "block";
                                    } else {
                                        newtitle.style.display = 'none';
                                    }
                                }
                                function pos_check() {
                                    // alert(bank.value);
                                    if (pos.value == 'na') {
                                        newpos.style.display = "block";
                                    } else {
                                        newpos.style.display = 'none';
                                    }
                                }
                            </script>
                    
                            <div class="filter_div">
                                <i class="fa fa-pencil-square"></i> &nbsp; Basic Sal.
                                <input type="number" min="0" step="any" name="basic_sal" required>
                            </div>

                            <div class="form-group modal_footer">
                                <button type="submit" name="store_action" value="add_salary_cat" class="load_btn"><i class="fa fa-save"></i>&nbsp; Save</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    {{ $salarycat->links() }}
    <div class="row">
        <div class="col-12 col-xl-10">
            <div class="card">
                <div class="card-body">

                    {{-- <p>&nbsp;</p> --}}
                    <div class="col-md-10 offset-md-1">
                        <!-- Leaves View -->
                        <div class="table-responsive">
                            @if (count($salarycat) > 0)
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Position</th>
                                            <th>Basic Salary</th>
                                            <th class="align_right">Action</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach ($salarycat as $scat)
                                            
                                            @if ($c % 2 == 1)
                                                <tr class="bg9">
                                            @else
                                                <tr>
                                            @endif
                                                <td class="text-bold-500">{{$c++}}</td>
                                                <td class="text-bold-500">{{ $scat->title }}</td>
                                                <td class="text-bold-500">{{$scat->cur_pos}}</td>
                                                <td class="text-bold-500">{{ number_format($scat->basic_sal, 2) }}</td>
                                                {{-- <td class="text-bold-500">@if ($lv->dob != '') {{date('D.. M, d Y', strtotime($lv->dob))}} @endif</td> --}}
                                                <td class="text-bold-500 align_right">

                                                    <form action="{{ action('HrdashController@update', $scat->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf
                                                        
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{$scat->id}}" class="my_trash_small"><i class="fa fa-pencil"></i></button>

                                                    </form>

                                                </td>
                                            </tr>

                                            <!-- Update Salary Category -->
                                            <div class="modal fade" id="edit{{$scat->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Edit Data Here
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <form action="{{ action('EmployeeController@update', $scat->id) }}" method="POST">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            @csrf
                                                            <div class="modal-body">
                                                                
                                                                <div class="col-md-12">
                                                                    <label>Title</label>
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input name="title" type="text" class="form-control" placeholder="Title" id="first-name-icon" value="{{ $scat->title }}" readonly>
                                                                            <div class="form-control-icon">
                                                                                <i class="fa fa-th-large"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <label>Position</label>
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input name="position" type="text" class="form-control" placeholder="Position" id="first-name-icon" value="{{ $scat->position }}" readonly>
                                                                            <div class="form-control-icon">
                                                                                <i class="fa fa-dot-circle-o"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <label>Basic Salary</label>
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input name="basic_sal" type="text" class="form-control" placeholder="Basic Salary" id="first-name-icon" value="{{ $scat->basic_sal }}" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="fa fa-pencil-square"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" name="update_action" value="update_sal_cat" class="btn btn-primary me-1 mb-1">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $salarycat->links() }}
                            @else
                                <div class="alert alert-danger">
                                    No Records Found on Salary Category / Positions
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        

@endsection

 