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
						{!!Form::open([ 'method'=> 'POST', 'enctype'=>'multipart/form-data','id'=>'joining'] )!!}
						<form class="kt-form" id="kt_contacts_add_form">
							<div class="alert alert-danger" style="display:none"><ul></ul></div>
							<!--begin: Form Wizard Step 1-->
							<div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
								<div class="kt-heading kt-heading--md">Joining:</div>

								<div class="kt-section kt-section--first">
									<div class="kt-wizard-v1__form">
										<div class="row">
											<div class="col-xl-12">
												<div class="kt-section__body">
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Resources * </label>
														<div class="col-lg-9 col-xl-9">
															<select id="resourceid" name="Resources" class = "form-control" >
															<option value="" disabled >Select Resource</option>
																@foreach($resources as $res_id => $res_name)
																<option value="{{$res_id}}" @if($edit_join[0]->resource_id== $res_id) selected="selected"  @endif>{{$res_name}}</option>
																@endforeach
															</select>		
															<!-- {{Form::select("Resources",$resources, null,
															             [
															                "class" => "form-control",
															                "placeholder" => "Select Resource",
															                "id" =>"resourceid"
															             ])
															}} -->
										
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Resources Email  * </label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::text('Resource_Email',$edit_join[0]->email, ['class' => 'form-control','id' => 'Resource_Email']) !!}
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Client  * </label>
														<div class="col-lg-9 col-xl-9">
															<select id="clientid" name="client" class = "form-control" >
															<option value="" disabled >Select Client</option>
																@foreach($clients as $cli_id => $cli_name)
																<option value="{{$cli_id}}" @if($edit_join[0]->client_id== $cli_id) selected="selected"  @endif>{{$cli_name}}</option>
																@endforeach
															</select>		
															<!-- {{Form::select("client",$clients, null,
															             [
															                "class" => "form-control",
															                "placeholder" => "Select Client",
															                "id"=>"clientid"
															             ])
															}} -->
										
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Reporting manager name</label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::text('manager_name',$edit_join[0]->reporting_name, ['class' => 'form-control',"id"=>"manager_name"]) !!}
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Reporting manager email</label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::text('manager_email',$edit_join[0]->reporting_email, ['class' => 'form-control',"id"=>"manager_email"]) !!}
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Reporting manager contact</label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::text('manager_contact',$edit_join[0]->reporting_contact, ['class' => 'form-control',"id"=>"manager_contact"]) !!}
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Accountant</label>
														<div class="col-lg-9 col-xl-9">
															
														
															{!! Form::text('accountant',$edit_join[0]->account_name, ['class' => 'form-control','id'=>'accountant']) !!}
										
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Accountant Email</label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::text('accountant_email',$edit_join[0]->account_email, ['class' => 'form-control','id'=>'accountant_email']) !!}
														</div>
													</div>
													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Date of Invoice  * </label>
														<div class="col-lg-9 col-xl-9">
															<select id="invoice_date" name="invoice_date" class = "form-control" >
															<option value="" disabled >Select Invoice Date</option>
																@foreach($invoicedates as $inv_id => $inv_date)
																<option value="{{$inv_id}}" @if($edit_join[0]->date_of_invoice== $inv_id) selected="selected"  @endif>{{$inv_date}}</option>
																@endforeach
															</select>
															<!-- {{Form::select("invoice_date",$invoicedates, null,
															             [
															                "class" => "form-control",
															                "placeholder" => "Select Invoice Date",
															                "id"=>"invoice_date"
															             ])
															}} -->
										
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Contract Type  * </label>
														<div class="col-lg-9 col-xl-9">
														<select id="contract_type" name="contract_type" class = "form-control" >
															<option value="" disabled >Select Contract Type</option>
																@foreach($contract_type as $contract)
																<option value="{{$contract}}" @if($edit_join[0]->contract_type == $contract) selected="selected"  @endif>{{$contract}}</option>
																@endforeach
														</select>		
															
										
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Credit period  * </label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::number('credit_period',$edit_join[0]->creadit_period, ['class' => 'form-control','id'=>'credit_period']) !!}
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Start Date * </label>
														<div class="col-lg-9 col-xl-9">
															
															 {!! Form::Date('start_date',$edit_join[0]->start_date, ['class' => 'form-control','id'=>'start_date']) !!}
															<!-- <input type="datetime-local" id="start_date" class="form-control" name="start date" max="2038-06-14T00:00"> -->
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Tentative End Date  * </label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::Date('end_date',$edit_join[0]->end_date, ['class' => 'form-control','id'=>'end_date']) !!}
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Address * </label>
														<div class="col-lg-9 col-xl-9">
													
															{!! Form::textarea('address',$edit_join[0]->address,['class'=>'form-control', 'rows' => 4, 'cols' => 40,'id'=>'address']) !!}
														</div>
													</div>

													<!-- <div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Guideline Attachment</label>
														<div class="col-lg-9 col-xl-9">
													
															{!! Form::file('files', $attributes = ['id'=>'attachment']) !!}
														</div>
													</div> Commented cause guidlines file is attached in mail manually-->
												
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
									{!!Form::open([ 'action' => 'JoiningController@store','method'=> 'POST', 'enctype'=>'multipart/form-data'] )!!}
									<form>
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Preview Mail</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">

												<input type="hidden" name="Resources" id="Resources">
												<input type="hidden" name="Resourcesemail" id="Resourcesemail">
												<input type="hidden" name="clients" id="clients">
												<input type="hidden" name="manname" id="manname">
												<input type="hidden" name="manemail" id="manemail">
												<input type="hidden" name="mancont" id="mancont">
												<input type="hidden" name="accname" id="accname">
												<input type="hidden" name="accemail" id="accemail">
												<input type="hidden" name="ivdate" id="ivdate">
												<input type="hidden" name="contracttype" id="contracttype" >
												<input type="hidden" name="creperiod" id="creperiod">
												<input type="hidden" name="strdate" id="strdate">
												<input type="hidden" name="enddate" id="enddate">
												<input type="hidden" name="addr" id="addr">
												<input type="hidden" name="filepath" id="attach">
												<textarea id="accountemail" name="accountemail"></textarea>
												<textarea id="empemail" name="empemail"></textarea>
												<textarea id="geofence" name="geofence"></textarea>
												<input type="hidden" name="joining_id" id="joining_id" value="{{$edit_join[0]->jid}}">
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
<!-- <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js" type="text/javascript"></script>

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
              var formdatas = $("#joining").serialize();
              var formData = new FormData(document.getElementById("joining"));

      		  var reso 			= $('#resourceid').val();
      		  var resoemail 	= $('#Resource_Email').val();
      		  var cli 			= $('#clientid').val();
      		  var mananame      = $('#manager_name').val();
      		  var manaemail     = $('#manager_email').val();
      		  var manacont      = $('#manager_contact').val();
      		  var accname      	= $('#accountant').val();
      		  var accemail      = $('#accountant_email').val();
      		  var invdate 		= $('#invoice_date').val();
      		  var contrt_type   = $('#contract_type').val();
      		  var creditpre 	= $('#credit_period').val();
      		  var startdate 	= $('#start_date').val();
      		  var enddate 		= $('#end_date').val();
      		  var address 		= $('#address').val();
      		  var attachment 	= $('#attachment').val();

               	$.ajax({
		  		url: "{{ url('sendjoiningdata') }}", 
		  		type: "POST",
		  		data:formData,
		  		contentType: false,
		  		processData : false,
		  		success: function(res){
		  		if(res.errors == "")
		  		{

		  			$('#Resources').val(reso);
		  			$('#Resourcesemail').val(reso);
		  			$('#clients').val(cli);
		  			$('#manname').val(mananame);
		  			$('#manemail').val(manaemail);
		  			$('#mancont').val(manacont);
		  			$('#accname').val(accname);
		  			$('#accemail').val(accemail);
		  			$('#ivdate').val(invdate);
		  			$('#contracttype').val(contrt_type);
		  			$('#creperiod').val(creditpre);
		  			$('#strdate').val(startdate);
		  			$('#enddate').val(enddate);
		  			$('#addr').val(address);
		  			$('#attach').val(res.document);

		  			$('#kt_modal_4').modal('show');
					$("#kt_modal_4").addClass("show");
					// $('#kt_modal_4').attr('data-target','#kt_modal_4');

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


    $( "#resourceid" ).change(function() {
			 var resourceid = $(this).val();
			 	$.ajax({
		  		url: "{{ url('getresourcedetails') }}", 
		  		type: "POST",
		  		"_token": $('#token').val(),
		  		data:{'id':resourceid,"_token": "{{ csrf_token() }}"},
		  		success: function(res){
		  		var data = JSON.stringify(res);
		  		var obj = JSON.parse(data);
		  		$('#Resource_Email').val(obj.email);
		  	
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
		  		$('#manager_name').val(obj.reporting_name);
		  		$('#manager_email').val(obj.reporting_email);
		  		$('#manager_contact').val(obj.reporting_contact);
		  		$('#accountant').val(obj.account_name);
		  		$('#accountant_email').val(obj.account_email);
		  		$('#address').val(obj.address);

				$('#invoice_date').val(obj.invoice_date);
		  		$('#credit_period').val(obj.credit_period);
		  
			  }});
			});
		});
  </script>
@stop
<!-- End sript for page -->