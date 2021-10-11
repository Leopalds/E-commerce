@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuários</h1>
@endsection

@section('content')
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Adicionar +</a>
    </div>
    <div class="container">
        <x-tabela-usuarios titulo="Administradores" :users="$admins"/>
        <x-tabela-usuarios titulo="Clientes" :users="$users"/>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax/excluirRecurso.js') }}"></script>
    <script>
        $('form[name="formExcluirUsuario"]').on("submit", function (event) {
            event.preventDefault();

            var userId = $(this).attr("id");
            var linha = $('[data-linha="' + userId + '"]');
            var rota = '/admin/usuarios/' + userId;
            var dados = $(this).serialize();

            excluirRecurso(rota, dados, 'Produto excluido!', linha);
            
        })
    </script>
@endsection
