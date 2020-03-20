 @extends('layouts.header') @section('content')
 <style type="text/css">
    tr td i.fa.fa-check {
        color: green;
        font-size: 20px;
        text-align: center;
    }
    
    table tr th {
        background: #b0b0b0c4;
    }
    
    .dropdown-toggle::after {
        content: none !important;
        border: none;
    }
    
    button#dropdownMenuButton {
        border: none;
    }
    .orange {
        color: #ef6c00;
    }

    .table th, .table td{
        padding: 0.50rem !important;
        text-align: center;
    }

    .table td button{
        padding: 4px;
    }

    .show > .btn-secondary.dropdown-toggle, .btn-secondary:focus, .btn-secondary.active, .btn-secondary:active, .btn-secondary:hover {
        color: #595d6e;
        border-color: #e2e5ec;
        background-color: transparent;
    }

    @media only screen and (min-width: 1025px) {
        .kt-wrapper{
            padding-top: 90px !important;
        }
    }

    .div-scroll-style {
        display: block;
        max-width: 100%;
        overflow-y: scroll;
        overflow-x: scroll;
    }

    /* .div-scroll-style thead, tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    } */

    .div-scroll-style::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    .div-scroll-style::-webkit-scrollbar
    {
        width: 7px;
        height: 7px;
        background-color: #F5F5F5;
    }

    .div-scroll-style::-webkit-scrollbar-thumb
    {
        border-radius: 5px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: gray;
    }

    .dataTables_wrapper .pagination .page-item.active > .page-link {
        background: #48a7f9;
        color: #ffffff;
    }
