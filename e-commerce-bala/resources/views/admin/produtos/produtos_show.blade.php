@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Produtos</h1>
@endsection

@section('content')      
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-6 me-5 produto__img">
                <div>
                    <img src="{{ asset('img/cervejaria.jpg') }}" alt="" width="100%">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <h2>{{ $produto->nome }}</h2>
                    <p>{{ $produto->descricao }}</p>
                    <p>{{ $produto->preco }}</p>
                    <ul>
                        @foreach ($produto->categorias as $categoria)
                        <li>{{ $categoria }}</li>    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    
@stop
