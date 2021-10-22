@extends('layout.main')

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
                            href="{{ route('resultado', ['ordenamento' => 'preco', 'tipo' => 'ASC']) }}"
                            >Mais barato
                        </a>
                    </li>
                    <li>
                        <a 
                            class="dropdown-item"
                            id="mais-caro" 
                            href="{{ route('resultado', ['ordenamento' => 'preco', 'tipo' => 'DESC']) }}"
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
                    <li>
                        <a 
                            class="dropdown-item" 
                            id="mais-barato"
                            href="{{ route('resultado', ['ordenamento' => 'preco', 'tipo' => 'ASC']) }}"
                            >Mais barato
                        </a>
                    </li>
                    <li>
                        <a 
                            class="dropdown-item"
                            id="mais-caro" 
                            href="{{ route('resultado', ['ordenamento' => 'preco', 'tipo' => 'DESC']) }}"
                            >Mais caro
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    
    <div class="m-5 d-flex flex-wrap justify-content-center">
        @foreach ($produtos as $produto)
        <div class="card mx-5 mb-5" style="width: 18rem;">
            <a href="{{ route('produtos.show' , ['id' => $produto->id]) }}" class="text-decoration-none text-dark ">
                @if (count($produto->imagens) != 0)
                <img style="widows: 200px; height: 200px; object-fit: cover" src="{{ asset('storage/img/produto/' . $produto->unicaImagem->first()->nome) }}" class="card-img-top" alt="descricao">
                @endif
                <div class="card-body">
                    <h5 class="card-title mb-3 produtos__nome">{{ $produto->nome }}</h5>
                    <p class="card-text mb-5">{{ $produto->preco }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="pagination">{{ $produtos->links('pagination::bootstrap-4') }}</div>
@endsection
@section('js')
    <script>
        var url = window.location.href;
        if ('{{ Request::has("q") }}') {
            $('#mais-barato').on("click", function () {  
                const urlSearch = new URLSearchParams(window.location.search);
                var q = urlSearch.get('q');
                $(this).attr("href", $(this).attr("href") + "&q=" + q)
            });

            $('#mais-caro').on("click", function () {  
                const urlSearch = new URLSearchParams(window.location.search);
                var q = urlSearch.get('q');
                $(this).attr("href", $(this).attr("href") + "&q=" + q)
            });
        }
    </script>
@endsection
