@props([
    'title',
    'value',
    'description',
    'icon' => null,
    'color' => 'primary',
    'flush' => false,
])

<div {{ $attributes->merge(['class' => 'card bgi-no-repeat bgi-position-y-top bgi-position-x-end statistics-widget-1 card-xl-stretch mb-xl-8 ' . ($flush ? 'card-flush' : '')]) }}>
    @if($icon)
        <!-- Icon logic here if needed, or pass via slot -->
    @endif
    
    <div class="card-body">
        <a href="#" class="card-title fw-bold text-muted text-hover-primary fs-4">{{ $title }}</a>
        <div class="fw-bold text-{{ $color }} my-6">{{ $value }}</div>
        <p class="text-gray-900-75 fw-semibold fs-5 m-0">
            {{ $description }}
        </p>
    </div>
</div>
