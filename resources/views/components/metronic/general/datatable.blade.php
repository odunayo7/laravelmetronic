@props([
    'id' => null,
    'headers' => [], // Array of strings
    'rows' => [], // Array of row data (arrays)
    'striped' => false
])

@php
    $id = $id ?? 'kt_datatable_' . uniqid();
    $classes = 'table align-middle table-row-dashed fs-6 gy-5';
    if ($striped) {
        $classes .= ' table-striped';
    }
@endphp

<div class="table-responsive">
    <table id="{{ $id }}" {{ $attributes->merge(['class' => $classes]) }}>
        <thead>
            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-semibold">
            @foreach($rows as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
            @endforeach
            {{ $slot }}
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#{{ $id }}").DataTable();
    });
</script>
