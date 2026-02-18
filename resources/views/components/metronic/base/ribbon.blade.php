@props([
    'label' => 'Ribbon',
    'color' => 'primary',
    'position' => 'top', // top, bottom, start, end, top-start, top-end, etc. usually vertical or horizontal
    'vertical' => false
])
@php
    $ribbonClass = 'ribbon ribbon-' . $position;
    if ($vertical) {
        $ribbonClass .= ' ribbon-vertical';
    }
@endphp

<div {{ $attributes->merge(['class' => $ribbonClass]) }}>
    <div class="ribbon-label bg-{{ $color }}">
        {{ $label }}
    </div>
    {{ $slot }}
</div>
