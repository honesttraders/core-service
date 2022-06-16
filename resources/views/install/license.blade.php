@extends('service::layouts.app_install', ['title' => __('service::install.license')])

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
                    class="border step-with-border initial rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/icon-white/verification.svg" alt="" />
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
                    class="p-3 border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/database.svg" alt="" />
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
    
        <div class="bg-white w-75 rounded" step-count="3">
            <div class="text-title p-3 text-center text-white">
                <h3>Verify Your Purchase</h3>
            </div>
            <form class="pb-3" data-parsley-validate method="post" action="{{ route('service.license') }}" id="content_form">
                <div class="mb-3 px-5 pt-5">
                    <label class="form-label" for="access_code"><b>{{ __('service::install.access_code') }}<span class="star">*</span></b></label>
                    <input type="text"  name="access_code" id="access_code"  class="form-control"  required="required" autofocus="" value="{{ old('access_code', request('access_code')) }}"  placeholder="{{ __('service::install.access_code') }}" />
                    @if(request('message'))
                            <span class="text-danger">{{ request('message') }}</span>
                    @endif
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label" for="envato_email"><b>{{ __('service::install.envato_email') }}<span class="star">*</span></b></label>
                    <input type="email" class="form-control" data-parsley-type="email" name="envato_email" id="envato_email" value="{{ old('envato_email', request('envato_email')) }}" required="email" placeholder="{{ __('service::install.envato_email') }}" >
                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label" for="installed_domain"><b>{{ __('service::install.installed_domain') }}<span class="star">*</span></b></label>
                    <input type="text" class="form-control" name="installed_domain" id="installed_domain" required="required" readonly value="{{ app_url() }}" >
                </div>
                @if($reinstall)
                <div class="form-group">
                    <label data-id="bg_option" class="primary_checkbox d-flex mr-12 ">
                        <input name="re_install" type="checkbox">
                        <span class="checkmark"></span>
                        <span class="ml-2">Re install System</span>
                    </label>
                </div>
            @endif
                <div class="px-5 pb-4 d-flex flex-column justify-content-center align-items-start gap-3">
                    <button type="submit" class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submit"> <b>{{ __('service::install.lets_go_next') }} »</b> </button>
                    <button type="button" class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submitting" disabled style="display:none"> <b>{{ __('service::install.submitting') }} »</b> </button>
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
                $('.preloader h2').text('The license validation process is in progress. Please don\'t refresh or close the browser')
            }, 2000);
        })
    </script>
@endpush