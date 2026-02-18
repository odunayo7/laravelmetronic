@props([
    'id' => null,
    'maxlength' => 255,
    'placeholder' => '',
    'warningClass' => 'badge badge-warning',
    'limitReachedClass' => 'badge badge-success'
])

@php
    $id = $id ?? 'kt_maxlength_' . uniqid();
@endphp

<input {{ $attributes->merge(['class' => 'form-control']) }} maxlength="{{ $maxlength }}" placeholder="{{ $placeholder }}" id="{{ $id }}"/>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#{{ $id }}').maxlength({
            warningClass: "{{ $warningClass }}",
            limitReachedClass: "{{ $limitReachedClass }}"
        });
    });
</script>
