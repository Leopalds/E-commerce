@extends('layout.main')
@section('conteudo')
<div class="d-flex justify-content-center mt-5">
    <x-carrinho.tabela :carrinho="$carrinho"/>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/ajax/excluirRecurso.js') }}"></script>
    <script>
        $('form[name="formExcluirItemCarrinho"]').on("submit", function () {  
            var itemId = $(this).attr("id");
            var rota = '/carrinho/' + itemId;
            var dados = $(this).serialize();
            var linha = $('[data-linha="' + carrinhoId + '"]');


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