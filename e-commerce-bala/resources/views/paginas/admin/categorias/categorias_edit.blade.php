@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@endsection

@section('content')
    <div>
        <form class="d-flex flex-column" action="{{ route("admin.categorias.update", ["id" => $categoria->id]) }}" method="POST" name="formAtualizarCategoria">
            @csrf
            @method('put')
            <fieldset>
                <div class="container-fluid d-flex flex-column">
                    @livewire('form.input', [
                        'type' => 'text',
                        'name' => 'nome',
                        'label' => 'Nome',
                        'extraCss' => 'w-50',
                        'valor' => $categoria->nome
                    ])
                    @livewire('botao.salvar')
                </div>
            </fieldset>
        </form>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('form[name="formAtualizarCategoria"]').on("submit", function(event) {
            var rota = '{{ route("admin.categorias.update", ["id" => $categoria->id]) }}'
            event.preventDefault();
            $.ajax({
                type: "PUT",
                url: rota,
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success === true) {
                        Swal.fire({
                            title: 'Dados atualizados!',
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