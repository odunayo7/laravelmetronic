@props([
    'name' => 'password',
    'placeholder' => 'Password',
    'minLength' => 8
])

<!--begin::Meter-->
<div class="position-relative mb-3" data-kt-password-meter="true">
    <!--begin::Input-->
    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="{{ $placeholder }}" name="{{ $name }}" autocomplete="off" />
    <!--end::Input-->

    <!--begin::Visibility toggle-->
    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
        <i class="ki-duotone ki-eye-slash fs-2"></i>
        <i class="ki-duotone ki-eye fs-2 d-none"></i>
    </span>
    <!--end::Visibility toggle-->
</div>
<!--end::Meter-->

<!--begin::Highlight-->
<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
</div>
<!--end::Highlight-->

<!--begin::Hint-->
<div class="text-muted">
    Use {{ $minLength }} or more characters with a mix of letters, numbers & symbols.
</div>
<!--end::Hint-->
