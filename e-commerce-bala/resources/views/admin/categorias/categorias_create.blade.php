@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@endsection

@section('content')
    <div>
        <form class="d-flex flex-column" method="POST" name="formCriarCategoria">
            @csrf
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 d-flex flex-column">
                            <div class="mb-3 d-flex flex-column">
                                <small class="erro erro__nome text-danger"></small>
                                <label for="nome-categoria" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome-categoria">
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
        $('form[name="formCriarCategoria"]').on("submit", function(event) {
            var rota = '{{ route("admin.categorias.store") }}'
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: rota,
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success === true) {
                        Swal.fire({
                            title: 'Categoria criado!',
                            icon: 'success',
                            confirmButtonText: 'Fechar',
                        })
                        return;
                    } 

                    $.each(response.erros, function(chave, valor) {
                        $('small.' + 'erro__' + chave).text(valor);

                        setTimeout(() => {
                            $('small.' + 'erro__' + chave).text('');
                        }, 5000);
                    })
                    return;
                },
            });
        })
        
    </script>
@endsection