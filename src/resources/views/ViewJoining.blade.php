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
											View Joining
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												<!-- <div class="dropdown dropdown-inline">
													<button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="la la-download"></i> Export
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<ul class="kt-nav">
															<li class="kt-nav__section kt-nav__section--first">
																<span class="kt-nav__section-text">Choose an option</span>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-print"></i>
																	<span class="kt-nav__link-text">Print</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-copy"></i>
																	<span class="kt-nav__link-text">Copy</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-excel-o"></i>
																	<span class="kt-nav__link-text">Excel</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-text-o"></i>
																	<span class="kt-nav__link-text">CSV</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-pdf-o"></i>
																	<span class="kt-nav__link-text">PDF</span>
																</a>
															</li>
														</ul>
													</div>
												</div> -->
												&nbsp;
												<a href="{{ url('joining') }}" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													Add Joining
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
												<!-- 	<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<div class="kt-form__group kt-form__group--inline">
															<div class="kt-form__label">
																<label>Status:</label>
															</div>
															<div class="kt-form__control">
																<select class="form-control bootstrap-select" id="kt_form_status">
																	<option value="">All</option>
																	<option value="1">Pending</option>
																	<option value="2">Delivered</option>
																	<option value="3">Canceled</option>
																	<option value="4">Success</option>
																	<option value="5">Info</option>
																	<option value="6">Danger</option>
																</select>
															</div>
														</div>
													</div> -->
													<!-- <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<div class="kt-form__group kt-form__group--inline">
															<div class="kt-form__label">
																<label>Type:</label>
															</div>
															<div class="kt-form__control">
																<select class="form-control bootstrap-select" id="kt_form_type">
																	<option value="">All</option>
																	<option value="1">Online</option>
																	<option value="2">Retail</option>
																	<option value="3">Direct</option>
																</select>
															</div>
														</div>
													</div> -->
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
												<th title="Field #3">Start Date</th>
												<th title="Field #4">End Date</th>
												<th title="Field #5">Credit Period</th>
												<th title="Field #6">date_of_invoice</th>
												<th>Action</th>
												
											</tr>
										</thead>
										
										<tbody>
											@foreach($joiningDtl as $key => $data)
											<?php
											 $old_date_timestamp = strtotime($data['start_date']);
            								 $new_date = date('d-M-Y', $old_date_timestamp);

            								 $old_date_timestamp1 = strtotime($data['end_date']);
            								 $new_date1 = date('d-M-Y', $old_date_timestamp1);

            								?>
											<tr>
												<td>{{$data['fname']}}</td>
												<td>{{$data['client_name']}}</td>
												<td>{{$new_date}}</td>
												<td>{{$new_date1}}</td>
												<td>{{$data['creadit_period']}}</td>
												<td>{{$date_of_invoice[$data['date_of_invoice']] }}</td>
												<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
														<span style="overflow: visible; position: relative; width: 133px;">		<div class="dropdown">
																<a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
																<i class="flaticon-more-1"></i>								
																</a>
																<div class="dropdown-menu dropdown-menu-right">					<ul class="kt-nav">
																	 <!-- <li class="kt-nav__item">									<a class="kt-nav__link" href="#">							<i class="kt-nav__link-icon flaticon2-expand"></i>		   <span class="kt-nav__link-text">View</span>			</a>										
																	 </li>		 -->								
																	 <li class="kt-nav__item">									<a class="kt-nav__link" href="{{ url('editjoining/' . $data['id']) }}">							<i class="kt-nav__link-icon flaticon2-contract"></i>	<span class="kt-nav__link-text">Edit</span>				</a>
																	 </li>										
																	 <li class="kt-nav__item">								<!-- 	<a class="kt-nav__link" href="#" onclick="deleteresource(<?php// echo $data['id']; ?>)">						<i class="kt-nav__link-icon flaticon2-trash"></i>		<span class="kt-nav__link-text">Delete</span>			</a>		 -->								
																	 </li>										
																	 <!-- <li class="kt-nav__item">									<a class="kt-nav__link" href="#">							<i class="kt-nav__link-icon flaticon2-mail-1"></i>			<span class="kt-nav__link-text">Export</span>		</a>										
																	 </li>		 -->							
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


function deleteTechnology(id){
	Swal.fire({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.value) {
	  	$.ajax({
	  		url: "{{ url('technologydelete/') }}/"+id, 
	  		type: "GET",
	  		success: function(res){
	  			// alert(res);
	  			if(res == 200)
	  			{
	  				Swal.fire(
				      'Deleted!',
				      'Technology Deleted Successfully.',
				      'success'
				    )
				    location.reload();
	  			}
	  			else
	  			{
	  				Swal.fire(
				      'warning!',
				      'Something Went Wrong.',
				      'fail'
				    )
	  			}

		    // $("#div1").html(result);
		  }});
	    
	  }
	})
}

  </script>
@stop
<!-- End sript for page -->