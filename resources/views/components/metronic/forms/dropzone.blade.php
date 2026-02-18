@props([
    'id' => null,
    'action' => '#',
    'message' => 'Drop files here or click to upload.',
    'submessage' => 'Upload up to 10 files',
    'maxFiles' => 10,
    'maxFilesize' => 10 // MB
])

@php
    $id = $id ?? 'kt_dropzone_' . uniqid();
@endphp

                   
<form class="form" action="{{ $action }}" method="post">
    <!--begin::Dropzone-->
    <div class="dropzone" id="{{ $id }}">
        <!--begin::Message-->
        <div class="dz-message needsclick">
            <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

            <!--begin::Info-->
            <div class="ms-4">
                <h3 class="fs-5 fw-bold text-gray-900 mb-1">{{ $message }}</h3>
                <span class="fs-7 fw-semibold text-gray-400">{{ $submessage }}</span>
            </div>
            <!--end::Info-->
         </div>
    </div>
    <!--end::Dropzone-->
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myDropzone = new Dropzone("#{{ $id }}", {
            url: "{{ $action }}",
            paramName: "file",
            maxFiles: {{ $maxFiles }},
            maxFilesize: {{ $maxFilesize }}, // MB
            addRemoveLinks: true,
        });
    });
</script>
