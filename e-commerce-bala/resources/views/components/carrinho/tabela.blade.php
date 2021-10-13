<div class="w-50 table-responsive">
    <div class="d-flex align-items-center justify-content-end">
        <small>({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})</small>
        <i class="fas fa-shopping-cart"></i>
    </div>
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
            <tr data-linha="{{ $carrinho->id }}">
                <th scope="row"></th>
                <td>{{ $carrinho->name }}</td>
                <td>{{ $carrinho->price }}</td>
                <td>{{ $carrinho->qty }}</td>
                <td>
                    <form name="formExcluirItemCarrinho" action="{{ route('carrinho.destroy', ['id' => $carrinho->id]) }}" method="POST" id="{{ $carrinho->id }}">
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