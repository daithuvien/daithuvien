@if ($paginator->hasPages())
    
        <ul class="pagination justify-content-center">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @elseif (($page == $paginator->currentPage() - 2 || $page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li class="page-item disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>                
                    @endif
                @endforeach
            @endif
        @endforeach

        
            {{-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><span class="page-link">...</span></li>
            <li class="page-item"><a class="page-link" href="#">16</a></li> --}}
        </ul>
    
@endif