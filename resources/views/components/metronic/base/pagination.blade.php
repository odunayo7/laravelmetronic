@props([
    'paginator' // Laravel Paginator instance
])

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item previous disabled" aria-disabled="true">
                <span class="page-link"><i class="previous"></i></span>
            </li>
        @else
            <li class="page-item previous">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="previous"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($paginator->links()->elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="next"></i></a>
            </li>
        @else
            <li class="page-item next disabled" aria-disabled="true">
                <span class="page-link"><i class="next"></i></span>
            </li>
        @endif
    </ul>
@endif