</style>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head d-flex align-items-center">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Invoice Master
                </h3>
            </div>

            <div class="input-group" style="width: 30%;">
                <input class="form-control py-2 border-right-0 border searchInputBox" type="text" placeholder="search" id="example-search-input" onkeyup="searchInvoiceStatus(this)" onchange="searchInvoiceStatus(this)">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border-left-0 border" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>

        </div>
        <!-- <div class="kt-portlet__body">
        </div> -->
        <div class="kt-portlet__body kt-portlet__body--fit p3 div-scroll-style" style="overflow: auto;">

            <!--begin: Datatable -->
            <table class="table table-bordered  no-footer" id="html_table" width="100%" style="margin-top:0px !important;">
                <thead>
                    <tr>
                        <!-- <th width="300" title="Field #1">#</th> -->
                        <th rowspan="2" style="text-align: center;background: #fcfcfc;padding-right: 30px !important">Client Name</th>

                        @foreach($month_array_data as $month)
                        <th colspan="6" style="text-align: center;background: #fcfcfc">{{$month}}</th>
                        @endforeach
                    </tr>
                    <tr>

                         @foreach($month_array_data as $month)
                        <th class="back" title="Count" style="background: #f3f3f3;padding-right: 25px !important;">Cnt</th>
                        <th title="Payment" style="background: #48a7f9; color: white;">Pay</th>
                        <th title="Invoice Sent" style="background: #f3f3f3;">Inv</th>
                        <th title="Hard Copy" style="background: #f3f3f3;">HC</th>
                        <th title="P.F" style="background: #f3f3f3;">P.F</th>
                        <th title="Timesheet" style="background: #f3f3f3;">TS</th>
                        @endforeach
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($month_array as $key => $val)
                    <tr>
                        <td >
                           <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @php 
                                $client_name=explode('+#+#',$key);
                                @endphp
                                {{$client_name[0]}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if($client_name[2] !=1)
                                <a class="dropdown-item" href="#" onclick="updateClientStatus({{$client_name[1]}},'1')">Active</a>
                                @else
                                <a class="dropdown-item" href="#" onclick="updateClientStatus({{$client_name[1]}},'0')">Deactive</a>
                                @endif
                            </div>
                        </div>
                    </td>

                        @foreach($val as $val_key=> $month_data)

                        <td>{{$month_data['count']}}</td>
                        <td style="">
                        <!-- <td style="background: #c2c2c245"> -->
                            @if(!empty($month_data['data']))

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if($month_data['data']->payment==0)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @elseif($month_data['data']->payment==1)
                                    <i class="fa fa-check"></i>
                                    @elseif($month_data['data']->payment==2)
                                    <i class="fa fa-check" style="color: orange;"></i>
                                    @endif                                      
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'payment',0,{{$month_data['data']->id}})">Not Done</a>
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'payment',1,{{$month_data['data']->id}})">Full Done</a>
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'payment',2,{{$month_data['data']->id}})">partially done</a>
                                </div>
                            </div>
                            @else
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'payment',0)">Not Done</a>
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'payment',1)">Full Done</a>
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'payment',2)">partially Done</a>
                                </div>
                            </div>
                            @endif
                        </td>
                        <td>
     
                            @if(!empty($month_data['data']))
                      

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if($month_data['data']->invoice==0)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @elseif($month_data['data']->invoice==1)
                                    <i class="fa fa-check"></i>
                                    @elseif($month_data['data']->invoice==2)
                                    <i class="fa fa-check" style="color: orange;"></i>
                                    @endif  
                                    <!-- <i class="fa fa-check"></i> -->
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'invoice',0,{{$month_data['data']->id}})">No</a>
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'invoice',1,{{$month_data['data']->id}})">Yes</a>
                                    <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'invoice',2,{{$month_data['data']->id}})">partially done</a> -->
                                </div>
                            </div>
                            @else
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'invoice',0)">No</a>
                                    <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'invoice',1)">Yes</a>
                                    <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'invoice',2)">partially done</a> -->
                                </div>
                            </div>
                            @endif
                            
                        </td
                        >
                       
                         @if($month_data['clientdata']->is_invoice_need!='' && $month_data['clientdata']->is_invoice_need!= null && $month_data['clientdata']->is_invoice_need!= 'N')
                          <td>
                         @if(!empty($month_data['data']))

                         <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($month_data['data']->hard_copy==0)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @elseif($month_data['data']->hard_copy==1)
                                <i class="fa fa-check"></i>
                                @elseif($month_data['data']->hard_copy==2)
                                <i class="fa fa-check" style="color: orange;"></i>
                                @endif  
                                <!-- <i class="fa fa-check"></i> -->
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'hard_copy',0,{{$month_data['data']->id}})">No</a>
                                <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'hard_copy',1,{{$month_data['data']->id}})">Yes</a>
                                <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'hard_copy',2,{{$month_data['data']->id}})">partially done</a> -->
                            </div>
                        </div>
                        @else
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'hard_copy',0)">No</a>
                                <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'hard_copy',1)">Yes</a>
                                <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'hard_copy',2)">partially done</a> -->
                            </div>
                        </div>
                        
                        @endif
                         </td>
                        @else
                         <td style="background: #c2c2c245">
                             
                         </td>
                        @endif

                   
                    <td>
                        @if(!empty($month_data['data']))
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($month_data['data']->pf==0)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @elseif($month_data['data']->pf==1)
                                <i class="fa fa-check"></i>
                                @elseif($month_data['data']->pf==2)
                                <i class="fa fa-check" style="color: orange;"></i>
                                @endif  
                                <!-- <i class="fa fa-check"></i> -->
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'pf',0,{{$month_data['data']->id}})">No</a>
                                <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'pf',1,{{$month_data['data']->id}})">Yes</a>
                                <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'pf',2,{{$month_data['data']->id}})">partially done</a> -->
                            </div>
                        </div>
                        @else
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                 
                         </button>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'pf',0)">No</a>
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'pf',1)">Yes</a>
                            <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'pf',2)">partially done</a> -->
                        </div>
                    </div>
                    @endif
                </td>
               
                 @if($month_data['clientdata']->need_timesheet!='' && $month_data['clientdata']->need_timesheet!= null && $month_data['clientdata']->need_timesheet!= 'N') 
                 <td>
                 @if(!empty($month_data['data']))
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if($month_data['data']->timesheet==0)
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @elseif($month_data['data']->timesheet==1)
                            <i class="fa fa-check"></i>
                            @elseif($month_data['data']->timesheet==2)
                            <i class="fa fa-check" style="color: orange;"></i>
                            @endif  
                            <!-- <i class="fa fa-check"></i> -->
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'timesheet',0,{{$month_data['data']->id}})">No</a>
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'timesheet',1,{{$month_data['data']->id}})">Yes</a>
                            <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'timesheet',2,{{$month_data['data']->id}})">partially done</a> -->
                        </div>
                    </div>
                    @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'timesheet',0)">No</a>
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'timesheet',1)">Yes</a>
                            <!-- <a class="dropdown-item" href="#" onclick="updateStatus({{$month_data['month']}},{{$month_data['year']}},{{$month_data['client_id']}},'timesheet',2)">partially done</a> -->
                        </div>
                    </div>
                    @endif
              </td>
              @else

                <td style="background: #c2c2c245">
                             
                         </td>
                @endif
                 
                 @endforeach

            </tr>
            @endforeach


        </tbody>
    </table>
    <!--end: Datatable -->
