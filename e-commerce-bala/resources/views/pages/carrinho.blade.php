@extends('layout.main')
@section('conteudo')
<div class="d-flex flex-column align-items-center mt-5 w-50">
    <x-carrinho.tabela :carrinho="$carrinho"/>
    <button class="w-100 btn text-light botao botao--checkout">Checkout</button>
</div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax/excluirRecurso.js') }}"></script>
    <script>
        $('form[name="formExcluirItemCarrinho"]').on("submit", function (event) {  
            event.preventDefault();

            var itemId = $(this).attr("id");
            var rota = '/carrinho/' + itemId;
            var dados = $(this).serialize();
            var linha = $('[data-linha="' + itemId + '"]');

            excluirRecurso(
                rota, 
                dados, 
                'Tem certeza que deseja retirar esse item do carrinho?',
                'Item retirado com sucesso!',
                linha
            );
        })
    </script>
@endsection