@props([
    'name' => 'sticky',
    'offset' => "{default: false, xl: '200px'}",
    'width' => "{lg: '250px', xl: '300px'}",
    'left' => 'auto',
    'top' => '100px',
    'animation' => 'false',
    'zIndex' => '95'
])

<div data-kt-sticky="true" data-kt-sticky-name="{{ $name }}" data-kt-sticky-offset="{{ $offset }}" data-kt-sticky-width="{{ $width }}" data-kt-sticky-left="{{ $left }}" data-kt-sticky-top="{{ $top }}" data-kt-sticky-animation="{{ $animation }}" data-kt-sticky-zindex="{{ $zIndex }}">
    {{ $slot }}
</div>
