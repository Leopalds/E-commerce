@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Produtos</h1>
@endsection

@section('content')
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('admin.produtos.create') }}">Adicionar +</a>
    </div>
    
    <div class="container table-responsive">
        
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categorias</th>
                    <th scope="col">Adicionado em</th>
                    <th scope="col">Atualizado em</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($produtos as $produto)
                <tr data-linha="{{ $produto->id }}">
                    <td>
                        @if (count($produto->imagens) != 0)
                        <img style="width: 70px; height: 70px; object-fit: cover" src="{{ asset('storage/img/produto/' . $produto->unicaImagem->first()->nome) }}" alt="foto do produto">
                        @endif
                    </td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td style="width: 200px">
                        @foreach ($produto->categorias as $categoria)
                        <span class="badge bg-primary">{{ $categoria->nome }}</span>
                        @endforeach
                    </td>
                    <td>{{ $produto->created_at }}</td>
                    <td>{{ $produto->updated_at }}</td>
                    <td><a class="text-dark" href="{{ route('admin.produtos.show', ['id' => $produto->id]) }}"><i class="fas fa-eye"></i></a></td>
                    <td>
                        <form name="formExcluirProduto" action="" method="DELETE" id="{{ $produto->id }}">
                            @csrf
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                    <td><a href="{{ route('admin.produtos.edit', ['id' => $produto->id]) }} " class="text-primary"><i class="fas fa-edit btn--editar"></i></a></td>
                </tr>   
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('form[name="formExcluirProduto"]').on("submit", function (event) {
            event.preventDefault();  
            var produtoId = $(this).attr("id");
            $.ajax({
                type: "DELETE",
                url: "/admin/produtos/" + produtoId,
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success === true) {
                        Swal.fire({
                            title: 'Produto excluido!',
                            icon: 'success',
                            confirmButtonText: 'Fechar',
                        });
                        
                        const linha = $('[data-linha="' + produtoId + '"]');
                        linha.remove();
                    }
                }
            });
        })
    </script>
@endsection
