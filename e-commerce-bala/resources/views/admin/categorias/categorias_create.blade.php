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
                            <x-form.input 
                                tipo="text" 
                                atributo="nome" 
                                label="Nome" 
                                entidade="categoria"/>
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
    <script src="{{ asset('js/ajax/enviarDados.js') }}"></script>
    <script>
        $('form[name="formCriarCategoria"]').on("submit", function(event) {
            var rota = '{{ route("admin.categorias.store") }}';
            var dados = new FormData(this);
            event.preventDefault();
            
            enviarDados(rota, dados, 'Categoria criada!');
        })
        
    </script>
@endsection