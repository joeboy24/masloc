
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

            <li class="sidebar-item active">
                <a href="" class='sidebar-link'>
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
        <h3><i class="fa fa-pie-chart color3"></i>&nbsp;&nbsp;Salary</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
            {{-- <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="print_report">&nbsp;<i class="fa fa-file-text"></i>&nbsp; Allowance Overview</p></a> --}}
            <a href="/salexport"><p class="view_daily_report">&nbsp;<i class="fa fa-download color5"></i>&nbsp; Download Excel</p></a>
            <button type="submit" name="store_action" value="calc_taxation" class="print_btn_small"><i class="fa fa-refresh"></i></button>
        </form>
    </div>

    {{ $salaries->links() }}

    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <!-- Allowances View -->
                    <div class="table-responsive">
                        @if (count($salaries) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Name</th>
                                        <th>Position</th>
                                        <th>Basic Salary</th>
                                        <th>Month</th>
                                        <th>SSF&nbsp; {{$allowoverview->ssf}}%</th>
                                        <th>Basic After SSF</th>
                                        <th>{{$allowoverview->rent}}% Rent Allow</th>
                                        <th>{{$allowoverview->prof}}% Prof. Allow</th>
                                        <th>Total Taxable Income</th>
                                        <th>Income Tax</th>
                                        <th>Net After Income Tax</th>
                                        <th>{{$allowoverview->resp}}% Resp. Allow</th>
                                        <th>{{$allowoverview->risk}}% Risk Allow</th>
                                        <th>{{$allowoverview->vma}}% V.M.A Allow</th>
                                        <th>{{$allowoverview->ent}}% Entertainment Allow</th>
                                        <th>{{$allowoverview->dom}}% Domestic Help</th>
                                        <th>{{$allowoverview->intr}} Internet & Other Utilities</th>
                                        <th>{{$allowoverview->tnt}} T&T Allow</th>
                                        <th>{{$allowoverview->cola}}% COLA</th>

                                        @if ($allowoverview->new1 != 0)
                                            @if ($new_allows[0]->allow_perc != 0)
                                                <th>{{$allowoverview->new1}}% {{substr($new_allows[0]->allow_name, 0, 10)}}...</th>
                                            @else
                                                <th>{{$allowoverview->new1}} {{substr($new_allows[0]->allow_name, 0, 10)}}...</th>
                                            @endif
                                        @else
                                            <th>Empty</th>
                                        @endif

                                        @if ($allowoverview->new2 != 0)
                                            @if ($new_allows[1]->allow_perc != 0)
                                                <th>{{$allowoverview->new2}}% {{substr($new_allows[1]->allow_name, 0, 10)}}...</th>
                                            @else
                                                <th>{{$allowoverview->new2}} {{substr($new_allows[1]->allow_name, 0, 10)}}...</th>
                                            @endif
                                        @else
                                            <th>Empty</th>
                                        @endif

                                        @if ($allowoverview->new3 != 0)
                                            @if ($new_allows[2]->allow_perc != 0)
                                                <th>{{$allowoverview->new3}}% {{substr($new_allows[2]->allow_name, 0, 10)}}...</th>
                                            @else
                                                <th>{{$allowoverview->new3}} {{substr($new_allows[2]->allow_name, 0, 10)}}...</th>
                                            @endif
                                        @else
                                            <th>Empty</th>
                                        @endif

                                        @if ($allowoverview->new4 != 0)
                                            @if ($new_allows[3]->allow_perc != 0)
                                                <th>{{$allowoverview->new4}}% {{substr($new_allows[3]->allow_name, 0, 10)}}...</th>
                                            @else
                                                <th>{{$allowoverview->new4}} {{substr($new_allows[3]->allow_name, 0, 10)}}...</th>
                                            @endif
                                        @else
                                            <th>Empty</th>
                                        @endif

                                        @if ($allowoverview->new5 != 0)
                                            @if ($new_allows[4]->allow_perc != 0)
                                                <th>{{$allowoverview->new5}}% {{substr($new_allows[4]->allow_name, 0, 10)}}...</th>
                                            @else
                                                <th>{{$allowoverview->new5}} {{substr($new_allows[4]->allow_name, 0, 10)}}...</th>
                                            @endif
                                        @else
                                            <th>Empty</th>
                                        @endif

                                        {{-- @foreach ($new_allows as $nalws)
                                            <th>{{$allowoverview->tnt}} T&T Allow</th>
                                        @endforeach --}}
                                        <th>Back Pay</th>
                                        <th>Net Salary Before Deduction</th>
                                        <th class="staffloancol">Staff Loan</th>
                                        <th class="netcol">Net Salary After Deduction</th>
                                        <th>13%/12.5% SSF EMPLOYERS CONT.</th>
                                        <th>Total Deductions</th>
                                        <th>SOCIAL SECURITY NUMBER</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Region</th>
                                        <th>Bank</th>
                                        <th>Branch</th>
                                        <th>A/C No.</th>
                                        {{-- <th>Allowances</th> --}}
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($salaries as $slr)
                                        @if ($c % 2 == 1)
                                            <tr class="bg9">
                                        @else
                                            <tr>
                                        @endif
                                            <td>{{$c++}}</td>
                                            <td class="text-bold-500">{{ $slr->employee->fname.' '.$slr->employee->sname.' '.$slr->employee->oname }}</td>
                                            <td class="text-bold-500">{{$slr->position}}</td>
                                            <td class="text-bold-500">{{number_format($slr->salary, 2)}}</td>
                                            <td class="text-bold-500">{{date('F Y', strtotime('30-'.$slr->month))}}</td>
                                            <td class="text-bold-500">{{number_format($slr->ssf, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->sal_aft_ssf, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->rent, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->prof, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->taxable_inc, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->income_tax, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->net_aft_inc_tax, 2)}}</td>

                                            <td class="text-bold-500">{{number_format($slr->resp, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->risk, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->vma, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->ent, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->dom, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->intr, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->tnt, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->cola, 2)}}</td>
                                            {{-- @if ($allowoverview->new1 != 0)
                                                
                                            @endif --}}
                                            <td class="text-bold-500">{{number_format($slr->new1, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->new2, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->new3, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->new4, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->new5, 2)}}</td>

                                            <td class="text-bold-500">{{number_format($slr->back_pay, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->net_bef_ded, 2)}}</td>
                                            <td class="text-bold-500 staffloancol">{{number_format($slr->staff_loan, 2)}}</td>
                                            <td class="text-bold-500 netcol">{{number_format($slr->net_aft_ded, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->ssf_emp_cont, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($slr->tot_ded, 2)}}</td>
                                            <td class="text-bold-500">{{$slr->ssn}}</td>
                                            <td class="text-bold-500">{{$slr->email}}</td>
                                            <td class="text-bold-500">{{$slr->dept}}</td>
                                            <td class="text-bold-500">{{$slr->region}}</td>
                                            <td class="text-bold-500">{{$slr->bank}}</td>

                                            <td class="text-bold-500">{{$slr->branch}}</td>
                                            <td class="text-bold-500">{{$slr->acc_no}}</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $salaries->links() }}
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Salaries
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Filter Modal -->
    <div class="modal fade" id="allow_overview" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">Allowance/SSNIT Overview (%)</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ action('EmployeeController@store') }}" method="POST">
                    @csrf
                    {{-- <div class="filter_div">
                    <i class="fa fa-list"></i>
                        <select onchange="report_script()" name="report_type" id="report_id">
                            <option>Customer Reports</option>
                            <option>Consumption Reports</option>
                            <option>Payment Reports</option>
                            <option>Generate Bill</option>
                        </select>
                    </div> --}}

                    <div class="filter_div">
                        <i class="fa fa-home"></i>&nbsp;&nbsp; Rent
                        <input type="number" step="any" min="0" max="100" placeholder="Rent Allowance eg. 15" name="rent">
                    </div>
                
                    {{-- <div class="filter_div">
                        <i class="fa fa-arrow-left"></i>&nbsp; To
                        <input type="text" name="to">
                    </div>
                    
                    <div class="filter_div" id="orderby">
                        <i class="fa fa-filter"></i>
                        <select name="order">
                            <option value="Asc" selected>Ascending</option>
                            <option value="Desc">Descending</option>
                        </select>
                    </div> --}}
                    
                    <div class="form-group modal_footer">
                        <button type="submit" name="store_action" value="add_allow_ssnit" class="load_btn" onclick="return confirm('Are you sure you want to update Allowances/SSNIT Percentages!?')"><i class="fa fa-save"></i>&nbsp; Update</button>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
    </div>
        

@endsection

 