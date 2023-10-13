@if ($paginator->hasPages())
    <!-- Pagination -->    
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span>Trang đầu</span>
                </li>
                <li class="disabled">
                    <span>Trước</span>
                </li>                
            @else
                <li>
                    <a href="{{ $paginator->toArray()['first_page_url'] }}">
                        <span>Trang đầu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span>Trước</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled"><span><i class="fa fa-ellipsis-h">...</i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span>Sau</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $paginator->toArray()['last_page_url'] }}">
                        <span>Trang cuối</span>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span>
                        Sau
                    </span>
                </li>
                <li class="disabled">
                    <span>Trang cuối</span>
                </li>
            @endif
            
        </ul> 
    <!-- Pagination -->
    
@endif