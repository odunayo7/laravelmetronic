@props([
    'placeholder' => '',
    'rows' => 3
])

<textarea {{ $attributes->merge(['class' => 'form-control']) }} data-kt-autosize="true" rows="{{ $rows }}" placeholder="{{ $placeholder }}">{{ $slot }}</textarea>
