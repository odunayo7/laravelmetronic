@props([
    'height' => '400px',
    'color' => 'dark' // Not explicitly used in basic scroll but useful context
])

<div class="scroll h-{{ $height }} px-5">
    {{ $slot }}
</div>
