@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Produtos</h1>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')      
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-6 me-5 carrossel">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($produto->imagens as $index => $imagem)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }} carrossel__item">
                            <img class="d-block w-100 carrossel__img" src="{{ asset('storage/img/produto/' . $imagem->nome) }}" alt="primeira imagem">
                        </div>
                        @endforeach                     
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <h2>{{ $produto->nome }}</h2>
                    <p>{{ $produto->descricao }}</p>
                    <p>{{ $produto->preco }}</p>
                    <div>
                        <h5>Categorias: </h5>
                        @foreach ($produto->categorias as $categoria)
                        <span class="badge bg-primary">{{ $categoria->nome }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

