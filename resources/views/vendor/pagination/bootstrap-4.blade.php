@if ($paginator->hasPages())
<div class="paging">
    <div class=paging__container_vidsresult>
        <ul class="pagination paging__cont" role="navigation">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled paging__btn paging__btn_pr" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <img src="{{ asset('image/paging-prev.svg') }}" alt="">
                </li>
            @else
                <li class="paging__btn paging__btn_pr">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <img src="{{ asset('image/paging-prev.svg') }}" alt="">
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            <div>
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled pagin__pagenum" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active current__pagin pagin__pagenum" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="pagin__pagenum">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paging__btn paging__btn_nx">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <img src="{{ asset('image/paging-next.svg') }}" alt="">
                    </a>
                </li>
            @else
                <li class="disabled paging__btn paging__btn_nx" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <img src="{{ asset('image/paging-next.svg') }}" alt="">
                </li>
            @endif
        </ul>
    </div>
</div>
@endif
