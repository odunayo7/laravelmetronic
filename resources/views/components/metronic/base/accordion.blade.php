@props([
    'id' => 'kt_accordion_1',
    'items' => [] // Array of ['title' => 'Title', 'content' => 'Content', 'show' => false]
])

<!--begin::Accordion-->
<div class="accordion" id="{{ $id }}">
    @foreach($items as $index => $item)
        @php
            $headerId = $id . '_header_' . $index;
            $bodyId = $id . '_body_' . $index;
            $show = $item['show'] ?? false;
        @endphp
        <div class="accordion-item">
            <h2 class="accordion-header" id="{{ $headerId }}">
                <button class="accordion-button fs-4 fw-semibold {{ $show ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $bodyId }}" aria-expanded="{{ $show ? 'true' : 'false' }}" aria-controls="{{ $bodyId }}">
                    {{ $item['title'] }}
                </button>
            </h2>
            <div id="{{ $bodyId }}" class="accordion-collapse collapse {{ $show ? 'show' : '' }}" aria-labelledby="{{ $headerId }}" data-bs-parent="#{{ $id }}">
                <div class="accordion-body">
                    {!! $item['content'] !!}
                </div>
            </div>
        </div>
    @endforeach
    {{ $slot }}
</div>
<!--end::Accordion-->
