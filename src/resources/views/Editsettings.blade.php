@extends('layouts.header')
	<?php

$userid =  Request::segment(2);
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
						{!!Form::model($userid, ['route' => ['setting.update', $userid],'enctype'=>'multipart/form-data'])!!}
						@method('PUT')
                    	@csrf
						<form class="kt-form" id="kt_contacts_add_form">

							<!--begin: Form Wizard Step 1-->
							<div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
								<div class="kt-heading kt-heading--md">Edit Settings:</div>

								<div class="kt-section kt-section--first">
									<div class="kt-wizard-v1__form">
										<div class="row">
											<div class="col-xl-12">
												<div class="kt-section__body">
													<div class="form-group row">
													<!-- 	<div class="col-lg-6">
															<label>Address</label>
															{!! Form::text('Address', $settings[0]->address, ['class' => 'form-control']) !!}
														</div> -->
														<div class="col-lg-6">
															<label>Contact</label>
															{!! Form::text('contact', $settings[0]->contact, ['class' => 'form-control']) !!}
														</div>
														<div class="col-lg-6">
															<label>Accountant Email</label>
															{!! Form::text('accountant_email', $settings[0]->accountant_email, ['class' => 'form-control']) !!}
														</div>
														
													</div>
													<div class="form-group row">
														<div class="col-lg-6">
															<label>cc_email</label>
															{!! Form::text('cc_email', $settings[0]->cc_email, ['class' => 'form-control']) !!}
														</div>
														<div class="col-lg-6">
															<label>salesperson</label>
																{!! Form::text('salesperson', $settings[0]->salesperson, ['class' => 'form-control']) !!}
															
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-6">
															<label>from_email</label>
															{!! Form::text('from_email', $settings[0]->from_email, ['class' => 'form-control']) !!}
														</div>
														<div class="col-lg-6">
															<label>tech_head_email</label>
																	{!! Form::text('tech_head_email', $settings[0]->tech_head_email, ['class' => 'form-control']) !!}
															
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-6">
															<label>geofence_email</label>
															{!! Form::text('geofence_email', $settings[0]->geofence_email, ['class' => 'form-control']) !!}
														</div>
														<div class="col-lg-6">
															<label>Address</label>
																
																{!! Form::textarea('Address',$settings[0]->address,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
															
														</div>
													</div>
												
										
													<div class="form-group row">
														<div class="col-lg-6">
															<label>Tentative Reminder email</label>
															{!! Form::text('reminder_email', $settings[0]->reminder_email, ['class' => 'form-control']) !!}
														</div>
														<div class="col-lg-6">
															<label>Tentative Reminder Days</label>
																	{!! Form::number('reminder_days', $settings[0]->reminder_days, ['class' => 'form-control']) !!}
															
														</div>
													</div>


													<div class="form-group row">
														<div class="col-lg-6">
															<label>Employee Working Reminder email</label>
															{!! Form::text('reminder_email2', $settings[0]->reminder_email2, ['class' => 'form-control']) !!}
														</div>
														<div class="col-lg-6">
															<label>Employee Working Reminder Months</label>
															{!! Form::number('reminder_months', $settings[0]->reminder_months, ['class' => 'form-control']) !!}
															
														</div>
													</div>

													<div class="form-group row">
														<div class="col-lg-6">
															<label>Company Logo</label>
															{!! Form::file('logo', ['class' => 'form-control', 'accept' => 'image/*']) !!}
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
									<input type="submit" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
								</div>
							</div>

							<!--end: Form Actions -->
						</form>
						{!!Form::close()!!}

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

  </script>
@stop
<!-- End sript for page -->