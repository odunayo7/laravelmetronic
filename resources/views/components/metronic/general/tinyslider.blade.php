@props([
    'id' => null,
    'items' => [], // Array of content
    'controls' => false,
    'nav' => true,
    'mouseDrag' => true
])

@php
    $id = $id ?? 'kt_tns_' . uniqid();
@endphp

<div class="tns" style="direction: ltr">
    <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="{{ $mouseDrag ? 'true' : 'false' }}" data-tns-controls="{{ $controls ? 'true' : 'false' }}" data-tns-nav="{{ $nav ? 'true' : 'false' }}">
        @foreach($items as $item)
            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                {!! $item !!}
            </div>
        @endforeach
        {{ $slot }}
    </div>
</div>
