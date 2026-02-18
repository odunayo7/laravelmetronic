@props([
    'id' => null,
    'src' => '',
    'aspectRatio' => 16/9
])

@php
    $id = $id ?? 'kt_cropper_' . uniqid();
@endphp

<div>
    <img id="{{ $id }}" src="{{ $src }}" alt="Picture" class="w-100">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var image = document.getElementById('{{ $id }}');
        var cropper = new Cropper(image, {
            aspectRatio: {{ $aspectRatio }},
            crop(event) {
                // console.log(event.detail.x);
                // console.log(event.detail.y);
            },
        });
    });
</script>
