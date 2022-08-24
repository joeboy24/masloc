
@extends('layouts.app')

@section('header_text')
  <div class="header_top_col">
    <p class="logo_text1"><i class="fa fa-grav" style="font-size:1.4em"></i>&nbsp; SG<b class="logo_text2">MALL</b></p>
  </div>
  <div class="header_top_welcome">
    <p class="welcome">Welcome!&nbsp; <span>{{auth()->user()->name}}</span> 
      @if (auth()->user()->status == 'Administrator')
      | Administrator
      @endif
    </p>
    <a href="/logout"><button type="submit" class="logout_btn"><i class="fa fa-unlock-alt"></i>&nbsp; Logout</button></a>
  </div>
@endsection

@section('main_content')

  @include('inc.messages')

  <div class="top_content">
    <h5><i class="fa fa-file-text color6"></i>&nbsp;&nbsp;Reports </h5>
    <a href="/"><p class="view_daily_report">&nbsp;<i class="fa fa-chevron-left"></i>&nbsp; Back to Home</p></a>
    <a data-toggle="modal" data-target="#filter"><p class="view_daily_report">&nbsp;<i class="fa fa-filter color6"></i>&nbsp; Filter</p></a>
    <button type="button" class="print_btn_small" onclick="return confirm('Use filter option to query print record..!')"><i class="fa fa-print"></i></button>
  </div>

  {{-- <p>&nbsp;</p> --}}

  {{-- <section class="main_content">

    <div class="row">
      <div class="col-md-6 offset-md-3 tariff_summary">
        <p>Customer Name <span>{{session('cust_name')}}</span></p>
        <p>Store Number <span>{{session('store_no')}}</span></p>
        <p>Consumption <span>{{session('kcons')}}</span></p>
        <p>&nbsp;</p>
        <p>&nbsp;<span>GhC</span></p>
      </div>
    </div>

  </section> --}}



  <section class="main_content">
    @if (count($payments) > 0)
      <table class="myTable tariff_tbl">
        <thead>
          <th class="count_td">#</th>
          <th>Store Det.</th>
          <th>Month</th>
          <th>Bill (GhC)</th>
          <th>Amt. Paid</th>
          <th>Bal.</th>
          <th>Date Paid</th>
          <th class="float_right2">Actions</th>
        </thead>
        <tbody>

          @foreach ($payments as $pay)
          
              @if ($pay->del == 'yes')
                  <tr class="col-12 col-xl-6 del_danger">
              @else
                  <tr class="col-12 col-xl-6">
              @endif
                <td class="count_td">{{$i++}}</td>
                <td>{{$pay->customer->fullname}}<p class="small_p">Store No. : {{$pay->store->store_no}}</p></td>
                <td>{{$mth = date('F', strtotime('30-'.$pay->month.'-2022'));}}</td>
                <td>{{number_format($pay->bill, 2)}}</td>
                <td>{{number_format($pay->amt_paid, 2)}}
                  @if ($pay->cbf != 0)
                    <p class="small_p">CBF: {{number_format($pay->cbf, 2)}}</p>
                  @endif
                </td>
                <td>{{number_format($pay->bal, 2)}}</td>
                <td>{{date('d-M-Y', strtotime($pay->created_at));}} @ {{date('h:i A', strtotime($pay->created_at));}}</td>
                
                <form action="{{ action('TariffController@update', $pay->id) }}" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  @csrf
                  @if ($pay->del == 'yes')
                      <td class="text-bold-500 action_size_big float_right">
                          <button type="submit" name="update_action" value="restore_pay" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                      </td>
                  @else
                      <td class="text-bold-500 action_size_big float_right">
                          <button type="button"  data-toggle="modal" data-target="#pay_edit{{$pay->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                          <button type="submit" name="update_action" value="del_pay" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                      </td>
                  @endif
                  {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                </form>
              </tr>

              <!-- Pay Edit Modal -->
              <div class="modal fade" id="pay_edit{{$pay->id}}" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalRequestLabel">Edit Payment Info.</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ action('TariffController@update', $pay->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        
                        <div class="filter_div" id="">
                          <i class="fa fa-user"></i> &nbsp; Amt.
                          <input name="amt_paid" type="number" step="0.01" min="0" class="kwh_txt" placeholder="Enter Amount Here" value="{{$pay->amt_paid}}" required>
                        </div>
                  
                        <div class="filter_div">
                          <i class="fa fa-building"></i> &nbsp; Mth.
                          <select name="month">
                            <option value="0" selected>Select Month</option>
                            @if ($pay->month == 1)
                              <option value="01" selected>1 - January</option>
                            @else
                              <option value="01">1 - January</option>
                            @endif

                            @if ($pay->month == 2)
                              <option value="02" selected>2 - February</option>
                            @else
                              <option value="02">2 - February</option>
                            @endif

                            @if ($pay->month == 3)
                              <option value="03" selected>3 - March</option>
                            @else
                              <option value="03">3 - March</option>
                            @endif

                            @if ($pay->month == 4)
                              <option value="04" selected>4 - April</option>
                            @else
                              <option value="04">4 - April</option>
                            @endif

                            @if ($pay->month == 5)
                              <option value="05" selected>5 - May</option>
                            @else
                              <option value="05">5 - May</option>
                            @endif

                            @if ($pay->month == 6)
                              <option value="06" selected>6 - June</option>
                            @else
                              <option value="06">6 - June</option>
                            @endif

                            @if ($pay->month == 7)
                              <option value="07" selected>7 - July</option>
                            @else
                              <option value="07">7 - July</option>
                            @endif

                            @if ($pay->month == 8)
                              <option value="08" selected>8 - August</option>
                            @else
                              <option value="08">8 - August</option>
                            @endif

                            @if ($pay->month == 9)
                              <option value="09" selected>9 - September</option>
                            @else
                              <option value="09">9 - September</option>
                            @endif

                            @if ($pay->month == 10)
                              <option value="10" selected>10 - October</option>
                            @else
                              <option value="10">10 - October</option>
                            @endif

                            @if ($pay->month == 11)
                              <option value="11" selected>11 - November</option>
                            @else
                              <option value="11">11 - November</option>
                            @endif

                            @if ($pay->month == 12)
                              <option value="12" selected>12 - December</option>
                            @else
                              <option value="12">12 - December</option>
                            @endif

                          </select>
                          {{-- <select name="store_id" id="report_id">
                            @foreach ($stores as $store)
                              @if ($pay->store_id == $store->id)
                                @if ($store->customer_id != '')
                                  <option value="{{$store->id}}" selected>{{$store->store_no.' ('.substr($store->store_desc, 0,15).'...) - '.$store->customer->fullname}}</option>
                                @else
                                  <option value="{{$store->id}}" selected>{{$store->store_no.' ('.substr($store->store_desc, 0,15).'...)'}}</option>
                                @endif
                              @else
                                @if ($store->customer_id != '')
                                  <option value="{{$store->id}}">{{$store->store_no.' ('.substr($store->store_desc, 0,15).'...) - '.$store->customer->fullname}}</option>
                                @else
                                  <option value="{{$store->id}}">{{$store->store_no.' ('.substr($store->store_desc, 0,15).'...)'}}</option>
                                @endif
                              @endif

                            @endforeach
                          </select> --}}
                        </div>
                        
                        <div class="form-group modal_footer">
                          <button type="submit" name="update_action" value="update_pay" class="load_btn"><i class="fa fa-save"></i>&nbsp; Update</button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
          @endforeach

        </tbody>
      </table>
      {{ $payments->links() }}
    @else
      <div class="alert alert-danger">
        No records to display
      </div>
    @endif

    {{-- <div class="my_container_nospace">
      <p></p>
      {{ $tariffs->links() }}
      @if (count($tariffs) == 0)
        <div class="alert alert-danger">
          No records to display
        </div>
      @endif
    </div> --}}


  </section>


  <!-- Filter Modal -->
  <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Filter Options</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ action('ReportController@index') }}">
            {{-- @csrf --}}
            <div class="filter_div">
              <i class="fa fa-list"></i>
              <select onchange="report_script()" name="report_type" id="report_id">
                <option>Customer Reports</option>
                <option>Consumption Reports</option>
                <option>Payment Reports</option>
                <option>Generate Bill</option>
              </select>
            </div>
      
            <div class="filter_div">
              <i class="fa fa-globe"></i>
              <select name="store" id="store">
                <option value="All Stores" selected>All Stores</option>
                @foreach ($stores as $store)
                  @if ($store->customer_id != '')
                    <option value="{{$store->id}}">{{$store->store_no.' ('.substr($store->store_desc, 0,15).'...) - '.$store->customer->fullname}}</option>
                  @else
                    <option value="{{$store->id}}">{{$store->store_no.' ('.substr($store->store_desc, 0,15).'...)'}}</option>
                  @endif
                @endforeach
                {{-- @foreach ($regions as $region)
                  <option value="{{$region->id}}">{{$region->reg_name}} Region</option>
                @endforeach --}}
              </select>
            </div>

            <div class="filter_div" id="month">
              <i class="fa fa-building"></i> &nbsp;
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

            <script>
              function report_script() {
                report_id = document.getElementById('report_id').value;
                // alert(report_id);
                if (report_id == 'Customer Reports') {
                  document.getElementById('from').style.display = "none";
                  document.getElementById('to').style.display = "none";
                  document.getElementById('month').style.display = "none";
                  document.getElementById('orderby').style.display = "block";
                } else if (report_id == 'Generate Bill') {
                  document.getElementById('month').style.display = "block";
                  document.getElementById('from').style.display = "none";
                  document.getElementById('to').style.display = "none";
                  document.getElementById('orderby').style.display = "none";
                } else {
                  document.getElementById('from').style.display = "block";
                  document.getElementById('to').style.display = "block";
                  document.getElementById('month').style.display = "none";
                  document.getElementById('orderby').style.display = "block";
                }
              }
            </script>
      
            <div class="filter_div" id="from">
              From &nbsp;<i class="fa fa-arrow-right"></i>
              <input type="date" name="from">
            </div>
            
            <div class="filter_div" id="to">
              <i class="fa fa-arrow-left"></i>&nbsp; To
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
              <i class="fa fa-filter"></i>
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



@section('footer_menu')
  <section class="mobile_footer">
    <div class="menu_icons_container">
      <a href="/"><div class="my_col">
        <i class="fa fa-refresh"></i>
        <p class="menu_p">Refresh</p>
      </div></a>
      
      <a href="/"><div class="my_col activ_menu_col">
        <i class="fa fa-home active_icon"></i>
        <p class="menu_p active_p">Home</p>
      </div></a>
      
      <a href="/history"><div class="my_col">
        <i class="fa fa-file-text"></i>
        <p class="menu_p">History</p>
      </div></a>

      <a href="/settings"><div class="my_col">
        <i class="fa fa-gear"></i>
        <p class="menu_p">Settings</p>
      </div></a>
    </div>
  </section>
@endsection


    
  