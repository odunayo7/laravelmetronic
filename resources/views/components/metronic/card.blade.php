@props([
    'title' => '',
    'toolbar' => null,
    'footer' => null,
    'flush' => false,
])

<div {{ $attributes->merge(['class' => 'card ' . ($flush ? 'card-flush' : '')]) }}>
    @if($title || $toolbar)
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}
            </h3>
            <div class="card-toolbar">
                {{ $toolbar }}
            </div>
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
