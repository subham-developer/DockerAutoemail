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
											Non Joinings
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												
												&nbsp;
												<a href="{{ url('nonjoining') }}" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													Add Non Joinings
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
											<div class="col-xl-4 order-1 order-xl-2 kt-align-right">
												<a href="#" class="btn btn-default kt-hidden">
													<i class="la la-cart-plus"></i> New Order
												</a>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
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
												<th title="Field #1">Client</th>
												<th title="Field #1">Resource</th>
												<th title="Field #1">End Date</th>
												<th title="Field #1">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($nonjoiningDtl as $key => $data)
											<?php
												$old_date_timestamp = strtotime($data->end_date);
	            								$new_date = date('d-M-Y', $old_date_timestamp);
            								?>
											<tr>
												<td>{{$data->client_name}}</td>
												<td>{{$data->fname}} {{$data->lname}}</td>
												<td>{{$new_date}}</td>
												<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
														<span style="overflow: visible; position: relative; width: 133px;">		<div class="dropdown">
																<a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
																<i class="flaticon-more-1"></i>								
																</a>
																<div class="dropdown-menu dropdown-menu-right" style="overflow: visible;">					<ul class="kt-nav">						
																	 <li class="kt-nav__item">								
																	 <a class="kt-nav__link" href="{{ url('editnonjoining/' . $data->id) }}">
																	 	<i class="kt-nav__link-icon flaticon2-contract"></i>
																	 	<span class="kt-nav__link-text">Edit</span>			
																	 </a>
																	 </li>										
																	 <!-- <li class="kt-nav__item">									<a class="kt-nav__link" href="#" onclick="deleteTechnology(<?php //echo $data->id; ?>)">						<i class="kt-nav__link-icon flaticon2-trash"></i>		<span class="kt-nav__link-text">Delete</span>			</a>										
																	 </li>	 -->									
																	 			
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