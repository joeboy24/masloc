
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
                  <li class="submenu-item">
                      <a href="/pay_employee">Upload Data</a>
                  </li>
                  <li class="submenu-item active">
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

            <li class="sidebar-item">
                <a href="/reports" class='sidebar-link'>
                    <i class="fa fa-file-text"></i>
                    <span>Reports</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-calendar"></i>
                    <span>Calendar</span>
                </a>
            </li>

            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="/compsetup">Company Setup</a>
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
        <h3><i class="fa fa-address-card color4"></i>&nbsp;&nbsp;{{$emp->fname}}'s Profile</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/view_employee"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to View / Edit Data</p></a>
            {{-- <button type="submit" name="store_action" value="calc_taxation" class="print_btn_small"><i class="fa fa-refresh"></i></button> --}}
          <p>&nbsp;</p>
        </form>
    </div>


    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                  {{-- <p>&nbsp;</p> --}}
                  <div class="row emp_profile">

                    <div class="col-md-4 offset-md-4 hhh">
                      <img src="/maindir/images/user3.png" class="emp_profile_img" alt="">
                    </div>

                    {{-- <div class="col-md-5 non_edit">
                      <table class="prof_tbl1">
                        </tbody>
                          <tr>
                            <td class="faint_td">Name</td>
                            <td>: &nbsp; {{ $emp->fname.' '.$emp->sname.' '.$emp->oname }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">AFIS No.</td>
                            <td>: &nbsp; {{ $emp->afis_no }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">SSNIT</td>
                            <td>: &nbsp; {{ $emp->ssn }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">Position</td>
                            <td>: &nbsp; {{ $emp->position }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">Department</td>
                            <td>: &nbsp; {{ $emp->dept }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">Region</td>
                            <td>: &nbsp; {{ $emp->region }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">Status</td>
                            <td style="text-transform: capitalize">: &nbsp; {{ $emp->status }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div> --}}
                  </div>

                      <h4 style="text-align: center">{{ $emp->fname.' '.$emp->sname.' '.$emp->oname }}</h4>

                  <p class="line1">&nbsp;</p>

                  <div class="row emp_profile">

                    <div class="col-md-5 offset-md-1">
                      
                      <table class="prof_tbl1">
                        <thead>
                          <th>&nbsp;</th>
                        </thead>
                        <thead>
                          <th>Bank Details</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="faint_td">Bank</td>
                            <td>: &nbsp; {{ $emp->bank }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">Branch</td>
                            <td>: &nbsp; {{ $emp->branch }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">Account No.</td>
                            <td>: &nbsp; {{ $emp->acc_no }}</td>
                          </tr>
                          <tr>
                            <td class="faint_td">Department</td>
                            <td>: &nbsp; {{ $emp->dept }}</td>
                          </tr>
                        </tbody>
                      </table>

                      <p class="line1">&nbsp;</p>
                      
                      <div class="non_edit">
                        <table class="prof_tbl1">
                          </tbody>
                            <tr>
                              <td class="faint_td">Fullname</td>
                              <td>: &nbsp; {{ $emp->fname.' '.$emp->sname.' '.$emp->oname }}</td>
                            </tr>
                            <tr>
                              <td class="faint_td">AFIS No.</td>
                              <td>: &nbsp; {{ $emp->afis_no }}</td>
                            </tr>
                            <tr>
                              <td class="faint_td">SSNIT</td>
                              <td>: &nbsp; {{ $emp->ssn }}</td>
                            </tr>
                            <tr>
                              <td class="faint_td">Position</td>
                              <td>: &nbsp; {{ $emp->position }}</td>
                            </tr>
                            <tr>
                              <td class="faint_td">Department</td>
                              <td>: &nbsp; {{ $emp->dept }}</td>
                            </tr>
                            <tr>
                              <td class="faint_td">Region</td>
                              <td>: &nbsp; {{ $emp->region }}</td>
                            </tr>
                            <tr>
                              <td class="faint_td">Status</td>
                              <td style="text-transform: capitalize">: &nbsp; {{ $emp->status }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                    </div>

                    {{-- // 'biometric_reg_no',
                      // 'year',
                      // 'years_served',
                      // 'staff_id',
                      // 'name',
                      // 'dob',
                      // 'age',
                      // 'date_emp',
                      // 'gender',
                      // 'position',
                      // 'cur_pos',
                      // 'qualification',
                      // 'prog',
                      // 'classification',
                      // 'grade',
                      // 'level',
                      // 'ssnit_no',
                      // 'contact',


                      // 'photo',
                      // 'email',
                      // 'nat_id',
                      // 'passport',
                      // 'marital_status',
                      // 'religion',
                      // 'region',
                      // 'res_address',
                      // 'city',
                      // 'nok',
                      // 'nok_contact', 
                    --}}

                    <div class="col-md-6">
                      <p>&nbsp;</p>
                      <table class="prof_tbl2">
                        <thead>
                          <th>Other Details</th>
                          {{-- </th>.......................................</th> --}}
                        </thead>
                        <tbody>
                          <tr>
                            <td class="faint_td2">Qualification</td>
                            <td>: &nbsp; Null Qualification Qualification</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Classification</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Grade</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Marital Status</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">National Id</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Date of Birth</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Gender</td>
                            <td>: &nbsp; null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">contact</td>
                            <td>: &nbsp; null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Email</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Passport</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Residential Addr.</td>
                            <td>: &nbsp; null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Religion</td>
                            <td>: &nbsp; null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">Next of Kin</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                          <tr>
                            <td class="faint_td2">NOK's Contact</td>
                            <td>: &nbsp; Null</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Employee Profile View -->
                  

                </div>
            </div>
        </div>
    </div>

@endsection
    
  