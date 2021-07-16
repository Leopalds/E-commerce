@extends('layout.main')

@section('conteudo')
    <div>
        <ul class="d-flex list-unstyled justify-content-center">
            <li class="me-5 dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Preço
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Mais barato</a></li>
                    <li><a class="dropdown-item" href="#">Mais caro</a></li>
                </ul>
            </li>
            <li class="me-5">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Marca
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Database com todas as marcas</a></li>
                </ul>
            </li>
            <li class="me-5">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Embalagem
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Tipo de embalagem</a></li>     
                </ul>
            </li>
        </ul>
    </div>
    <hr>
    <div class="m-5 d-flex flex-wrap">
        <div class="card" style="width: 18rem;">
            <img src="https://casaspedro.vteximg.com.br/arquivos/ids/167490-1000-1000/cerveja-heineken-longneck-330ml.png?v=637571388310070000" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Heineken</h5>
                <p class="card-text">Cerveja de macho.</p>
                <a href="#" class="btn vermelho text-light">Visualizar</a>
            </div>
        </div>

    </div>

@endsection