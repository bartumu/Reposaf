@if ($paginator->hasPages())
    <nav>
        <ul class="actions pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled button large previous" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">Ant</span>
                </li>
            @else
                <li>
                    <a class="button large previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Ant.</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled button large previous" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active button large" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a class="button large" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="button large" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Prox</a>
                </li>
            @else
                <li class="disabled button large" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">Prox</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
