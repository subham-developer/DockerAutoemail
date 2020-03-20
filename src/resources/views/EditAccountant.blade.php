@extends('layouts.header')
	<?php
// print_r($resources);
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
						{!!Form::model($userid, ['route' => ['account.update', $userid],'enctype'=>'multipart/form-data'])!!}
						@method('PUT')
                    	@csrf
						<form class="kt-form" id="kt_contacts_add_form">

							<!--begin: Form Wizard Step 1-->
							<div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
								<div class="kt-heading kt-heading--md">Accountant Profile Details:</div>

								<div class="kt-section kt-section--first">
									<div class="kt-wizard-v1__form">
										<div class="row">
											<div class="col-xl-12">
												<div class="kt-section__body">
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
														<div class="col-lg-9 col-xl-9">
															
															{!! Form::text('name', $Accountant->name, ['class' => 'form-control']) !!}
														</div>
													</div>
													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
														<div class="col-lg-9 col-xl-9">
															<div class="input-group">
																<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																<!-- <input type="text" class="form-control" value="" name="phone" placeholder="Phone" aria-describedby="basic-addon1"> -->
																{!! Form::text('phone', $Accountant->phone, ['class' => 'form-control']) !!}
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
														<div class="col-lg-9 col-xl-9">
															<div class="input-group">
																<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
																<!-- <input type="text" class="form-control" value="" name="email" placeholder="Email" aria-describedby="basic-addon1"> -->
																{!! Form::text('email', $Accountant->email, ['class' => 'form-control']) !!}
															</div>
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