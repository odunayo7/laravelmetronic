@extends('layouts.metronic_auth')

@section('title', trans('panel.site_title'))

@section('content')
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" method="POST"
        action="{{ route('password.email') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">{{ trans('global.reset_password') }}</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="email" placeholder="{{ trans('global.login_email') }}" name="email" autocomplete="email"
                class="form-control bg-transparent {{ $errors->has('email') ? 'is-invalid' : '' }}"
                value="{{ old('email') }}" required autofocus />
            <!--end::Email-->
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <!--end::Input group=-->

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{ trans('global.send_password') }}</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
            <a href="{{ route('login') }}" class="btn btn-light">{{ trans('global.cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
@endsection