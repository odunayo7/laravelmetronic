@props([
    'label' => 'Submit',
    'progress' => 'Please wait...'
])

<span class="indicator-label">
    {{ $label }}
</span><span class="indicator-progress">
    {{ $progress }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
