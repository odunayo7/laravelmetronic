@props([
    'text' => '', // Prepend/Append text
    'position' => 'prepend', // prepend or append
    'icon' => '' // Prepend/Append icon (ki-duotone)
])

<div class="input-group mb-5">
    @if($position === 'prepend')
        <span class="input-group-text">
            @if($icon)
                <i class="ki-duotone {{ $icon }} fs-3"><span class="path1"></span><span class="path2"></span></i>
            @else
                {{ $text }}
            @endif
        </span>
    @endif
    
    {{ $slot }}

    @if($position === 'append')
        <span class="input-group-text">
            @if($icon)
                <i class="ki-duotone {{ $icon }} fs-3"><span class="path1"></span><span class="path2"></span></i>
            @else
                {{ $text }}
            @endif
        </span>
    @endif
</div>
