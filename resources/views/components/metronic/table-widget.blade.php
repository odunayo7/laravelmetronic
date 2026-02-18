@props([
    'title',
    'subtitle' => '',
    'columns' => [],
    'rows' => [],
])

<div {{ $attributes->merge(['class' => 'card card-xl-stretch mb-5 mb-xl-8']) }}>
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">{{ $title }}</span>
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
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-3">
                <thead>
                    <tr>
                        @foreach($columns as $column)
                            <th class="p-0">{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Body-->
</div>
