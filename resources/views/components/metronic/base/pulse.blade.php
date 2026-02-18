@props([
    'color' => 'primary',
    'icon' => null
])

<span {{ $attributes->merge(['class' => 'pulse pulse-' . $color]) }}>
    @if($icon)
        <span class="pulse-ring"></span>
        <i class="ki-duotone {{ $icon }} fs-1"><span class="path1"></span><span class="path2"></span></i>
    @else
        {{ $slot }}
        <span class="pulse-ring"></span>
    @endif
</span>
