@props([
    'color' => '', // primary, danger, etc.
    'style' => '', // dashed, dotted
    'spacing' => 'my-10',
    'thick' => false // border-2, etc. - separate prop logic or just class
])
@php
    $classes = 'separator ' . $spacing;

    if ($color) {
        $classes .= ' border-' . $color;
    }

    if ($style) {
        $classes .= ' separator-' . $style;
    }
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}></div>
