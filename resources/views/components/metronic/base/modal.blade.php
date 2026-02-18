@props([
    'id',
    'title',
    'footer' => null,
    'size' => '', // sm, lg, xl, fullscreen
    'centered' => false,
    'scrollable' => false,
    'static' => false // static backdrop
])
@php
    $dialogClass = 'modal-dialog';
    if ($size) {
        $dialogClass .= ' modal-' . $size;
    }
    if ($centered) {
        $dialogClass .= ' modal-dialog-centered';
    }
    if ($scrollable) {
        $dialogClass .= ' modal-dialog-scrollable';
    }

    $backdrop = $static ? 'data-bs-backdrop="static" data-bs-keyboard="false"' : '';
@endphp

<!--begin::Modal-->

                   <div class="modal fade" tabindex="-1" id="{{ $id }}" {!! $backdrop !!} aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="{{ $dialogClass }}">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="{{ $id }}Label">{{ $title }}</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            <!--end::Close-->
        </div>
            <div class="modal-body">
                {{ $slot }}
            </div>

            @if($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
<!--end::Modal-->
