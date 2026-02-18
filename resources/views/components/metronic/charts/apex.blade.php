@props([
    'id' => null,
    'height' => 350
])

@php
    $id = $id ?? 'kt_apexcharts_' . uniqid();
@endphp

<div id="{{ $id }}" style="height: {{ $height }}px;"></div>

<!-- Chart initialization should be handled via a separate script or stack, passing the ID -->
<!-- usage: <x-metronic.charts.apex id="myChart" /> -->
<!-- <script> ... new ApexCharts(document.getElementById('myChart'), options).render(); ... </script> -->
