@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Produtos</h1>
@endsection

@section('content')
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('admin.produtos.create') }}">Adicionar +</a>
    </div>
    <div class="container">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Adicionado em</th>
                    <th scope="col">Atualizado em</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->created_at }}</td>
                    <td>{{ $produto->updated_at }}</td>
                    <td><a href="{{ route('admin.produtos.show', ['id' => $produto->id]) }}" class="text-secondary"><i class="far fa-eye btn--exibir" id="{{ $produto->id }}"></i></a></td>
                    <td><a href="{{ route('admin.produtos.destroy', ['id' => $produto]) }}" class="text-danger"><i class="fas fa-trash btn--excluir" id="{{ $produto->id }}"></i></a></td>
                    <td><a href="{{ route('admin.produtos.edit', ['id' => $produto->id]) }} " class="text-primary"><i class="fas fa-edit btn--editar" id="{{ $produto->id }}"></i></a></td>
                </tr>   
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
