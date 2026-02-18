@props([
    'id' => null,
    'label' => '',
    'checked' => false,
    'value' => '1',
    'name' => '',
    'custom' => true,
    'solid' => true
])

@php
    $id = $id ?? 'radio_' . uniqid();
    $wrapperClasses = 'form-check';
    if ($custom)
        $wrapperClasses .= ' form-check-custom';
    if ($solid)
        $wrapperClasses .= ' form-check-solid';
@endphp

<div class="{{ $wrapperClasses }}">
    <input class="form-check-input" type="radio" value="{{ $value }}" id="{{ $id }}" name="{{ $name }}" {{ $checked ? 'checked' : '' }} {{ $attributes }} />
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
