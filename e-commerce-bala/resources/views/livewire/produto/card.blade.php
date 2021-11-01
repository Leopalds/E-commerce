<div class="card mx-5 mb-5" style="width: 350px">
    <a href="{{ route('produtos.show' , ['id' => $produto->id]) }}" class="text-decoration-none text-dark ">
        @livewire('produto.imagem-card', ['imagem' => $imagem])
        <div class="card-body">
            <h5 class="card-title mb-3 produtos__nome">{{ $produto->nome }}</h5>
            <p class="card-text mb-3">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p class="card-text mb-3">Estoque: {{ $produto->quantidade }}</p>
        </div>
    </a>
</div>
