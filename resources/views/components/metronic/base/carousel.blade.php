@props([
    'id' => 'kt_carousel_1',
    'items' => [], // Array of content strings or views
    'interval' => 8000,
    'indicators' => true,
    'controls' => true
])

<!--begin::Carousel-->
<div id="{{ $id }}_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="{{ $interval }}">
    <!--begin::Heading-->
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <!--begin::Label-->
        <span class="fs-4 fw-bold pe-2">{{ $title ?? '' }}</span>
        <!--end::Label-->
        
        @if($indicators)
            <!--begin::Carousel Indicators-->
            <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                @foreach($items as $index => $item)
                    <li data-bs-target="#{{ $id }}_carousel" data-bs-slide-to="{{ $index }}" class="ms-1 {{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <!--end::Carousel Indicators-->
        @endif
    </div>
    <!--end::Heading-->

    <!--begin::Carousel-->
    <div class="carousel-inner pt-8">
        @foreach($items as $index => $item)
            <!--begin::Item-->
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                {!! $item !!}
            </div>
            <!--end::Item-->
        @endforeach
    </div>
    <!--end::Carousel-->
</div>
<!--end::Carousel-->
