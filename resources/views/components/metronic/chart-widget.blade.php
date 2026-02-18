@props([
    'title',
    'subtitle' => '',
    'chartId' => '',
    'height' => '350px',
])

<div {{ $attributes->merge(['class' => 'card card-xl-stretch mb-5 mb-xl-8']) }}>
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">{{ $title }}</span>
            @if($subtitle)
                <span class="text-muted fw-semibold fs-7">{{ $subtitle }}</span>
            @endif
        </h3>
        
        <div class="card-toolbar" data-kt-buttons="true">
            @if(isset($toolbar))
                {{ $toolbar }}
            @endif
        </div>
    </div>
    <!--end::Header-->
    
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Chart-->
        <div id="{{ $chartId }}" style="height: {{ $height }}"></div>
        <!--end::Chart-->
        
        {{ $slot }}
    </div>
    <!--end::Body-->
</div>
