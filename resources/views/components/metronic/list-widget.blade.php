@props([
    'title',
    'subtitle' => '',
    'flush' => false,
    'items' => [], // Array of ['title', 'subtitle', 'icon', 'color']
])

<div {{ $attributes->merge(['class' => 'card card-xl-stretch mb-5 mb-xl-8 ' . ($flush ? 'card-flush' : '')]) }}>
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-900">{{ $title }}</span>
            @if($subtitle)
                <span class="text-muted mt-1 fw-semibold fs-7">{{ $subtitle }}</span>
            @endif
        </h3>
        <div class="card-toolbar">
            @if(isset($toolbar))
                {{ $toolbar }}
            @endif
        </div>
    </div>
    <!--end::Header-->
    
    <!--begin::Body-->
    <div class="card-body pt-5">
        @if(!empty($items))
            @foreach($items as $item)
                <div class="d-flex align-items-center mb-7">
                    <div class="symbol symbol-50px me-5">
                        <span class="symbol-label bg-light-{{ $item['color'] ?? 'primary' }}">
                            <i class="ki-duotone {{ $item['icon'] ?? 'ki-star' }} fs-2x text-{{ $item['color'] ?? 'primary' }}">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                        </span>
                    </div>
                    <div class="flex-grow-1">
                        <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{ $item['title'] }}</a>
                        <span class="text-muted d-block fw-semibold">{{ $item['subtitle'] }}</span>
                    </div>
                </div>
            @endforeach
        @endif

        {{ $slot }}
    </div>
    <!--end::Body-->
</div>
