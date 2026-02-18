@props([
    'id' => null,
    'placeholder' => ''
])

@php
    $id = $id ?? 'kt_td_picker_' . uniqid();
    $inputId = $id . '_input';
@endphp

<div class="input-group" id="{{ $id }}" data-td-target-input="nearest" data-td-target-toggle="nearest">
    <input id="{{ $inputId }}" type="text" class="form-control" data-td-target="#{{ $id }}" placeholder="{{ $placeholder }}"/>
    <span class="input-group-text" data-td-target="#{{ $id }}" data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new tempusDominus.TempusDominus(document.getElementById("{{ $id }}"), {
            //put your config here
        });
    });
</script>
