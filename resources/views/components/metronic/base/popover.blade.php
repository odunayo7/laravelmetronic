@props([
    'title' => '',
    'content' => '',
    'placement' => 'top', // top, bottom, left, right
    'trigger' => 'click', // click, hover, focus
    'dismissible' => false
])
@php
    $attributes = $attributes->merge([
        'data-bs-toggle' => 'popover',
        'title' => $title,
        'data-bs-content' => $content,
        'data-bs-placement' => $placement,
        'data-bs-trigger' => $trigger
    ]);

    if ($dismissible) {
        // Bootstrap 5 dismissible popover requires specific markup or focus trigger
        // Usually handled by tabindex="0" and trigger="focus"
    }
@endphp

<button type="button" {{ $attributes }}>
    {{ $slot }}
</button>
