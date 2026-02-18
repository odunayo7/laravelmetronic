@props([
    'id' => null,
    'items' => [] // Array of items
])

@php
    $id = $id ?? 'kt_timeline_' . uniqid();
    $itemsJson = json_encode($items);
@endphp

<div id="{{ $id }}"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var container = document.getElementById("{{ $id }}");
        var items = new vis.DataSet({!! $itemsJson !!});
        var options = {};
        var timeline = new vis.Timeline(container, items, options);
    });
</script>
