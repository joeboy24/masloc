
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
                        <a href="/pay_employee">Upload Data</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/view_employee">View/Edit Data</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/allowance">Allowance</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item active">
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
        <h3><i class="fa fa-file-text color4"></i>&nbsp;&nbsp;Taxation</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
            {{-- <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="print_report">&nbsp;<i class="fa fa-file-text"></i>&nbsp; Allowance Overview</p></a> --}}
            <a href="/taxexport"><p class="view_daily_report">&nbsp;<i class="fa fa-download color5"></i>&nbsp; Download Excel</p></a>
            <button type="submit" name="store_action" value="calc_taxation" class="print_btn_small"><i class="fa fa-refresh"></i></button>
        </form>
    </div>

    {{ $taxation->links() }}

    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <!-- Allowances View -->
                    <div class="table-responsive">
                        @if (count($taxation) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Name</th>
                                        <th>Position</th>
                                        <th>Gross Basic Salary</th>
                                        <th>Month</th>
                                        <th>{{$allowoverview->rent}}% Rent Allow</th>
                                        <th>{{$allowoverview->prof}}% Prof. Allow</th>
                                        <th>Total Income</th>
                                        <th>SSF&nbsp;@ {{$allowoverview->ssf}}%</th>
                                        <th>Taxable Income</th>
                                        <th>Total Tax Payable</th>
                                        <th>First GhC 319</th>
                                        <th>Next GhC 419</th>
                                        <th>Next GhC 549</th>
                                        <th>Next GhC 3,539</th>
                                        <th>Next GhC 16,461</th>
                                        <th>Next GhC 20,000</th>
                                        <th>Net Amount(GhC)</th>
                                        {{-- <th>Allowances</th> --}}
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($taxation as $txn)
                                        
                                        @if ($c % 2 == 1)
                                            <tr class="bg9">
                                        @else
                                            <tr>
                                        @endif
                                            <td>{{$c++}}</td>
                                            <td class="text-bold-500">{{ $txn->employee->fname.' '.$txn->employee->sname.' '.$txn->employee->oname }}</td>
                                            <td class="text-bold-500">{{$txn->position}}</td>
                                            <td class="text-bold-500">{{number_format($txn->salary, 2)}}</td>
                                            <td class="text-bold-500">{{date('F Y', strtotime('30-'.$txn->month))}}</td>
                                            <td class="text-bold-500">{{number_format($txn->rent, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->prof, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->tot_income, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->ssf, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->taxable_inc, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->tax_pay, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->first1, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->next1, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->next2, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->next3, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->next4, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->next5, 2)}}</td>
                                            <td class="text-bold-500">{{number_format($txn->net_amount, 2)}}</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $taxation->links() }}
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Taxation
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

 