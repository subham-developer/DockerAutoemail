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
											Resources
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												
												&nbsp;
												<a href="{{ url('resource') }}" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													Add Resource
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="kt-portlet__body">

									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Language</th>
												<th>Other-Language</th>
												<th>Status</th>
												<th>Resume</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($resources as $key => $data)
											
											<tr>
												<td>{{$data['fname']}} {{$data['lname']}}</td>
												<td>{{$data['phone']}}</td>
												<td>{{$data['email']}}</td>
												<td>{{$data['language']}}</td>
												<td>{{$data['otherlanguage']}}</td>
												<td>{{$data['resource_status']}}</td>
												@if (strpos($data['resume'], 'https://drive.google.com') !== false OR strpos($data['resume'], 'https://docs.google.com') !== false)
												<td><a href="{{ $data['resume'] }}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a></td>	
												@else 
												<td><a href="{{ url('/').$data['resume']}}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a></td>
												@endif
												
												<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
														<span style="overflow: visible; position: relative; width: 133px;">		<div class="dropdown">
																<a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
																<i class="flaticon-more-1"></i>								
																</a>
																<div class="dropdown-menu dropdown-menu-right">					<ul class="kt-nav">
																	 <!-- <li class="kt-nav__item">									<a class="kt-nav__link" href="#">							<i class="kt-nav__link-icon flaticon2-expand"></i>		   <span class="kt-nav__link-text">View</span>			</a>										
																	 </li>		 -->								
																	 <li class="kt-nav__item">									<a class="kt-nav__link" href="{{ url('resourceedit/' . $data['id']) }}">							<i class="kt-nav__link-icon flaticon2-contract"></i>	<span class="kt-nav__link-text">Edit</span>				</a>
																	 </li>										
																	 <li class="kt-nav__item">									<a class="kt-nav__link" href="#" onclick="deleteresource(<?php echo $data['id']; ?>)">						<i class="kt-nav__link-icon flaticon2-trash"></i>		<span class="kt-nav__link-text">Delete</span>			</a>										
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
<script src="{{ asset('js/pages/crud/datatables/basic/scrollable.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/custom/projects/add-project.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('js/pages/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script> -->
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

function deleteresource(id){
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
	  		url: "{{ url('resourcedelete/') }}/"+id, 
	  		type: "GET",
	  		success: function(res){
	  			// alert(res);
	  			if(res == 200)
	  			{
	  				Swal.fire(
				      'Deleted!',
				      'Resource Deleted Successfully.',
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