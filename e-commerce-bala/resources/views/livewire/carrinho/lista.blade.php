<div class="w-100 table-responsive">
    @livewire('carrinho.contador')
    <table class="table">
        <thead>
            <tr>
                <th scope="col" colspan="2">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço unitário</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrinho as $carrinho)
            <tr data-linha="{{ $carrinho->rowId }}">
                <th scope="row">
                    @if (count(App\Models\Produto::find($carrinho->id)->imagens) != 0 )
                    <img width="70px" height="70px" src=" {{ asset('/storage/img/produto/' . App\Models\Produto::find($carrinho->id)->imagens->take(1)->first()->nome) }}" alt="imagem do produto...">
                    @else
                    <img width="70px" height="70px" src="https://t3.ftcdn.net/jpg/03/49/45/70/360_F_349457036_XWvovNpNk79ftVg4cIpBhJurdihVoJ2B.jpg" alt="imagem do produto...">
                    @endif
                </th>
                <td><a href="{{ route('produtos.show', ['id' => $carrinho->id]) }}">{{ $carrinho->name }}</a></td>
                <td>
                    <form action="{{ route('carrinho.update', ['rowId' => $carrinho->rowId]) }}" name="formAtualizarQtdCarrinho">
                        @csrf
                        @method('PUT')
                        <input data-carrinho-qtd-hidden type="hidden" value="{{ $carrinho->rowId }}">
                        <input
                            type="number"
                            min="1"
                            name="quantidade"
                            class="form-control cart__quantidade"
                            value="{{ $carrinho->qty }}"
                            data-carrinho="qtd">
                    </form>
                </td>
                <td data-preco="{{ $carrinho->rowId }}">{{ number_format($carrinho->price, 2, '.', ',') }}</td>
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
        <tfoot>
            <tr>
                <td colspan="3">Total: </td>
                <td data-valor-total colspan="2">{{ $valorTotal }}</td>
            </tr>
        </tfoot>
    </table>
</div>
