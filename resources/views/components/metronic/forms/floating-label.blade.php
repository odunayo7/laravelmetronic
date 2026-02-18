@props([
    'id' => null,
    'label' => '',
    'placeholder' => '',
    'type' => 'text',
    'value' => ''
])


        @php
            $id = $id ?? 'floatingInput_' . uniqid();
        @endphp

<div class="form-floating mb-7">
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}"/>
    <label for="{{ $id }}">{{ $label }}</label>
</div>
