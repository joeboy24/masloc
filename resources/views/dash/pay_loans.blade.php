
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

            <li class="sidebar-item active">
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
        <h3><i class="fa fa-file-text color6"></i>&nbsp;&nbsp;Staff Loans</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
            <a data-bs-toggle="modal" data-bs-target="#loan_setup"><p class="view_daily_report">&nbsp;<i class="fa fa-download color5"></i>&nbsp; Loan Setup</p></a>
            {{-- <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="print_report">&nbsp;<i class="fa fa-file-text"></i>&nbsp; Allowance Overview</p></a>
            <a href="/taxexport"><p class="view_daily_report">&nbsp;<i class="fa fa-download color5"></i>&nbsp; Download Excel</p></a> --}}
            <button type="submit" name="store_action" value="calc_taxation" class="print_btn_small"><i class="fa fa-refresh"></i></button>
        </form>
    </div>

    {{ $employees->links() }}

    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <!-- Employee View -->
                    <div class="table-responsive">
                        @if (count($employees) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Details</th>
                                        <th>Loan Details</th>
                                        <th>Eligible Amt</th>
                                        <th>Status</th>
                                        {{-- <th class="align_right">Actions</th> --}}
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($employees as $emp)
                                        @if ($emp->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            @if ($c % 2 == 1)
                                                <tr class="bg9">
                                            @else
                                                <tr>
                                            @endif
                                        @endif
                                            <td class="text-bold-500">{{$c++}}</td>
                                            <td class="text-bold-500">{{ $emp->fname.' '.$emp->sname.' '.$emp->oname }}
                                                <p class="small_p">Position: {{ $emp->cur_pos }}</p>
                                            </td>
                                            <td class="text-bold-500">Bal.: {{ number_format($emp->loan_bal, 2) }}
                                                @for ($i = 0; $i < count($loans); $i++)
                                                    @if ($loans[$i]->bal == $emp->loan_bal && $loans[$i]->date_started == $emp->loan_date_started && $loans[$i]->employee_id == $emp->id && $emp->loan_date_started != 0)
                                                        <p class="small_p">Dur.:  {{ $loans[$i]->dur }} months</p>
                                                    @endif
                                                @endfor 
                                            </td>
                                            <td class="text-bold-500">{{ number_format($emp->salary * 12, 2) }}</td>

                                            <form action="{{ action('EmployeeController@update', $emp->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf

                                                <td class="text-bold-500">
                                                    @if ($emp->staff_loan == '' || $emp->staff_loan == 0)
                                                        <button type="button" class="my_trash2 green_bg color8"><i class="fa fa-check"></i>&nbsp; Qualified</button>
                                                        <button type="submit" name="update_action" value="grant_loan" class="my_trash2 bg3 color8 genhover" onclick="return confirm('Click Ok to proceed to Grant Loan')">
                                                            <i class="fa fa-check-square-o"></i>&nbsp; Grant Loan
                                                        </button>
                                                    @else
                                                        <button type="button" class="my_trash2 yellow_bg"><i class="fa fa-times"></i>&nbsp; Not Qualified</button>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#special_loan_setup" class="my_trash2 bg3 color8 genhover">
                                                            <i class="fa fa-warning"></i>
                                                        </button>
                                                        <button type="submit" name="update_action" value="del_loan" class="my_trash2 bg6 color8 genhover" onclick="return confirm('Note: This action will permanently clear loan status')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </td>

                                                {{-- @if ($emp->del == 'yes')
                                                    <td class="text-bold-500 align_right action_size">
                                                        <button type="submit" name="update_action" value="restore_employee" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    </td>
                                                @else
                                                    <td class="text-bold-500 align_right action_size">
                                                        <button type="submit" name="update_action" value="del_employee" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                @endif --}}

                                            </form>

                                        </tr>

                                        <!-- Special Loan Setup Modal -->
                                        <div class="modal fade" id="special_loan_setup" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalRequestLabel">Special Case Loan</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ action('EmployeeController@store') }}" method="POST">
                                                        @csrf

                                                        <div class="filter_div">
                                                            <i class="fa fa-edit"></i>&nbsp;&nbsp; Loan Amount
                                                            <input type="text" @if ($emp->loan) value="{{number_format($emp->loan->bal/2, 2)}}" @endif step="any" min="0" placeholder="Enter Amount eg. 1200" name="interest" required>
                                                        </div>

                                                        <div class="filter_div">
                                                            <i class="fa fa-calendar"></i>&nbsp;&nbsp; Duration (mth)
                                                            <input type="number" @if ($loanset!='') value="{{$loanset->dur/2}}" @endif step="any" min="0" max="12" placeholder="Duration(months) eg. 7" name="dur" required>
                                                        </div>
                                                        
                                                        <div class="form-group modal_footer">
                                                            <button type="submit" name="store_action" value="loan_setup" class="load_btn"><i class="fa fa-save"></i>&nbsp; Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>

                                        <!-- Edit Employee -->
                                        <div class="modal fade" id="edit{{$emp->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            Edit Employer Here
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ action('EmployeeController@update', $emp->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf
                                                        <div class="modal-body">
                                                            
                                                            <div class="col-md-12">
                                                                <label>First Name</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input name="fname" type="text" class="form-control" placeholder="First Name" id="first-name-icon" value="{{ $emp->fname }}" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <label>Surname</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input name="sname" type="text" class="form-control" placeholder="Surname" id="first-name-icon" value="{{ $emp->sname }}" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <label>Other Names</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input name="oname" type="text" class="form-control" placeholder="Other Names" id="first-name-icon" value="{{ $emp->oname }}">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <label>Contact</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input name="contact" type="number" min="0" class="form-control" placeholder="Contact" id="first-name-icon" value="{{ $emp->contact }}" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-phone"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            {{-- <div class="col-md-12">
                                                                <label>Text</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <div class="form-group with-title mb-3">
                                                                            <textarea name="ev_text" class="form-control" rows="3" required>{{ $emp->text }}</textarea>
                                                                            <label>Blog text goes here</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <label>Emp Date</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input name="ev_date_added" type="date" class="form-control" placeholder="mm/dd/yyyy" id="first-name-icon" value="{{ $emp->date_added }}">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <label>Venue</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input name="ev_venue" type="text" class="form-control" placeholder="ex. CHNTC-AKIMODA Campus" id="first-name-icon" value="{{ $emp->venue }}" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            
                                                            
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" name="update_action" value="update_employee" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employees->links() }}
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Employees
                            </div>
                        @endif
                    </div>

                    <form class="form form-horizontal" action="{{action('DashController@store')}}" method="POST">
                        @csrf

                        <!--div class="row seablue_bottom">
                                    

                            <div style="height: 10px"></div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info me-1 mb-1" name="store_action" value="add_homepage">Save</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                            <p class="small_p float_right">Click on save to update Section 1 - 3 &nbsp;</p>
                                    
                        </div-->    
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Loan Modal -->
    <div class="modal fade" id="loan_setup" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">Loan Setup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ action('EmployeeController@store') }}" method="POST">
                    @csrf

                    <div class="filter_div">
                        <i class="fa fa-edit"></i>&nbsp;&nbsp; Interest (%)
                        <input type="number" @if ($loanset!='') value="{{$loanset->interest}}" @endif step="any" min="0" max="100" placeholder="Interest(%) eg. 4" name="interest">
                    </div>

                    <div class="filter_div">
                        <i class="fa fa-calendar"></i>&nbsp;&nbsp; Duration (mth)
                        <input type="number" @if ($loanset!='') value="{{$loanset->dur}}" @endif step="any" min="0" max="100" placeholder="Duration(months) eg. 30" name="dur">
                    </div>
                    
                    <div class="form-group modal_footer">
                        <button type="submit" name="store_action" value="loan_setup" class="load_btn"><i class="fa fa-save"></i>&nbsp; Update</button>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
    </div>

    <div class="search_div">
        <form action="">
            <input id="search_fd" type="text" class="search_field" placeholder="Search...">
            <button type="button" onclick="showsearch()"><i class="fa fa-search"></i></button>
        </form>
        <script>
            function showsearch() {
                if (document.getElementById('search_fd').style.opacity != 1) {
                    document.getElementById('search_fd').style.opacity = 1;
                    // document.getElementById('search_fd').style.display = "none";
                } else {
                    document.getElementById('search_fd').style.opacity = 0;
                }
            }
        </script>
    </div>
        

@endsection

 