@if ($products)
@if ($products->lastPage() > 1)
    <ul class="pagination pg-blue justify-content-center pagination-sm">
        @if ($products->currentPage() > 1 && $data['show'])
        <li class="page-item">
            <a class="page-link" href="{{ $products->url(1).'&cat='.$strCat }}">Primera</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ $products->url($products->currentPage()-1).'&cat='.$strCat }}" aria-label="Anterior">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Anterior</span>
            </a>
        </li>
        @endif
        @for ($i = $data['startLoop']; $i <= $data['endLoop']; $i++)
            <li class="page-item {{ ($products->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $products->url($i).'&cat='.$strCat }}">{{ $i }}</a>
            </li>
        @endfor
        @if ($products->currentPage() < $products->lastPage()  && $data['show'])
        <li class="page-item">
            <a class="page-link" href="{{ $products->url($products->currentPage()+1).'&cat='.$strCat }}" aria-label="Siguiente">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Siguiente</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ $products->url($products->lastPage()).'&cat='.$strCat }}">Última</a>
        </li>
        @endif
    </ul>
@endif
@endif



