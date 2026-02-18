@props([
    'id' => null,
    'addLabel' => 'Add'
])

@php
    $id = $id ?? 'kt_repeater_' . uniqid();
@endphp

<div id="{{ $id }}">
    <div class="form-group">
        <div data-repeater-list="{{ $id }}">
            <div data-repeater-item>
                {{ $slot }}
            </div>
        </div>
    </div>

    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
            <i class="ki-duotone ki-plus fs-3"></i> {{ $addLabel }}
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#{{ $id }}').repeater({
            initEmpty: false,
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    });
</script>
