@extends('layouts.header')

<!-- style for page -->
@section('style')
<link href="{{ asset('css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
@stop
<!-- End style for page -->

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
					
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											Scheduled interview
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												
												&nbsp;
												<a href="{{ url('interview') }}" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													Schedule interview
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="kt-portlet__body">

									<!--begin: Search Form -->
									<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
										<div class="row align-items-center">
											<div class="col-xl-8 order-2 order-xl-1">
												<div class="row align-items-center">
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<div class="kt-input-icon kt-input-icon--left">
															<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
															<span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
														</div>
													</div>
										
												</div>
											</div>
										</div>
									</div>

									<!--end: Search Form -->
								</div>
								<div class="kt-portlet__body kt-portlet__body--fit">

									<!--begin: Datatable -->
									<table class="kt-datatable" id="html_table" width="100%">
										<thead>
											<tr>
												<th title="Field #1">Resource</th>
												<th title="Field #2">Client</th>
												<th title="Field #2">Mode</th>
												<th title="Field #3">Datetime</th>
												<th title="Field #4">Address</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($interviewDtl as $key => $data)
											<?php
											 $old_date_timestamp = strtotime($data['datetime']);
            								$new_date = date('d-M-Y  H:i A', $old_date_timestamp);
            								?>
											<tr>
												<td>{{$data['fname']}} {{$data['lname']}}</td>
												<td>{{$data['client_name']}}</td>
												<td>{{$data['mode']}}</td>
												<td>{{$new_date}}</td>
												<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
												<span style="overflow: visible; position: relative; width: 133px;">		<div class="dropdown">
														<a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
														<i class="flaticon-more-1"></i>								
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<ul class="kt-nav">							
															<li class="kt-nav__item">				
																<a class="kt-nav__link" href="
																{{ url('editinterview/'.$data['id'])}}">		<i class="kt-nav__link-icon flaticon2-contract"></i>
																<span class="kt-nav__link-text">Edit</span>	</a>
															 </li>										
															<li class="kt-nav__item">					<a class="kt-nav__link" onclick="viewInteview({{$data['id']}})">			<i class="kt-nav__link-icon flaticon2-trash"></i>
																<span class="kt-nav__link-text">View</span>
																</a>								
															 </li>									
															</ul>								
														</div>							
													</div>						
												</span>
											</td>
												
											</tr>
											@endforeach
										</tbody>
									</table>

									<!--end: Datatable -->
								</div>
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
													<label>Resource Name :</label>
													<div class="Rn"></div>
												</div>
												<div class="form-group">
													<label>Client Name :</label>
													<div class="Cn"></div>
												</div>
												<div class="form-group">
													<label>Interview Mode :</label>
													<div class="Im"></div>
												</div>
												<div class="form-group">
													<label>Interview Time :</label>
													<div class="It"></div>
												</div>
												<div class="form-group">
													<label>Address :</label>
													<div class="Addr"></div>
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
						</div>
@endsection

<!-- sript for page -->
@section('scripts')
<script src="{{ asset('js/pages/custom/projects/add-project.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
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


function viewInteview(id){
	  if (id) {
	  	$('#kt_records_modal').modal('show');
	  	$.ajax({
	  		url: "{{ url('viewdetail/') }}/"+id, 
	  		type: "GET",
	  		success: function(res){
	  			console.log(res.data[0]);
	  			var m_set =  res.data[0];
	  			// dateFormat(new Date(), "mm/dd/yy, h:MM:ss TT");
	  			$('.Addr').html(m_set.address);
	  			$('.Rn').html(m_set.fname+" "+m_set.lname);
	  			$('.Cn').html(m_set.client_name);
	  			$('.Im').html(m_set.mode);
	  			$('.It').html(m_set.datetime);
	  			$('.Fe').html(m_set.from_email);
	  			$('.Te').html(m_set.tech_head_email);
	  			$('.Ge').html(m_set.geofence_email);
		  	}
		});
	}
}

</script>
@stop
<!-- End sript for page -->