@extends('layouts.metronic_auth')

@section('title', trans('panel.site_title'))

@section('content')
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" method="POST"
        action="{{ route('password.request') }}">
        @csrf
        <input name="token" value="{{ $token }}" type="hidden">

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">{{ trans('global.reset_password') }}</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">Setup your new password</div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->

        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="email" placeholder="{{ trans('global.login_email') }}" name="email" autocomplete="email"
                class="form-control bg-transparent {{ $errors->has('email') ? 'is-invalid' : '' }}"
                value="{{ $email ?? old('email') }}" required readonly />
            <!--end::Email-->
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <!--end::Input group=-->

        <!--begin::Input group-->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        type="password" placeholder="{{ trans('global.login_password') }}" name="password"
                        autocomplete="new-password" required />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        data-kt-password-meter-control="visibility">
                        <i class="ki-duotone ki-eye-slash fs-2"></i>
                        <i class="ki-duotone ki-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
            <!--end::Hint-->
            @if($errors->has('password'))
                <div class="text-danger small">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <!--end::Input group=-->

        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Repeat Password-->
            <input placeholder="{{ trans('global.login_password_confirmation') }}" name="password_confirmation"
                type="password" autocomplete="new-password" class="form-control bg-transparent" required />
            <!--end::Repeat Password-->
        </div>
        <!--end::Input group=-->

        <!--begin::Action-->
        <div class="d-grid mb-10">
            <button type="button" id="kt_new_password_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{ trans('global.reset_password') }}</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
@endsection