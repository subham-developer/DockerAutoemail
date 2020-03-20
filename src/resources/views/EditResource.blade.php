@extends('layouts.header')
<?php
// print_r($resources);
$userid =  Request::segment(2);
$lang= explode(',', $resources->language);
// exit();
?>
    <!-- style for page -->
    @section('style')
    <link href="{{ asset('css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" /> @stop
    <!-- End style for page -->

    @section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_contacts_add" data-ktwizard-state="step-first">
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                        <!--begin: Form Wizard Form-->
                        {!!Form::model($userid, ['route' => ['resource.update', $userid],'enctype'=>'multipart/form-data'])!!} @method('PUT') @csrf
                        <form class="kt-form" id="kt_contacts_add_form">

                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                <div class="kt-heading kt-heading--md">Resource's Profile Details:</div>

                                <div class="kt-section kt-section--first">
                                    <div class="kt-wizard-v1__form">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">First Name * </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            {!! Form::text('fname', $resources->fname, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name * </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <!-- <input class="form-control" type="text" value="" name="lname" value="{{ old('lname') }}"> -->
                                                            {!! Form::text('lname', $resources->lname, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone * </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                                <!-- <input type="text" class="form-control" value="" name="phone" placeholder="Phone" aria-describedby="basic-addon1"> -->
                                                                {!! Form::text('phone', $resources->phone, ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Email Address * </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                <!-- <input type="text" class="form-control" value="" name="email" placeholder="Email" aria-describedby="basic-addon1"> -->
                                                                {!! Form::text('email', $resources->email, ['class' => 'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Reference No </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            {!! Form::text('resource_ref', $resources->refer_no, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Language</label>
														<div class="col-lg-9 col-xl-9">

															{{Form::select("language",['Angular JS' => 'Angular JS', 'PHP' => 'PHP','Node JS'=>'Node JS','c sharp' => 'C#','Python'=>'Python'], $resources->language,
															             [
															                "class" => "form-control",
															                "placeholder" => "Select Language"
															             ])
															}}

														</div>
													</div> -->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Language * </label>

                                                        <div class="col-lg-9 col-xl-9">
                                                            {{ Form::select('language[]', array( 'Language' => $technology),$lang, [ "class" => "form-control kt-select2", "multiple"=>"multiple", "id"=>"kt_select2_3" ] )}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Other Language specification * </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            {!! Form::text('otherlanguage', $resources->otherlanguage, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Experiance Year * </label>
                                                        <div class="col-lg-6 col-xl-6">

                                                            {!! Form::date('exp_date', $resources->exp_date, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Resident Address * </label>
                                                        <div class="col-lg-6 col-xl-6">

                                                            {!! Form::textarea('resident_address', $resources->resident_address, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Preview Resume</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            @if (strpos($resources->resume, 'https://drive.google.com') !== false)
                                                            <a href="{{$resources->resume}}" target="_blank"><u>Preview</u></a> @else
                                                            <a href="{{url('/').$resources->resume}}" target="_blank"><u>Preview</u></a> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                        <div class="kt-radio-inline col-lg-9 col-xl-9">
                                                            <label class="kt-radio">
                                                                <input type="radio" name="Resume_Type" value="file"> Upload File
                                                                <span></span>
                                                            </label>
                                                            <label class="kt-radio">
                                                                <input type="radio" name="Resume_Type" value="link"> Upload Drive Link
                                                                <span></span>
                                                            </label>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label" style="display: none" id="filelable">Upload Resume</label>
                                                        <div class="col-lg-6 col-xl-6">
                                                            <div id="device" style="display: none">{{Form::file('resume')}}</div>
                                                            <div id="drive" style="display: none">{!! Form::text('resumelink', '', ['class' => 'form-control']) !!}</div>
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
    <script src="{{ asset('js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
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
        $(document).ready(function() {
            $('.select2-search__field').attr("placeholder", "");
        });
        $(document).ready(function() {
            $('.select2-search__field').attr("placeholder", "Select Language");
            var radioValue = $("input[name='Resume_Type']:checked").val();
            if (radioValue == "file") {
                $("input[name='resumelink']").val(''); //empty the drive link
                $("#device").css('display', 'block');
                $("#filelable").css('display', 'block');
                $("#drive").css('display', 'none');
            } else {
                $("#device").css('display', 'none');
                $("#drive").css('display', 'block');
                $("#filelable").css('display', 'block');
            }

            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                if (inputValue == "file") {
                    $("input[name='resumelink']").val(''); //empty the drive link
                    $("#device").css('display', 'block');
                    $("#filelable").css('display', 'block');
                    $("#drive").css('display', 'none');
                } else {
                    $("#device").css('display', 'none');
                    $("#drive").css('display', 'block');
                    $("#filelable").css('display', 'block');
                }

                // var targetBox = $("." + inputValue);
                // $(".box").not(targetBox).hide();
                // $(targetBox).show();
            });
        });
    </script>
    @stop
    <!-- End sript for page -->