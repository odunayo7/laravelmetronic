@props([
    'id' => 'kt_toast_1',
    'title' => 'Termination',
    'time' => 'Just now',
    'icon' => 'ki-notification-on', // or just use slot for custom header
    'autohide' => true,
    'delay' => 5000
])

<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" id="{{ $id }}" data-bs-autohide="{{ $autohide ? 'true' : 'false' }}" data-bs-delay="{{ $delay }}">
    <div class="toast-header">
        @if($icon)
             <i class="ki-duotone {{ $icon }} fs-2 me-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        @endif
        <strong class="me-auto">{{ $title }}</strong>
        <small>{{ $time }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{ $slot }}
    </div>
</div>
