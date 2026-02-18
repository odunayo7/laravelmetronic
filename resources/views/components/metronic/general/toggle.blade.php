@props([
    'target' => '', // ID of target element
    'state' => 'active', // active class name
    'name' => 'toggle', // toggle name group
    'label' => 'Toggle'
])

<button {{ $attributes->merge(['class' => 'btn btn-primary']) }} data-kt-toggle="true" data-kt-toggle-state="{{ $state }}" data-kt-toggle-target="{{ $target }}" data-kt-toggle-name="{{ $name }}">
    {{ $label }}
</button>
