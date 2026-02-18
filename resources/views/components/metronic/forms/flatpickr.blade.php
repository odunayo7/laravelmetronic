@props([
    'id' => null,
    'placeholder' => 'Pick a date',
    'enableTime' => false,
    'dateFormat' => 'Y-m-d'
])
@php
    $id = $id ?? 'kt_datepicker_' . uniqid();
    if ($enableTime) {
        $dateFormat = 'Y-m-d H:i';
    }
@endphp
 
<input {{ $attributes->merge(['class' => 'form-control']) }} placeholder="{{ $placeholder }}" id="{{ $id }}"/>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#{{ $id }}").flatpickr({
            enableTime: {{ $enableTime ? 'true' : 'false' }},
            dateFormat: "{{ $dateFormat }}",
        });
    });
</script>
