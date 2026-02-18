@props([
    'id' => null,
    'src' => '',
    'image' => '', // Thumbnail image
    'alt' => '',
    'group' => 'lightbox-basic'
])

<a class="d-block overlay" data-fslightbox="{{ $group }}" href="{{ $src }}">
    <div class="overlay-wrapper">
        <img src="{{ $image }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => 'w-100 rounded']) }}>
    </div>
    <div class="overlay-layer bg-dark bg-opacity-10">
        <i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    </div>
</a>
