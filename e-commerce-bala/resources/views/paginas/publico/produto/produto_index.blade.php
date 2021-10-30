@extends('layouts.main')

@section('css')

    <link rel="stylesheet" href="css/botao-carrinho/botao-carrinho.css">
    <link rel="stylesheet" href="css/produtos/produtos__nome.css">
    
@endsection

@section('conteudo')
    
    <div class="border-bottom ordenamento d-flex flex-column align-items-center">
        <a class="fw-bold fst-italic text-dark text-decoration-none mt-4 mb-2 ordenamento__titulo">Filtrar por:</a>
        <ul class="d-flex flex-column list-unstyled ordenamento__lista align-items-center">
            <li class="dropdown ">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Preço
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li>
                        <a 
                            class="dropdown-item" 
                            id="mais-barato"
                            href="{{ route('produtos.index', ['sort' => 'preco']) }}"
                            >Mais barato
                        </a>
                    </li>
                    <li>
                        <a 
                            class="dropdown-item"
                            id="mais-caro" 
                            href="{{ route('produtos.index', ['sort' => '-preco']) }}"
                            >Mais caro
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown ">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categoria
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <form name="formFiltroCategoria" action="{{ route('produtos.index') }}">
                        @foreach ($categorias as $categoria)
                        <li>
                            <span 
                                class="dropdown-item" 
                                >
                                <input name="categoria" {{ empty($checked) ? '' : $checked }} type="checkbox" data-filtro="categoria" value="{{ $categoria->id }}">
                                <label for="">{{ $categoria->nome }}</label>
                            </span>
                        </li>
                        @endforeach
                    </form>
                </ul>
            </li>
        </ul>
    </div>
    <div class="m-5 d-flex flex-wrap justify-content-center">
        @foreach ($produtos as $produto)
        <div class="card mx-5 mb-5" style="width: 18rem;">
            <a href="{{ route('produtos.show' , ['id' => $produto->id]) }}" class="text-decoration-none text-dark ">
                @livewire('imagem.destaque', ['produto' => $produto])
                <div class="card-body">
                    <h5 class="card-title mb-3 produtos__nome">{{ $produto->nome }}</h5>
                    <p class="card-text mb-3">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    <p class="card-text mb-3">Estoque: {{ $produto->quantidade }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="pagination">{{ $produtos->links() }}</div>
@endsection
@section('js')
<script>
    $(function () {  
        var queryString = 'filter[nome]';
        var item1 = '#mais-barato';
        var item2 = '#mais-caro';
        
        anexarQueryStringUrl(queryString, item1)
        anexarQueryStringUrl(queryString, item2)
        
    });

    $('[data-filtro="categoria"]').on("change", function () {  
        var form = $('form[name=formFiltroCategoria]')        
        form.submit();
    });

    function anexarQueryStringUrl(queryString, itemClicado) {  
        const urlSearch = new URLSearchParams(window.location.search);
        if (!urlSearch.has(queryString)) {
            return;
        }

        $(itemClicado).on("click", function () {  
            var filtro = urlSearch.get(queryString);
            var href = $(this).attr("href") + "&" + queryString + '=' + filtro

            $(this).attr("href", href);
        });
    }

    
</script>
@endsection
