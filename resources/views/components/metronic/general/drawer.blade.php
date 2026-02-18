@props([
    'id' => null,
    'width' => '500px',
    'title' => 'Drawer',
    'toggle' => '', // ID of toggle button
    'close' => '' // ID of close button
])

@php
    $id = $id ?? 'kt_drawer_' . uniqid();
    $toggleAttr = $toggle ? "data-kt-drawer-toggle=\"#$toggle\"" : '';
    $closeAttr = $close ? "data-kt-drawer-close=\"#$close\"" : "data-kt-drawer-close=\"#{$id}_close\"";
@endphp

<div id="{{ $id }}" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" {!! $toggleAttr !!} {!! $closeAttr !!} data-kt-drawer-width="{{ $width }}">
    <div class="card w-100 rounded-0">
        <div class="card-header pe-5">
            <div class="card-title">{{ $title }}</div>
            <div class="card-toolbar">
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="{{ $close ? $close : $id . '_close' }}">
                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
        </div>
        <div class="card-body hover-scroll-overlay-y">
            {{ $slot }}
        </div>
    </div>
</div>
