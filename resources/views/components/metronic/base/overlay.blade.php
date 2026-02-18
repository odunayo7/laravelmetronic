@props([
    'image' => '', // URL
    'content' => '', // Slot content for overlay
    'color' => 'dark',
    'opacity' => '25',
    'rounded' => true
])

<div class="card overlay">
    <div class="card-body p-0">
        <div class="overlay-wrapper">
            @if($image)
                <img src="{{ $image }}" class="w-100 {{ $rounded ? 'rounded' : '' }}"/>
            @else
                {{ $slot }}
            @endif
        </div>
        <div class="overlay-layer bg-{{ $color }} bg-opacity-{{ $opacity }}">
             {{ $content }}
        </div>
    </div>
</div>
