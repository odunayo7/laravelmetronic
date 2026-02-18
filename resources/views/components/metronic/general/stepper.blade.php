@props([
    'id' => null,
    'steps' => [] // Array of ['title' => 'Step 1', 'desc' => 'Description']
])

@php
    $id = $id ?? 'kt_stepper_' . uniqid();
@endphp

<div class="stepper stepper-pills" id="{{ $id }}">
    <!--begin::Nav-->
    <div class="stepper-nav flex-center flex-wrap mb-10">
        @foreach($steps as $index => $step)
            <div class="stepper-item mx-2 my-4 {{ $loop->first ? 'current' : '' }}" data-kt-stepper-element="nav">
                <div class="stepper-line w-40px"></div>
                <div class="stepper-icon w-40px h-40px">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">{{ $index + 1 }}</span>
                </div>
                <div class="stepper-label">
                    <h3 class="stepper-title">{{ $step['title'] }}</h3>
                    <div class="stepper-desc">{{ $step['desc'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
    <!--end::Nav-->

    <!--begin::Content-->
    <div class="mb-5">
        {{ $slot }}
    </div>
    <!--end::Content-->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.querySelector("#{{ $id }}");
        var stepper = new KTStepper(element);
        
        // Expose stepper instance or handle next/prev logic via other scripts
        // This is a basic initialization
    });
</script>
