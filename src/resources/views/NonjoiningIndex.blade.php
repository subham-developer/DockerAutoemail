@extends('layouts.header')
<?php
// print_r($clients);
// exit();
?>
<!-- style for page -->
@section('style')
<link href="{{ asset('css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
@stop
<!-- End style for page -->

@section('content')

<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet">
			<div class="kt-portlet__body kt-portlet__body--fit">
				<div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_contacts_add" data-ktwizard-state="step-first">
					<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

						<!--begin: Form Wizard Form-->
						{!!Form::open([ 'method'=> 'POST', 'enctype'=>'multipart/form-data','id'=>'nonjoining'] )!!}
						<form class="kt-form" id="kt_contacts_add_form">

							<!--begin: Form Wizard Step 1-->
							<div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
								<div class="kt-heading kt-heading--md">Non Joining:</div>

								<div class="kt-section kt-section--first">
									<div class="kt-wizard-v1__form">
										<div class="row">
											<div class="col-xl-12">
												<div class="kt-section__body">
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Resources * </label>
														<div class="col-lg-9 col-xl-9">
															<select name="Resources" class="form-control" id="resourceid">
																<option disabled="true" selected>Select Resource</option>
																@if(empty($resources))
																<option disabled="true" selected>Resource not available</option>
																@else
															@foreach ($resources as $key => $value)
															    <option value="{{ $value['id'] }}" data-join-id="{{ $value['joiningId'] }}" data-client-id="{{ $value['client_id'] }}">{{ $value['full_name'] }}</option>
															@endforeach
															@endif
															</select>
															
															<!-- {{Form::select("Resources", $resources, null,
															             [
															                "class" => "form-control",
															                "placeholder" => "Select Resource",
															                "id" => "resourceid"
															             ])
															}} -->
										
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Client * </label>
														<div class="col-lg-9 col-xl-9">
															
															{{Form::text("clients", null,
															             [
															                "class" => "form-control",
															                "id" => "clientname",
																			"readonly" => "true"
															             ])
															}}
															{{ Form::hidden("clientid", null, ["id" => "clientid"]) }}
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">End Date * </label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::Date('end_date', '', ['class' => 'form-control',"id" => "end_date"]) !!}
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--end: Form Wizard Step 1-->

							<!--begin: Form Actions -->
							<div class="kt-form__actions">
								<div>
									<input type="button" name="Preview" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" Value="Preview" data-toggle="modal" data-target="" id="prev">
								</div>
							</div>

							<!--end: Form Actions -->
						</form>
						{!!Form::close()!!}

						<!--begin::Modal-->
							<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal">
								<div class="modal-dialog modal-lg" role="document">
									{!!Form::open([ 'action' => 'NonJoiningController@store','method'=> 'POST', 'enctype'=>'multipart/form-data'] )!!}
									<form>
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Preview Mail</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">

												<input type="hidden" name="Resources" id="Resources">
												<input type="hidden" name="clients" id="clients">
												<input type="hidden" name="enddate" id="enddate">
												<textarea id="accountemail" name="accountemail"></textarea>
												<textarea id="empemail" name="empemail"></textarea>
												<textarea id="geofence" name="geofence"></textarea>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Send</button>
										</div>
									</div>
									<!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
									</form>
									{!!Form::close()!!}
								</div>
							</div>
						<!--end: Form Wizard Form-->
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end:: Content -->
@endsection

<!-- sript for page -->
@section('scripts')
<script src="{{ asset('js/pages/custom/projects/add-project.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js" type="text/javascript"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
 $(document).ready(function() {
	  tinymce.init({
	    selector: '#accountemail',
	    height: 500,
	    menubar: false,
	    plugins: [
	      'advlist autolink lists link image charmap print preview anchor',
	      'searchreplace visualblocks code fullscreen',
	      'insertdatetime media table contextmenu paste code'
	    ],
	    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify |  bullist numlist outdent indent | link image',
	    content_css: '//www.tinymce.com/css/codepen.min.css'
	  });
	   tinymce.init({
	    selector: '#empemail',
	    height: 500,
	    menubar: false,
	    plugins: [
	      'advlist autolink lists link image charmap print preview anchor',
	      'searchreplace visualblocks code fullscreen',
	      'insertdatetime media table contextmenu paste code'
	    ],
	    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify |  bullist numlist outdent indent | link image',
	    content_css: '//www.tinymce.com/css/codepen.min.css'
	  });
	  tinymce.init({
	    selector: '#geofence',
	    height: 500,
	    menubar: false,
	    plugins: [
	      'advlist autolink lists link image charmap print preview anchor',
	      'searchreplace visualblocks code fullscreen',
	      'insertdatetime media table contextmenu paste code'
	    ],
	    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify |  bullist numlist outdent indent | link image',
	    content_css: '//www.tinymce.com/css/codepen.min.css'
	  });
	
	});
 	$(document).ready(function() { 
            $("#prev").click(function() { 
            	$('#kt_modal_4').modal('hide');
              var formdata = $("#nonjoining").serialize();
            //   alert(formdata);             
      		var reso 			= $('#resourceid').val();
      		var cli 			= $('#clientid').val();
      		var enddate 		= $('#end_date').val();
			let joinid 			= $('#resourceid').find(':selected').attr('data-join-id');

				// console.log(formdata);
               	$.ajax({
		  		url: "{{ url('sendnonjoiningdata') }}", 
		  		type: "POST",
		  		data:formdata+'&joinid='+joinid,
		  		success: function(res){
		  	
		  		if(res.errors == "")
		  		{

		  			$('#Resources').val(reso);
		  			$('#clients').val(cli);
		  			$('#enddate').val(enddate);
		  			$('#kt_modal_4').modal('show');
					$("#kt_modal_4").addClass("show");
		  			tinyMCE.get('accountemail').setContent(res.accountemail);
		  			tinyMCE.get('empemail').setContent(res.employeeemail);
		  			tinyMCE.get('geofence').setContent(res.geofence);
		  		}
		  		else
		  		{
		  			jQuery('.alert-danger ul').html('');
			  		jQuery.each(res.errors, function(key, value){
	  				$('#kt_modal_4').modal('hide');
					$(".modal-backdrop").removeClass("modal-backdrop fade show");
	          		jQuery('.alert-danger').show();

	          		jQuery('.alert-danger ul').append('<li>'+value+'</li>');
	          		});
		  		}
		  		
		  
			  }});

            }); 


		});

 	
 	$(document).ready(function() { 

 	$( "#resourceid" ).change(function() {
			 var resourceid = $(this).val();
			 let joinid = $(this).find(':selected').attr('data-join-id');
			 let clientid = $(this).find(':selected').attr('data-client-id');
			 	$.ajax({
		  		url: "{{ url('getclientname') }}", 
		  		type: "POST",
		  		"_token": $('#token').val(),
		  		data:{'id':resourceid,"_token": "{{ csrf_token() }}" , 'joinid' : joinid , 'clientid' : clientid },
		  		success: function(res){
		  		var data = JSON.stringify(res);
		  		var obj = JSON.parse(data);
		  		// console.log(obj);
		  		$('#clientid').val(res[0].id);
		  		$('#clientname').val(res[0].client_name);
			  }});
			});
 	});
  </script>
@stop
<!-- End sript for page -->