@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Produtos</h1>
@endsection

@section('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"/>
@endsection

@section('content')
    <div>
        <form enctype="multipart/form-data" action="{{ route('admin.produtos.update', ['id' => $produto->id]) }}" class="d-flex flex-column" method="POST" name="formAtualizarProduto" id="{{ $produto->id }}">
            @csrf
            @method('put')
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 d-flex flex-column">
                            <x-form.input 
                                label="Nome" 
                                atributo="nome" 
                                tipo="text" 
                                entidade="produto" 
                                :valor="$produto->nome"/>

                            <x-form.textarea 
                                label="Descricao" 
                                atributo="descricao" 
                                entidade="produto" 
                                :valor="$produto->descricao"/>

                            <x-form.input 
                                label="Preco" 
                                atributo="preco" 
                                tipo="number" 
                                entidade="produto" 
                                :valor="$produto->preco"/>

                            <div class="input-group mb-4">
                                <label for="categoria-produto" class="input-group-text">Categorias</label>
                                <select name="categoria[]" id="categoria-produto" class="form-control form-select" multiple>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        @foreach ($produto->categorias as $categoriaProduto)
                                            @if ($categoriaProduto->id == $categoria->id)
                                            {{'selected'}}
                                            @endif
                                        @endforeach>
                                        {{ $categoria->nome }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-form.file 
                                atributo="imagem" 
                                label="Foto do produto" 
                                entidade="produto"/>
                                
                            <small class="text-warning">Um produto pode ter no máximo 3 imagens!</small>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary mt-3" type="submit">Salvar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

@endsection

@section('js')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax/enviarDados.js') }}"></script>
    <script src="{{ asset('js/filepond/plugin/imagePreview.js') }}"></script>
    <script>
        imagePreview('#imagem-produto');

        $('form[name="formAtualizarProduto"]').on("submit", function(event) {
            var rota = '{{ route("admin.produtos.update", ["id" => $produto->id] )}}'
            var dados = new FormData(this);
            event.preventDefault();
                    
            enviarDados(rota, dados, 'Produto atualizado!')
        })

    </script>
@endsection