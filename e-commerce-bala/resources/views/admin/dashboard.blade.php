@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/dashboard/icon-home.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row flex-wrap justify-content-around m-0 w-100">
            <div class="card m-1 d-flex align-items-center justify-content-center p-5" style="width: 18rem;">
                <a href="{{ route('admin.produtos.index') }}">
                    <h1 class="icon-text">Produtos</h1>
                    <i class="fas fa-shopping-bag fa-10x icon-home"></i>
                </a>
            </div>
            <div class="card m-1 d-flex align-items-center justify-content-center p-5" style="width: 18rem;">
                <a href="{{ route('admin.categorias.index') }}">
                    <h1 class="icon-text">Categorias</h1>
                    <i class="fas fa-tags fa-10x icon-home"></i>
                </a>
            </div>
            <div class="card m-1 d-flex align-items-center justify-content-center p-5" style="width: 18rem;">
                <a href="{{ route('admin.users.index') }}">
                    <h1 class="icon-text">Usuários</h1>
                    <i class="fas fa-users fa-10x icon-home"></i>
                </a>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop