@extends('layout.main')
@section('conteudo')
    <div class="banner">
        <picture>
            <source media="(max-width: 650px)" srcset="{{ asset('img/banner1-mobile.png') }}">
            <source media="(max-width: 900px)" srcset="{{ asset('img/banner1-tablet.png') }}">
            <img src="{{asset('/img/banner1-photoshop.png')}}" class="banner__img img-fluid" alt="Banner da Hulmer's">
        </picture>
    </div>
    <div class="container mb-5 mt-5">
        <h2 class="text-center mt-3 mb-4">Produtos que Hulmer's recomenda para você</h2>
        <div class="d-flex flex-wrap justify-content-center mb-3">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title produtos__nome">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn botao-carrinho">Adicionar ao carrinho</a>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <picture>
            <source media="(max-width: 650px)" srcset="{{ asset('img/banner2-mobile.png') }}">
            <source media="(max-width: 900px)" srcset="{{ asset('img/banner2-tablet.png') }}">
            <img src="{{asset('img/banner2-photoshop.png')}}" class="banner__img img-fluid" alt="Banner da Hulmer's com prateleiras">
        </picture>
    </div>
@endsection