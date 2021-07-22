@extends('layout.main')
@section('css')

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/home/home-banner.css">
    <link rel="stylesheet" href="css/home/home-banner__img.css">
    
@endsection

@section('conteudo')
    <div class="home-banner">
        <img src="{{asset('../img/bebidas.jpg')}}" class="home-banner__img img-fluid" alt="Banner da Hulmer's">
        <figcaption>A sua cerveja entregue por quem <span>ama</span></figcaption>
    </div>
    <div class="container">
        <h1 class="text-center mt-3">Produtos que Hulmer's recomenda para você</h1>
        {{-- Aqui ficarão os cards com os produtos --}}
    </div>
    <div class="home-banner">
        <img src="{{asset('img/prateleiras.jpg')}}" class="home-banner__img img-fluid" alt="Banner da Hulmer's com prateleiras">
        <figcaption><span id="variedade-qual">Variedade</span> e <span id="variedade-qual">qualidade</span> você encontra aqui</figcaption>
    </div>
@endsection