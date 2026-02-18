@props([
    'url' => null,
    'type' => 'primary', // primary, secondary, light-primary, etc.
    'icon' => null,
    'size' => '', // sm, lg
    'outline' => false,
    'dashed' => false,
    'active' => false,
    'disabled' => false,
    'text' => ''
])
@php
    $tag = $url ? 'a' : 'button';
    $classes = 'btn';

    if ($outline) {
        $classes .= ' btn-outline btn-outline-' . $type . ' btn-active-light-' . $type;
        if ($dashed) {
            $classes .= ' btn-outline-dashed';
        }
    } else {
        $classes .= ' btn-' . $type;
    }

    if ($size) {
        $classes .= ' btn-' . $size;
    }

    if ($active) {
        $classes .= ' active';
    }

    if ($icon && empty($slot) && empty($text)) {
        $classes .= ' btn-icon';
    }
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $classes]) }} @if($url) href="{{ $url }}" @endif @if($disabled) disabled="disabled" @endif>
    @if($icon)
        <i class="ki-duotone {{ $icon }} fs-2">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
        </i>
    @endif
    
    @if($text)
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</{{ $tag }}>
