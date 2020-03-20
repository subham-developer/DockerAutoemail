@extends('layouts.header')

<!-- style for page -->
@section('style')
<link href="{{ asset('css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
@stop
<!-- End style for page -->

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- begin:: Content -->
	<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Content Head -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										Settings
									</h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									<div class="kt-subheader__group" id="kt_subheader_search">
										<span class="kt-subheader__desc" id="kt_subheader_total">
											 </span>
										<!--  -->
									</div>
									<div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
										<div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
										<div class="btn-toolbar kt-margin-l-20">
											<div class="dropdown" id="kt_subheader_group_actions_status_change">
												<button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
													Update Status
												</button>
												<div class="dropdown-menu">
													<ul class="kt-nav">
														<li class="kt-nav__section kt-nav__section--first">
															<span class="kt-nav__section-text">Change status to:</span>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="1">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="2">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="3">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="4">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On Hold</span></span>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<button class="btn btn-label-success btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
												Fetch Selected
											</button>
											<button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
												Delete All
											</button>
										</div>
									</div>
								</div>
								<div class="kt-subheader__toolbar">
								
							
								
								</div>
							</div>
						</div>

						<!-- end:: Content Head -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

							<!--begin::Portlet-->
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__body kt-portlet__body--fit">

									<!--begin: Datatable -->
									<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
										<table class="kt-datatable__table" style="display: block;overflow: scroll;">
											<thead class="kt-datatable__head">
												<tr class="kt-datatable__row" style="left: 0px;">
													<th class="kt-datatable__cell kt-datatable__toggle-detail"><span></span></th>
													<th data-field="RecordID" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check"></th>

													<!-- <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">logo</span></th> -->
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">contact</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">accountant_email</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">cc_email</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">salesperson</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">from_email</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">tech_head_email</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">geofence_email</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Reminder Mail</span></th>
													<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Reminder Days</span></th>
													<th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Actions</span></th>
												</tr>
											</thead>
											<tbody class="kt-datatable__body" style="">
												@foreach($settingDTL as $key => $data)
												<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
													<td class="kt-datatable__cell kt-datatable__toggle-detail"></td>
													<td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="RecordID"></td>
												
													<!-- <td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->logo}}</span></td> -->
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->contact}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->accountant_email}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->cc_email}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->salesperson}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->from_email}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->tech_head_email}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->geofence_email}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->reminder_email}}</span></td>
													<td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data->reminder_days}}</span></td>
													

													<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
														<span style="overflow: visible; position: relative; width: 133px;">		<div class="dropdown">
																<a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
																<i class="flaticon-more-1"></i>								
																</a>
																<div class="dropdown-menu dropdown-menu-right" style="overflow: visible;">					<ul class="kt-nav">						
																	 <li class="kt-nav__item">								
																	 <a class="kt-nav__link" href="{{ url('settingedit/' . $data->id) }}">
																	 	<i class="kt-nav__link-icon flaticon2-contract"></i>
																	 	<span class="kt-nav__link-text">Edit</span>			
																	 </a>
																	 </li>										
																	 <li class="kt-nav__item">									
																	 	<a class="kt-nav__link" href="#" onclick="viewSetting({{$data->id}})">						<i class="kt-nav__link-icon flaticon2-expand"></i>		<span class="kt-nav__link-text">View</span>
																	 	</a>										
																	 </li>										
																	 			
																	</ul>								
																</div>							
															</div>						
														</span>
													</td>
												</tr>
												@endforeach
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
									</tbody>
								</table>
								</div>
							</div>

							<!--end::Portlet-->

							<!--begin::Modal-->
							<div class="modal fade" id="kt_records_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Setting View</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true"></span>
											</button>
										</div>
										<div class="modal-body">
											<div class="kt-scroll" data-scroll="true" data-height="200">
												<div class="form-group">
													<label>Address</label>
													<div class="Addr"></div>
												</div>
												<div class="form-group">
													<label>Contact</label>
													<div class="Con"></div>
												</div>
												<div class="form-group">
													<label>Accountant Email</label>
													<div class="Ae"></div>
												</div>
												<div class="form-group">
													<label>CC Emails</label>
													<div class="Cc"></div>
												</div>
												<div class="form-group">
													<label>Sales Person Email</label>
													<div class="Se"></div>
												</div>
												<div class="form-group">
													<label>From Email</label>
													<div class="Fe"></div>
												</div>
												<div class="form-group">
													<label>Teach Head Email</label>
													<div class="Te"></div>
												</div>
												<div class="form-group">
													<label>Geofence Email</label>
													<div class="Ge"></div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-brand" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

							<!--end::Modal-->
						</div>

						<div class="col-xl-8 col-lg-8 order-lg-3 order-xl-1">
							<style>
								.note-button{
									margin: 10px;
								}

								.tableBodyScroll tbody {
									display: block;
									max-height: 400px;
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

								.tableBodyScroll tbody tr td:nth-child(3), .tableBodyScroll thead tr th:nth-child(3){
									text-align: right;
									padding-right: 20px; 
								}
							</style>

							<!--begin:: Widgets/Best Sellers-->
							<div class="kt-portlet kt-portlet--height-fluid">
								<div class="kt-portlet__head">
									<div class="kt-portlet__head-label">
										<h3 class="kt-portlet__head-title note-border">
											Login Authentication
										</h3>
									</div>
									<a href="javascript:void(0)" class="btn btn-brand note-button" onclick="openAddNote()">
											<i class="la la-plus"></i>
										Add Email
									</a>
								</div>
								<div class="kt-portlet__body">
									<!--begin: Datatable -->
									<table class="tableBodyScroll tableBodySearch table table-striped- table-bordered table-hover table-checkable" id="">
										<thead>
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="noteTableBody">
										@foreach($userList as $value)
											<tr id="noteTableId_{{ $value->id }}">
												<td>
												{{ $value->name }}
												</td>
												<td>
												{{ $value->email }}
												</td>
												<td>
													<a href="javascript:void(0)" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-email="{{ $value->email }}" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>
													@if($user_login_id != $value->id)
													<a href="javascript:void(0)" onclick="deleteAccountant('{{ $value->id }}')"><i class="la la-trash" style="font-size: 18px"></i></a>
													@endif
												</td>

											</tr>
										@endforeach
										</tbody>
									</table>
									<!--end: Datatable -->
								</div>
							</div>
							</div>
						<!-- end:: Content -->
					</div>
<!-- end:: Content -->


<div class="modal fade" id="openAddNotesModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Login Email</h5>
			</div>
			<div class="modal-body">
				<div class="addNoteData">
					<form id="addNoteForm">
						<input type="hidden" tyoe="add">
						<div class="kt-section__body">
							<div class="form-group row">
								<div class="col-lg-12">
									<label>Name</label>
									{!! Form::text('name', '', ['class' => 'form-control']) !!}
								</div>
								<div class="col-lg-12">
									<label>Email</label>
									{!! Form::text('email', '', ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<p></p>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="addNoteData btn btn-brand btn-elevate btn-icon-sm" onclick="addEditNoteToDatabase(this,'addNoteForm','{{ route('add-setting') }}')">Add</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="openEditNotesModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Login Email</h5>
            </div>
            <div class="modal-body">
                <div class="addNoteData">
                    <form id="updateNoteForm">
                        <input type="hidden" name="id" value="">
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Name</label>
                                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
								</div>
								<div class="col-lg-12">
                                    <label>Name</label>
                                    {!! Form::text('email', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="addNoteData btn btn-brand btn-elevate btn-icon-sm" onclick="addEditNoteToDatabase(this,'updateNoteForm','{{ route('update-setting') }}')">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- sript for page -->
@section('scripts')
<script src="{{ asset('js/pages/custom/projects/add-project.js') }}" type="text/javascript"></script>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    var msg1 = '{{Session::get('exits')}}';
    var exist1 = '{{Session::has('exits')}}';

    if(exist){
		Swal.fire({
			position: 'center',
			type: 'success',
			title: msg,
			showConfirmButton: false,
			timer: 2500
		})
    }

    if(exist1){
		Swal.fire(msg1);
    }


	function viewSetting(id){
		if (id) {
			$('#kt_records_modal').modal('show');
			$.ajax({
				url: "{{ url('getdata/') }}/"+id, 
				type: "GET",
				success: function(res){
					var m_set =  res.settings[0];
					$('.Addr').html(m_set.address);
					$('.Con').html(m_set.contact);
					$('.Ae').html(m_set.accountant_email);
					$('.CC').html(m_set.cc_email);
					$('.Se').html(m_set.salesperson);
					$('.Fe').html(m_set.from_email);
					$('.Te').html(m_set.tech_head_email);
					$('.Ge').html(m_set.geofence_email);
				}
			});
		}
	}


	function openAddNote(){
        $("#openAddNotesModalForm").modal('show');
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
                        // closeSwal();
                        addUpdateNotesContain(jsonData.data);
                    }
                    else{
                        errorLogView(formId, jsonData.message);
                    }
                } catch (error) {
					console.log(error);
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

	function openEditNote(currentObj){
        $("#openEditNotesModalForm").find('[name="name"]').val($(currentObj).attr('data-name'));
        $("#openEditNotesModalForm").find('[name="email"]').val($(currentObj).attr('data-email'));
        $("#openEditNotesModalForm").find('[name="id"]').val($(currentObj).attr('data-id'));
        $("#openEditNotesModalForm").modal('show');
    }

	function addUpdateNotesContain(data){
        let htmlData = '';

        if(parseInt(data.id) == 0 && data.email != ""){
            htmlData = '<tr id="noteTableId_'+data.lastId+'">'+
							'<td>'+data.name+'</td>'+
							'<td>'+data.email+'</td>'+
							'<td>'+
								'<a href="javascript:void(0)" data-id="'+data.lastId+'" data-name="'+data.name+'" data-email="'+data.email+'" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>'+
								'<a href="javascript:void(0)" onclick="deleteAccountant(\''+data.lastId+'\')"><i class="la la-trash" style="font-size: 18px"></i></a>'+
							'</td>'+
						'</tr>';
			// console.log(htmlData)
            $("#noteTableBody").append(htmlData);
			// console.log(htmlData)
        }
        else if(parseInt(data.id) > 0 && data.email != ""){
            // console.log($("#noteTableBody").find('[data-id="3"]'));

			if(parseInt(data.id) == parseInt('{{ $user_login_id }}')){
				htmlData = '<td>'+data.name+'</td>'+
							'<td>'+data.email+'</td>'+
							'<td>'+
								'<a href="javascript:void(0)" data-id="'+data.id+'" data-name="'+data.name+'" data-email="'+data.email+'" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>'+
							'</td>';
			}
			else{
				htmlData = '<td>'+data.name+'</td>'+
							'<td>'+data.email+'</td>'+
							'<td>'+
								'<a href="javascript:void(0)" data-id="'+data.id+'" data-name="'+data.name+'" data-email="'+data.email+'" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>'+
								'<a href="javascript:void(0)" onclick="deleteAccountant(\''+data.id+'\')"><i class="la la-trash" style="font-size: 18px"></i></a>'+
							'</td>';
			}

            $("#noteTableId_"+data.id).html(htmlData);
        }
        else if(parseInt(data.id) > 0 && data.email == ""){
            $("#noteTableId_"+data.id).remove();
        }
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
                url: "{{ route('delete-setting') }}",
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
  </script>
@stop
<!-- End sript for page -->