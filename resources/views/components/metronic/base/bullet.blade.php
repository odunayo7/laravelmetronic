@props([
    'color' => '', // primary, success, etc. or specific hex/rgb if needed, but usually basic colors
    'dot' => false,
    'vertical' => false
])
@php
    $classes = 'bullet';
    if ($dot) {
        $classes .= ' bullet-dot';
    }
    if ($vertical) {
        $classes .= ' bullet-vertical';
    }
    if ($color) {
        $classes .= ' bg-' . $color;
    }
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}></span>
