
@if ($paginator->hasPages())
    <!-- Pagination --> 
    <div>  
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span><<</span>
                </li>
                <li class="disabled">
                    <span><</span>
                </li>                
            @else
                <li>
                    <a href="{{ $paginator->toArray()['first_page_url'] }}">
                        <span><<</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span><</span>
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
                        @elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2 || $page == $paginator->currentPage()+7 || $page == $paginator->currentPage()+8 || $page == $paginator->currentPage()+9 )
                            <li><a href="{{ $url }}">{{$page }}</a></li>
                        @elseif ($page == $paginator->currentPage() +5) 
                            <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span>></span>
                    </a>
                </li>
                <li>
                    <a href="{{ $paginator->toArray()['last_page_url'] }}">
                        <span >>></span>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span>
                        >
                    </span>
                </li>
                <li class="disabled">
                    <span>>></span>
                </li>
            @endif
            
        </ul> 
</div>

<div class='perpage'>
    <span>Chọn số dòng/trang:</span>
    <select id='select_perpage'>
    <option value=10>10</option> 
    <option value=20>20</option> 
    <option value=50>50</option> 
    <option value=100>100</option> 
    </select>
</div>

<div class='total_record' >
@if(isset($dataview))
    {{$dataview->links('pagination')}} 
      <script>
        let txt =  'Tổng: ' + {{$dataview->total()}} + ' dòng,' + {{$dataview->lastPage()}} + ' trang';
        $(".total_record").text(txt);
      </script>
@endif
</div>


<style>
.perpage{
    padding-top: 5px;
    position:absolute;
    top: 2px;
    float:left;
    width:200px;
    height: 30px;    
    }

.pagination { /*class defaut pagination*/
    width: 60%;
    height: 40px;
    margin-top: 2px;
    margin-left: 200px;  }


.total_record { 
    position:absolute;
    top: 2px;
    float:left;
    width:20%;
    height: 30px;
    text-align:right;
    margin-left: 80%;
    font-weight: bold;
    padding-top:10px;
}
.pagination li:first-child, .pagination li:nth-child(2),
 .pagination li:nth-last-child(2),.pagination li:last-child {
    font-weight: bold;
}

</style>
    <!-- Pagination -->
    
@endif