@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@endsection

@section('content')
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('admin.categorias.create') }}">Adicionar +</a>
    </div>
    <div class="container">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Adicionado em</th>
                    <th scope="col">Atualizado em</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categorias as $categoria)
                <tr data-linha="{{ $categoria->id }}">
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->created_at }}</td>
                    <td>{{ $categoria->updated_at }}</td>
                    <td>
                        <form name="formExcluirCategoria" action="{{ route('admin.categorias.destroy', ['id' => $categoria->id]) }}" method="POST" id="{{ $categoria->id }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                    <td><a href="{{ route('admin.categorias.edit', ['id' => $categoria->id]) }} " class="text-primary"><i class="fas fa-edit btn--editar"></i></a></td>
                </tr>   
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax/excluirRecurso.js') }}"></script>
    <script>
        $('form[name="formExcluirCategoria"]').on("submit", function (event) {
            event.preventDefault();

            var categoriaId = $(this).attr("id");
            var dados = $(this).serialize();
            var linha = $('[data-linha="' + categoriaId + '"]');
            var rota = '/admin/categorias/' + categoriaId;
            
            excluirRecurso(
                rota, 
                dados, 
                'Tem certeza que deseja excluir essa categori?',
                'Categoria excluida!', 
                linha
            ); 
        })
    </script>
@endsection
