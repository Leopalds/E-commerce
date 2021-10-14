@extends('layout.main')
@section('css')
    
    <link rel="stylesheet" href="{{ asset('css/quantidade/quantidade__campo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botao-carrinho/botao-carrinho.css') }}">
    <link rel="stylesheet" href="{{ asset('css/produto/produto.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/click-tap-image/css/image-zoom.css') }}">
    
@endsection
@section('conteudo')
    <div class="d-flex produto flex-column mt-5">
        <div class="col-6 me-5 produto__img">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner carrossel__lista my-2">
                    @foreach ($produto->imagens as $index => $imagem)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }} carrossel__item">
                        <img class="d-block w-100 carrossel__img" src="{{ asset('storage/img/produto/' . $imagem->nome) }}" alt="primeira imagem">
                    </div>
                    @endforeach  
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-6 produto__descricao">
            <h5 class="fs-4 mt-3">{{ $produto->nome }}</h5>
            <p class="mb-4 fw-bold fs-3">{{ $produto->preco }}</p> 
            <p class="mb-4">{{ $produto->descricao }}</p>
            <div class="quantidade mb-5">
                <x-carrinho.form-adicionar :produto="$produto"/>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="{{ asset('libs/click-tap-image/dist/js/image-zoom.min.js') }}"></script>
    <script src="{{ asset('js/carrossel/carossel-de-imagens.js') }}"></script>
    <script>
        
    </script>
@endsection