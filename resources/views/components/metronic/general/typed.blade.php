@props([
    'id' => null,
    'strings' => [], // Array of strings
    'speed' => 30
])

@php
    $id = $id ?? 'kt_typed_' . uniqid();
    $stringsJson = json_encode($strings);
@endphp

 <span id="{{ $id }}"></span>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Typed("#{{ $id }}", {
            strings: {!! $stringsJson !!},
            typeSpeed: {{ $speed }}
        });
    });
</script>
