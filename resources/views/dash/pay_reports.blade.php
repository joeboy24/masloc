
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

            <li class="sidebar-item active">
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
        <h3><i class="fa fa-file-text color4"></i>&nbsp;&nbsp;Reports</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
            <button type="submit" name="store_action" value="calc_taxation" class="print_btn_small"><i class="fa fa-refresh"></i></button>
        </form>
    </div>


    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                  <!-- Reports View -->
                  <form action="{{ action('ReportsController@index') }}">
                    {{-- @csrf --}}
                    <div class="filter_div">
                      <i class="fa fa-list"></i> &nbsp; Report
                      <select onchange="report_script()" name="report_type" id="report_id">
                        <option value="0">Choose Report Type</option>
                        <option value="emp">Employees Reports</option>
                        <option value="tax">Taxation Reports</option>
                        <option value="sal">Salaries Reports</option>
                        <option value="tax">Leave Reports</option>
                        <option value="bksum">Bank Summary</option>
                      </select>
                    </div>
        
                    <div class="filter_div" id="region">
                      <i class="fa fa-globe"></i> &nbsp; Region
                      <select name="region">
                        <option value="all" selected>All Regions</option>
                        @foreach ($regions as $reg)
                            <option>{{$reg->region}}</option>
                        @endforeach
                      </select>
                    </div>
        
                    <div class="filter_div" id="bank">
                      <i class="fa fa-bank"></i> &nbsp; Bank Name
                      <select name="bank">
                        <option value="all" selected>All Banks</option>
                        @foreach ($banks as $bk)
                            <option>{{$bk->bank}}</option>
                        @endforeach
                      </select>
                    </div>
        
                    {{-- <div class="filter_div" id="month">
                      <i class="fa fa-calendar"></i> &nbsp; Month
                      <select name="month">
                        <option value="0" selected>Select Month</option>
                        <option value="01">1 - January</option>
                        <option value="02">2 - February</option>
                        <option value="03">3 - March</option>
                        <option value="04">4 - April</option>
                        <option value="05">5 - May</option>
                        <option value="06">6 - June</option>
                        <option value="07">7 - July</option>
                        <option value="08">8 - August</option>
                        <option value="09">9 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                      </select>
                    </div>
        
                    <div class="filter_div" id="year">
                      <i class="fa fa-calendar"></i> &nbsp; Year
                      <select name="year">
                        <option value="0" selected>Select Year</option>
                        @for ($i = 2022; $i <= 2050; $i++)
                          <option>{{$i}}</option>
                        @endfor
                      </select>
                    </div> --}}
        
                    <script>
                      // document.getElementById('year').style.display = "none";
                      // document.getElementById('month').style.display = "none";
                      document.getElementById('bank').style.display = "none";
                      document.getElementById('region').style.display = "none";
                      function report_script() {
                        report_id = document.getElementById('report_id').value;
                        // alert(report_id);
                        if (report_id == '0') {
                          document.getElementById('region').style.display = "none";
                          document.getElementById('orderby').style.display = "block";
                          document.getElementById('from').style.display = "none";
                          document.getElementById('to').style.display = "none";

                          // document.getElementById('year').style.display = "none";
                          // document.getElementById('month').style.display = "none";
                        } else if (report_id == 'emp') {
                          document.getElementById('bank').style.display = "block";
                          document.getElementById('region').style.display = "block";
                          document.getElementById('orderby').style.display = "block";
                          document.getElementById('from').style.display = "none";
                          document.getElementById('to').style.display = "none";

                          // document.getElementById('year').style.display = "none";
                          // document.getElementById('month').style.display = "none";
                        } else if (report_id == 'tax') {
                          document.getElementById('bank').style.display = "none";
                          document.getElementById('region').style.display = "none";
                          document.getElementById('orderby').style.display = "block";
                          document.getElementById('from').style.display = "block";
                          document.getElementById('to').style.display = "block";
                        } else {
                          document.getElementById('bank').style.display = "block";
                          document.getElementById('region').style.display = "none";
                          document.getElementById('orderby').style.display = "block";
                          document.getElementById('from').style.display = "block";
                          document.getElementById('to').style.display = "block";
                          // document.getElementById('year').style.display = "block";
                          // document.getElementById('month').style.display = "block";
                        }
                      }
                    </script>
              
                    <div class="filter_div" id="from">
                      <i class="fa fa-chevron-right"></i> &nbsp; Date From
                      <input type="date" name="from">
                    </div>
                    
                    <div class="filter_div" id="to">
                      <i class="fa fa-chevron-left"></i> &nbsp; Date To
                      <input type="date" name="to">
                    </div>
                    
                    {{-- <div class="filter_div">
                      <i class="fa fa-filter"></i>
                      <select name="order" id="report_id">
                        <option value="district">District</option>
                        <option value="Desc">Descending</option>
                      </select>
                    </div> --}}
                    
                    <div class="filter_div" id="orderby">
                      <i class="fa fa-filter"></i> &nbsp; Order
                      <select name="order">
                        <option value="Asc" selected>Ascending</option>
                        <option value="Desc">Descending</option>
                      </select>
                    </div>
                    
                    <div class="form-group modal_footer">
                      <button type="submit" class="load_btn"><i class="fa fa-refresh"></i>&nbsp; Load</button>
                    </div>
                  </form>

                </div>
            </div>
        </div>
    </div>

@endsection
    
  