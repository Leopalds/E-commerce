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
        <form enctype="multipart/form-data" action="{{ route('admin.produtos.update', ['id' => $produto->id]) }}" class="d-flex flex-column" method="PUT" name="formAtualizarProduto" id="{{ $produto->id }}">
            
            @csrf
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 d-flex flex-column">
                            <div class="mb-3 d-flex flex-column">
                                <small class="erro erro__nome text-danger"></small>
                                <label for="nome-produto" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome-produto" value="{{ $produto->nome }}">
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <small class="erro erro__descricao text-danger"></small>
                                <label for="descricao-produto" class="form-label">Descricao</label>
                                <textarea 
                                type="text" 
                                name="descricao" 
                                class="form-control" 
                                id="descricao-produto"
                                style="resize: none">{{ $produto->descricao }}</textarea>
                            </div>
                            <div class="mb-4 d-flex flex-column">
                                <small class="erro erro__preco text-danger"></small>
                                <label for="preco-produto" class="form-label">Preço</label>
                                <input type="number" name="preco" id="preco-produto" class="form-control" value="{{ $produto->preco }}">
                            </div>
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
                            <div class="d-flex flex-column">
                                <small class="erro erro__imagem text-danger"></small>
                                <label for="img-produto">Imagem</label>
                                <input type="file" id="img-produto">
                            </div>
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
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        $('#img-produto').filepond({
            allowMultiple: true,
            storeAsFile: true,
            imagePreviewMaxHeight: 100,
            labelIdle: 'Insira suas imagens aqui...'
        });

        //$('form[name="formAtualizarProduto"]').on("submit", function(event) {
        //    event.preventDefault();
        //    var rota = '{{ route("admin.produtos.update", ["id" => $produto->id] )}}'           
        //    $.ajax({
        //        type: "PUT",
        //        url: rota,
        //        data: new FormData(this),
        //        dataType: "json",
        //        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //        contentType: false,
        //        processData: false,
        //        success: function (response) {
        //            if (response.success === true) {
        //                $('#nome-produto').val(response.dados.nome);
        //                $('#descricao-produto').val(response.dados.descricao);
        //                $('#preco-produto').val(response.dados.preco);
//
        //                Swal.fire({
        //                    title: 'Dados atualiazdos!',
        //                    icon: 'success',
        //                    confirmButtonText: 'Fechar',
        //                })
        //                return;
        //            } 
//
        //            $('small.' + 'erro__imagem').text(response.erro_img);
        //            setTimeout(() => {
        //                $('small.' + 'erro__imagem').text('');
        //            }, 5000);
//
        //            $.each(response.erros, function(chave, valor) {
        //                $('small.' + 'erro__' + chave).text(valor);
//
        //                setTimeout(() => {
        //                    $('small.' + 'erro__' + chave).text('');
        //                }, 5000);
        //            })
        //            return;
        //        },
        //       
        //    });
        //})
        
    </script>
@endsection