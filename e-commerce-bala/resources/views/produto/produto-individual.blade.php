@extends('layout.main')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/carrossel/carrossel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrossel/carrossel__imagem.css') }}">
    <link rel="stylesheet" href="{{ asset('js/slick/slick.css')}}"/>
    <link rel="stylesheet" href="{{ asset('js/slick/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/quantidade/quantidade__campo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botao-carrinho/botao-carrinho.css') }}">
    <link rel="stylesheet" href="{{ asset('css/produto/produto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick/slick-botao.css') }}">
    

@endsection

@section('conteudo')

    <div class="d-flex produto ms-5">
        <div class="carrossel mt-3 me-5">
            <div>
                <img class="carrossel__imagem" src="https://tcf.admeen.org/game/17500/17292/400x246/basket-random.jpg" alt="...">
            </div>      
            <div>
                <img class="carrossel__imagem" src="https://d2r55xnwy6nx47.cloudfront.net/uploads/2020/07/Dice_520x292-520x292.jpg" alt="...">
            </div>
            <div>
                <img class="carrossel__imagem" src="https://img.utdstc.com/icon/c48/60f/c4860ff016ec10aa16436ff06a93cf9dfd78fbb423dff33c129b44c1efce67ec:200" alt="...">
            </div>
        </div>
        <div>
            <h5 class="fs-4 mt-3">Titulo</h5>
            <p class="mb-4 fw-bold fs-3">Preço</p> 
            <p class="mb-4">Descricao</p>
            <div class="d-flex align-items-center quantidade mb-5">
                <label for="qtd" class="form-label me-3 quantidade__rotulo">Qtd</label>
                <input type="number" id="qtd" name="quantidade" class="form-control quantidade__campo">
                <div class="ms-5">
                    <a href="#" class="btn botao-carrinho">Adicionar ao carrinho</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('js/carrossel/carossel-de-imagens.js') }}"></script>
    <script>
        $(function () {  
            carrosselImagens('.carrossel');
        })
    </script>
    
@endsection