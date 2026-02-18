@props([
    'target' => 'body',
    'message' => 'Loading...',
    'primary' => true
])

<!-- Usage: <x-metronic.general.blockui target="#myDiv" /> -->
<!-- This component generates a script to block the target. -->
<!-- Alternatively, it can just be a wrapper div that initializes blockui on itself if we change logic. -->
<!-- Metronic BlockUI usually blocks an existing element. -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var target = document.querySelector("{{ $target }}");
        var blockUI = new KTBlockUI(target, {
            message: '<div class="blockui-message"><span class="spinner-border text-{{ $primary ? 'primary' : 'white' }}"></span> {{ $message }}</div>',
        });
        
        // window.myBlockUI = blockUI; // Optional: expose globally
    });
</script>
