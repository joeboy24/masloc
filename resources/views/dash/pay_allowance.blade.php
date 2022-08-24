
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
                    <li class="submenu-item">
                        <a href="/view_employee">View/Edit Data</a>
                    </li>
                    <li class="submenu-item active">
                        <a href="">Allowances</a>
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
        <h3><i class="fa fa-file-text color6"></i>&nbsp;&nbsp;Manage Emp. Allowance</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
            {{-- <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="print_report">&nbsp;<i class="fa fa-file-text"></i>&nbsp; Allowance Overview</p></a> --}}
            <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="view_daily_report">&nbsp;<i class="fa fa-file-text color5"></i>&nbsp; Allowance/SSNIT Overview</p></a>
            <button type="submit" name="store_action" value="insert_allowances" class="print_btn_small"><i class="fa fa-refresh"></i></button>
        </form>
    </div>

    {{ $allowances->links() }}

    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <!-- Allowances View -->
                    <div class="table-responsive">
                        @if (count($allowances) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Allowances</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    {{-- <input type="text" id="state_tf" name="state_tf">
                                    <input type="text" id="allow_tf" name="allow_tf"> --}}
                                    @foreach ($allowances as $alw)
                                        <tr>
                                            <td class="text-bold-500">{{ $alw->employee->fname.' '.$alw->employee->sname.' '.$alw->employee->oname }}</td>

                                            <form action="{{ action('EmployeeController@update', $alw->id) }}" method="POST">
                                                {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf

                                                <td class="text-bold-500">
                                                    <input type="hidden" id="allow_tf{{$alw->id}}" name="allow_tf{{$alw->id}}">
                                                    <!-- Rent Allowance -->
                                                    @if ($alw->rent == 'no')
                                                        <button type="submit" name="update_action" value="set_rent" class="allow_btn color1" onclick="return confirm('Do you want to enable Rent Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; Rent</button>
                                                        {{-- <button type="button" name="update_action" value="set_rent" class="allow_btn color1" onclick="textfill{{$alw->id}}()"><i class="fa fa-check"></i>&nbsp; Rent</button> --}}
                                                    @else
                                                        <button type="submit" name="update_action" value="remove_rent" class="allow_btn bg4" onclick="return confirm('Do you want to disable Rent Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; Rent</button>
                                                        {{-- <button type="button" name="update_action" value="remove_rent" class="allow_btn bg4" onclick="textfill2{{$alw->id}}()"><i class="fa fa-times"></i>&nbsp; Rent</button> --}}
                                                    @endif

                                                    <!-- Professional Allowance -->
                                                    @if ($alw->prof == 'no') 
                                                        <button type="submit" name="update_action" value="set_prof" class="allow_btn color1" onclick="return confirm('Do you want to enable Professional Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; Profession</button>
                                                    @else
                                                        <button type="submit" name="update_action" value="remove_prof" class="allow_btn bg4" onclick="return confirm('Do you want to disable Professional Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; Profession</button>
                                                    @endif

                                                    <!-- Resposible Allowance -->
                                                    @if ($alw->resp == 'no') 
                                                        <button type="submit" name="update_action" value="set_resp" class="allow_btn color1" onclick="return confirm('Do you want to enable Responsible Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; Responsible</button>
                                                    @else
                                                        <button type="submit" name="update_action" value="remove_resp" class="allow_btn bg4" onclick="return confirm('Do you want to disable Responsible Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; Responsible</button>
                                                    @endif

                                                    <!-- Risk Allowance -->
                                                    @if ($alw->risk == 'no') 
                                                        <button type="submit" name="update_action" value="set_risk" class="allow_btn color1" onclick="return confirm('Do you want to enable Risk Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; Risk</button>
                                                    @else
                                                        <button type="submit" name="update_action" value="remove_risk" class="allow_btn bg4" onclick="return confirm('Do you want to disable Risk Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; Risk</button>
                                                    @endif

                                                    <!-- VMA Allowance -->
                                                    @if ($alw->vma == 'no') 
                                                        <button type="submit" name="update_action" value="set_vma" class="allow_btn color1" onclick="return confirm('Do you want to enable VMA Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; VMA</button>
                                                    @else
                                                        <button type="submit" name="update_action" value="remove_vma" class="allow_btn bg4" onclick="return confirm('Do you want to disable VMA Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; VMA</button>
                                                    @endif

                                                    <!-- Entertainment Allowance -->
                                                     @if ($alw->ent == 'no') 
                                                         <button type="submit" name="update_action" value="set_ent" class="allow_btn color1" onclick="return confirm('Do you want to enable Entertainment Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; Entertainment</button>
                                                     @else
                                                         <button type="submit" name="update_action" value="remove_ent" class="allow_btn bg4" onclick="return confirm('Do you want to disable Entertainment Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; Entertainment</button>
                                                     @endif
 
                                                    <!-- Domenstic Allowance -->
                                                     @if ($alw->dom == 'no') 
                                                         <button type="submit" name="update_action" value="set_dom" class="allow_btn color1" onclick="return confirm('Do you want to enable Domenstic Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; Domenstic</button>
                                                     @else
                                                         <button type="submit" name="update_action" value="remove_dom" class="allow_btn bg4" onclick="return confirm('Do you want to disable Domenstic Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; Domenstic</button>
                                                     @endif

                                                     <!-- Internet Allowance -->
                                                      @if ($alw->intr == 'no') 
                                                          <button type="submit" name="update_action" value="set_intr" class="allow_btn color1" onclick="return confirm('Do you want to enable Internet & Other Utilities Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; Int. & Util.</button>
                                                      @else
                                                          <button type="submit" name="update_action" value="remove_intr" class="allow_btn bg4" onclick="return confirm('Do you want to disable Internet & Other Utilities Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; Int. & Util.</button>
                                                      @endif
  
                                                     <!-- TnT Allowance -->
                                                      @if ($alw->tnt == 'no') 
                                                          <button type="submit" name="update_action" value="set_tnt" class="allow_btn color1" onclick="return confirm('Do you want to enable T&T Allowance for {{$alw->fname}}?')"><i class="fa fa-times"></i>&nbsp; T & T</button>
                                                      @else
                                                          <button type="submit" name="update_action" value="remove_tnt" class="allow_btn bg4" onclick="return confirm('Do you want to disable T&T Allowance for {{$alw->fname}}?')"><i class="fa fa-check"></i>&nbsp; T & T</button>
                                                      @endif

                                                    <script>
                                                        function textfill{{$alw->id}}() {
                                                            document.getElementById("allow_tf{{$alw->id}}").value = "rent{{$alw->id}}";
                                                            document.getElementById("state_tf").value = "enable{{$alw->id}}";
                                                            // document.getElementById('from').style.display = "block";
                                                            return confirm('{{$alw->id}} Do you want to enable Rent Allowance {{$alw->fname}}?');
                                                        }

                                                        function textfill2{{$alw->id}}() {
                                                            document.getElementById("allow_tf{{$alw->id}}").value = "2rent{{$alw->id}}";
                                                            document.getElementById("state_tf").value = "enable{{$alw->id}}";
                                                            // document.getElementById('from').style.display = "block";
                                                            return confirm('Are you sure you want to disable Rent Allowance for {{$alw->fname}}?');
                                                        }
                                                    </script>
                                                </td>

                                                {{-- @if ($alw->del == 'yes')
                                                    <td class="text-bold-500 align_right action_size">
                                                        <button type="submit" name="update_action" value="restore_employee" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    </td>
                                                @else
                                                    <td class="text-bold-500 align_right action_size">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{$alw->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                        <button type="submit" name="update_action" value="del_employee" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                @endif --}}
                                            </form>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $allowances->links() }}
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Allowances
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
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->rent}}" @endif min="0" max="100" placeholder="Rent Allowance eg. 15" name="rent">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-check-square"></i>&nbsp;&nbsp;&nbsp; Prof.
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->prof}}" @endif min="0" max="100" name="prof">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp; Resp.
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->resp}}" @endif min="0" max="100" name="resp">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;Risk
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->risk}}" @endif min="0" max="100" name="risk">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-car"></i>&nbsp;&nbsp;&nbsp;VMA
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->vma}}" @endif min="0" max="100" name="vma">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-headphones"></i>&nbsp;&nbsp;&nbsp;&nbsp;Ent.
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->ent}}" @endif min="0" max="100" name="ent">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-bed"></i>&nbsp;&nbsp;&nbsp;Dom.
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->dom}}" @endif min="0" max="100" name="dom">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-internet-explorer"></i>&nbsp;&nbsp;&nbsp;&nbsp;Int/Util (GhC)
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->intr}}" @endif min="0" name="intr">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-taxi"></i>&nbsp;&nbsp;&nbsp;T&T (GhC)
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->tnt}}" @endif min="0" name="tnt">
                    </div>

                    <p class="">&nbsp;</p>
            
                    <div class="filter_div">
                        <i class="fa fa-credit-card-alt"></i>&nbsp;&nbsp;&nbsp;SSF
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->ssf}}" @endif min="0" max="100" name="ssf">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-credit-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;SSF 1T
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->ssf1}}" @endif min="0" max="100" name="ssf1">
                    </div>
            
                    <div class="filter_div">
                        <i class="fa fa-credit-card-alt"></i>&nbsp;&nbsp;&nbsp;SSF 2T
                        <input type="number" step="any" @if ($allowoverview!='')value="{{$allowoverview->ssf2}}" @endif min="0" max="100" name="ssf2">
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

 