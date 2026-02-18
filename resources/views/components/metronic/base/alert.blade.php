@props([
    'type' => 'primary', // primary, success, info, warning, danger, etc.
    'title' => '',
    'icon' => '', // e.g. ki-shield-tick
    'dismissible' => false,
    'solid' => false
])

@php
    $baseClass = 'alert d-flex align-items-center p-5';
    $colorClass = $solid ? 'alert-dismissible bg-' . $type . ' d-flex flex-column flex-sm-row p-5 mb-10' : 'alert-' . $type;
    $iconClass = $solid ? 'text-light mb-5 mb-sm-0' : 'text-' . ($type === 'primary' ? 'primary' : $type);
    $textClass = $solid ? 'text-light pe-0 pe-sm-10' : 'flex-column';
    $titleClass = $solid ? 'light' : 'text-dark';
@endphp

<!--begin::Alert-->
<div {{ $attributes->merge(['class' => "$baseClass $colorClass"]) }}>
    @if($icon)
        <!--begin::Icon-->
        <i class="ki-duotone {{ $icon }} fs-2hx {{ $iconClass }} me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        <!--end::Icon-->
    @endif

    <!--begin::Wrapper-->
    <div class="d-flex {{ $textClass }}">
        @if($title)
            <!--begin::Title-->
            <h4 class="mb-1 {{ $titleClass }}">{{ $title }}</h4>
            <!--end::Title-->
        @endif

        <!--begin::Content-->
        <span>{{ $slot }}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    @if($dismissible)
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 {{ $solid ? 'text-light' : 'text-' . $type }}"><span class="path1"></span><span class="path2"></span></i>
        </button>
        <!--end::Close-->
    @endif
</div>
<!--end::Alert-->
