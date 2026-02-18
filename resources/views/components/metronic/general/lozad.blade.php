@props([
    'src' => '',
    'class' => ''
])

<img class="lozad {{ $class }}" data-src="{{ $src }}" />

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const observer = lozad();
        observer.observe();
    });
</script>
