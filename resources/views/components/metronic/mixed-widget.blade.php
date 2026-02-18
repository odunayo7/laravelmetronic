@props([
    'title',
    'stats' => '',
    'description' => '',
    'color' => 'primary',
    'height' => '275px',
])

<div {{ $attributes->merge(['class' => 'card card-xl-stretch mb-xl-8']) }}>
    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Header-->
        <div class="px-9 pt-7 card-rounded w-100 bg-{{ $color }}" style="height: {{ $height }}">
            <!--begin::Heading-->
            <div class="d-flex flex-stack">
                <h3 class="m-0 text-white fw-bold fs-3">{{ $title }}</h3>
                <div class="ms-1">
                    @if(isset($toolbar))
                        {{ $toolbar }}
                    @endif
                </div>
            </div>
            <!--end::Heading-->
            
            <!--begin::Balance-->
            <div class="d-flex text-center flex-column text-white pt-8">
                <span class="fw-semibold fs-7">{{ $description }}</span>
                <span class="fw-bold fs-2x pt-1">{{ $stats }}</span>
            </div>
            <!--end::Balance-->
        </div>
        <!--end::Header-->
        
        <!--begin::Items-->
        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
            {{ $slot }}
        </div>
        <!--end::Items-->
    </div>
    <!--end::Body-->
</div>
