@props([
    'id' => null,
    'options' => [], // Array of groups => options
    'multiple' => true
])

@php
    $id = $id ?? 'kt_multiselectsplitter_' . uniqid();
@endphp

<select id="{{ $id }}" class="form-select" {{ $multiple ? 'multiple' : '' }}>
    @foreach($options as $group => $items)
        <optgroup label="{{ $group }}">
            @foreach($items as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </optgroup>
    @endforeach
    {{ $slot }}
</select>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#{{ $id }}").multiselectsplitter();
    });
</script>
