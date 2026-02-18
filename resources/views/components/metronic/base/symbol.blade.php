@props([
    'image' => null,
    'label' => null, // Initial or text
    'color' => 'primary', // for label background
    'textColor' => 'inverse-primary', // for label text
    'size' => '50px', // symbol-50px
    'circle' => false,
    'square' => false,
    'badge' => false, // notification badge
    'badgeColor' => 'success'
])

@php
    $classes = 'symbol symbol-' . $size;
    
    if ($circle) {
        $classes .= ' symbol-circle';
    } elseif ($square) {
        $classes .= ' symbol-square';
    }
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if($image)
        <img src="{{ $image }}" alt=""/>
    @else
        <div class="symbol-label fs-2 fw-semibold bg-{{ $color }} text-{{ $textColor }}">
            {{ $label }}
        </div>
    @endif

    @if($badge)
        <span class="symbol-badge badge badge-circle bg-{{ $badgeColor }} start-100 top-100 border-4 h-15px w-15px translate-middle"></span>
    @endif
</div>
