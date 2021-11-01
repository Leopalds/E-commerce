<h2>{{ $titulo }}</h2>
<div class="table-responsive">
    <table class="table mb-5">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Adicionado em</th>
                <th scope="col">Atualizado em</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr data-linha="{{ $user->id }}">
                <th scope="row">{{ $user->id }}</th>
                <td>
                    @if (count($user->imagens) != 0)
                        @foreach ($user->imagens as $imagem)    
                        <img width="70px" height="70px" style="object-fit: cover"  src="{{ asset('storage/img/' . $imagem->nome) }}" alt="">
                        @endforeach
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <form name="formExcluirUsuario" action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" method="POST" id="{{ $user->id }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-transparent border-0">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                </td>
                <td><a href="{{ route('admin.users.edit', ['id' => $user->id]) }} " class="text-primary"><i class="fas fa-edit btn--editar"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>