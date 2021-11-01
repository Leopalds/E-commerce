@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@endsection

@section('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"/>
@endsection

@section('content')
    <div>
        <form action="{{ route('admin.users.store') }}" class="d-flex flex-column" method="POST" name="formCriarusuario" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 d-flex flex-column">
                            @livewire('form.input', [
                                'name' => 'name',
                                'label' => 'Nome',
                                'type' => 'text'
                            ])
                            @livewire('form.input', [
                                'name' => 'email',
                                'label' => 'E-mail',
                                'type' => 'email'
                            ])
                            @livewire('form.input', [
                                'name' => 'password',
                                'label' => 'Senha',
                                'type' => 'text'
                            ])
                            <div class="input-group mb-4">
                                <label for="categoria-usuario" class="input-group-text">Cargos</label>
                                <select name="cargo[]" id="cargo-usuario" class="form-control form-select" multiple>
                                    @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-form.file atributo="imagem" label="Foto do usuário" entidade="usuario"/>
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
    <script src="{{ asset('js/filepond/filePondInit.js') }}"></script>
    <script>
        filePondInit('#imagem-usuario');

        $('form[name="formCriarusuario"]').on("submit", function(event) {
            event.preventDefault();

            var rota = '{{ route("admin.users.store") }}'
            var dados = new FormData(this);

            enviarDados(rota, dados, 'Usuario cadastrado!');
        })
        
    </script>
@endsection