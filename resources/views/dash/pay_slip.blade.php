
<html>

    <head>
        <meta charset="utf-8">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'GSFP') }}</title>
    
        {{-- <link href="/maindir/css/inv_style.css" rel="stylesheet"> --}}
        <link href="/maindir/css/responsive.css" rel="stylesheet">
        {{-- <link href="/maindir/css/bootstrap2.min.css" rel="stylesheet">
        <link href="/maindir/css/font-awesome.min.css" rel="stylesheet"> --}}
        <link rel="stylesheet" href="/maindir/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <style>

        /* Invoice Section */


        @import url(http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,100);
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,800,300,600,700);
        @import url(http://fonts.googleapis.com/css?family=Abel);

        body {
        font-family: 'Roboto', sans-serif;
        background: none;
        position: relative;
        font-weight:400px;
        width: 100%;
        margin: 0;
        background: #1e262e;
        }

        #invoice {
        width: 80%;
        margin: 0 auto;
        background: #1e262e;
        }

        .invoiceContent {
        width: calc(100% - 100px);
        padding: 30px 50px;
        margin: 70px 0;
        background: #fff;
        /* background-size: 100%;
        background-image: url(/maindir/images/coat3.png); */
        }

        .invHeaderTop {
        width: 90%;
        margin: 0 auto;
        text-align: center;
        padding: 30px 10px;
        }

        .invHeaderTop h1 {
        text-transform: uppercase;
        font-size: 1.7em;
        /* color: rgb(255, 0, 76); */
        margin-bottom: 0;
        padding-bottom: 0;
        font-weight: 400;
        letter-spacing: 1px;
        }

        .invHeaderTop h4 {
        font-size: 1.1em;
        color: #1e262e;
        font-weight: 500;
        margin: 10px 0;
        letter-spacing: 2px;
        }

        .invHeaderTop img {
            width: 100px;
            margin: 0 -20px -35px 0;
            /* background: #f1b0b7;
            display: none; */
        }

        .logo2 {
            /* width: 70px!important; */
            padding-top: -20px!important;
        }

        .invHeaderMid {
            width: 100%;
            min-height: 20px;
            padding: 0 10px;
            margin: 0 0 10px 0;
            /* background: #1e262e; */
        }

        /* .invHeaderMid div {
            width: 25%;
            background: #1e262e;
            margin: 10px;
        } */

        .invHeaderMid p {
            margin: 0;
            padding: 3px 0;
            font-size: 0.9em;
            font-weight: 300;
        }

        .invHeaderMid p span {
            color: rgb(160, 160, 160);
        }

        .mid_left {
            width: calc(100% - 40px);
            float: left;
            /* margin-right: 2%; */
            padding: 10px 20px;
            border: 0.5px solid #ccc;
            border-radius: 7px;
            /* background: #1e262e; */
        }

        .mid_left p {
            float: left;
        }

        .mid_right {
            width: 45%;
            float: right;
            text-align: right;
            /* margin-right: 2%; */
            padding: 10px 20px;
            /* background: #1e262e; */
        }

        .locInfo {
        font-size: 0.9em;
        font-weight: 300;
        color: #363432;
        }

        .contactInfo {
        margin: -10px 0 0 0;
        color: #1e262e;
        font-weight: 500;
        font-size: 0.8em;
        }

        .invCenter {
        width: 100%;
        margin: 0;
        padding: 10px;
        border: 2px solid #1e262e;
        }

        .invBottom {
        width: 100%;
        padding: 20px;
        }

        .invBottomTbl {
        width: 100%;
        overflow-x: auto!important;
        }

        .invBottomTbl tr {
            /* line-height: 20px; */
            padding: 0;
        width: 100%;
        overflow-x: auto;
        }

        .invBottomTbl th {
        color: #1e262e;
        padding: 0 10px 5px 10px;
        border-bottom: 1px solid #eee;
        }

        .invBottomTbl td {
        margin: 0;
        color: #666663;
        font-size: 0.8em;
        font-weight: 400;
        /* line-height: 15px; */
        border-bottom: 1px solid #eee;
        padding: 5px 10px 10px 10px;
        }

        .invBottomTbl h4 {
        margin: 0 0 -7px 0;
        padding: 0;
        color: #1e262e;
        font-size: 1.2em;
        font-weight: 500;
        }

        .plwide {
            width: 500px!important;
        }

        .chrg_col {
            line-height: -15px;
            /* font-style: italic; */
            color: #898989!important;
            /* color: #1e262e; */
        }

        .chrg_col p {
            width: 135px;
            /* line-height: -15px; */
            margin: 0;
            font-style: normal;
            border-bottom: 1px solid #eee;
        }

        .chrg_col span {
            /* line-height: -15px; */
            float: right!important;
            font-style: normal;
            color: #1e262e!important;
        }

        .total_chrg {
            padding: 5px;
            background: #ffd9dc;
        }

        .sch_double {
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .pl {
        text-align: left;
        }

        .pr {
        text-align: right;
        }

        .invTot {
        border-top: #ccc!important;
        }

        .invBottomTbl .invTot td {
        border-top: 1px solid #eee;
        }

        .no_count {
            width: 10px;
        }

        .cap1 {
            text-transform: capitalize; 
        }

        .color1 { color: rgb(255, 0, 106)!important; }
        .color2 { color: rgb(234, 0, 255)!important; }
        .color3 { color: rgb(35, 137, 255)!important; }
        .color4 { color: rgb(15, 190, 173)!important; }
        .color5 { color: rgb(111, 0, 255)!important; }
        .color6 { color: rgb(255, 0, 76)!important; }
        .color7 { color: rgb(255, 196, 0)!important; }
        .color9 { color: rgb(92, 92, 92)!important; }
        .color10 { color: rgb(21, 21, 21)!important; }

 
        .alert {
            font-weight: 300;
            text-transform: uppercase;
            text-align: center;
            font-size: 0.8em;
            letter-spacing: 2px;
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem; }

        .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb; }
        .alert-danger hr {
            border-top-color: #f1b0b7; }
        .alert-danger .alert-link {
            color: #491217; }



        .invoice_overlay {
            position: absolute;
            top: 0;
            left: 10%;
            width: 80%;
            height: 100%;
            margin: 0 auto;
            background-size: 100%;
            background-image: url(/maindir/images/coat2.png);
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact !important;
            opacity: 0.05;
        }

        .invoice_overlay img {
            opacity: 0.04;
            width: 70%;
            margin: 35vh 15%;
            background: none;
            /* border-radius: 50%; */
        }

        .small_p {
            margin: 5px 0 0 0;
            font-size: 0.9em;
            color: #4486e9;
        }

        .banksum p {
            text-transform: uppercase;
            text-align: center;
            margin: 0;
        }

        .banksum h4 {
            text-transform: uppercase;
            text-align: center;
            margin: 10px;
        }

        .header1 {
            width: 90%;
            min-height: 260px;
            margin: 0 auto;
            border-bottom: 1px solid #eee;
        }

        .header2 {
            width: 90%;
            margin: 0 auto;
        }

        .bio {
            width: 60%;
            float: left;
        }

        .qq {
            width: 40%;
            float: right;
            /* background: #4486e9 */
        }

        .qq img {
            width: 50%;
            float: right;
        }

        .qq p {
        }

        .slip_tbl1 {
            text-transform: uppercase
        }

        .slip_tbl1 tr {
            line-height: 27px;
            font-weight: 300;
            font-size: 0.9em;
        }
        
        .td_heading {
            color: rgb(75, 75, 75);
        }

        .td_data {
            padding: 0 0 0 25px;
            color: rgb(122, 122, 122);
        }

        .my_focus td{
            text-transform: uppercase;
            color: #1e262e;
            font-weight: 700;
            font-size: 1em;
        }




        @media print {
            #invoice {
                width: 100%;
                /* display: block !important;  */
            }

            .invHeaderTop {
                width: 100%;
            }

            .invoiceContent {
                width: calc(100% - 100px);
                padding: 30px 50px;
                margin: 0;
                background: #fff;
            }

            .header1, .header2 {
                width: 100%;
            }
        }


    </style>
     
    <body style="background: #eee">

        <section id="invoice">
            <div class="invoiceContent">
                <div class="invoice_overlay">
                    <img src="/maindir/images/sgmall.png" alt="">
                </div>
    
                <div class="invHeaderTop">
                    <h1><img src="/maindir/images/masloc.png" alt=""> &nbsp; MicroFinance And Small Loans Centre <img class="logo2" src="/maindir/images/coat2.png" alt=""></h1>
                    <P class="locInfo">MASLOC, Office of the President</P>
                    <P class="locInfo">Box AH811, Accra - Ghana</P>
                    <P class="contactInfo">Pay Slip - July 2022</P>
                    {{-- <h4>___________</h4> --}}
                </div>

                <div class="header1">
                    <div class="bio">
                        <table class="slip_tbl1">
                            <tbody>
                                <tr>
                                    <td class="td_heading">Date:</td>
                                    <td class="td_data">{{date('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="td_heading">Employee&nbsp;Name:</td>
                                    <td class="td_data">{{$payslip->employee->fname.' '.$payslip->employee->sname.' '.$payslip->employee->oname}}</td>
                                </tr>
                                <tr>
                                    <td class="td_heading">AFIS NO:</td>
                                    <td class="td_data">{{$payslip->employee->afis_no}}</td>
                                </tr>
                                <tr>
                                    <td class="td_heading">Region:</td>
                                    <td class="td_data">{{$payslip->employee->region}}</td>
                                </tr>
                                <tr>
                                    <td class="td_heading">Department:</td>
                                    <td class="td_data">{{$payslip->employee->dept}}</td>
                                </tr>
                                <tr>
                                    <td class="td_heading">Position:</td>
                                    <td class="td_data">{{$payslip->employee->cur_pos}}</td>
                                </tr>
                                <tr>
                                    <td class="td_heading">Bank:</td>
                                    <td class="td_data">{{$payslip->employee->bank}}</td>
                                </tr>
                                <tr>
                                    <td class="td_heading">Account No.:</td>
                                    <td class="td_data">{{$payslip->employee->acc_no}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="qq">
                        <img src="/maindir/images/qq1.png" alt="">
                        {{-- <p>7345129</p> --}}
                    </div>
                </div>
                <p>&nbsp;</p>

                <div class="header2">
                    {{-- <table class="slip_tbl1"></table> --}}
                    <table class="invBottomTbl">

                        <thead>
                            {{-- <th class="col-sm-6 pl no_count">#</th> --}}
                            <th class="pl"></th>
                            <th class="pl">&nbsp;</th>
                            <th class="pl">DEDUCTION</th>
                            <th class="pr">PAYMENT</th>
                        </thead>
                        <tbody>
                            <tr class="my_focus">
                                <td class="col-sm-5 pl">Basic Salary</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">102,327.77</td>
                                <td class="col-sm-2 pr">72,123.05</td>
                            </tr>
                            <tr class="my_focus">
                                <td class="col-sm-5 pl">Less 5.5% SSF Deduction</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">102,327.77</td>
                                <td class="col-sm-2 pr">72,123.05</td>
                            </tr>
                            <td>&nbsp;</td><td></td><td></td><td></td>
                            <tr class="my_focus">
                                <td class="col-sm-5 pl">OTHER ALLOWANCES:</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl"></td>
                                <td class="col-sm-2 pr"></td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Rent Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Professional Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Responsibility Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Risk Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Vehicle Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Entertainment Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Domestic Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Internet & Other Utility</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">T & T Allowance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Back Pay</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr class="my_focus">
                                <td class="col-sm-5 pl">LESS OTHER DEDUCTIONS:</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl"></td>
                                <td class="col-sm-2 pr"></td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Income Tax (PAYE)</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Staff Loan</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr>
                                <td class="col-sm-5 pl">Salary Advance</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr class="my_focus">
                                <td class="col-sm-5 pl">Total Deduction</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr class="my_focus">
                                <td class="col-sm-5 pl">Net Pay</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                            <tr class="">
                                <td class="col-sm-5 pl">EMPLOYER SSF CONTRIBUTION(13%)</td>
                                <td class="col-sm-3 pl">&nbsp;</td>
                                <td class="col-sm-2 pl">7721.23</td>
                                <td class="col-sm-2 pr">2190.72</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
    
                <div style="height: 100px">
                </div>

                @if ($report_type == 'billing')
                
            
                    @foreach ($tarifs as $tarif)
                        <div style="height: 20px"></div>

                        <div class="invCenter">
                            <table class="invCenterTbl">
                                <tbody>
                                    <tr>
                                        <td class="col-sm-5">Issued By :</td>
                                        <td class="col-sm-3">{{'User'.date('hi').auth()->user()->id}}&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Total Kws. : <b>{{number_format($tarif->kcons)}}</b></td>
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Total Amt. : GhC <b>{{number_format($tarif->total_chrg, 2)}}</b></td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-5">Date Printed :</td>
                                        <td class="col-sm-3">{{$cur_date}}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-5">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-5">Month :</td>
                                        <td class="col-sm-3">{{$month}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
            
                        <div class="invBottom">

                            <!-- Billing Tbl -->
                            @if(count($tarifs) > 0)
                                <table class="invBottomTbl">
                                    <thead>
                                        <th class="col-sm-6 pl no_count">#</th>
                                        <th class="pl">Store Details</th>
                                        <th class="pl">Consumption</th>
                                        <th class="pl">Charges (GhC)</th>
                                        <th class="pl"></th>
                                        <th class="pr">Date</th>
                                    </thead>

                                    <tbody>
                                        {{-- @foreach ($tarifs as $tarif) --}}
                                            <tr>
                                                <td class="col-sm-1 pl">{{$c++}}</td>
                                                {{-- <td class="count_td">{{$i++}}</td> --}}
                                                <td class="col-sm-4 pl cap1"><h4>Store No. : {{$tarif->store->store_no}}</h4><p>{{$tarif->customer->fullname}}</p></td>
                                                <td class="col-sm-4 pl chrg_col"><h4>{{$tarif->kcons}} kws</h4><br>
                                                    <p>Current: <span class="chrg_span">{{$tarif->cur_kws}} kws</span></p>
                                                </td>
                                                {{-- <td class="col-sm-3 pl chrg_col"><p>Serv.Chrg: <span>{{number_format($tarif->serv_chrg, 2)}}</span></p>
                                                    <p>Vat: <span class="chrg_span">{{number_format($tarif->vat, 2)}}</span></p>
                                                    <p>NHIL: <span class="chrg_span">{{number_format($tarif->nhil, 2)}}</span></p>
                                                    <p>Getfund: <span class="chrg_span">{{number_format($tarif->getfund, 2)}}</span></p>
                                                    <p class="">&nbsp;</p>
                                                </td> --}}
                                                <td class="col-sm-3 pl chrg_col">
                                                    <p>Fuel/Plant Maintenance: <span class="chrg_span">{{number_format($tarif->fuel_plant_mtn, 2)}}</span></p>
                                                    @if ($tarif->other_chrg_amt != 0)
                                                        <p>Other Charges: <span class="chrg_span">{{number_format($tarif->other_chrg_amt, 2)}}</span></p>
                                                        <p>Other Chrg.Desc.: <span class="chrg_span">{{$tarif->other_chrg_desc}}</span></p><br>
                                                    @endif
                                                    <p class="total_chrg">Total: <span class="chrg_span">{{number_format($tarif->total_chrg, 2)}}</span></p>
                                                    {{-- <p>Strl. Levi: <span>{{number_format($tarif->strl_levi, 2)}}</span></p>
                                                    <p>Gov. Levi: <span class="chrg_span">{{number_format($tarif->gov_levi, 2)}}</span></p> --}}
                                                    <p class="">&nbsp;</p>
                                                </td>
                                                <td class="col-sm-3 pr">{{date('M. d, Y', strtotime($tarif->created_at))}}</td>
                                            </tr>
                                        {{-- @endforeach --}}
                                        <tr class="invTot">
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-4"><h4>Total</h4><br></td>
                                            <td class="col-sm-4">
                                                {{-- <h4>{{number_format($tarifs->sum('kcons'))}} kws</h4><br> --}}
                                            </td>
                                            <td class="col-sm-3"></td>
                                            <td class="col-sm-1 pr"><h4>GhC {{number_format($tarif->total_chrg, 2)}}</h4>
                                                {{-- number_format($payments[$p++]->sum('amt_paid'), 2) --}}
                                                {{-- <p>Amt. Paid: <span class="taxed color6">{{number_format($payments->sum('amt_paid'), 2)}}</span></p>
                                                <h4>CBF. :  <span class="taxed color6"></span>{{number_format($payments[count($payments)-1]->cbf, 2)}}</h4><br> --}}
                                            </td>
                                            <td class="col-sm-1 pr"><h4></h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No records to display
                                </div>
                            @endif
                            
                        </div>
                    @endforeach

                @elseif ($report_type == 'billing2')
                
                    @if ($report_type != 'employees')
                        <div class="invHeaderMid">
                            <div class="row">
                                <div class="mid_left">
                                    {{-- @if ($query_store == 'All Stores')
                                        <p><span>Store No.:</span> {{$query_store}}&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                    @else
                                        <p><span>Store No.:</span> {{$query_store->store_no}}&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                    @endif --}}
                                    <p><span>From:</span>&nbsp; 
                                        @if ($from != '')
                                            {{date('d M, Y', strtotime($from))}}
                                        @else-@endif
                                        &nbsp;&nbsp;&nbsp;&nbsp;</p>
                                    <p><span>To:</span>&nbsp; 
                                        @if ($to != '')
                                            {{date('d M, Y', strtotime($to))}}
                                        @else-@endif
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endif
            
                    <div style="height: 20px"></div>

                    <div class="invCenter">
                        <table class="invCenterTbl">
                            <tbody>

                                <tr>
                                    <td class="col-sm-5 cap1">{{$report_type}}' Report<br><br></td>
                                </tr>
                                @if ($report_type == 'payment')
                                    <tr>
                                        <td class="col-sm-5">Total Bill. :<br><br></td>
                                        <td class="col-sm-3 color6">GhC {{number_format($payments->sum('bill'), 2)}}<br><br></td>
                                        <td class="col-sm-5">&nbsp;&nbsp;&nbsp;&nbsp;Total Amt. Paid : <b>GhC {{number_format($payments->sum('amt_paid'), 2)}}</b><br><br></td>
                                        {{-- <td class="col-sm-5">&nbsp;&nbsp;&nbsp;&nbsp;Tax : GhC {{number_format($tax, 2)}}<br><br></td> --}}
                                    </tr>
                                @endif
                                <tr>
                                    <td class="col-sm-5">Issued By :</td>
                                    <td class="col-sm-3">{{'User'.date('hi').auth()->user()->id}}&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    
                                        @if ($report_type == 'payment')
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp;&nbsp;No. of Records : <b>{{count($payments)}}</b></td>
                                            {{-- <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Enrollment : <b>{{$payments->sum('enrolment')}}</b></td> --}}
                                        @elseif ($report_type == 'taxation')
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp;&nbsp;No. of Records : <b>{{count($taxation)}}</b></td>
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Net Total : <b>{{number_format($taxation->sum('net_amount'), 2)}}</b></td>
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Total Tax Payable : GhC <b class="color6">{{number_format($taxation->sum('tax_pay'), 2)}}</b></td>
                                        @elseif ($report_type == 'salaries')
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp;&nbsp;No. of Records : <b>{{count($salaries)}}</b></td>
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Net Total : <b>{{number_format($salaries->sum('net_aft_ded'), 2)}}</b></td>
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Income Tax Total : GhC <b class="color6">{{number_format($salaries->sum('income_tax'), 2)}}</b></td>
                                        @elseif ($report_type == 'employees')
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp;&nbsp;No. of Records : <b>{{count($employees)}} </b></td>
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Total Basic Sal. : GhC <b>{{number_format($employees->sum('salary'), 2)}}</b></td>
                                        @endif
                                </tr>
                                <tr>
                                    <td class="col-sm-5">Date Printed :</td>
                                    <td class="col-sm-3">{{$cur_date}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        
                    <div class="invBottom">

                        @if ($report_type == 'payment')

                            <!-- Payment Tbl -->
                            @if(count($payments) > 0)
                                <table class="invBottomTbl">
                                    <thead>
                                        <th class="col-sm-6 pl no_count">#</th>
                                        <th class="pl">Customer Details</th>
                                        <th class="pl">Month</th>
                                        <th class="pr">Amount Paid(GhC)</th>
                                        <th class="pr">Bill (GhC)</th>
                                        <th class="pr">Status</th>
                                        <th class="pr">Date</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($payments as $pmt)
                                            <tr>
                                                <td class="col-sm-1 pl">{{$c++}}</td>
                                                <td class="col-sm-4 pl"><h4>{{$pmt->customer->fullname}}</h4><p>{{$pmt->customer->contact}} - {{$pmt->store->store_no}}</p></td>
                                                <td class="col-sm-2 pl cap1">{{$mth = date('F', strtotime('30-'.$pmt->month.'-2022'));}}</td>
                                                <td class="col-sm-3 pr"><p><h4>{{number_format($pmt->amt_paid, 2)}}&nbsp;</h4><br><h4 class="taxed color6">Bal. {{number_format($pmt->bal, 2)}}&nbsp;</h4></td>
                                                <td class="col-sm-1 pr"><h4>{{number_format($pmt->bill, 2)}}&nbsp;</h4>
                                                    @if ($pmt->cbf != 0)
                                                      <p class="small_p">CBF: {{number_format($pmt->cbf, 2)}}</p>
                                                    @endif
                                                </td>
                                                <td class="col-sm-1 pr cap1">
                                                    @if ($pmt->amt_paid < $pmt->bill)
                                                        Not Paid
                                                    @else
                                                        <i class="fa fa-check color4"></i> Paid
                                                    @endif
                                                </td>
                                                <td class="col-sm-3 pr">{{date('M. d, Y', strtotime($pmt->created_at))}}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="invTot">
                                            <td class="col-sm-1 pl"></td>
                                            <td class="col-sm-4"><h4>Total (GhC)</h4><br></td>
                                            <td class="col-sm-3"></td>
                                            <td class="col-sm-1 pr"><h4>{{number_format($payments->sum('amt_paid'), 2)}}&nbsp;</h4><br>
                                                {{-- <h4 class="taxed color6">{{number_format($payments->sum('bill') - $payments->sum('amt_paid'), 2)}}&nbsp;</h4><br> --}}
                                            </td>
                                            <td class="col-sm-2 pr"><h4>{{number_format($payments->sum('bill'), 2)}}</h4><br></td>
                                            <td class="col-sm-1 pr"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No records to display
                                </div>
                            @endif
                            
                        @elseif ($report_type == 'salaries')

                            <!-- Salaries Tbl -->
                            @if(count($salaries) > 0)
                                <table class="invBottomTbl">
                                    <thead>
                                        <th class="col-sm-6 pl no_count">#</th>
                                        <th class="pl">Employee Name</th>
                                        {{-- <th class="pr">Position</th> --}}
                                        <th class="pl">Basic Salary</th>
                                        {{-- <th class="pl">Month</th> --}}
                                        <th class="pl">Basic Aft. SSF</th>
                                        {{-- <th class="pl">{{$allowoverview->prof}}% Prof. Allow</th> --}}
                                        <th class="pl">Total Taxable Income</th>
                                        {{-- <th class="pl">SSF&nbsp;@ {{$allowoverview->ssf}}%</th> --}}
                                        <th class="pl">Net Aft. Inc. Tax</th>
                                        <th class="pl">Allowances</th>
                                        <th class="pl">Back Pay</th>
                                        <th class="pl">Net Salary Before Deduction</th>
                                        <th class="pl">Staff Loan</th>
                                        <th class="pl">Net Salary After Deduction</th>
                                        <th class="pl">13%/12.5% SSF EMPLOYERS CONT.</th>
                                        <th class="pl">Total Deductions</th>
                                        <th class="pl">Bank Details</th>
                                        {{-- <th class="pr">Net Amt. (GhC)</th> --}}
                                        {{-- <th class="pr">Charges Cont.</th>
                                        <th class="pr">Status</th> --}}
                                    </thead>

                                    <tbody>
                                        @foreach ($salaries as $sal)
                                            <tr>
                                                <td class="col-sm-1 pl">{{$c++}}</td>
                                                <td class="col-sm-3 pl cap1`"><h4>{{ $sal->employee->fname.' '.$sal->employee->sname.' '.$sal->employee->oname }}</h4>
                                                    <p>SSN. : {{ $sal->ssn }}</p>
                                                    <p class="small_p">Pos. : {{ $sal->cur_pos }}</p>
                                                    <p class="small_p">Region : {{ $sal->region }}</p>
                                                    <p class="small_p">Email : {{ $sal->email }}</p>
                                                    <p>Dept. : {{ $sal->dept }}</p>
                                                </td>
                                                <td class="col-sm-3 pl">{{number_format($sal->salary, 2)}}
                                                    <p class="small_p">{{date('M Y', strtotime('01-'.$sal->month))}}</p>
                                                </td>
                                                {{-- <td class="col-sm-3 pl">{{date('F Y', strtotime('01-'.$sal->month))}}</td> --}}
                                                <td class="col-sm-3 pl">{{number_format($sal->sal_aft_ssf, 2)}}
                                                <p>SSF :&nbsp;{{number_format($sal->ssf, 2)}}</p></td>
                                                <td class="col-sm-1 pl">{{number_format($sal->taxable_inc, 2)}}
                                                    <p >Income Tax : <b class="color6">{{number_format($sal->income_tax, 2)}}</b></p>
                                                </td>
                                                {{-- <td class="col-sm-3 pl">{{number_format($sal->taxable_inc, 2)}}</td> --}}
                                                <td class="col-sm-3 pl">{{number_format($sal->net_aft_inc_tax, 2)}}</td>
                                                <td class="col-sm-3 pl chrg_col">
                                                    <p>{{$allowoverview->rent.' % Rent: '}} <span class="chrg_span"><b>{{number_format($sal->rent, 2)}}</b></span><p>
                                                    <p>{{$allowoverview->prof.' % Prof.: '}} <span class="chrg_span"><b>{{number_format($sal->prof, 2)}}</b></span></p>
                                                    <p>{{$allowoverview->resp.' % Resp: '}} <span class="chrg_span"><b>{{number_format($sal->resp, 2)}}</b></span></p>
                                                    <p>{{$allowoverview->risk.' % Risk: '}} <span class="chrg_span"><b>{{number_format($sal->risk, 2)}}</b></span></p>
                                                    <p>{{$allowoverview->vma.' % VMA: '}} <span class="chrg_span"><b>{{number_format($sal->vma, 2)}}</b></span></p>
                                                    <p>{{$allowoverview->ent.' % Ent.: '}} <span class="chrg_span"><b>{{number_format($sal->ent, 2)}}</b></span></p>
                                                    <p>{{$allowoverview->dom.' % Dom.: '}} <span class="chrg_span"><b>{{number_format($sal->dom, 2)}}</b></span></p>
                                                    <p>Int/Others: <span class="chrg_span"><b>{{number_format($sal->intr, 2)}}</b></span></p>
                                                    <p>T&T: <span class="chrg_span"><b>{{number_format($sal->tnt, 2)}}</b></span></p>
                                                </td>
                                                <td class="col-sm-3 pl">{{number_format($sal->back_pay, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($sal->net_bef_ded, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($sal->staff_loan, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($sal->net_aft_ded, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($sal->ssf_emp_cont, 2)}}</td>
                                                <td class="col-sm-3 pl color6">{{number_format($sal->tot_ded, 2)}}</td>
                                                <td class="col-sm-3 pl chrg_col">
                                                    <p>Acc/No.: <span class="chrg_span"><b>{{$sal->acc_no}}</b></span><p>
                                                    <p>Bank : <span class="chrg_span"><b>{{$sal->bank}}</b></span></p>
                                                    <p>Branch : <span class="chrg_span"><b>{{$sal->branch}}</b></span></p>
                                                </td>
                                                {{-- <td class="col-sm-3 pr"><h4>{{number_format($sal->net_amount, 2)}}</h4></td> --}}
                                            
                                            </tr>
                                        @endforeach
                                        <tr class="invTot">
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-4"><h4>Total (GhC)</h4><br></td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('salary'), 2)}}</h4><br></td>
                                            {{-- <td class="col-sm-3"></td> --}}
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('sal_aft_ssf'), 2)}}</h4><br>
                                                <h4>SSF.:&nbsp;{{number_format($salaries->sum('ssf'), 2)}}</h4><br>
                                            </td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('taxable_inc'), 2)}}</h4><br>
                                                <h4 class="color6">Inc.Tax&nbsp;:&nbsp;{{number_format($salaries->sum('income_tax'), 2)}}</h4><br>
                                            </td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('net_aft_inc_tax'), 2)}}</h4><br></td>
                                            <td></td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('back_pay'), 2)}}</h4><br></td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('net_bef_ded'), 2)}}</h4><br></td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('staff_loan'), 2)}}</h4><br></td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('net_aft_ded'), 2)}}</h4><br></td>
                                            <td class="col-sm-4"><h4>{{number_format($salaries->sum('ssf_emp_cont'), 2)}}</h4><br></td>
                                            <td class="col-sm-4"><h4 class="color6">{{number_format($salaries->sum('tot_ded'), 2)}}</h4><br></td>
                                            <td></td>
                                            {{-- <td class="col-sm-4 pr"><h4>{{number_format($salaries->sum('net_amount'), 2)}}</h4><br></td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No records to display
                                </div>
                            @endif

                        @elseif ($report_type == 'taxation')

                            <!-- Taxation Tbl -->
                            @if(count($taxation) > 0)
                                <table class="invBottomTbl">
                                    <thead>
                                        <th class="col-sm-6 pl no_count">#</th>
                                        <th class="pl">Employee Name</th>
                                        {{-- <th class="pr">Position</th> --}}
                                        <th class="pl">Gross Basic Salary</th>
                                        {{-- <th class="pl">Month</th> --}}
                                        <th class="pl">{{$allowoverview->rent}}% Rent / {{$allowoverview->prof}}% Prof. Allow</th>
                                        {{-- <th class="pl">{{$allowoverview->prof}}% Prof. Allow</th> --}}
                                        <th class="pl">Tot. Income / <br>SSF&nbsp;@ {{$allowoverview->ssf}}%</th>
                                        {{-- <th class="pl">SSF&nbsp;@ {{$allowoverview->ssf}}%</th> --}}
                                        <th class="pl">Taxable Income</th>
                                        <th class="pl">Total Tax Payable</th>
                                        <th class="pl">First GhC 319 - Next GhC 20,000</th>
                                        {{-- <th class="pl">First GhC 319</th>
                                        <th class="pl">Next GhC 419</th>
                                        <th class="pl">Next GhC 549</th>
                                        <th class="pl">Next GhC 3,539</th>
                                        <th class="pl">Next GhC 16,461</th>
                                        <th class="pl">Next GhC 20,000</th> --}}
                                        <th class="pr">Net Amt. (GhC)</th>
                                        {{-- <th class="pr">Charges Cont.</th>
                                        <th class="pr">Status</th> --}}
                                    </thead>

                                    <tbody>
                                        @foreach ($taxation as $tax)
                                            <tr>
                                                <td class="col-sm-1 pl">{{$c++}}</td>
                                                <td class="col-sm-3 pl cap1`"><h4>{{ $tax->employee->fname.' '.$tax->employee->sname.' '.$tax->employee->oname }}</h4>
                                                    <p class="small_p">Pos. : {{ $tax->cur_pos }}</p>
                                                </td>
                                                <td class="col-sm-3 pl">{{number_format($tax->salary, 2)}}
                                                    <p class="small_p">{{date('M Y', strtotime('01-'.$tax->month))}}</p>
                                                </td>
                                                {{-- <td class="col-sm-3 pl">{{date('F Y', strtotime('01-'.$tax->month))}}</td> --}}
                                                <td class="col-sm-3 pl">Rent :&nbsp;{{number_format($tax->rent, 2)}}
                                                <p>Prof.:&nbsp;{{number_format($tax->prof, 2)}}</p></td>
                                                <td class="col-sm-1 pl">{{number_format($tax->tot_income, 2)}}
                                                    <p>SSF : {{number_format($tax->ssf, 2)}}</p>
                                                </td>
                                                <td class="col-sm-3 pl">{{number_format($tax->taxable_inc, 2)}}</td>
                                                <td class="col-sm-3 pl color6">{{number_format($tax->tax_pay, 2)}}</td>
                                                <td class="col-sm-3 pl chrg_col">
                                                    <p>First 319: <span class="chrg_span"><b>{{number_format($tax->first1, 2)}}</b></span><p>
                                                    <p>Next 419: <span class="chrg_span"><b>{{number_format($tax->next1, 2)}}</b></span></p>
                                                    <p>Next 549: <span class="chrg_span"><b>{{number_format($tax->next2, 2)}}</b></span></p>
                                                    <p>Next 3,539: <span class="chrg_span"><b>{{number_format($tax->next3, 2)}}</b></span></p>
                                                    <p>Next 16,461: <span class="chrg_span"><b>{{number_format($tax->next4, 2)}}</b></span></p>
                                                    <p>Next 20,000: <span class="chrg_span"><b>{{number_format($tax->next5, 2)}}</b></span></p>
                                                </td>
                                                {{-- <td class="col-sm-3 pl">{{number_format($tax->next1, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($tax->next2, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($tax->next3, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($tax->next4, 2)}}</td>
                                                <td class="col-sm-3 pl">{{number_format($tax->next5, 2)}}</td> --}}
                                                <td class="col-sm-3 pr"><h4>{{number_format($tax->net_amount, 2)}}</h4></td>
                                            
                                                {{-- <td class="col-sm-4 pl cap1"><h4>Store No. : {{$tarif->store->store_no}}</h4><p>{{$tarif->customer->fullname}}</p></td>
                                                <td class="col-sm-4 pl chrg_col"><h4>{{$tarif->kcons}} kws</h4><br>
                                                    <p>Current: <span class="chrg_span">{{$tarif->cur_kws}} kws</span></p>
                                                    <p>Previous: <span class="chrg_span">{{$tarif->prev_kws}} kws</span></p>
                                                </td>
                                                <td class="col-sm-3 pl chrg_col">
                                                    <p>Fuel/Plant Maintenance: <span class="chrg_span">{{number_format($tarif->fuel_plant_mtn, 2)}}</span></p>
                                                    @if ($tarif->other_chrg_amt != '')
                                                        <p>Other Charges: <span class="chrg_span">{{number_format($tarif->other_chrg_amt, 2)}}</span></p>
                                                        <p>Other Chrg.Desc.: <span class="chrg_span">{{$tarif->other_chrg_desc}}</span></p><br>
                                                    <p class="total_chrg">Total: <span class="chrg_span">{{number_format($tarif->total_chrg, 2)}}</span></p>
                                                    @endif
                                                    
                                                    <p class="">&nbsp;</p>
                                                </td>
                                                <td class="col-sm-3 pr">{{date('M. d, Y', strtotime($tarif->created_at))}}</td> --}}
                                                
                                            </tr>
                                        @endforeach
                                        <tr class="invTot">
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-4"><h4>Total (GhC)</h4><br></td>
                                            <td class="col-sm-4"><h4>{{number_format($taxation->sum('salary'), 2)}}</h4><br></td>
                                            {{-- <td class="col-sm-3"></td> --}}
                                            <td class="col-sm-4"><h4>Rent&nbsp;:&nbsp;{{number_format($taxation->sum('rent'), 2)}}</h4><br>
                                                <h4>Prof.:&nbsp;{{number_format($taxation->sum('prof'), 2)}}</h4><br>
                                            </td>
                                            <td class="col-sm-4"><h4>{{number_format($taxation->sum('tot_income'), 2)}}</h4><br>
                                                <h4>SSF&nbsp;:&nbsp;{{number_format($taxation->sum('ssf'), 2)}}</h4><br>
                                            </td>
                                            <td class="col-sm-4"><h4>{{number_format($taxation->sum('taxable_inc'), 2)}}</h4><br></td>
                                            <td class="col-sm-4"><h4 class="color6">{{number_format($taxation->sum('tax_pay'), 2)}}</h4><br></td>
                                            <td></td>
                                            <td class="col-sm-4 pr"><h4>{{number_format($taxation->sum('net_amount'), 2)}}</h4><br></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No records to display
                                </div>
                            @endif
                            
                        @elseif ($report_type == 'employees')

                            <!-- Employee Tbl -->
                            @if(count($employees) > 0)
                                <table class="invBottomTbl">
                                    <thead>
                                        <th class="col-sm-6 pl no_count">#</th>
                                        <th class="pl">Fullname</th>
                                        <th class="pl">Position</th>
                                        <th class="pl">Salary (GhC)</th>
                                        <th class="pl">Contact</th>
                                        <th class="pr">Status</th>
                                    </thead>

                                    <tbody>

                                        @foreach ($employees as $emp) 
                                        
                                            <tr>

                                                <td class="col-sm-1 pl">{{$c++}}</td>
                                                <td class="col-sm-3 pl"><h4>{{ $emp->fname.' '.$emp->sname.' '.$emp->oname }}</h4>
                                                    <p class="small_p">SSN: {{ $emp->ssn }}</p>
                                                </td>
                                                <td class="col-sm-3 pl"><h4>{{ $emp->cur_pos }}</h4>
                                                    <p>Dept.: {{ $emp->dept }}</p>
                                                </td>
                                                <td class="col-sm-3 pl"><h4>{{ number_format($emp->salary, 2) }}</h4>
                                                    @if ($emp->staff_loan != '')
                                                        <p>Staff Loan : {{ number_format($emp->staff_loan, 2) }}</p>
                                                    @endif
                                                </td>
                                                <td class="col-sm-3 pl"><h4>{{ $emp->contact }}</h4><p>{{ $emp->email }}</p></td>
                                                {{-- <td class="col-sm-3 pl"><h4>{{ $emp->status }}</h4></td> --}}

                                                {{-- <td class="col-sm-3 pl">
                                                    <input type="hidden" value="{{$hold = $cust->store}}">
                                                    @if (count($cust->store) > 1)
                                                        @for ($i = 0; $i < count($cust->store); $i++)
                                                            <p>{{$i+1}} - {{$hold[$i]->store_no}}</p>
                                                        @endfor
                                                    @else
                                                        @for ($i = 0; $i < count($cust->store); $i++)
                                                            <p>{{$hold[$i]->store_no}}</p>
                                                        @endfor
                                                    @endif
                                                </td> --}}

                                                <td class="col-sm-1 pr cap1">{{$emp->status}}</td>
                                            
                                            </tr>
                                                
                                        @endforeach

                                    </tbody>

                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No records to display
                                </div>
                            @endif

                        @elseif ($report_type == 'Bank Summary')

                            <!-- Banks Summary Tbl -->
                            @if(count($salaries) > 0)

                                @for ($i = 1; $i <= count($banks); $i++)
                                    <table class="invBottomTbl">
                                        @if ($c == 1 && $salaries != '')
                                            <div class="banksum">
                                                <p>&nbsp;</p>
                                                <h4>{{$banks[$i-1]->bank}}</h4>
                                                <p>PAYROLL FOR MASLOC</p>
                                                <p>PMB CT 261, CANTONMENTS, ACCRA</p>
                                                <h4>Salary for {{date('F Y')}}</h4>
                                                <p>&nbsp;</p>
                                            </div> 
                                            <thead>
                                                <th class="col-sm-6 pl no_count">#</th>
                                                <th class="pl">Employee Name</th>
                                                <th class="pl">Account No.</th>
                                                <th class="pl">Bank Name</th>
                                                <th class="pl">Branch</th>
                                                <th class="pr">Net Pay (GhC)</th>
                                            </thead>
                                        @endif

                                        <tbody>
                                            <input type="hidden" value="{{$sum = 0}}">
                                            @foreach ($salaries as $sal) 
                                            
                                                @if ($sal->employee->bank_id == $i)
                                                    <tr>

                                                        <td class="col-sm-1 pl">{{$c++}}</td>
                                                        <td class="col-sm-3 pl"><h4>{{ $sal->employee->fname.' '.$sal->employee->sname.' '.$sal->employee->oname }}</h4>
                                                            {{-- <p class="small_p">SSN: {{ $sal->ssn }}</p> --}}
                                                        </td>
                                                        <td class="col-sm-3 pl">{{ $sal->acc_no }}</td>
                                                        <td class="col-sm-3 pl">{{ $sal->bank }}</td>
                                                        <td class="col-sm-3 pl">{{ $sal->branch }}</td>
                                                        <td class="col-sm-3 pr"><h4>{{number_format($sal->net_aft_ded, 2)}}</h4></td>

                                                        {{-- <td class="col-sm-3 pl"><h4>{{ $sal->contact }}</h4><p>{{ $sal->email }}</p></td>
                                                        <td class="col-sm-1 pr cap1">{{$sal->status}}</td> --}}
                                                    
                                                    </tr>
                                                    <input type="hidden" value="{{$sum = $sum + $sal->net_aft_ded}}">
                                                @endif
                                            @endforeach

                                            <tr>
                                                <td class="col-sm-1 pl"></td>
                                                <td class="col-sm-3 pl"><h4>{{$banks[$i-1]->bank_fullname}} Total</h4></td>
                                                <td class="col-sm-1 pl"></td>
                                                <td class="col-sm-1 pl"></td>
                                                <td class="col-sm-1 pl">{{number_format($sum, 2)}}</td>
                                            </tr>
                                            <input type="hidden" value="{{$c = 1}}">
                                        </tbody>

                                    </table>
                                @endfor
                            @else
                                <div class="alert alert-danger">
                                    No records to display
                                </div>
                            @endif


                            

                            {{-- @if (count($salaries) > 0)
                                @for ($i = 1; $i <= count($banks); $i++)
                            
                                    <table class="table mb-0 table-lg">

                                        @if ($c == 1)
                                            <div class="banksum">
                                                <h4>{{$banks[$i-1]->bank_fullname}}</h4>
                                                <p>PAYROLL FOR MASLOC</p>
                                                <p>PMB CT 261, CANTONMENTS, ACCRA</p>
                                                <h4>Salary for {{date('F Y')}}</h4>
                                            </div>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Employee Name</th>
                                                    <th>Account No.</th>
                                                    <th>Bank Name</th>
                                                    <th>Branch</th>
                                                    <th>Net Pay (GhC)</th>
                                                </tr>
                                            </thead>   
                                        @endif
                                                
                                        <tbody>
                                            <input type="hidden" value="{{$sum = 0}}">
                                            @foreach ($salaries as $sal)
                                                @if ($sal->employee->bank_id == $i)
                                                    @if ($c % 2 == 1)
                                                        <tr class="bg9">
                                                    @else
                                                        <tr>
                                                    @endif
                                                        <td>{{$c++}}</td>
                                                        <td class="text-bold-500">{{ $sal->employee->fname.' '.$sal->employee->sname.' '.$sal->employee->oname }}</td>
                                                        <td class="text-bold-500">{{$sal->employee->acc_no}}</td>
                                                        <td class="text-bold-500">{{$sal->employee->bank}}</td>
                                                        <td class="text-bold-500">{{$sal->employee->branch}}</td>
                                                        <td class="text-bold-500">{{number_format($sal->net_aft_ded, 2)}}</td>
                                                    </tr>
                                                    <input type="hidden" value="{{$sum = $sum + $sal->net_aft_ded}}">
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td></td><td><b>{{$banks[$i-1]->bank_fullname}} Total</b></td><td></td><td></td><td></td>
                                                <td class="text-bold-500"><b>{{number_format($sum, 2)}}</b></td>
                                            </tr>
                                            <input type="hidden" value="{{$c = 1}}">
                                        </tbody>

                                    </table>
                                    
                                @endfor
                                
                            @else
                                <div class="alert alert-danger">
                                    No Records Found
                                </div>
                            @endif --}}
                            
                        @endif
                        
                    </div>
        
                    
                @endif
    
            </div> 
        </section>
    
    </body>
    
    </html>