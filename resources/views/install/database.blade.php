@extends('service::layouts.app_install', ['title' => __('service::install.database')])

@php
$base_path = 'public/vendor/honesttraders';
@endphp
@section('content')
<div class="col-4">
    <div class="padding-left-top">
        <img src="{{ asset($base_path . '/') }}/images/Logo.png" alt="" />


        <div class="mt-5 pe-2 follow-next-step-side" step-count="1">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
                </div>
                <div>
                    <p>01.</p>
                    <h5><b>Welcome Note</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="2">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
                </div>
                <div class="col-9">
                    <p>02.</p>
                    <h5><b>Check Environment</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="3">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="border step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
                </div>
                <div class="ps-2">
                    <p>03.</p>
                    <h5><b>Licence Verification</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="4">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border initial rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/icon-white/database.svg" alt="" />
                </div>
                <div class="col-9">
                    <p>04.</p>
                    <h5><b>Database Setup</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="5">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/admin.svg" alt="" />
                </div>
                <div class="ps-2">
                    <p>05.</p>
                    <h5><b>Admin Setup</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="6">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/complete.svg" alt="" />
                </div>
                <div>
                    <p>06.</p>
                    <h5><b>Complete</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- from section -->
<div class="col-8 from-section">
    <div class="padding-left-top">

        <div class="bg-white w-75 rounded show-section tab-section" step-count="4">
            <div class="text-title p-3 text-center text-white">
                <h3>{{ __('service::install.database_title') }}</h3>
            </div>
            <div class="px-5 pt-5">
                <h3><b>Database Setup</b></h3>
                <hr class="hori-rule" />
            </div>
            <form class="pb-3" method="post" action="{{ route('service.database') }}" id="content_form">
                <div class="mb-3 px-5">
                    <label class="form-label" class="required" for="db_host"><b>{{ __('service::install.db_host') }}<span class="star">*</span></b></label>
                    <input type="text" class="form-control" name="db_host" id="db_host"  required="required"  placeholder="{{ __('service::install.db_host') }}" value="localhost" />
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label"  for="db_port"><b>{{ __('service::install.db_port') }}<span class="star">*</span></b></label>
                    <input type="text" class="form-control" name="db_port" id="db_port" required="required" placeholder="{{ __('service::install.db_port') }}" value="3306" >
                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label" for="db_database"><b>{{ __('service::install.db_database') }}<span class="star">*</span></b></label>
                    <input type="text" class="form-control" name="db_database" id="db_database" required="required" placeholder="{{ __('service::install.db_database') }}" autofocus="" value="{{ env('DB_DATABASE') }}">
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label" for="db_username"><b>{{ __('service::install.db_username') }}<span class="star">*</span></b></label>
                    <input type="text" class="form-control" name="db_username" id="db_username" required="required" placeholder="{{ __('service::install.db_username') }}" value="{{ env('DB_USERNAME') }}">
                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label"><b>{{ __('service::install.db_password') }}<span class="star">*</span></b></label>
                    <input type="password" class="form-control" name="db_password" id="db_password" placeholder="{{ __('service::install.db_password') }}" value="{{ env('DB_PASSWORD') }}">

                </div>
                <div class="px-5 pb-4 d-flex align-items-center gap-2">
                    <input class="form-check-input" type="checkbox" name="force_migrate" id="flexRadioDefault2"  />
                    <label class="form-check-label" for="flexRadioDefault2">
                        {{ __('Force Delete Previous Table') }}
                    </label>
                </div>

                <div class="px-5 pb-4 d-flex flex-column justify-content-center align-items-start gap-3">

                    <button type="submit" class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submit" >{{ __('service::install.lets_go_next') }}</button>
                   <button type="button" class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submitting" disabled style="display:none">{{ __('service::install.submitting') }}</button>
                </div>
            </form>
        </div>


    </div>
</div>

@stop
@push('js')
<script>
    _formValidation('content_form');
        $(document).ready(function(){
            setTimeout(function(){
                $('.preloader h2').text('We are validating your license. Please do not refresh or close the browser')
            }, 2000);
        })
</script>
@endpush