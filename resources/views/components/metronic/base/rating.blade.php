@props([
    'value' => 0,
    'total' => 5,
    'color' => 'warning', // star color
    'interactive' => false,
    'inputName' => 'rating'
])

<div class="rating">
    @for($i = 1; $i <= $total; $i++)
        @if($interactive)
             <label class="rating-label {{ $i <= $value ? 'checked' : '' }}">
                <i class="ki-duotone ki-star fs-1"></i>
                <input class="rating-input" name="{{ $inputName }}" value="{{ $i }}" type="radio" {{ $i == $value ? 'checked' : '' }}/>
            </label>
        @else
            <div class="rating-label {{ $i <= $value ? 'checked' : '' }}">
                <i class="ki-duotone ki-star fs-1"></i>
            </div>
        @endif
    @endfor
</div>
