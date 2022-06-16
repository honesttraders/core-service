@extends('service::layouts.app_install', ['title' => __('lms::install.welcome')])

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
                    class="border step-with-border completed  rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
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
                    class="p-3 border step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
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
                    class="p-3 border step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
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
                    class="p-3 border step-with-border initial rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/icon-white/complete.svg" alt="" />
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
        <div class="bg-white w-75 rounded" step-count="6">
            <div class="text-title p-3 text-center text-white">
                <h3>Welcome To {{ env('APP_NAME') }}</h3>
            </div>
            <div class="px-5 py-4 d-flex flex-column justify-content-center align-items-center gap-3 content-body">
                <img src="{{ asset($base_path . '/') }}/images/complete-installation.png" alt="" />
                <p class="text-center pb-3">
                    Congratulations! You successfully installed HRM.
                </p>
                <p>Superadmin Login Credentials</p>
                <p class="text-center">
                    Email : <b> {{ $user }} </b> <br>
                    Password : <b> {{ $pass }} </b>
                </p>
                <a href="{{ url('/') }}" class="btn color mb-3 btn-primary px-5 py-3 align-items-center">
                    {{ __('service::install.goto_home') }} »</a>
            </div>
        </div>
    </div>
</div>

@stop