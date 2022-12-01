
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
                        <!--a href="/pay_employee">Upload Data</a-->
                    </li>
                    <li class="submenu-item">
                        <a href="/view_employee">View/Edit Data</a>
                    </li>
                    <li class="submenu-item active">
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


    <div class="page-heading row">
        <h3><i class="fa fa-file-text color6"></i>&nbsp;&nbsp;Allowance Exceptions</h3>

        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
            <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="view_daily_report">&nbsp;<i class="fa fa-user-plus color5"></i>&nbsp; Add Exp.</p></a>
        </form>
    </div>


    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <!-- Employee View -->
                    <div class="table-responsive">
                        @if (count($allowexp) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Allowance</th>
                                        <th></th>
                                        <th>Salary (GhC)</th>
                                        <th class="align_right">Actions</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($allowexp as $alx)
                                        @if ($alx->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            @if ($c % 2 == 1)
                                                <tr class="bg9">
                                            @else
                                                <tr>
                                            @endif
                                        @endif
                                            <td class="text-bold-500">{{$c++}}</td>
                                            <td class="text-bold-500"><a href="/employee/{{$alx->id}}" class="color10">{{ $alx->employee->fname.' '.$alx->employee->sname.' '.$alx->employee->oname }}</a>
                                                <p class="small_p">SSN: {{ $alx->employee->ssn }}</p>
                                                <p class="small_p_black">{{ $alx->employee->contact }}</p>
                                            </td>
                                            <td class="text-bold-500">{{ $alx->cur_pos }}
                                                <p class="pnospace">Rent: <span class="chrg_span"><b>{{$alx->rent}}</b></span><p>
                                                <p class="pnospace">Prof.: <span class="chrg_span"><b>{{$alx->prof}}</b></span></p>
                                                <p class="pnospace">Resp: <span class="chrg_span"><b>{{$alx->resp}}</b></span></p>
                                                <p class="pnospace">Risk: <span class="chrg_span"><b>{{$alx->risk}}</b></span></p>
                                                <p class="pnospace">VMA: <span class="chrg_span"><b>{{$alx->vma}}</b></span></p>
                                            </td>
                                            <td class="text-bold-500">{{ $alx->cur_pos }}
                                                <p class="pnospace">Ent.: <span class="chrg_span"><b>{{$alx->ent}}</b></span></p>
                                                <p class="pnospace">Dom.: <span class="chrg_span"><b>{{$alx->dom}}</b></span></p>
                                                <p class="pnospace">COLA: <span class="chrg_span"><b>{{$alx->cola}}</b></span></p>
                                                <p class="pnospace">Int/Others: <span class="chrg_span"><b>{{number_format($alx->intr, 2)}}</b></span></p>
                                                <p class="pnospace">T&T: <span class="chrg_span"><b>{{number_format($alx->tnt, 2)}}</b></span></p>
                                            </td>
                                            <td class="text-bold-500">{{ number_format($alx->employee->salary, 2) }}<br>
                                                <button type="button" class="my_trash2 green_bg color8 genhover"><i class="fa fa-check"></i>&nbsp; Active</button></a>
                                            </td>

                                            <form action="{{ action('EmployeeController@update', $alx->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf


                                                {{-- @if ($alx->del == 'yes')
                                                    <td class="text-bold-500 align_right action_size">
                                                        <button type="submit" name="update_action" value="restore_employee" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    </td>
                                                @else --}}
                                                    <td class="text-bold-500 align_right action_size">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{$alx->id}}" class="my_trash_small"><i class="fa fa-pencil"></i></button>
                                                        {{-- <button type="submit" name="update_action" value="del_allowexp" class="my_trash_small" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button> --}}
                                                        <button type="submit" name="update_action" value="del_allowexp" class="my_trash_small" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                {{-- @endif --}}
                                            </form>

                                        </tr>

                                        <!-- Update Allowexp -->
                                        <div class="modal fade" id="edit{{$alx->id}}" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalRequestLabel">Allowance/SSNIT Overview (%)</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ action('EmployeeController@update', $alx->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf

                                                        <div class="filter_div">
                                                            <i class="fa fa-home"></i>&nbsp;&nbsp; Rent
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->rent}}" @endif min="0" max="100" placeholder="Rent Allowance eg. 15" name="rent" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-check-square"></i>&nbsp;&nbsp;&nbsp; Prof.
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->prof}}" @endif min="0" max="100" name="prof" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-briefcase"></i>&nbsp;&nbsp; Resp.
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->resp}}" @endif min="0" max="100" name="resp" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;Risk
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->risk}}" @endif min="0" max="100" name="risk" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-car"></i>&nbsp;&nbsp;&nbsp;VMA
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->vma}}" @endif min="0" max="100" name="vma" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-headphones"></i>&nbsp;&nbsp;&nbsp;&nbsp;Ent.
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->ent}}" @endif min="0" max="100" name="ent" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-bed"></i>&nbsp;&nbsp;&nbsp;Dom.
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->dom}}" @endif min="0" max="100" name="dom" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp;Cola
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->cola}}" @endif min="0" max="100" name="cola" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-internet-explorer"></i>&nbsp;&nbsp;&nbsp;Int/Ut (GhC)
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->intr}}" @endif min="0" name="intr" required>
                                                        </div>
                                                
                                                        <div class="filter_div">
                                                            <i class="fa fa-taxi"></i>&nbsp;&nbsp;&nbsp;T&T (GhC)
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->tnt}}" @endif min="0" name="tnt" required>
                                                        </div>
                                                
                                                        @if (count($new_allows) > 0)
                                                            <p class="small_p">&nbsp; New Allowances</p>
                                                            @foreach ($new_allows as $new_alw)
                                                                <div class="filter_div">
                                                                    <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;{{ substr($new_alw->allow_name, 0, 5) }}... @if ($new_alw->allow_amt!=0) (Ghc) @endif
                                                                    <input type="number" step="any" @if ($new_alw->allow_perc==0)value="{{$new_alw->allow_amt}}" @else value="{{$new_alw->allow_perc}}" @endif min="0" @if ($new_alw->allow_perc!=0) max="100" @endif name="{{'new'.$new_alw->id}}" required>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        {{-- <div class="filter_div">
                                                            <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Cola 
                                                            <input type="number" step="any" @if ($alx!='')value="{{$alx->cola}}" @endif min="0" max="100" name="tnt" required>
                                                        </div> --}}
                                                        
                                                        <div class="form-group modal_footer">
                                                            <button type="submit" name="update_action" value="up_allowexp" class="load_btn" onclick="return confirm('Are you sure you want to update record!?')"><i class="fa fa-save"></i>&nbsp; Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $allowexp->links() }} --}}
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Allowance Exceptions
                            </div>
                        @endif
                    </div>

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


    <!-- Filter Modal -->
    <div class="modal fade" id="allow_overview" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Add Allowance Exception
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <form action="{{ action('EmployeeController@store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                       
                        <div class="filter_div">
                            <i class="fa fa-user-plus"></i> &nbsp; Add Employee
                            <select name="employee">
                                <option value="all" selected>Select Name</option>
                                @foreach ($employees as $emp)
                                    <option value="{{$emp->id}}">{{$emp->fname.' '.$emp->sname.' '.$emp->oname}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div> 
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                        </button> --}}
                        <button type="submit" name="store_action" value="add_allowexp" class="btn btn-primary me-1 mb-1">&nbsp; Add &nbsp;</button>
                        <button type="submit" name="store_action" value="remove_allowexp" class="btn btn-secondary me-1 mb-1">Remove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

 