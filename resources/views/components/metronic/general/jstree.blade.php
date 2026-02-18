@props([
    'id' => null,
    'types' => true
])

@php
    $id = $id ?? 'kt_jstree_' . uniqid();
@endphp

<div id="{{ $id }}">
    {{ $slot }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#{{ $id }}').jstree({
            "core" : {
                "themes" : {
                    "responsive": false
                }
            },
            "types" : {
                "default" : {
                    "icon" : "ki-solid ki-folder text-warning"
                },
                "file" : {
                    "icon" : "ki-solid ki-file text-primary"
                }
            },
            "plugins": ["types"]
        });
    });
</script>
