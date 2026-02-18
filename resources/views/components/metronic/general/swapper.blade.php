@props([
    'mode' => 'prepend', // prepend, append
    'parent' => "{default: '#parent_1', lg: '#parent_2'}" // screen size => selector
])

<div data-kt-swapper="true" data-kt-swapper-mode="{{ $mode }}" data-kt-swapper-parent="{{ $parent }}">
    {{ $slot }}
</div>
