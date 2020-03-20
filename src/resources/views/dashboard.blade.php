@extends('layouts/header')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        .box-5px-pt{
            width: 20%;
            padding: 5px 5px;
        }

        .card{
            border-radius: 7px;
        }

        .card .card-header-customer{
            display: block;
            font-size: 14px;
            font-weight: 400;
        }

        .card .card-customer-count{
            float: left;
            font-size: 30px;
            font-weight: 600;
            color: #000;
        }

        .card .card-customer-icon{
            float: right;
            margin-top: 8px;
            font-size: 37px;
        }

        .card .resource{
            color: #a6d8a7;
        }

        .card .home{
            color: #9da7da;
        }

        .card .heart{
            color: #f38eb0;
        }

        .card .client{
            color: #cdacdb;
        }

        .card .activeClient{
            color: #faa19b;
        }

        .note-border{
            border-bottom: 3px solid #67a0c0;
        }

        .resource-border{
            border-bottom: 3px solid #67a0c0;
        }

        .top-client-border{
            border-bottom: 3px solid #e3608c;
        }

        .note-button{
            margin: 10px;
        }

        .top-client-table td{
            font-size: 16px;
        }

        .top-client-table tr td:nth-child(2){
            width: 35%;
            font-weight: 900;
            text-align: center;
        }

        .top-client-table tr td:nth-child(1){
            width: 75%;
            font-weight: 400;
            text-align: left;
            letter-spacing: 1px;
        }

        .pointer {
            cursor: pointer;
        }

        .btn-group .changeButton{
            border: 1px solid #5d78ff;
        }

        .tableBodyScroll tbody {
            display: block;
            max-height: 200px;
            overflow-y: scroll;
        }

        .tableBodyScroll thead, tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .tableBodyScroll tbody::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        .tableBodyScroll tbody::-webkit-scrollbar
        {
            width: 5px;
            height: 5px;
            background-color: #F5F5F5;
        }

        .tableBodyScroll tbody::-webkit-scrollbar-thumb
        {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: gray;
        }

        .note-edit-delete-position{
            float: right;
            padding: 10px 20px;
        }

        #noteTableBody p{
            overflow-wrap: break-word;
        }

        @media only screen and (min-width: 1025px) {
            .kt-wrapper{
                padding-top: 70px !important;
            }
        }

        @media only screen and (max-width: 992px) {
            .box-5px-pt{
                width: 25%;
            }
        }

        @media only screen and (max-width: 768px) {
            .box-5px-pt{
                width: 33%;
            }
        }

        @media only screen and (max-width: 576px) {
            .box-5px-pt{
                width: 50%;
            }
        }
    </style>

    <div class="container-fluid">

        <div class="row" style="width: 100%;margin-bottom: 20px">
            <div class="box-5px-pt">
                <div class="card">
                    <div class="card-body">
                        <span class="card-header-customer">Total Resource</span>
                        <span class="card-customer-count">{{ $counts['totalResource']}}</span>
                        <i class="fa fa-users card-customer-icon resource"></i>
                    </div>
                </div>
            </div>
            <div class="box-5px-pt">
                <div class="card">
                    <div class="card-body">
                        <span class="card-header-customer">In House Resources</span>
                        <span class="card-customer-count">{{ $counts['InHouseResource']}}</span>
                        <i class="fa fa-home card-customer-icon home"></i>
                    </div>
                </div>
            </div>
            <div class="box-5px-pt">
                <div class="card">
                    <div class="card-body">
                        <span class="card-header-customer">Client Side Resources</span>
                        <span class="card-customer-count">{{ $counts['ClientSideResource']}}</span>
                        <i class="fa fa-heart card-customer-icon heart"></i>
                    </div>
                </div>
            </div>
            <div class="box-5px-pt">
                <div class="card">
                    <div class="card-body">
                        <span class="card-header-customer">Total Clients</span>
                        <span class="card-customer-count">{{ $counts['totalClient']}}</span>
                        <i class="fa fa-user card-customer-icon client"></i>
                    </div>
                </div>
            </div>
            <div class="box-5px-pt">
                <div class="card">
                    <div class="card-body">
                        <span class="card-header-customer">Active Clients</span>
                        <span class="card-customer-count">{{ $counts['ActiveClient']}}</span>
                        <i class="fa fa-comments card-customer-icon activeClient"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-4 order-lg-3 order-xl-1">

                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title top-client-border">
                                Top Client
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <table class="tableBodyScroll">
                            <tbody class="top-client-table" style="max-height: 135px;">
                                @php ($i = 1)
                                @foreach($activeClientList as $key => $value)
                                <tr>
                                    <td>{{ $i++ }}. {{ $value->client_name }}</td>
                                    <td>{{ $value->resource }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 order-lg-3 order-xl-1">

                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title note-border">
                                Notes
                            </h3>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-brand note-button" onclick="openAddNote()">
                                <i class="la la-plus"></i>
                            Add Notes
                        </a>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Datatable -->
                        <table class="tableBodyScroll" id="">
                            <tbody id="noteTableBody" style="max-height: 135px">
                                @foreach($notesList as $keys => $value)
                                <tr id="noteTableId_{{ $value->id }}">
                                    <td>
                                        
                                        <span class="note-edit-delete-position">
                                            <a href="javascript:void(0)" data-id="{{ $value->id }}" data-message="{{ $value->notes }}" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>
                                            <a href="javascript:void(0)" onclick="deleteAccountant('{{ $value->id }}')"><i class="la la-trash" style="font-size: 18px"></i></a>
                                        </span>
                                        <p>{{ $value->notes }}</p>
                                        <p><b>Last Modified: </b>{{ $value->adddate }}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head d-flex align-items-center">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title resource-border">Resources</h3>
                            </div>
                            <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-default changeButton active" onclick="openResourceTab(this, 'tab-1-open', 'tab-2-open')">Current</button>
                                <button type="button" class="btn btn-default changeButton" onclick="openResourceTab(this, 'tab-2-open', 'tab-1-open')">Upcoming</button>
                            </div>
                            <div class="input-group" style="width: 30%;">
                                <input class="form-control py-2 border-right-0 border searchInputBox" type="text" placeholder="search" id="example-search-input" onkeyup="searchDataFromTable(this ,'tableBodySearch')" onchange="searchDataFromTable(this ,'tableBodySearch')">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-secondary border-left-0 border" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                <i class="fa fa-filter align-self-center pointer" style="padding-left: 12px;" onclick="openFilterModal()"></i>      
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="tab-content">
                                <ul id="tabs" class="nav nav-tabs" style="display: none">
                                    @php( $count = sizeOf($onBenchResource))
                                    <li class="nav-item"><a href="" data-target="#tab-1-open" data-toggle="tab" class="nav-link small text-uppercase active">Current Bench Resources</a></li>
                                    @php( $count = sizeOf($upcomingBenchResource))
                                    <li class="nav-item"><a href="" data-target="#tab-2-open" data-toggle="tab" class="nav-link small text-uppercase">Upcomming Bench Resources</a></li>
                                </ul>
                                <br>
                                <div id="tabsContent" class="tab-content">
                                    <div id="tab-1-open" class="tab-pane fade active show">
                                        <!-- <div class="row">
                                            <div class="col-md-9"></div>
                                            <div class="col-md-3">
                                                <div class="md-form active-cyan active-cyan-2 mb-3">
                                                    <input class="form-control" type="text" placeholder="Search" onkeyup="searchDataFromTable(this ,'tableBodyScroll1')">  
                                                </div>
                                            </div>
                                        </div> -->
                                        <table class="tableBodyScroll tableBodySearch table table-striped- table-bordered table-hover table-checkable" id="">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Technology</th>
                                                    <th>Experience</th>
                                                    <th>Resume</th>
                                                    <th>Idle days</th>
                                                </tr>
                                            </thead>
                                            <tbody id="onBenchResourceId">
                                            @if(!empty($onBenchResource)) 
                                                @foreach($onBenchResource as $keys => $datas)
                                                <tr>
                                                    <td>{{ $datas['name'] }}</td>
                                                    <td>{{ $datas['resident_address'] }}</td>
                                                    <td>{{ implode(', ', $datas['techname']) }}</td>
                                                    <td>{{ $datas['exp_date'] }}</td>
                                                    <td>
                                                        <a href="{{ $datas['resume'] }}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>                                                        
                                                    </td>
                                                    <td>{{ $datas['idleDays'] }}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        <!--end: Datatable -->
                                    </div>
                                    <div id="tab-2-open" class="tab-pane fade">
                                        <!--begin: Datatable -->
                                        <!-- <div class="row">
                                            <div class="col-md-9"></div>
                                            <div class="col-md-3">
                                                <div class="md-form active-cyan active-cyan-2 mb-3">
                                                    <input class="form-control" type="text" placeholder="Search" onkeyup="searchDataFromTable(this ,'tableBodyScroll2')">  
                                                </div>
                                            </div>
                                        </div> -->
                                        <table class="tableBodyScroll tableBodySearch table table-striped- table-bordered table-hover table-checkable" id="">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>                                            
                                                    <th>Address</th>
                                                    <th>Technology</th>
                                                    <th>Experience</th>
                                                    <th>Resume</th>
                                                    <th>Client Name</th>
                                                    <th>End Date</th>
                                                </tr>
                                            </thead>
                                            <tbody id="upcomingBenchResourceId">
                                            @if(!empty($upcomingBenchResource)) 
                                                @foreach($upcomingBenchResource as $keys => $datas)
                                                <tr>
                                                    <td>{{ $datas['name'] }}</td>
                                                    <td>{{ $datas['resident_address'] }}</td>
                                                    <td>{{ implode(', ', $datas['techname']) }}</td>
                                                    <td>{{ $datas['exp_date'] }}</td>
                                                    <td>
                                                        @if (strpos($datas['resume'], 'https://drive.google.com') !== false OR strpos($datas['resume'], 'https://docs.google.com') !== false)
                                                        <a href="{{ $datas['resume'] }}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>
                                                        @else
                                                        <a href="{{ url('/').$datas['resume']}}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>
                                                        @endif
                                                    </td>
                                                    <td>{{ $datas['client_name'] }}</td>
                                                    <td>{{ $datas['endDate'] }}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        <!--end: Datatable -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <div class="modal fade" id="openAddNotesModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
                </div>
                <div class="modal-body">
                    <div class="addNoteData">
                        <form id="addNoteForm">
                            <input type="hidden" tyoe="add">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Add Note</label>
                                        {!! Form::textarea('notes', '', ['class' => 'form-control', 'rows' => 3, 'cols' => 40, 'onchange' => "getAddTextCount(this)", 'onkeyup' => "getAddTextCount(this)"]) !!}
                                        <span id="getAddTextCountId">500 character</span>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="addNoteData btn btn-brand btn-elevate btn-icon-sm" onclick="addEditNoteToDatabase(this,'addNoteForm','{{ route('add-note') }}')">Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="openResourceFilterPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter By</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="searchFilterForm">
                        <div class="row">
                            <div class="form-group" style="width: 100%">
                                <label class="col-xl-12 col-form-label">Location </label>
                                <div class="col-xl-12">
                                    <input class="form-control" name="location" placeholder="Location" type="text" value="">
                                </div>
                            </div>

                            <div class="form-group" style="width: 100%">
                                <label class="col-xl-12 col-form-label">Technology</label>
                                <div class="col-xl-12">
                                {{ Form::select('technology[]', array( 'Language' => $technology),null, [ "class" => "form-control", "multiple"=>"multiple", "id"=>"kt_select2_3", 'style' => "width: 100% !important;" ] )}}
                                    <!-- <input class="form-control" name="technology" placeholder="Technology" type="text" value=""> -->
                                </div>
                            </div>

                            <div class="form-group" style="width: 100%">
                                <label class="col-xl-12 col-form-label">Experience </label>
                                <div class="row" style="padding: 10px">
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="experience[]" class="form-check-input" id="exampleCheck1" value="0-1">
                                            <label class="form-check-label" for="exampleCheck1">0-1 Year</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="experience[]" class="form-check-input" id="exampleCheck2" value="1-2">
                                            <label class="form-check-label" for="exampleCheck2">1-2 Year</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="experience[]" class="form-check-input" id="exampleCheck3" value="2-3">
                                            <label class="form-check-label" for="exampleCheck3">2-3 Year</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="experience[]" class="form-check-input" id="exampleCheck4" value="3+">
                                            <label class="form-check-label" for="exampleCheck4">3+ Year</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="resetFilterForm()">Reset</button>
                    <button type="button" class="btn btn-primary" onclick="searchFilterFunc()">Apply</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="openEditNotesModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Notes</h5>
            </div>
            <div class="modal-body">
                <div class="addNoteData">
                    <form id="updateNoteForm">
                        <input type="hidden" name="id" value="">
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Update Note</label>
                                    {!! Form::textarea('notes', '', ['class' => 'form-control', 'rows' => 3, 'cols' => 40, 'onchange' => "getAddTextCount(this)", 'onkeyup' => "getEditTextCount(this)"]) !!}
                                        <span id="getEditTextCountId">500 character</span>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="addNoteData btn btn-brand btn-elevate btn-icon-sm" onclick="addEditNoteToDatabase(this,'updateNoteForm','{{ route('update-note') }}')">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>

<script>
    function openAddNote(){
        $("#openAddNotesModalForm").modal('show');
    }

    function openEditNote(currentObj){
        let tempdata = $(currentObj).attr('data-message');
        $("#openEditNotesModalForm").find('[name="notes"]').val(tempdata);

        tempdata = tempdata.length;
        $("#getEditTextCountId").text((500-tempdata)+' character')
        $("#openEditNotesModalForm").find('[name="id"]').val($(currentObj).attr('data-id'));
        $("#openEditNotesModalForm").modal('show');
    }

    function addEditNoteToDatabase(currentObj, formId, postUrl){
        let note = $("#"+formId).find('textarea').val();
        if(note == ""){
            errorLogView(formId, 'Please enter the note');
            $("#"+formId).find('textarea').focus();
            return false;
        }

        let previousOnclick = '';
        let previousName = '';

        var formData = $("#"+formId).serialize();
        previousOnclick = $(currentObj).attr('onclick');
        previousName = $(currentObj).text();
        $(currentObj).text('Loading...');
        $(currentObj).removeAttr('onclick');

        $.ajax({
            type:"post",
            url:postUrl,
            data:formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){
                try {
                    let jsonData = JSON.parse(res);
                    if(jsonData.code == 200){
                        $('#'+formId)[0].reset();
                        $("#openAddNotesModalForm").modal('hide');
                        $("#openEditNotesModalForm").modal('hide');
                        // Swal.fire(
                        //     'Success!',
                        //     jsonData.message,
                        //     'success'
                        // )
                        closeSwal();
                        addUpdateNotesContain(jsonData.data);
                    }
                    else{
                        errorLogView(formId, jsonData.message);
                    }
                } catch (error) {
                    errorLogView(formId, 'Server side error');
                }
                $(currentObj).text(previousName);
                $(currentObj).attr('onclick',previousOnclick);
            },
            error:function(err){
                console.log(err);
                errorLogView(formId, 'Network Error');
                $(currentObj).text(previousName);
                $(currentObj).attr('onclick',previousOnclick);
            }
        })
    }

    function errorLogView(formId, messags){
        $("#"+formId).find('p').text(messags).css('text-align','center').css('color','red').css('font-weight','500').slideDown();
        setTimeout(function(){
            $("#"+formId).find('p').text(messags).css('text-align','center').slideUp();
        },3000);
    }

    function deleteAccountant(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be ablze to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "{{ route('delete-note') }}",
                data:{ 'id' : id},
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res){

                    try {
                        let jsonData = JSON.parse(res);
                        if(jsonData.code == 200){
                            // Swal.fire(
                            //     'Deleted!',
                            //     jsonData.message,
                            //     'success'
                            // )
                            $("#openAddNotesModalForm").modal('hide');
                            addUpdateNotesContain(jsonData.data)
                        }
                        else{
                            Swal.fire(
                                'warning!',
                                jsonData.message,
                                'fail'
                            )
                        }
                    } catch (error) {
                        Swal.fire(
                            'warning!',
                            'Server side error',
                            'fail'
                        )
                    }
                    closeSwal();
                    // $(currentObj).text(previousName);
                    // $(currentObj).attr('onclick',previousOnclick);
                    
                },
                error:function(err){
                    console.log(err);
                    Swal.fire(
                        'warning!',
                        'Network Error',
                        'fail'
                    )
                    closeSwal();
                    $(currentObj).text(previousName);
                    $(currentObj).attr('onclick',previousOnclick);
                }
            });
            
        }
        })
    }

    function closeSwal(){
        setTimeout(function(){
            swal.close();
        }, 1500);
    }

    function addUpdateNotesContain(data){
        let htmlData = '';

        if(parseInt(data.id) == 0 && data.notes != ""){
            htmlData = '<tr id="noteTableId_'+data.lastId+'">'+
                            '<td>'+
                                '<span class="note-edit-delete-position">'+
                                    '<a href="javascript:void(0)" data-id="'+data.lastId+'" data-message="'+data.notes+'" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>'+
                                    '<a href="javascript:void(0)" onclick="deleteAccountant(\''+data.lastId+'\')"><i class="la la-trash" style="font-size: 18px"></i></a>'+
                                '</span>'+
                                '<p>'+data.notes+'</p>'+
                                '<p><b>Last Modified: </b>'+data.adddate+'</p>'+
                            '</td>'+
                        '</tr>';
            $("#noteTableBody").append(htmlData);
        }
        else if(parseInt(data.id) > 0 && data.notes != ""){
            // console.log($("#noteTableBody").find('[data-id="3"]'));
            htmlData = '<td>'+
                            '<span class="note-edit-delete-position">'+
                                '<a href="javascript:void(0)" data-id="'+data.id+'" data-message="'+data.notes+'" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>'+
                                '<a href="javascript:void(0)" onclick="deleteAccountant(\''+data.id+'\')"><i class="la la-trash" style="font-size: 18px"></i></a>'+
                            '</span>'+
                            '<p>'+data.notes+'</p>'+
                            '<p><b>Last Modified: </b>'+data.adddate+'</p>'+
                        '</td>';
            $("#noteTableId_"+data.id).html(htmlData);
        }
        else if(parseInt(data.id) > 0 && data.notes == ""){
            $("#noteTableId_"+data.id).remove();
        }
    }

    function searchDataFromTable(currentObj, className){
        let serachValue;
        if(typeof currentObj == 'string'){
            serachValue = currentObj.toLowerCase();
        }
        else if(typeof currentObj == 'object'){
            serachValue = $(currentObj).val().toLowerCase();
        }
        else{
            return false;
        }
        let count = 0;
        let returnValue = 0;
        let returnValue2 = 0;

        $("."+className).find('tbody').find('tr').each(function(key, trObj){
            $(trObj).show();

            if(serachValue != ""){    
                $(trObj).find('td').each(function(key2, tdObj){
                    let tempData = $(tdObj).text().toLowerCase();
                    // console.log(tempData);
                    if(filterLocation != '' || filterTechnology != '' || filterExperience.length > 0){
                        if(getFilterCount(tempData) == 1){
                            returnValue++;
                        }
                        if(tempData != "" && tempData.includes(serachValue)){
                            returnValue2++;
                        }

                        if(returnValue != 0 && returnValue2 != 0){
                            count++;
                        }
                        
                    }
                    else if(tempData != "" && tempData.includes(serachValue)){
                        count++;
                    }
                })


                if(count == 0){
                    $(trObj).hide();
                }
                returnValue = 0;
                returnValue2 = 0;
                count = 0;   
            }
            else{
                if(filterLocation != '' || filterTechnology != '' || filterExperience.length > 0){
                    $(trObj).find('td').each(function(key2, tdObj){
                        let tempData = $(tdObj).text().toLowerCase();
                        returnValue = getFilterCount(tempData);
                        if(returnValue == 1){
                            count++;
                        }
                        // console.log(count);
                    })

                    if(count == 0){
                        $(trObj).hide();
                    }
                    count = 0;  
                }
            }

        });
    }

    function getFilterCount(searchResult){
        if(filterLocation != '' && filterTechnology != '' && filterExperience.length > 0){
            if(searchResult.includes(filterLocation) && searchResult.includes(filterTechnology)){
                for(let i = 0; i < filterExperience.length; i++){
                    if(filterExperience[i] == '0-1'){
                        if(searchResult.includes('0 year') || searchResult.includes('1 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '1-2'){
                        if(searchResult.includes('1 year') || searchResult.includes('2 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '2-3'){
                        if(searchResult.includes('2 year') || searchResult.includes('3 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '3+'){
                        for(let j = 3; j < 35; j++){
                            if(searchResult.includes(j+' year')){
                                return 1;
                            }
                        }
                    }
                }
            }
        }
        else if(filterLocation != '' && filterTechnology != ''){
            if(searchResult.includes(filterLocation)){
                for(let i = 0; i < filterExperience.length; i++){
                    if(filterExperience[i] == '0-1'){
                        if(searchResult.includes('0 year') || searchResult.includes('1 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '1-2'){
                        if(searchResult.includes('1 year') || searchResult.includes('2 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '2-3'){
                        if(searchResult.includes('2 year') || searchResult.includes('3 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '3+'){
                        for(let j = 3; j < 35; j++){
                            if(searchResult.includes(j+' year')){
                                return 1;
                            }
                        }
                    }
                }
            }
        }
        else if(filterTechnology != '' && filterExperience.length > 0){
            if(searchResult.includes(filterTechnology)){
                for(let i = 0; i < filterExperience.length; i++){
                    if(filterExperience[i] == '0-1'){
                        if(searchResult.includes('0 year') || searchResult.includes('1 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '1-2'){
                        if(searchResult.includes('1 year') || searchResult.includes('2 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '2-3'){
                        if(searchResult.includes('2 year') || searchResult.includes('3 year')){
                            return 1;
                        }
                    }
                    else if(filterExperience[i] == '3+'){
                        for(let j = 3; j < 35; j++){
                            if(searchResult.includes(j+' year')){
                                return 1;
                            }
                        }
                    }
                }
            }
        }
        else if(filterLocation != '' && filterExperience.length > 0){
            if(searchResult.includes(filterLocation) && searchResult.includes(filterTechnology)){
                return 1;;
            }
        }
        else if(filterLocation != ''){
            if(searchResult.includes(filterLocation)){
                return 1;;
            }
        }
        else if(filterTechnology != ''){
            if(searchResult.includes(filterTechnology)){
                return 1;;
            }
        }
        else if(filterExperience.length > 0){
            for(let i = 0; i < filterExperience.length; i++){
                if(filterExperience[i] == '0-1'){
                    if(searchResult.includes('0 year') || searchResult.includes('1 year')){
                        return 1;
                    }
                }
                else if(filterExperience[i] == '1-2'){
                    if(searchResult.includes('1 year') || searchResult.includes('2 year')){
                        return 1;
                    }
                }
                else if(filterExperience[i] == '2-3'){
                    if(searchResult.includes('2 year') || searchResult.includes('3 year')){
                        return 1;
                    }
                }
                else if(filterExperience[i] == '3+'){
                    // console.log('apply')
                    for(let j = 3; j < 35; j++){
                        if(searchResult.includes(j+' year')){
                            return 1;
                        }
                    }
                }
            }
        }

        return 0;
    }

    function openResourceTab(currentObj, id, id2){
        $("#"+id).attr('class','tab-pane fade active show');
        $("#"+id2).attr('class','tab-pane fade');

        $('.changeButton').attr('class','btn btn-default changeButton');
        $(currentObj).attr('class','btn btn-default changeButton active');
    }

    function openFilterModal(){
        $("#openResourceFilterPage").modal('show');
    }

    function resetFilterForm(){
        $("#searchFilterForm").trigger("reset");
        filterLocation = '';
        filterTechnology = '';
        filterExperience = [];
        $('.searchInputBox').val('');
        searchDataFromTable('','tableBodySearch');
        $("#kt_select2_3").val(null).trigger("change"); 

    }

    let filterLocation = '';
    let filterTechnology = '';
    let filterExperience = [];
    function searchFilterFunc(){
        let formData = $("#searchFilterForm").serializeArray();

        $.ajax({
            type:'post',
            url:"{{ route('resource-filter') }}",
            data:formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(rec){
                try{
                    let jsonData = JSON.parse(rec);
                    $("#onBenchResourceId").html('');
                    if(jsonData.onBenchResource.length > 0){
                        for(let j =0; j < jsonData.onBenchResource.length; j++){

                            let HtmlData = '<tr>'+
                                                '<td>'+jsonData.onBenchResource[j].name+'</td>'+
                                                '<td>'+jsonData.onBenchResource[j].resident_address+'</td>'+
                                                '<td>'+jsonData.onBenchResource[j].techname+'</td>'+
                                                '<td>'+jsonData.onBenchResource[j].exp_date+'</td>'+
                                                '<td>'+
                                                    '<a href="'+jsonData.onBenchResource[j].resume+'" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>'+
                                                '</td>'+
                                                '<td>'+jsonData.onBenchResource[j].idleDays+'</td>'+
                                            '</tr>';
                                            console.log(HtmlData);
                            $("#onBenchResourceId").append(HtmlData);
                        }
                    }

                    $("#upcomingBenchResourceId").html('');
                    if(jsonData.upcomingBenchResource.length > 0){
                        for(let j =0; j < jsonData.upcomingBenchResource.length; j++){

                            let HtmlData = '<tr>'+
                                                '<td>'+jsonData.upcomingBenchResource[j].name+'</td>'+
                                                '<td>'+jsonData.upcomingBenchResource[j].resident_address+'</td>'+
                                                '<td>'+jsonData.upcomingBenchResource[j].techname+'</td>'+
                                                '<td>'+jsonData.upcomingBenchResource[j].exp_date+'</td>'+
                                                '<td>'+
                                                    '<a href="'+jsonData.upcomingBenchResource[j].resume+'" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>'+
                                                '</td>'+
                                                '<td>'+jsonData.upcomingBenchResource[j].client_name+'</td>'+
                                                '<td>'+jsonData.upcomingBenchResource[j].endDate+'</td>'+
                                            '</tr>';
                            $("#upcomingBenchResourceId").append(HtmlData);
                        }
                    }
                }
                catch(ex){
                    console.log(ex);
                }
            },
            error:function(err){

            }
        })
        // filterExperience = [];
        // for(let i = 0; i < formData.length; i++){
        //     if(formData[i].name == "location"){
        //         filterLocation = formData[i].value;
        //     }
        //     else if(formData[i].name == "experience"){
        //         filterExperience.push(formData[i].value);
        //     }
        //     else if(formData[i].name == "technology"){
        //         filterTechnology = formData[i].value;
        //     }
        // }

        // $('.searchInputBox').val('');
        // searchDataFromTable('','tableBodySearch');
        $("#openResourceFilterPage").modal('hide');
    }

    function getAddTextCount(currentObj){
        let count = $(currentObj).val().length;
        if((500-count) > 0){
            $("#getAddTextCountId").text((500-count)+' character');
        }
        else{
            $("#getAddTextCountId").text('Character limit exceed');
        }
    }

    function getEditTextCount(currentObj){
        let count = $(currentObj).val().length;
        if((500-count) > 0){
            $("#getEditTextCountId").text((500-count)+' character');
        }
        else{
            $("#getEditTextCountId").text('Character limit exceed');
        }
    }
</script>
@stop