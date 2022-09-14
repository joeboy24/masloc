
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
                    <li class="submenu-item active">
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
        <h3><i class="fa fa-address-book color6"></i>&nbsp;&nbsp;Add Employee</h3>
        <form action="{{ action('EmployeeController@store') }}" method="POST">
            @csrf
            <a href="/"><p class="print_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
            {{-- <a data-bs-toggle="modal" data-bs-target="#allow_overview"><p class="print_report">&nbsp;<i class="fa fa-file-text"></i>&nbsp; Allowance Overview</p></a>
            <a href="/taxexport"><p class="view_daily_report">&nbsp;<i class="fa fa-download color5"></i>&nbsp; Download Excel</p></a> --}}
            <button type="submit" name="store_action" value="calc_taxation" class="print_btn_small"><i class="fa fa-refresh"></i></button>
        </form>
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
                        <form action="{{ action('EmployeeController@store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                
                            {{-- <div class="filter_div" id="region">
                                <i class="fa fa-globe"></i> &nbsp; Region
                                <select name="region">
                                    <option value="all" selected>All Regions</option>
                                    @foreach ($regions as $reg)
                                        <option>{{$reg->region}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                
                            {{-- <div class="filter_div" id="bank">
                                <i class="fa fa-bank"></i> &nbsp; Bank Name
                                <select name="bank">
                                    <option value="all" selected>All Banks</option>
                                    @foreach ($banks as $bk)
                                        <option>{{$bk->bank}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                    
                            <div class="filter_div">
                                <i class="fa fa-pencil-square"></i> &nbsp; AFIS No.
                                <input type="text" name="afis_no">
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-user"></i> &nbsp; Firstname
                                <input type="text" name="fname" required>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-user"></i> &nbsp; Surname
                                <input type="text" name="sname" required>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-user"></i> &nbsp; Other Names
                                <input type="text" name="oname" placeholder="Optional">
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-calendar"></i> &nbsp; Date of Birth
                                <input type="date" name="dob" required>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-envelope"></i> &nbsp; Email
                                <input type="email" name="email" required>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-phone-square"></i> &nbsp; Phone
                                <input type="number" min="0" name="contact" required>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-address-book"></i> &nbsp; SSN
                                <input type="text" name="ssn" placeholder="Social Security No.">
                            </div>

                            <div class="filter_div">
                                <i class="fa fa-dot-circle-o"></i> &nbsp; Position
                                <select name="position">
                                    <option value="all" selected>Choose Position</option>
                                    @foreach ($position as $post)
                                        <option value="{{$post->id}}">{{$post->position}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter_div">
                                <i class="fa fa-dot-circle-o"></i> &nbsp; Sub Div.
                                <select id="subdiv" name="sub_div" onchange="fixtt()">
                                    <option value="all" selected>Choose Sub Div</option>
                                    @foreach ($title as $tt)
                                        <option>{{$tt->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter_div">
                                <i class="fa fa-suitcase"></i> &nbsp; Salary Cat.
                                <select id="posval" name="salary_cat" onchange="fixamt()">
                                    <option value="all" selected>Choose Salary Cat.</option>
                                    @foreach ($position as $post)
                                        <option value="{{$post->basic_sal}}">{{$post->position.' - GhC '.number_format($post->basic_sal, 2)}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-suitcase"></i> &nbsp; Salary
                                <input id="sal_amt" type="number" min="0" step="any" name="basic_sal" required>
                            </div>

                            <script>
                                posval = document.getElementById('posval');
                                salval = document.getElementById('sal_amt');
                                function fixamt() {
                                    // alert(salval.value)
                                    $sal = posval.value
                                    salval.value = $sal;
                                    // salval.value = $sal.toFixed(2);
                                }
                                
                                // subdiv = document.getElementById('subdiv');
                                // salary_id = document.getElementById('salary_id');
                                // function fixtt() {
                                //     // alert(salval.value)
                                //     $sal2 = subdiv.value
                                //     salary_id.value = $sal2;
                                //     // salval.value = $sal.toFixed(2);
                                // }
                            </script>

                            <div class="filter_div">
                                <i class="fa fa-folder-open"></i> &nbsp; Department
                                <select name="dept">
                                    <option value="all" selected>Choose Department</option>
                                    @foreach ($department as $dept)
                                        <option>{{$dept->dept_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="filter_div">
                                <i class="fa fa-folder"></i> &nbsp; Sub Division
                                <select name="dept">
                                    <option value="all" selected>Choose Sub Div.</option>
                                    @foreach ($sub_div as $sub)
                                        <option>{{$sub->sub_div}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                
                            <div class="filter_div" id="region">
                                <i class="fa fa-globe"></i> &nbsp; Region
                                <select name="region">
                                    <option value="all" selected>Select Region</option>
                                    @foreach ($regions as $reg)
                                        <option>{{$reg->region}}</option>
                                    @endforeach
                                    @foreach ($main_regions as $mreg)
                                        <option>{{$mreg->reg_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-calendar"></i> &nbsp; Date Employed
                                <input type="date" name="date_emp" required>
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-cc-visa"></i> &nbsp; Account No.
                                <input type="number" min="0" name="acc_no" required>
                            </div>
                
                            <div class="filter_div" id="bankdiv">
                                <i class="fa fa-bank"></i> &nbsp; Bank Name
                                <select name="bank" id="bank" onchange="bankcheck()">
                                    <option value="all" selected>Choose Bank</option>
                                    <option value="na">Not Available</option>
                                    @foreach ($banks as $bk)
                                        <option value="{{$bk->bank_id}}">{{$bk->bank}}</option>
                                    @endforeach
                                    @foreach ($banks2 as $bk2)
                                        <option value="{{$bk2->id}}">{{$bk2->bank_abr}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="filter_div" id="newbank">
                                <i class="fa fa-edit"></i> &nbsp; New Bank
                                <input type="text" name="bank2" placeholder="Type Bank Name Here">
                            </div>
                
                            <div class="filter_div" id="branch_div">
                                <i class="fa fa-bank"></i> &nbsp; Bank Branch
                                <select name="branch" id="branch" onchange="branchcheck()">
                                    <option value="all" selected>Choose Branch</option>
                                    <option value="na">Not Available</option>
                                    @foreach ($bank_branch as $br)
                                        <option>{{$br->branch}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="filter_div" id="newbranch">
                                <i class="fa fa-edit"></i> &nbsp; New Branch
                                <input type="text" name="branch2" placeholder="Type New Branch Here">
                            </div>
                    
                            <div class="filter_div">
                                <i class="fa fa-camera"></i> &nbsp; Photo
                                <input type="file" name="pass_photo">
                            </div>

                            <script>
                                bankdiv = document.getElementById('bankdiv');
                                bank = document.getElementById('bank');
                                newbank = document.getElementById('newbank');
                                newbank.style.display = 'none';
                                function bankcheck() {
                                    // alert(bank.value);
                                    if (bank.value == 'na') {
                                        newbank.style.display = "block";
                                    } else {
                                        newbank.style.display = 'none';
                                    }
                                }

                                // document.getElementById('branch_div').style.display = 'none';
                                
                                branch_div = document.getElementById('branch_div');
                                branch = document.getElementById('branch');
                                newbranch = document.getElementById('newbranch');
                                newbranch.style.display = 'none';

                                function branchcheck() {
                                    // alert(branch.value);
                                    if (branch.value == 'na') {
                                        newbranch.style.display = "block";
                                    } else {
                                        newbranch.style.display = 'none';
                                    }
                                }
                            </script>
                    
                            {{-- <div class="filter_div">
                                <i class="fa fa-camera"></i> &nbsp; Photo
                                <input type="file" name="photo" required>
                            </div> --}}
                            <p>&nbsp;</p>
                            {{-- <div style="height: 10px; width: 100%">&nbsp;</div> --}}

                            <div class="allow_div">
                                <p class="allow_hd">Select Allowances to Apply</p>

                                <label class="col-md-5" for="rentAlw"><input id="rentAlw" type="checkbox" name="rent_allow"> &nbsp; Rent </label>
                                <label class="col-md-5" for="profAlw"><input id="profAlw" type="checkbox" name="prof_allow"> &nbsp; Professional </label>
                                <label class="col-md-5" for="respAlw"><input id="respAlw" type="checkbox" name="resp_allow"> &nbsp; Responsibility </label>
                                <label class="col-md-5" for="riskAlw"><input id="riskAlw" type="checkbox" name="risk_allow"> &nbsp; Risk </label>
                                <label class="col-md-5" for="vmaAlw"><input id="vmaAlw" type="checkbox" name="vma_allow"> &nbsp; Vehicle Maintainance </label>
                                <label class="col-md-5" for="entAlw"><input id="entAlw" type="checkbox" name="ent_allow"> &nbsp; Entertainment </label>
                                <label class="col-md-5" for="domAlw"><input id="domAlw" type="checkbox" name="dom_allow"> &nbsp; Domestic </label>
                                <label class="col-md-5" for="intrAlw"><input id="intrAlw" type="checkbox" name="intr_allow"> &nbsp; Internet & Others </label>
                                <label class="col-md-5" for="tntAlw"><input id="tntAlw" type="checkbox" name="tnt_allow"> &nbsp; T & T </label>
                                <label class="col-md-5" for="colaAlw"><input id="colaAlw" type="checkbox" name="cola_allow"> &nbsp; Cola </label>

                                @foreach ($allowances as $item)
                                    <label class="col-md-5" for="Alw{{$item->id}}"><input id="Alw{{$item->id}}" type="checkbox" name="allow{{$item->id}}"> &nbsp; {{$item->allow_name}} </label>
                                @endforeach
                            </div>
                            
                            <div class="form-group modal_footer">
                                <button type="submit" name="store_action" value="add_emp" class="load_btn"><i class="fa fa-save"></i>&nbsp; Save</button>
                            </div>
                        </form>
                        
                        <!-- Employee Uploads -->
                        {{-- <div class="col-md-12 my_borders">
                            <form class="form form-horizontal" action="{{action('EmployeeController@store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h5>Upload Employees Data</h5>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input type="file" name="ex_file" multiple class="form-control" id="inputGroupFile01" >
                                </div>

                                <!--div class="input-group mb-8">
                                    <label class="input-group-text" for="inputGroupSelect01">Upload For</label>
                                    <select name="use" class="form-select" id="inputGroupSelect01">
                                        <option selected>Gallery Use</option>
                                        <option>System Use</option>
                                    </select>
                                </div-->

                                <div style="height: 20px"></div>
                                <h6>NOTE</h6>
                                <p class="mid_p">Check file extention before clicking on upload</p>
                                <p class="small_p">System may only accept Excel files</p>

                                <div style="height: 10px"></div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-dark me-1 mb-1" name="store_action" value="import_employee">Upload</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </form>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
        

@endsection

 