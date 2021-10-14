<div class="w-50 table-responsive">
    <x-carrinho.contador/>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrinho as $carrinho)
            <tr data-linha="{{ $carrinho->rowId }}">
                <th scope="row">
                    <img width="70px" height="70px" src=" {{ asset('/storage/img/produto/' . App\Models\Produto::find($carrinho->id)->imagens->take(1)->first()->nome) }}" alt="imagem do produto...">
                </th>
                <td><a href="#">{{ $carrinho->name }}</a></td>
                <td>{{ $carrinho->price }}</td>
                <td>{{ $carrinho->qty }}</td>
                <td>
                    <form name="formExcluirItemCarrinho" action="{{ route('carrinho.destroy', ['rowId' => $carrinho->rowId]) }}" method="POST" id="{{ $carrinho->rowId }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-transparent border-0">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>