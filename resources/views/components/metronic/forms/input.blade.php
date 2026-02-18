@props([
    'type' => 'text',
    'placeholder' => '',
    'solid' => false,
    'transparent' => false,
    'flush' => false,
    'size' => '' // sm, lg
])

@php
    $classes = 'form-control';
    if ($solid)
        $classes .= ' form-control-solid';
    if ($transparent)
        $classes .= ' form-control-transparent';
    if ($flush)
        $classes .= ' form-control-flush';
    if ($size)
        $classes .= ' form-control-' . $size;
@endphp

<input type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} placeholder="{{ $placeholder }}"/>
