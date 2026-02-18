@props([
    'id' => null,
    'boards' => [] // Array of boards config
])
@php
    $id = $id ?? 'kt_kanban_' . uniqid();
    $boardsJson = json_encode($boards);
@endphp

<div id="{{ $id }}"></div>
 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kanban = new jKanban({
            element: '#{{ $id }}',
            gutter: '0',
            widthBoard: '250px',
            boards: {!! $boardsJson !!}
        });
    });
</script>
