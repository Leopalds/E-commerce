<form action="{{ route('carrinho.store') }}" method="POST" class="d-flex align-items-center">
    @csrf
    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
    <label for="qtd" class="form-label me-3 quantidade__rotulo">Qtd</label>
    <input type="number" value="1" min="0" id="qtd" name="quantidade" class="form-control px-2 quantidade__campo">
    <button class="ms-5 botao botao--carrinho btn">
        Adicionar ao carrinho
    </button>
</form>