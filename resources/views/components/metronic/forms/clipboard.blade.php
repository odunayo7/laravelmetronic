@props([
    'target' => '', // ID of the input to copy from
    'label' => 'Copy'
])

<!-- Target input should be defined separately or passed in slot if custom structure -->
<button {{ $attributes->merge(['class' => 'btn btn-light-primary']) }} data-clipboard-target="{{ $target }}">
    {{ $label }}
</button>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var clipboard = new ClipboardJS('[data-clipboard-target]');
        clipboard.on('success', function(e) {
            e.clearSelection();
            // Optional: Show toast or tooltip
             toastr.success("Copied!");
        });
    });
</script>
