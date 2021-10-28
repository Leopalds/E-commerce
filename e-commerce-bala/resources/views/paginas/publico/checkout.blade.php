@extends('layout.main')
@section('conteudo')
<h2>Checkout</h1>
<div class="row">
    <div class="col-md-6">  
        <h3>Seu pedido</h3>
        @foreach ($itens as $item)
        <div class="d-flex align-items-center justify-content-between border-bottom border-top py-3">
            <div>
                @if (count(App\Models\Produto::find($item->id)->imagens) != 0 )
                <img width="70px" height="70px" src=" {{ asset('/storage/img/produto/' . App\Models\Produto::find($item->id)->imagens->take(1)->first()->nome) }}" alt="imagem do produto...">
                @endif
            </div>
            <div>
                <div>{{ $item->name }}</div>
                <div>R$ {{ number_format($item->price, 2, '.', ',') }}</div>
            </div>
            <div>
                <input class="form-control w-25" type="text" readonly value="{{ $item->qty }}">
            </div>
        </div>
        @endforeach
        <div class="d-flex fw-bold fs-5 mb-5">
            <span class="me-3">Total:</span>
            <div>R${{ $valorTotal }}</div>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Dados do pagamento</h3>
        <form id="form-checkout" class="d-flex flex-column">
            <input type="text" name="cardNumber" id="form-checkout__cardNumber" class="form-control mb-3"/>
            <div class="d-flex mb-2">
                <input type="text" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" class="form-control me-2"/>
                <input type="text" name="cardExpirationYear" id="form-checkout__cardExpirationYear" class="form-control"/>
            </div>
            <input type="text" name="securityCode" id="form-checkout__securityCode" class="form-control mb-3"/>
            <input type="text" name="cardholderName" id="form-checkout__cardholderName" class="form-control mb-3"/>
            <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail" class="form-control mb-3"/>
            <select name="issuer" id="form-checkout__issuer" class="form-control mb-3"></select>
            <select name="identificationType" id="form-checkout__identificationType" class="form-control mb-3"></select>
            <input type="text" name="identificationNumber" id="form-checkout__identificationNumber" class="form-control mb-3"/>
            <select name="installments" id="form-checkout__installments" class="form-control mb-3"></select>
            <button type="submit" id="form-checkout__submit" class="btn btn-danger mb-3">Realizar pagamento</button>
        </form>
    </div>
    
</div>
@endsection
@section('js')
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
    
    var valorTotal = "{{ $valorTotal }}";
    var chavePub = '{{ env("MERCADO_PAGO_PB") }}';

    const mp = new MercadoPago(chavePub);
    const cardForm = mp.cardForm({
        amount: valorTotal,
        autoMount: true,
        form: {
            id: "form-checkout",
            cardholderName: {
                id: "form-checkout__cardholderName",
                placeholder: "Nome do cartao",
            },
            cardholderEmail: {
                id: "form-checkout__cardholderEmail",
                placeholder: "Email",
            },
            cardNumber: {
                id: "form-checkout__cardNumber",
                placeholder: "Numero do cartao",
            },
            cardExpirationMonth: {
                id: "form-checkout__cardExpirationMonth",
                placeholder: "MM",
            },
            cardExpirationYear: {
                id: "form-checkout__cardExpirationYear",
                placeholder: "YYYY",
            },
            securityCode: {
                id: "form-checkout__securityCode",
                placeholder: "CVV",
            },
            installments: {
                id: "form-checkout__installments",
                placeholder: "Parcelamento",
            },
            identificationType: {
                id: "form-checkout__identificationType",
                placeholder: "Documento",
            },
            identificationNumber: {
                id: "form-checkout__identificationNumber",
                placeholder: "Número do documento",
            },
            issuer: {
                id: "form-checkout__issuer",
                placeholder: "Emissor",
            },
        },
        callbacks: {
        onFormMounted: error => {
            if (error) return console.warn("Form Mounted handling error: ", error);
            console.log("Form mounted");
        },
        onSubmit: event => {
            event.preventDefault();

            const {
                paymentMethodId: payment_method_id,
                issuerId: issuer_id,
                cardholderEmail: email,
                amount,
                token,
                installments,
                identificationNumber,
                identificationType,
            } = cardForm.getCardFormData();

            fetch("/checkout", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    token,
                    issuer_id,
                    payment_method_id,
                    transaction_amount: Number(amount),
                    installments: Number(installments),
                    description: "Product description",
                    payer: {
                        email,
                        identification: {
                            type: identificationType,
                            number: identificationNumber,
                        },
                    },
                }),
            });
        },
        onFetching: (resource) => {
            console.log("Fetching resource: ", resource);
        },
    },
});
</script>
@endsection