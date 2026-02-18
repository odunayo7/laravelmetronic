@props([
    'id' => null,
    'mask' => '', // e.g. "99/99/9999" or "email"
    'placeholder' => ''
])

@php
    $id = $id ?? 'kt_inputmask_' . uniqid();
@endphp

<input {{ $attributes->merge(['class' => 'form-control']) }} placeholder="{{ $placeholder }}" id="{{ $id }}"/>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if($mask === 'email')
            Inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
                greedy: false,
                onBeforePaste: function (pastedValue, opts) {
                    pastedValue = pastedValue.toLowerCase();
                    return pastedValue.replace("mailto:", "");
                },
                definitions: {
                    "*": {
                        validator: '[0-9A-Za-z!#$%&"*+/=?^_`{|}~-]',
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            }).mask("#{{ $id }}");
        @else
            Inputmask({ "mask" : "{{ $mask }}" }).mask("#{{ $id }}");
        @endif
    });
</script>