</div>
</div>
</div>




@endsection

<!-- sript for page -->
@section('scripts')
<script src="{{ asset('js/pages/custom/projects/add-project.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
<script>
    var msg = '{{Session::get('
    alert ')}}';
    var exist = '{{Session::has('
    alert ')}}';
    var msg1 = '{{Session::get('
    exits ')}}';
    var exist1 = '{{Session::has('
    exits ')}}';

    if (exist) {
        Swal.fire({
            position: 'center',
            type: 'success',
            title: msg,
            showConfirmButton: false,
            timer: 2500
        })
    }

    if (exist1) {
        Swal.fire(msg1);
    }

    function updateStatus(month, year, client_id, type, status, id = null) {
        $.ajax({
            method: "POST",
            url: "update-status",
            data: {
                'client_id': client_id,
                'type': type,
                'month': month,
                'year': year,
                'id': id,
                'status': status,
                "_token": "{{ csrf_token() }}",
            }
        }).done(function(msg) {
            // Swal.fire({
            //     position: 'center',
            //     type: 'success',
            //     title: 'Status Updated Successfully',
            //     showConfirmButton: false,
            //     timer: 3000
            // })
            window.location.href = "";
        });
    }
    function updateClientStatus(client_id,status){
        $.ajax({
            method: "POST",
            url: "update-client-status",
            data: {
                'client_id': client_id,
                'status': status,
                "_token": "{{ csrf_token() }}",
            }
        }).done(function(msg) {
            // Swal.fire({
            //     position: 'center',
            //     type: 'success',
            //     title: 'Status Updated Successfully',
            //     showConfirmButton: false,
            //     timer: 3000
            // })
            window.location.href = "";
        });
    }

    let datatableContain;
    $(document).ready(function() {
        datatableContain = $('.table').DataTable({
            // paging: false
            "columnDefs": [
                { "orderable": false, "targets": 2 },
                { "orderable": false, "targets": 3 },
                { "orderable": false, "targets": 4 },
                { "orderable": false, "targets": 5 },
                { "orderable": false, "targets": 6 },
                { "orderable": false, "targets": 8 },
                { "orderable": false, "targets": 9 },
                { "orderable": false, "targets": 10 },
                { "orderable": false, "targets": 11 },
                { "orderable": false, "targets": 12 },
                { "orderable": false, "targets": 14 },
                { "orderable": false, "targets": 15 },
                { "orderable": false, "targets": 16 },
                { "orderable": false, "targets": 17 },
                { "orderable": false, "targets": 18 },
                { "orderable": false, "targets": 20 },
                { "orderable": false, "targets": 21 },
                { "orderable": false, "targets": 22 },
                { "orderable": false, "targets": 23 },
                { "orderable": false, "targets": 24 },
            ] 
        });

        $("#html_table_filter").parent().parent().hide();
        $("#html_table_info").attr('style','margin-left: 32px;margin-bottom: 12px;')
        $("#html_table_paginate").attr('style','float: left;')
    });

    function searchInvoiceStatus(currentObj){
        let value = $(currentObj).val();
        // $("#html_table_filter").find('input').val(value);
        datatableContain.search(value).draw() ;
    }
</script>
@stop