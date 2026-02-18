@props([
    'id' => null,
    'height' => 400
])

@php
    $id = $id ?? 'kt_chartjs_' . uniqid();
@endphp

<canvas id="{{ $id }}" class="mh-{{ $height }}px"></canvas>

<!-- usage: <x-metronic.charts.chartjs id="myChart" /> -->
<!-- <script> ... new Chart(document.getElementById('myChart'), config); ... </script> -->
