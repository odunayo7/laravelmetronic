@props([
    'handle' => '.draggable-handle',
    'group' => 'draggable-zone'
])

<div {{ $attributes->merge(['class' => $group]) }}>
    {{ $slot }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var containers = document.querySelectorAll('.{{ $group }}');
        if (containers.length === 0) {
            return false;
        }
        var swappable = new Sortable.default(containers, {
            draggable: '.draggable',
            handle: '{{ $handle }}',
            swapAnimation: {
                duration: 200,
                easingFunction: 'ease-in-out',
            },
            plugins: [Plugins.SwapAnimation]
        });
    });
</script>
