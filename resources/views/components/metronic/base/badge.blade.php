@props([
    'type' => 'light', // light, primary, light-primary, square, circle, etc.
    'color' => 'primary',
    'size' => '', // sm, lg
    'circle' => false,
    'square' => false,
    'outline' => false // outline
])
@php
    $classes = 'badge';

    if ($circle) {
        $classes .= ' badge-circle';
    } elseif ($square) {
        $classes .= ' badge-square';
    }

    if ($outline) {
        $classes .= ' badge-outline badge-' . $color;
    } else {
        if (str_starts_with($type, 'light-')) {
            $classes .= ' badge-' . $type;
        } else {
            $classes .= ' badge-' . $type; // e.g. badge-light, badge-primary
            if ($type !== 'light' && !$circle && !$square && !str_contains($type, '-')) {
                // If type is just a color like 'primary', it's usually badge-primary
            }
        }
    }

    // Simplification: Allow 'color' prop to drive the color class if 'type' is generic or default
    if ($type === 'light' && $color !== 'primary') {
        // handle default
    }

    // Metronic badges are often just class="badge badge-light-primary"
    // Let's allow passing full class string via attributes, but provide helpers.
    // If user passes type="light-primary", we output badge-light-primary
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
