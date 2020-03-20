@extends('layouts.header')
<?php
	 $userid = Request::segment(2);
?>
    <!-- style for page -->
    @section('style')
    <link href="{{ asset('css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" /> @stop
    <!-- End style for page -->

    @section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_contacts_add" data-ktwizard-state="step-first">
                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                                <!--begin: Form Wizard Form-->
                                {!!Form::model($userid, ['route' => ['client.update', $userid],'enctype'=>'multipart/form-data'])!!} @method('PUT') @csrf
                                <form class="kt-form" id="kt_contacts_add_form">

                                    <!--begin: Form Wizard Step 1-->
                                    <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                        <div class="kt-heading kt-heading--md">Client Profile Details:</div>

                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v1__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Client Name</label>
                                                                    {!! Form::text('client', $clients->client_name, ['class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Reporting Manager Name</label>
                                                                    {!! Form::text('rname', $clients->reporting_name, ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">

                                                                <div class="col-lg-6">
                                                                    <label>Reporting Manager Contact</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                        {!! Form::text('rphone', $clients->reporting_contact, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Reporting Manager Email</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                        {!! Form::text('remail', $clients->reporting_email, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>HR Name</label>
                                                                    {!! Form::text('hrname', $clients->hr_name, ['class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>HR Contact</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                        {!! Form::text('hrphone', $clients->hr_contact, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>HR Email</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                        {!! Form::text('hremail', $clients->hr_email, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Interviewer Name</label>
                                                                    {!! Form::text('iname', $clients->Interviewer_name, ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Interviewer Contact</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                        {!! Form::text('iphone', $clients->Interviewer_contact, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Interviewer Email</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                        {!! Form::text('iemail', $clients->Interviewer_email, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Accountant Name</label>
                                                                    {!! Form::text('aname', $clients->account_name, ['class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Accountant Email</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                        {!! Form::text('aemail', $clients->account_email, ['class' => 'form-control']) !!}
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>URL</label>
                                                                    {!! Form::text('url', $clients->url, ['class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Address</label>
                                                                    {!! Form::textarea('address',$clients->address,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Billing Address </label>
                                                                    {!! Form::textarea('billing_address',$clients->billing_address,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Operational Address </label>
                                                                    {!! Form::textarea('operational_address',$clients->operational_address,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>PAN Number </label>
                                                                    {!! Form::text('pan', $clients->pan, ['class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>GST Number </label>
                                                                    {!! Form::text('gst', $clients->gst, ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>TAN Number </label>
                                                                    {!! Form::text('tan', $clients->tan, ['class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Credit Period </label>
                                                                    {!! Form::text('credit_period', $clients->credit_period, ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Date Of Inovice </label>
                                                                    {{Form::select("invoice_date",$invoicedates, $clients->invoice_date, [ "class" => "form-control", "placeholder" => "Select Invoice Date", "id"=>"invoice_date" ]) }}
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Map Link * </label>
                                                                    {!! Form::text('maplink', $clients->address_map_link, ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Do you need timesheet?</label>
                                                                    <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                        @if($clients->need_timesheet == "Y")
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="timesheet" value="Y" checked> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="timesheet" value="N"> No
                                                                            <span></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="timesheet" value="Y"> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="timesheet" value="N" checked> No
                                                                            <span></span>
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Do you need machine?</label>
                                                                    <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                        @if($clients->need_machine == "Y")
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="machine" value="Y" checked=""> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="machine" value="N"> No
                                                                            <span></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="machine" value="Y"> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="machine" value="N" checked> No
                                                                            <span></span>
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">

                                                                <div class="col-lg-6">
                                                                    <label>Weekend working?</label>
                                                                    <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                        @if($clients->weekend_working == "Y")
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="working" value="Y" checked> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="working" value="N"> No
                                                                            <span></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="working" value="Y"> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="working" value="N" checked> No
                                                                            <span></span>
                                                                        </label>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Aggrement Sign?</label>
                                                                    <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                        @if($clients->aggrement_sign == "Y")
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Aggrement" value="Y" checked> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Aggrement" value="N"> No
                                                                            <span></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Aggrement" value="Y"> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Aggrement" value="N" checked> No
                                                                            <span></span>
                                                                        </label>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>First Invoice Send?</label>
                                                                    <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                        @if($clients->first_invoice == "Y")
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Invoice" value="Y" checked> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Invoice" value="N"> No
                                                                            <span></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Invoice" value="Y"> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="Invoice" value="N" checked> No
                                                                            <span></span>
                                                                        </label>
                                                                        @endif

                                                                    </div>
                                                                </div>

																<div class="col-lg-6">
																	<label>Physical copy needed?</label>
																	<div class="kt-radio-inline col-lg-6 col-xl-6">

                                                                        @if($clients->is_invoice_need == "Y")
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="is_invoice_need" value="Y" checked> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="is_invoice_need" value="N"> No
                                                                            <span></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="is_invoice_need" value="Y"> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="is_invoice_need" value="N" checked> No
                                                                            <span></span>
                                                                        </label>
                                                                        @endif

																	</div>
																</div>
                                                            </div>

															<div class="form-group row">
																<div class="col-lg-6">
																	<label>PF Proof needed?</label>
																	<div class="kt-radio-inline col-lg-6 col-xl-6">

                                                                        @if($clients->pf_proof == "Y")
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="pf_proof" value="Y" checked> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="pf_proof" value="N"> No
                                                                            <span></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="pf_proof" value="Y"> Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="kt-radio">
                                                                            <input type="radio" name="pf_proof" value="N" checked> No
                                                                            <span></span>
                                                                        </label>
                                                                        @endif
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
            </div>
        </div>
        <!-- end:: Content -->
        @endsection

        <!-- sript for page -->
        @section('scripts')
        <script src="{{ asset('js/pages/custom/projects/add-project.js') }}" type="text/javascript"></script>
        <script>
            var msg = '{{Session::get('
            alert ')}}';
            var exist = '{{Session::has('
            alert ')}}';
            var msg1 = '{{Session::get('
            exits ')}}';
            var exist1 = '{{Session::has('
            exits ')}}';

            if (exist) {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 2500
                })
            }

            if (exist1) {
                Swal.fire(msg1);
            }
        </script>
        @stop
        <!-- End sript for page -->