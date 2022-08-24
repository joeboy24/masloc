
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
        width: 500px;
        margin: 0 auto;
        text-align: center;
        padding: 30px 10px;
        }

        .invHeaderTop h1 {
        text-transform: uppercase;
        font-size: 2.7em;
        color: rgb(255, 0, 76);
        margin-bottom: 0;
        padding-bottom: 0;
        letter-spacing: -2px;
        }

        .invHeaderTop h4 {
        font-size: 1.1em;
        color: #1e262e;
        font-weight: 500;
        margin: 10px 0;
        letter-spacing: 2px;
        }

        .invHeaderTop img {
            width: 62px;
            margin: 0 -20px -15px 0;
            /* background: #f1b0b7;
            display: none; */
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
        line-height: 15px;
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
            /* background-size: 10%;
            background-image: url(/maindir/images/coat1.png);
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact !important;
            opacity: 0.5; */
        }

        .invoice_overlay img {
            opacity: 0.1;
            width: 70%;
            margin: 35vh 15%;
            background: none;
            /* border-radius: 50%; */
        }

        @media print {
            #invoice {
                width: 100%;
                /* display: block !important;  */
            }

            .invoiceContent {
                width: calc(100% - 100px);
                padding: 30px 50px;
                margin: 0;
                background: #fff;
            }

            /* .invoice_overlay { */
                /* position: absolute;
                top: 0;
                left: 0;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            opacity: 0.5; */
            /* background-size: 5%!important; */
            /* background-image: url(/maindir/images/coat1.png); */
            /* background: #ff99003d; */
            /* } */

            /* .delAdd {
                margin-right: 100px;
            } */

            /* .invHeaderTop h1 {
                text-transform: uppercase;
                margin-top: -100px;
                color: #b11b00!important;
            } */
        }


    </style>
     
    <body style="background: #eee">

        <section id="invoice">
            <div class="invoiceContent">
                <div class="invoice_overlay">
                    <img src="/maindir/images/masloc.png" alt="">
                </div>
    
                <div class="invHeaderTop">
                    <h1><img src="/maindir/images/masloc.png" alt="">&nbsp;MASLOC</h1>
                    <P class="locInfo">Microfinance and Small Loans Center</P>
                    <P class="contactInfo">0017255382779</P>
                    <h4>www.masloc.gov.gh</h4>
                </div>
    
                
                
                @if ($report_type == 'payment')
                    <div class="invHeaderMid">
                        <div class="row">
                            <div class="mid_left">
                                <p>{{$query_region}}&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
                                {{-- <p>Ghana</p> --}}
                            </div>
                        </div>
                    </div>
                @endif
    
                <div style="height: 20px"></div>

                <div class="invCenter">
                    <table class="invCenterTbl">
                        <tbody>
                            @if ($report_type == 'payment')
                                <tr>
                                    <td class="col-sm-5">Total Amt. :<br><br></td>
                                    <td class="col-sm-3 color6">GhC {{number_format($payments->sum('due_amt') + $tax, 2)}}<br><br></td>
                                    <td class="col-sm-5">&nbsp;&nbsp;&nbsp;&nbsp;Payable Amt. : <b>GhC {{number_format($payments->sum('due_amt'), 2)}}</b><br><br></td>
                                    <td class="col-sm-5">&nbsp;&nbsp;&nbsp;&nbsp;Tax : GhC {{number_format(4433, 2)}}<br><br></td>
                                </tr>
                            @endif
                            <tr>
                                <td class="col-sm-5">Username :</td>
                                <td class="col-sm-3">{{'User'.date('hi').auth()->user()->id}}&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                
                                    @if ($report_type == 'payment')
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp;&nbsp;No. of Records : <b>{{number_format(count($payments))}}</b></td>
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Enrollment : <b>{{number_format($payments->sum('enrolment'))}}</b></td>
                                    @elseif ($report_type == 'school')
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp;&nbsp;No. of Schools : <b>{{number_format(count($schools))}}</b></td>
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Enrollment : <b>{{number_format($schools->sum('enrolment'))}}</b></td>
                                    @elseif ($report_type == 'employee')
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp;&nbsp;No. of Employees : <b>{{count($employees)}} </b></td>
                                        <td class="col-sm-2">&nbsp;&nbsp;&nbsp; Total : <b>{{number_format(422330.22, 2)}}</b></td>
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
                                    <th class="pl">Caterer Details</th>
                                    <th class="pl">Month</th>
                                    <th class="pr">Amount Due(GhC)</th>
                                    <th class="pr">Amount Paid(GhC)</th>
                                    <th class="pr">Status</th>
                                </thead>

                                <tbody>
                                    @foreach ($payments as $pmt)
                                        <tr>
                                            <td class="col-sm-1 pl">{{$c++}}</td>
                                            <td class="col-sm-4 pl"><h4>{{$pmt->caterer->name}}</h4><p>{{$pmt->school->sch_name}}</p></td>
                                            <td class="col-sm-2 pl cap1">{{date('M / Y', strtotime($pmt->date))}}</td>
                                            <td class="col-sm-3 pr"><p><h4 class="taxed color6">{{number_format($pmt->due_amt + ($pmt->tax * $pmt->day_count * $pmt->enrolment), 2)}}&nbsp;</h4><br><h4>({{number_format($pmt->due_amt, 2)}})</h4><br>for {{$pmt->day_count}} days</p></td>
                                            <td class="col-sm-1 pr"><h4 class="color6">Tax: -{{$pmt->tax * $pmt->day_count * $pmt->enrolment}}</h4><br><h4>{{number_format($pmt->amt_paid, 2)}}</h4><p>Enr. : {{$pmt->enrolment}}</p></td>
                                            <td class="col-sm-1 pr cap1">
                                                @if ($pmt->status == 'no')
                                                    Not Paid
                                                @else
                                                    <i class="fa fa-check color4"></i> Paid
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="invTot">
                                        <td class="col-sm-1 pl"></td>
                                        <td class="col-sm-4"><h4>Total</h4><br></td>
                                        <td class="col-sm-3"></td>
                                        <td class="col-sm-1 pr"><h4 class="color6">{{number_format($payments->sum('due_amt') + $tax, 2)}}&nbsp;</h4><br><h4>({{number_format($payments->sum('due_amt'), 2)}})</h4><br></td>
                                        <td class="col-sm-2 pr"><h4 class="color6">Tax: -{{number_format($tax, 2)}}</h4><br><h4>{{number_format($payments->sum('amt_paid'), 2)}}</h4><br></td>
                                        <td class="col-sm-1 pr"></td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger">
                                No records to display
                            </div>
                        @endif
                        
                    @elseif ($report_type == 'school')

                        <!-- School Tbl -->
                        @if(count($schools) > 0)
                            <table class="invBottomTbl">
                                <thead>
                                    <th class="col-sm-6 pl no_count">#</th>
                                    <th class="pl">School Details</th>
                                    <th class="pl">Caterer</th>
                                    <th class="pl">Headteacher</th>
                                    <th class="pr">Enr.#</th>
                                    <th class="pr">Status</th>
                                </thead>

                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td class="col-sm-1 pl">{{$c++}}</td>
                                            <td class="col-sm-4 pl"><h4>{{$school->sch_name}}</h4><p>{{$region[$school->region_id-1]->reg_name}} Region | {{$school->district}} District</p></td>
                                            <td class="col-sm-3 pl cap1"><h4>{{$school->caterer->name}}</h4><p>Ezwich: {{$school->caterer->ezwich}}</p></td>
                                            <td class="col-sm-2 pl cap1">{{$school->headteacher}}</td>
                                            <td class="col-sm-1 pr">{{$school->enrolment}}</td>
                                            <td class="col-sm-1 pr cap1">{{$school->status}}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="invTot">
                                        <td class="col-sm-1 pl"></td>
                                        <td class="col-sm-4"><h4>Total</h4><br></td>
                                        <td class="col-sm-3"></td>
                                        <td class="col-sm-2 pr"></td>
                                        <td class="col-sm-1 pr"><h4>{{$schools->sum('enrolment')}}</h4><br></td>
                                        <td class="col-sm-1 pr"><h4></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger">
                                No records to display
                            </div>
                        @endif
                        
                    @elseif ($report_type == 'employee')

                        <!-- Caterer Tbl -->
                        @if(count($employees) > 0)
                            <table class="invBottomTbl">
                                <thead>
                                    <th class="col-sm-6 pl no_count">#</th>
                                    <th class="pl">Fullname</th>
                                    <th class="pl">Pos.</th>
                                    <th class="pl">Salary</th>
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
                                            <td class="col-sm-1 pl">null</td>
                                            <td class="col-sm-1 pl">{{$emp->salary}}</td>
                                            {{-- <td class="col-sm-3 pl">
                                                @foreach ($caterer->school as $item)
                                                    @if (count($caterer->school) == 1)
                                                        <h4>{{$item->sch_name}}</h4><p>Enr: 123 &nbsp;&nbsp;&nbsp; {{$region[$item->region_id-1]->reg_name}} Region</p>
                                                    @else
                                                        <h4>{{$item->sch_name}}</h4><p class="sch_double">Enr: 123 &nbsp;&nbsp;&nbsp; {{$region[$item->region_id-1]->reg_name}} Region</p>
                                                    @endif
                                                @endforeach
                                            </td> --}}
                                            <td class="col-sm-3 pl"><h4>{{$emp->contact}}</h4><p>{{ $emp->fname.$emp->id }}0@gmail.com</p><p>Address goes here</p></td>
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
                        
                    @endif
                    
                </div>
    
            </div>
        </section>
    
    </body>
    
    </html>