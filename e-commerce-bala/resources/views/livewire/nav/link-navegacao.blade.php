<li class="nav-item">
    <a 
        class="nav-link {{ Request::url() == $rota ? 'active' : '' }}" 
        aria-current="page" 
        href="{{ $rota }}">{{ $nomePagina }}</a>
</li>
