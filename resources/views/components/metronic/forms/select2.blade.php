@props([
    'id' => null,
    'placeholder' => 'Select an option',
    'options' => [], // Array of options ['value' => '1', 'label' => 'Option 1'] or generic
    'selected' => null,
    'hideSearch' => false
])

<select {{ $attributes->merge(['class' => 'form-select']) }} data-control="select2" data-placeholder="{{ $placeholder }}" @if($hideSearch) data-hide-search="true" @endif>
    <option></option>
    @foreach($options as $value => $label)
        @php
            $isSelected = false;
            if (is_array($selected)) {
                 $isSelected = in_array($value, $selected);
            } else {
                 $isSelected = ($value == $selected);
            }
            // Support simplified options (just strings) or array with keys
            $optValue = is_numeric($value) ? $value : $value;
            $optLabel = $label;
        @endphp
        <option value="{{ $optValue }}" {{ $isSelected ? 'selected' : '' }}>{{ $optLabel }}</option>
    @endforeach
    {{ $slot }}
</select>
