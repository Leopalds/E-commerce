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
        <x-tabela-usuarios titulo="Administradores" nome-tabela="users" :users="$admins"/>
        <x-tabela-usuarios titulo="Clientes" nome-tabela="users" :users="$users"/>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax/excluirRecurso.js') }}"></script>
    <script>
        $('form[name="formExcluirUsuario"]').on("submit", function (event) {
            event.preventDefault(); 

            var usuarioId = $(this).attr("id");
            var dados = $(this).serialize();
            var linha = $('[data-linha="' + usuarioId + '"]');
            var rota = '/admin/usuarios/' + usuarioId;

            excluirRecurso(
                rota, 
                dados,
                'Tem certeza que deseja excluir esse Usuario?',
                'Usuario excluido!', 
                linha
            ); 
        })
    </script>
@endsection
