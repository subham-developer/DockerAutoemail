@extends('layouts.header')

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
                            {!!Form::open([ 'action' => 'ClientController@store','method'=> 'POST', 'enctype'=>'multipart/form-data','class'=>'kt-form kt-form--label-right'] )!!}
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
                                                                <label>Client Name * </label>
                                                                {!! Form::text('client', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Reporting Manager Name</label>
                                                                {!! Form::text('rname', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">

                                                            <div class="col-lg-6">
                                                                <label>Reporting Manager Contact</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                    {!! Form::text('rphone', '', ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Reporting Manager Email</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                    {!! Form::text('remail', '', ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>HR Name</label>
                                                                {!! Form::text('hrname', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>HR Contact</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                    {!! Form::text('hrphone', '', ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>HR Email</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                    {!! Form::text('hremail', '', ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Interviewer Name</label>
                                                                {!! Form::text('iname', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Interviewer Contact</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                    {!! Form::text('iphone', '', ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Interviewer Email</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                    {!! Form::text('iemail', '', ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Accountant Name</label>
                                                                {!! Form::text('aname', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Accountant Email</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                    {!! Form::text('aemail', '', ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>URL * </label>
                                                                {!! Form::text('url', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Address * </label>
                                                                {!! Form::textarea('address',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Billing Address </label>
                                                                {!! Form::textarea('billing_address',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Operational Address </label>
                                                                {!! Form::textarea('operational_address',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>PAN Number </label>
                                                                {!! Form::text('pan', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>GST Number </label>
                                                                {!! Form::text('gst', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>TAN Number </label>
                                                                {!! Form::text('tan', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Credit Period </label>
                                                                {!! Form::number('credit_period', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Date Of Inovice </label>
                                                                {{Form::select("invoice_date",$invoicedates, null, [ "class" => "form-control", "placeholder" => "Select Invoice Date", "id"=>"invoice_date" ]) }}
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Map Link * </label>
                                                                {!! Form::text('maplink', '', ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Do you need timesheet?</label>
                                                                <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="timesheet" value="Y" @if(old( 'timesheet')=='Y' ) checked="checked" @endif> Yes
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="timesheet" value="N"checked="checked"> No
                                                                        <span></span>
                                                                    </label>

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Do you need machine?</label>
                                                                <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="machine" value="Y" @if(old( 'machine')=='Y' ) checked="checked" @endif> Yes
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="machine" value="N" checked="checked"> No
                                                                        <span></span>
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">

                                                            <div class="col-lg-6">
                                                                <label>Weekend working?</label>
                                                                <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="working" value="Y" @if(old( 'working')=='Y' ) checked="checked" @endif> Yes
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="working" value="N" checked="checked"> No
                                                                        <span></span>
                                                                    </label>

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Aggrement Sign?</label>
                                                                <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="Aggrement" value="Y" @if(old( 'Aggrement')=='Y' ) checked="checked" @endif> Yes
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="Aggrement" value="N" checked="checked"> No
                                                                        <span></span>
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>First Invoice Send?</label>
                                                                <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="Invoice" value="Y" @if(old( 'Invoice')=='Y' ) checked="checked" @endif> Yes
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="Invoice" value="N" checked="checked"> No
                                                                        <span></span>
                                                                    </label>

                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label>Physical copy needed?</label>
                                                                <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="is_invoice_need" value="Y" @if(old( 'is_invoice_need')=='Y' ) checked="checked" @endif> Yes
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="is_invoice_need" value="N" checked="checked"> No
                                                                        <span></span>
                                                                    </label>

                                                                </div>
                                                            </div>

                                                        </div>


														<div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>PF Proof needed?</label>
                                                                <div class="kt-radio-inline col-lg-6 col-xl-6">
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="pf_proof" value="Y" @if(old( 'pf_proof')=='Y' ) checked="checked" @endif> Yes
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="kt-radio">
                                                                        <input type="radio" name="pf_proof" value="N" checked="checked"> No
                                                                        <span></span>
                                                                    </label>

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