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
                            <x-form.input atributo="name" label="Nome" tipo="text" entidade="usuario"/>
                            <x-form.input atributo="email" label="Email" tipo="text" entidade="usuario"/>
                            <x-form.input atributo="password" label="Senha" tipo="text" entidade="usuario"/>
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
        imagePreview('#imagem-usuario');

        $('form[name="formCriarusuario"]').on("submit", function(event) {
            event.preventDefault();

            var rota = '{{ route("admin.users.store") }}'
            var dados = new FormData(this);

            enviarDados(rota, dados, 'Usuario cadastrado!');
        })
        
    </script>
@endsection