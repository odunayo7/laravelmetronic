@props([
    'id' => null,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'prefix' => '',
    'decimals' => 0,
    'value' => 0,
    'name' => ''
])
@php
    $id = $id ?? 'kt_dialer_' . uniqid();
@endphp

<div class="input-group w-md-300px"
    data-kt-dialer="true"
    data-kt-dialer-min="{{ $min }}"
    data-kt-dialer-max="{{ $max }}"
    data-kt-dialer-step="{{ $step }}"

            data-kt-dialer-prefix="{{ $prefix }}"
    data-kt-dialer-decimals="{{ $decimals }}"
    id="{{ $id }}">

    <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="decrease">
        <i class="ki-duotone ki-minus fs-2"></i>
    </button>

     <input type="text" class="form-control" readonly placeholder="Amount" value="{{ $value }}" data-kt-dialer-control="input" name="{{ $name }}"/>

    <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="increase">
        <i class="ki-duotone ki-plus fs-2"></i>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dialerElement = document.querySelector("#{{ $id }}");
        var dialerObject = new KTDialer(dialerElement, {
            min: {{ $min }},
            max: {{ $max }},
            step: {{ $step }},
            prefix: "{{ $prefix }}",
            decimals: {{ $decimals }}
        });
    });
</script>
