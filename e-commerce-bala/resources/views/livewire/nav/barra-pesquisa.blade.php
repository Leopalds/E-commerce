<form class="d-flex mb-3 busca w-100 cabecalho__busca me-5" method="GET" action="{{ route('produtos.index') }}">
    <input class="form-control me-2" type="search" placeholder="Buscar" name="filter[nome]" aria-label="Search">
    @livewire('botao.sem-fundo', [
        'conteudo' => 'Buscar',
    ])
</form>
