@props([
    'step' => 1
])

<div class="flex-column {{ $step === 1 ? 'current' : '' }}" data-kt-stepper-element="content">
    {{ $slot }}
</div>
