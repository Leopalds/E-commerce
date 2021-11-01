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
        <form action="{{ route('admin.produtos.update', ['id' => $produto->id]) }}" class="d-flex flex-column" method="POST" name="formAtualizarProduto" id="{{ $produto->id }}">
            @csrf
            @method('put')
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 d-flex flex-column">
                            @livewire('form.input', [
                                'name' => 'nome',
                                'label' => 'Nome',
                                'type' => 'text',
                                'valor' => $produto->nome
                            ])
                            @livewire('form.textarea', [
                                'name' => 'descricao',
                                'label' => 'Descriçao',
                                'valor' => $produto->descricao
                            ])
                            @livewire('form.input', [
                                'name' => 'preco',
                                'label' => 'Preço',
                                'type' => 'Number',
                                'valor' => $produto->preco
                            ])
                            @livewire('form.input', [
                                'name' => 'quantidade',
                                'label' => 'Quantidade',
                                'type' => 'Number',
                                'valor' => $produto->quantidade
                            ])
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
                        <div class="col-md-6 d-flex flex-column">
                            <x-form.file 
                                atributo="imagem" 
                                label="Foto do produto" 
                                entidade="produto"/>
                                
                            <small class="text-warning">Um produto pode ter no máximo 3 imagens!</small>
                            <div class="d-flex">
                                @foreach ($produto->imagens as $imagem)
                                    <div class="mt-4 mx-3">
                                        <img  width="100px" height="100px" style="object-fit: cover" src="{{ asset('storage/img/produto/' . $imagem->nome) }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @livewire('botao.salvar')

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