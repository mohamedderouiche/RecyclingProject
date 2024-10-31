@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Lien vers la première page --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Links --}}
        @foreach ($elements as $element)
            {{-- "Trois points" separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array de liens --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Lien vers la dernière page --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
