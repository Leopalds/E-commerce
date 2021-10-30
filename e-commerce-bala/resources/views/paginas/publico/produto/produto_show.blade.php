@extends('layouts.main')
@section('conteudo')
    <div class="d-flex produto flex-column mt-5">
        @livewire('carrossel.carrossel', ['produto' => $produto])
        <div class="col-6 produto__descricao">
            <h5 class="fs-4 mt-3">{{ $produto->nome }}</h5>
            <p class="mb-4">{{ $produto->descricao }}</p>
            <p class="mb-4 fw-bold fs-3">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p> 
            <hr>
            <div class="produto__calculo w-100">
                <form action="{{ route('frete.store') }}" method="POST" >
                    @csrf
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <label class="form-label me-2">Calcular o frete:</label>
                            <input name="cep" type="text" class="form-control w-25" placeholder="99.999-999">
                            <input name="quantidade_frete" id="quantidade-frete" type="number" hidden>
                        </div>
                        @if (Session::has('frete'))
                            <div>
                                <small class="text-success">
                                    Valor do frete: R$ {{ number_format(Session::get('frete'), 2, ',', '.') }}
                                </small>
                            </div>
                        @endif
                        <button class="btn btn-danger">Calcular</button>
                    </div>
                </form>
                <div class="quantidade mb-5">
                    <form action="{{ route('carrinho.store') }}" method="POST" class="d-flex flex-column align-items-start quantidade_form">
                        @csrf
                        <div class="d-flex flex-column">
                            <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                            <label for="qtd" class="form-label me-3 quantidade__rotulo">Quantidade</label>
                            <input type="number" value="1" min="0" id="qtd" name="quantidade" class="form-control px-2 quantidade__campo w-50">
                        </div>
                        @livewire('botao.botao', [
                            'conteudo' => 'Adicionar ao carrinho',
                            'extraCss' => 'botao botao--carrinho mt-3'
                        ])
                    </form>
                </div>
            </div>
            <div>Estoque: {{ $produto->quantidade }}</div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(function () {  

        var quantidadeProduto = document.querySelector('#qtd').value;
        var freteQuantidade = document.querySelector('#quantidade-frete').value = quantidadeProduto;

        $('#qtd').on("change", function () {  
            quantidadeProduto = document.querySelector('#qtd').value;
            freteQuantidade = document.querySelector('#quantidade-frete').value = quantidadeProduto;
        });
    });

</script>
@endsection