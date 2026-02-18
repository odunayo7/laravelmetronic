@props([
    'id' => null,
    'placeholder' => 'Select date range',
    'timePicker' => false,
    'opens' => 'left'
])

@php
    $id = $id ?? 'kt_daterangepicker_' . uniqid();
    $dateFormat = $timePicker ? 'M/DD hh:mm A' : 'YYYY/MM/DD';
@endphp

<input {{ $attributes->merge(['class' => 'form-control']) }} placeholder="{{ $placeholder }}" id="{{ $id }}"/>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#{{ $id }}").daterangepicker({
            timePicker: {{ $timePicker ? 'true' : 'false' }},
            opens: '{{ $opens }}',
            locale: {
                format: "{{ $dateFormat }}"
            }
        });
    });
</script>
