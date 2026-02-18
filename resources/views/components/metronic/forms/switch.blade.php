@props([
    'id' => null,
    'label' => '',
    'checked' => false,
    'value' => '1',
    'name' => ''
])


        @php
            $id = $id ?? 'flexSwitch_' . uniqid();
        @endphp

<div class="form-check form-switch form-check-custom form-check-solid">
    <input class="form-check-input" type="checkbox" value="{{ $value }}" id="{{ $id }}" name="{{ $name }}" {{ $checked ? 'checked' : '' }} {{ $attributes }}/>
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
