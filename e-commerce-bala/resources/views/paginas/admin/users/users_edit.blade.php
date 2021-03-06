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
                            @livewire('form.input', [
                                'name' => 'name',
                                'label' => 'Nome',
                                'type' => 'text',
                                'valor' => $user->name
                            ])
                            @livewire('form.input', [
                                'name' => 'email',
                                'label' => 'E-mail',
                                'type' => 'email',
                                'valor' => $user->email
                            ])

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
                        <div class="col-md-6 d-flex flex-column">
                            <x-form.file 
                                atributo="imagem" 
                                label="Foto do Usuario" 
                                entidade="user"/>
                                
                            <small class="text-warning">Um Usu??rio pode ter no m??ximo 3 imagens!</small>
                            <div class="d-flex">
                                @foreach ($user->imagens as $imagem)
                                    <div class="mt-4 mx-3">
                                        <img  width="100px" height="100px" style="object-fit: cover" src="{{ asset('storage/img/' . $imagem->nome) }}">
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
    <script src="{{ asset('js/filepond/filePondInit.js') }}"></script>
    <script>
        filePondInit('#imagem-user');

        $('form[name="formAtualizarUsuario"]').on("submit", function(event) {
            event.preventDefault();
            
            var rota = '{{ route("admin.users.update", ["id" => $user->id]) }}'
            var dados = new FormData(this);

            enviarDados(rota, dados, 'Usu??rio atualizado!');
        })
        
    </script>
@endsection