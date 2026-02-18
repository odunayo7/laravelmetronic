@props([
    'title' => '',
    'placement' => 'top',
    'trigger' => 'hover focus'
])

<span {{ $attributes->merge(['data-bs-toggle' => 'tooltip', 'data-bs-placement' => $placement, 'title' => $title, 'data-bs-trigger' => $trigger]) }}>
    {{ $slot }}
</span>
