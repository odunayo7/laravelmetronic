@props([
    'items' => [], // Array of ['label' => 'Home', 'url' => '#', 'active' => false]
    'separator' => 'dot', // dot, line, or default (chevron)
])

@php
    $separatorClass = '';
    if ($separator === 'dot') {
        $separatorClass = 'breadcrumb-dot';
    } elseif ($separator === 'line') {
        $separatorClass = 'breadcrumb-line';
    } elseif ($separator === 'bullet') {
        $separatorClass = 'breadcrumb-separatorless';
    }
@endphp

<ul {{ $attributes->merge(['class' => "breadcrumb $separatorClass text-muted fs-6 fw-semibold"]) }}>
    @foreach($items as $item)
        @if(!$loop->first && $separator === 'bullet')
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
        @endif
        
        <li class="breadcrumb-item {{ $item['active'] ?? false ? 'text-muted' : 'text-muted' }}">
            @if(empty($item['active']))
                <a href="{{ $item['url'] ?? '#' }}" class="{{ $separator === 'bullet' ? 'text-muted text-hover-primary' : '' }}">{{ $item['label'] }}</a>
            @else
                {{ $item['label'] }}
            @endif
        </li>
    @endforeach
</ul>
