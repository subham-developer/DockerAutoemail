@extends('layouts.header')
<?php
//echo "<pre>";
//print_r($resources);
// print_r($old);
//exit;
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
						{!!Form::open([ 'method'=> 'POST', 'enctype'=>'multipart/form-data','id'=>'interview'] )!!}
				
						<form class="kt-form" id="kt_contacts_add_form">
							 <div class="alert alert-danger" style="display:none"><ul></ul></div>
							<!--begin: Form Wizard Step 1-->
							<div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
								<div class="kt-heading kt-heading--md">Schedule Interview:</div>

								<div class="kt-section kt-section--first">
									<div class="kt-wizard-v1__form">
										<div class="row">
											<div class="col-xl-12">
												<div class="kt-section__body">
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Client * </label>
														<div class="col-lg-9 col-xl-9">
															
															<select class = "form-control" id ='clientid' name="clients">
																<option value="">Select Client</option>
																@foreach($clients as $key => $val)
																<option value="{{$key}}" @if($key == $old[0]->client) selected = "selected" @endif >{{$val}}</option>
																@endforeach
															</select>
															
										
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Resources * </label>
														<div class="col-lg-9 col-xl-9">
															<select class = "form-control" placeholder = "Select Resource" id = "resourceid" name="Resources">
																<option value="">Select Resource</option>
																@foreach($resources as $resource_k => $resource)
																<option value="{{$resource_k}}" @if($old[0]->resource == $resource_k) selected="selected"  @endif>{{$resource}}</option>
																@endforeach
															</select>
															
															<!-- {{Form::select("Resources",$resources, null,
															             [
															                "class" => "form-control",
															                "placeholder" => "Select Resource",
															                "id" =>'resourceid'
															             ])
															}} -->
										
														</div>
													</div>
													
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Date * </label>
											<div class="col-lg-9 col-xl-9">
												<input type="text" class="form-control" id="kt_datetimepicker_1" value="{{$old[0]->datetime}}" readonly placeholder="Select date & time" name="date" />
												<!-- <input type="datetime-local" id="datetm" class="form-control" name="date" max="2038-06-14T00:00"> -->
											</div>
										</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Point of Contact * </label>
														<div class="col-lg-9 col-xl-9">
															{!! Form::text('point_of_contact', $old[0]->contact_person, ['class' => 'form-control',"id" =>'poc']) !!}
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Contact No. * </label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::text('contact_no', $old[0]->contact, ['class' => 'form-control',"id" =>'cont']) !!}
														</div>
													</div>
													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Mode of interview  * </label>
														<div class="col-lg-9 col-xl-9">
															<select id="mode" name="mode" class="form-control">
																<option value="">Select mode</option>
																<option value="Telephonic" @if($old[0]->mode == 'Telephonic') selected="selected"  @endif>Telephonic</option>
																<option value="F2F" @if($old[0]->mode == 'F2F') selected="selected"  @endif >F2F</option>
															</select>
															
														
														</div>
													</div>
													<div class="form-group row">
														
														<label class="col-xl-3 col-lg-3 col-form-label">Interview Location?  * </label>
														<div class="kt-radio-inline col-lg-6 col-xl-6">
															<label class="kt-radio">
																<input type="radio" name="Invoice" id="loc1" value="Onsite" @if($old[0]->location == 'Onsite') checked="true"  @endif class="loc"> Onsite
																<span></span>	
															</label>
															<label class="kt-radio">
																<input type="radio" name="Invoice" id="loc2"  value="Office" @if($old[0]->location == 'Office') checked="true"  @endif class="loc"> Office
																<span></span>
															</label>
													</div>
												</div>
												<div class="form-group row">
													
														<label class="col-xl-3 col-lg-3 col-form-label">Address</label>
														<div class="col-lg-9 col-xl-9">
															{!! Form::textarea('address',$old[0]->address,['class'=>'form-control', 'rows' => 3, 'cols' => 40,'id' =>'addr']) !!}
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

						<!--end: Form Wizard Form-->
						<!--begin::Modal-->
							<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal">
								<div class="modal-dialog modal-lg" role="document">
									{!!Form::open([ 'action' => 'InterviewController@store','method'=> 'POST', 'enctype'=>'multipart/form-data'] )!!}
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
												<input type="hidden" name="date" id="datetms">
												<input type="hidden" name="point_of_contact" id="point_of_contact">
												<input type="hidden" name="contact_no" id="contact_no">
												<input type="hidden" name="inv_mode" id="inv_mode">
												<input type="hidden" name="inv_loc" id="inv_loc">
												<input type="hidden" name="inv_addr" id="inv_addr">
												<textarea id="basic-example" name="mailcontent"></textarea>
												<input type="hidden" name="interview_id" value="{{$old[0]->id}}" >
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js" type="text/javascript"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- datetime picker -->
<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
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
// editor.execCommand('mceSetContent', false, html);
  tinymce.init({
    selector: '#basic-example',
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
            	// $('#kt_modal_4').modal('hide');
              var formdata = $("#interview").serialize();

      		  var cli 			= $('#clientid').val();
      		  var reso 			= $('#resourceid').val();
      		  // var datetime 		= $('#datetm').val();
      		  var datetime 		= $('#kt_datetimepicker_1').val();
      		  var cont_per_name = $('#poc').val();
      		  var cont_per_con 	= $('#cont').val();
      		  var mode 			= $('#mode').val();
      		//   alert(mode);
      		  var int_loc 		= $('.loc').val();
      		  var addr 			= $('#addr').val();

               	$.ajax({
		  		url: "{{ url('sendinterviewdata') }}", 
		  		type: "POST",
		  		data:formdata,
		  		success: function(res){
		  			// alert(res);
		  			// console.log(res.errors);

		  		if(res.errors == '' || res.errors == null ){
		  			jQuery('.alert-danger').hide();

		  			$('#Resources').val(reso);
		  			$('#clients').val(cli);
		  			$('#datetms').val(datetime);
		  			$('#point_of_contact').val(cont_per_name);
		  			$('#contact_no').val(cont_per_con);
		  			$('#inv_mode').val(mode);
		  			$('#inv_loc').val(int_loc);
		  			$('#inv_addr').val(addr);
		  			var content = res.data;
		  			$('#kt_modal_4').modal('show');
					$("#kt_modal_4").addClass("show");
					$('close').attr('data-dismiss','model');
		  			tinyMCE.activeEditor.setContent(content);
		  		}else{	
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

            $( "#clientid" ).change(function() {
			 var clientid = $(this).val();
			 	$.ajax({
		  		url: "{{ url('getclientdetails') }}", 
		  		type: "POST",
		  		"_token": $('#token').val(),
		  		data:{'id':clientid,"_token": "{{ csrf_token() }}"},
		  		success: function(res){
		  		var data = JSON.stringify(res);
		  		var obj = JSON.parse(data);
		  		$('#poc').val(obj.Interviewer_name);
		  		$('#cont').val(obj.Interviewer_contact);
		  		$('#addr').val(obj.address);
		  
			  }});
			});
			$( "#invmod" ).change(function() {
			 var mode = $(this).val();
			if(mode == "F2F")
			{
				$("#loc1").prop("checked", true);
				$("#loc2").prop("checked", false);
				$("#loc2").attr('disabled', true);
			}
			else
			{
				$("#loc2").attr('disabled', false);
			}
			});

			$( "#invmod" ).change(function() {
			 var mode = $(this).val();
			if(mode == "F2F")
			{
				$("#loc1").prop("checked", true);
				$("#loc2").prop("checked", false);
				$("#loc2").attr('disabled', true);
			}
			else
			{
				$("#loc2").attr('disabled', false);
			}
			});

			$( ".loc" ).change(function() {
				var add ="{{$setting[0]['address']}}";
			 	var loc = $(this).val();
			 	var clientid = $('#clientid').val();
			 	// alert(clientid);

			if(loc == "Office")
			{
				$('#addr').val(add);
			}
			else
			{
				$.ajax({
		  		url: "{{ url('getclientdetails') }}", 
		  		type: "POST",
		  		"_token": $('#token').val(),
		  		data:{'id':clientid,"_token": "{{ csrf_token() }}"},
		  		success: function(res){
		  		var data = JSON.stringify(res);
		  		var obj = JSON.parse(data);
		  		$('#poc').val(obj.Interviewer_name);
		  		$('#cont').val(obj.Interviewer_contact);
		  		$('#addr').val(obj.address);
		  
			  }});
			}
			
			});
        }); 
  </script>
@stop
<!-- End sript for page -->