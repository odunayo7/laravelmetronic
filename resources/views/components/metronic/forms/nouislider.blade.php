@props([
    'id' => null,
    'min' => 0,
    'max' => 100,
    'start' => [20, 80], // Array for range, single value for single handle
    'step' => 1,
    'connect' => true,
    'tooltips' => false
])

@php
    $id = $id ?? 'kt_slider_' . uniqid();
    $startJson = json_encode($start);
@endphp

<div id="{{ $id }}"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slider = document.querySelector("#{{ $id }}");
        noUiSlider.create(slider, {
            start: {!! $startJson !!},
            connect: {{ $connect ? 'true' : 'false' }},
            step: {{ $step }},
            @if($tooltips)
                tooltips: true,
            @endif
            range: {
                "min": {{ $min }},
                "max": {{ $max }}
            }
        });
    });
</script>
