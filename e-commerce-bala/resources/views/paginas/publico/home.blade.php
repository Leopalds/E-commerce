@extends('layouts.main')
@section('conteudo')
    <div class="banner">
        <picture>
            <source media="(max-width: 650px)" srcset="{{ asset('img/banner1-mobile.png') }}">
            <source media="(max-width: 900px)" srcset="{{ asset('img/banner1-tablet.png') }}">
            <img src="{{asset('/img/banner1-photoshop.png')}}" class="banner__img img-fluid" alt="Banner da Hulmer's">
        </picture>
    </div>
    <div class="container mb-5 mt-5">
        <h2 class="text-center mt-3 mb-5">Produtos que Hulmer's recomenda para você</h2>
        <div class="d-flex flex-wrap justify-content-around mb-3">
            @foreach ($produtos as $produto)
            <div class="card me-5" style="width: 18rem;">
                @if (count($produto->imagens) != 0)    
                <img style="object-fit: cover" src="{{ asset('storage/img/produto/' . $produto->imagens->take(1)->first()->nome) }}" class="card-img-top" alt="imagens de destaque" width="70px" height="200px">
                @endif
                <div class="card-body">
                  <h5 class="card-title produtos__nome">{{ $produto->nome }}</h5>
                  <p class="card-text">{{ $produto->descricao }}</p>
                  <p class="fw-bold fs-5">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                  <a href="{{ route('produtos.show', ['id' => $produto->id]) }}" class="btn botao--carrinho">Visualizar produto</a>
                </div>
            </div>
            @endforeach
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