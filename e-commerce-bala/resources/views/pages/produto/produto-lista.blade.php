@extends('layout.main')

@section('css')

    <link rel="stylesheet" href="css/botao-carrinho/botao-carrinho.css">
    <link rel="stylesheet" href="css/produtos/produtos__nome.css">
    
@endsection

@section('conteudo')
    <div class="border-bottom ordenamento d-flex flex-column align-items-center">
        <a class="fw-bold fst-italic text-dark text-decoration-none mt-4 mb-2 ordenamento__titulo">Ordenar por:</a>
        <ul class="d-flex flex-column list-unstyled ordenamento__lista align-items-center">
            <li class="dropdown ">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Preço
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Mais barato</a></li>
                    <li><a class="dropdown-item" href="#">Mais caro</a></li>
                </ul>
            </li>
            <li class="">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Marca
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    {{-- Lista de marcas retiradas do database --}}
                    <li class="dropdown-item">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Marcas
                            </label>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Embalagem
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    {{-- Lista de embalagens retiradas do database --}}
                    <li class="dropdown-item">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Embalagem
                            </label>
                        </div>
                    </li>    
                </ul>
            </li>
        </ul>
    </div>
    
    <div class="m-5 d-flex flex-wrap justify-content-center">
        @foreach ($produtos as $produto)
        <div class="card mx-5" style="width: 18rem;">
            <a href="{{ route('produtos.show' , ['id' => $produto->id]) }}" class="text-decoration-none text-dark ">
                <img style="widows: 200px; height: 200px; object-fit: cover" src="{{ asset('storage/img/produto/' . $produto->unicaImagem->first()->nome) }}" class="card-img-top" alt="descricao">
                <div class="card-body">
                    <h5 class="card-title mb-3 produtos__nome">{{ $produto->nome }}</h5>
                    <p class="card-text mb-5">{{ $produto->preco }}</p>
                    <a href="#" class="btn botao-carrinho">Adicionar ao carrinho</a>
                </div>
            </a>
        </div>
        @endforeach
    </div>

@endsection