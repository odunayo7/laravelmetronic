@props([
    'id' => null,
    'value' => '', // comma separated tags
    'placeholder' => ''
])

@php
    $id = $id ?? 'kt_tagify_' . uniqid();
@endphp

<input {{ $attributes->merge(['class' => 'form-control']) }} value="{{ $value }}" placeholder="{{ $placeholder }}" id="{{ $id }}"/>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var input = document.querySelector("#{{ $id }}");
        new Tagify(input);
    });
</script>
