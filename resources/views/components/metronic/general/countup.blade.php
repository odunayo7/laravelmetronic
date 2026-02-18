@props([
    'value' => 0,
    'prefix' => '',
    'suffix' => '',
    'decimalPlaces' => 0,
    'duration' => 2
])

<div data-kt-countup="true" data-kt-countup-value="{{ $value }}" data-kt-countup-prefix="{{ $prefix }}" data-kt-countup-suffix="{{ $suffix }}" data-kt-countup-decimal-places="{{ $decimalPlaces }}" data-kt-countup-duration="{{ $duration }}">0</div>
