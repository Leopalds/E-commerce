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
                @livewire('produto.card', [
                    'produto' => $produto
                ])
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