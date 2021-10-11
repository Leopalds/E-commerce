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
        <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" class="d-flex flex-column" method="POST" name="formAtualizarUsuario">
            @csrf
            @method('put')
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 d-flex flex-column">
                            <x-form.input 
                                tipo="text" 
                                entidade="usuario" 
                                :valor="$user->name" 
                                atributo="usuario" 
                                label="Nome"/>

                            <x-form.input 
                                atributo="email" 
                                label="Email" 
                                tipo="text" 
                                entidade="usuario" 
                                :valor="$user->email">
                                <x-slot name="readonly">
                                    readonly 
                                </x-slot>
                            </x-form.input>

                            <!--
                            <div class="mb-4 d-flex flex-column">
                                <small class="erro erro__preco text-danger"></small>
                                <label for="senha-usuario" class="form-label">Senha</label>
                                <input type="text" name="password" id="preco-usuario" class="form-control">
                            </div>
                            -->
                            <div class="input-group mb-4">
                                <label for="categoria-usuario" class="input-group-text">Cargos</label>
                                <select name="cargo[]" id="cargo-usuario" class="form-control form-select" multiple>
                                    @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->id }}"
                                        @foreach ($user->roles as $role)
                                            @if ($role->id == $cargo->id)
                                                {{ 'selected' }}
                                            @endif
                                        @endforeach>{{ $cargo->nome }}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <small class="erro erro__imagem text-danger"></small>
                                <label for="img-usuario">Foto do usuario</label>
                                <input id="img-usuario" data-max-files="3" multiple name="imagem[]" class="filepond--item">
                            </div>
                        </div>      
                    -->
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

        $('form[name="formAtualizarUsuario"]').on("submit", function(event) {
            event.preventDefault();

            var rota = '{{ route("admin.users.update", ["id" => $user->id]) }}'
            var dados = new FormData(this);

            enviarDados(rota, dados, 'Usuário atualizado!');
        })
        
    </script>
@endsection