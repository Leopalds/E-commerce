@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuários</h1>
@endsection

@section('content')
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('admin.categorias.create') }}">Adicionar +</a>
    </div>
    <div class="container">
        <x-tabela-usuarios titulo="Administradores" :users="$admins"/>
        <x-tabela-usuarios titulo="Clientes" :users="$users"/>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('form[name="formExcluirCategoria"]').on("submit", function (event) {
            event.preventDefault();  
            var categoriaId = $(this).attr("id");
            $.ajax({
                type: "DELETE",
                url: "/admin/categorias/" + categoriaId,
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success === true) {
                        Swal.fire({
                            title: 'Categoria excluido!',
                            icon: 'success',
                            confirmButtonText: 'Fechar',
                        });
                        
                        const linha = $('[data-linha="' + categoriaId + '"]');
                        linha.remove();
                    }
                }
            });
        })
    </script>
@endsection
