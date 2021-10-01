@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Produtos</h1>
@endsection

@section('content')
    <div>
        <form action="" class="d-flex flex-column" method="POST" name="formCriarProduto">
            @csrf
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 d-flex flex-column">
                            <div class="mb-3">
                                <label for="nome-produto" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome-produto">
                            </div>
                            <div class="mb-3">
                                <label for="descricao-produto" class="form-label">Descricao</label>
                                <textarea 
                                    type="text" 
                                    name="descricao" 
                                    class="form-control" 
                                    id="descricao-produto"
                                    style="resize: none">
                                </textarea>
                            </div>
                            <div class="mb-4">
                                <label for="preco-produto" class="form-label">Preço</label>
                                <input type="number" name="preco" id="preco-produto" class="form-control">
                            </div>
                            <div class="input-group mb-4">
                                <label for="categoria-produto" class="input-group-text">Categorias</label>
                                <select name="categoria" id="categoria-produto" class="form-control form-select">
                                    <option selected>Selecione uma categoria...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('form[name="formCriarProduto"]').on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "/admin/produtos",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success === true) {
                        Swal.fire({
                            title: 'Produto criado!',
                            icon: 'success',
                            confirmButtonText: 'Fechar',
                        })
                    } 
                },
               
            });
        })
        
    </script>
@endsection