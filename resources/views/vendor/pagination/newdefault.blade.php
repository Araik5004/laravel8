@if ($paginator->hasPages())
<div class="paging category-paging">
    <div class="paging__container">
        <div class="paging__content">
            <div class="paging__left">
                @if ($paginator->previousPageUrl())
                <a href="{{ $paginator->previousPageUrl() }}" class="paging__prev">@lang('pagination.previous')</a>
                @endif

                <ul class="paging__list">
                    @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="paging__item active">
                        <a href="#" class="paging__link">{{ $page }}</a>
                    </li>
                    @else
                    <li class="paging__item">
                        <a href="{{ $url }}" class="paging__link">{{ $page }}</a>
                    </li>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                </ul>
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="paging__next">@lang('pagination.next')</a>
                @endif
            </div>
            <div class="paging__right">
                <form action="/products?{{ http_build_query(Request::except('page')) }}" method="get">
                    <div class="paging__steps">
                        <input type="text" name="page" id="paging-input" value="{{$paginator->currentPage()}}" maxv="{{$paginator->lastPage()}}"/>
                        / {{$paginator->lastPage()}}
                    </div>
                    
                    @forelse(Request::except('page') as $param_key => $param_value)
                    @php
                    if(!$param_value)
                    {
                        @endphp
                        @continue
                        @php
                    }
                    if( is_array( $param_value))
                    {
                        $param_value = implode('-', $param_value);
                    }
                    @endphp
                        <input type="hidden" name="{{$param_key}}" value="{{$param_value}}" />
                    @empty
                    
                    @endforelse
                   
                    <button type="submit" class="paging__jump">@lang('pagination.go_to')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
