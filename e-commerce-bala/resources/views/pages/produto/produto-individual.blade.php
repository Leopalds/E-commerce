@extends('layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/carrossel/carrossel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrossel/carrossel__imagem.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quantidade/quantidade__campo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botao-carrinho/botao-carrinho.css') }}">
    <link rel="stylesheet" href="{{ asset('css/produto/produto.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/click-tap-image/css/image-zoom.css') }}">
@endsection
@section('conteudo')
    <div class="d-flex produto flex-column">
        <div class="col-6 me-5 produto__img">
            <div id="carouselExampleIndicators" class="carousel slide carrossel" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner carrossel__lista my-2">
                    <div class="carousel-item active carrossel__item">
                        <img src="{{ asset('img/bebidas.jpg') }}" class="d-block w-100 carrossel__img" alt="...">
                    </div>
                    <div class="carousel-item carrossel__item">
                        <img src="{{ asset('img/beer-friends.jpg') }}" class="d-block w-100 carrossel__img" alt="...">
                    </div>
                    <div class="carousel-item carrossel__item">
                        <img src="{{ asset('img/prateleiras.jpg') }}" class="d-block w-100 carrossel__img" alt="...">
                    </div>
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
            <h5 class="fs-4 mt-3">Titulo</h5>
            <p class="mb-4 fw-bold fs-3">Preço</p> 
            <p class="mb-4">Descricao</p>
            <div class="d-flex align-items-center quantidade mb-5">
                <label for="qtd" class="form-label me-3 quantidade__rotulo">Qtd</label>
                <input type="number" id="qtd" name="quantidade" class="form-control quantidade__campo">
                <button class="ms-5 botao botao--carrinho btn">
                    Adicionar ao carrinho
                </button>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="{{ asset('libs/click-tap-image/dist/js/image-zoom.min.js') }}"></script>
    <script src="{{ asset('js/carrossel/carossel-de-imagens.js') }}"></script>
    <script src="{{ asset('js/zoom-imagem/imagem-zoom.js') }}"></script>
    <script>
        $(function () {  
            carrosselImagens('.carrossel');
            $("[data-imagem-carrossel]").each(function () {
                $(this).imageZoom();
            })
        })
    </script>
@endsection