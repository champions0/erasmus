@if ($paginator->hasPages())
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <a><img src="/images/pagination-left-arrow.svg" alt=""></a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       aria-label="@lang('pagination.previous')"><img src="/images/pagination-left-arrow.svg" alt=""></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
{{--                @if (is_string($element))--}}
{{--                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--                @endif--}}

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><a>{{ $page }}</a></li>
                        @else
                            <li ><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><img src="/images/pagination-right-arrow.svg" alt=""></a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a><img src="/images/pagination-right-arrow.svg" alt=""></a>
                </li>
            @endif
        </ul>
@endif
