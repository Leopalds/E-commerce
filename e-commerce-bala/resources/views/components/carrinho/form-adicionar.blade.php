<form action="{{ route('carrinho.store') }}" method="POST" class="d-flex flex-column align-items-start">
    @csrf
    <div class="d-flex flex-column">
        <input type="hidden" name="produto_id" value="{{ $produto->id }}">
        <label for="qtd" class="form-label me-3 quantidade__rotulo">Quantidade</label>
        <input type="number" value="1" min="0" id="qtd" name="quantidade" class="form-control px-2 quantidade__campo w-50">
    </div>
    <button class="botao botao--carrinho btn mt-3">
        Adicionar ao carrinho
    </button>
</form>