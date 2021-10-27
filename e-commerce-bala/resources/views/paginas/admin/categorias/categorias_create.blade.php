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
                <div class="container-fluid d-flex flex-column">
                    @livewire('form.input', [
                        'type' => 'text',
                        'name' => 'nome',
                        'label' => 'Nome',
                        'extraCss' => 'w-50'
                    ])
                    
                    @livewire('botao.botao', ['extraCss' => 'btn-primary', 'conteudo' => 'salvar'])
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