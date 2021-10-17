@extends('layout.main')
@section('conteudo')
<div class="d-flex flex-column align-items-center mt-5 w-50 cart">
    <x-carrinho.tabela :carrinho="$carrinho" :valor-total="$valorTotal"/>
    <button class="w-100 btn text-light botao botao--checkout">Checkout</button>
</div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax/excluirRecurso.js') }}"></script>
    <script>
        $('form[name="formAtualizarQtdCarrinho"]').on("change", function () {  
            var rowId = $('[data-carrinho-qtd-hidden]').val(); 
            var rota = '/carrinho/' + rowId;

            $.ajax({
                type: "POST",
                url: rota,
                data: new FormData(this),
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success === true) {
                        $('[data-valor-total]').text(response.dados)
                    }
                }
            });
        });

        $('form[name="formExcluirItemCarrinho"]').on("submit", function (event) {  
            event.preventDefault();

            var itemId = $(this).attr("id");
            var rota = '/carrinho/' + itemId;
            var dados = $(this).serialize();
            var linha = $('[data-linha="' + itemId + '"]');

            var valorTotal = '{{ $valorTotal }}';
            console.log(valorTotal)
            var strValorItem = $('[data-preco="' + itemId + '"]').text();
            
            excluirRecurso(
                rota, 
                dados, 
                'Tem certeza que deseja retirar esse item do carrinho?',
                'Item retirado com sucesso!',
                linha
                );
                
            valorTotal = Number.parseFloat(valorTotal).toFixed(2);
            console.log(valorTotal)

            var nValorItem = Number.parseFloat(strValorItem).toFixed(2);
            console.log(nValorItem);
            valorTotal -= nValorItem;
            console.log(valorTotal);
           
            //var total = nValorTotal - nValorItem;
            $('[data-valor-total]').text(valorTotal.toFixed(2));
            
            
            var contador = '{{ Cart::count() }}';
            var nContador = parseFloat(contador).toFixed(2);
            $('.carrinho__contador span').text(contador);
            //var valorTotal = campoValorTotal.text() - $('[data-preco="' + itemId + '"]');

        })

    </script>
@endsection