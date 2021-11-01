@extends('layouts.main')
@section('conteudo')
<div class="d-flex flex-column align-items-center mt-5 w-50 cart">
    @livewire('carrinho.lista', [
        'carrinho' => $carrinho,
        'valorTotal' => $valorTotal
    ])

    <a href="{{ route('checkout.index') }}">
        @livewire('botao.com-fundo', [
            'conteudo' => 'Checkout',
        ])
    </a>
    
</div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/ajax/excluirRecurso.js') }}"></script>
    <script>
        $('[data-carrinho="qtd"]').on("change", function (event) { 
            var target = $(event.target);
            var form = target.parent();
            var rowId = form.children('[data-carrinho-qtd-hidden]').val();
            var rota = '/carrinho/' + rowId;
            
            $.ajax({
                type: "POST",
                url: rota,
                data: $(form).serialize(),
                dataType: "json",
                
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

            var qtd = linha.find('[data-carrinho="qtd"]').val(); 
                console.log(qtd);

            var valorTotal = $('[data-valor-total]').text();
            var strValorItem = $('[data-preco="' + itemId + '"]').text();

            valorTotal = Number.parseFloat(valorTotal).toFixed(2);
            console.log(valorTotal);
            var nValorItem = Number.parseFloat(strValorItem).toFixed(2);
            console.log(nValorItem*qtd);
            valorTotal -= (nValorItem*qtd);
           
            
            excluirRecurso(
                rota, 
                dados, 
                'Tem certeza que deseja retirar esse item do carrinho?',
                'Item retirado com sucesso!',
                linha,
                valorTotal
                );
                
           
            
            
            var contador = '{{ Cart::count() }}';
            var nContador = parseFloat(contador).toFixed(2);
            $('.carrinho__contador span').text(contador);
            //var valorTotal = campoValorTotal.text() - $('[data-preco="' + itemId + '"]');

        })

    </script>
@endsection