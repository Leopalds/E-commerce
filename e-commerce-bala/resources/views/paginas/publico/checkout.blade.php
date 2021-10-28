@extends('layout.main')
@section('conteudo')
<h2>Checkout</h1>
<div class="row">
    <div class="col">
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
            <progress value="0" class="progress-bar ">Loading...</progress>
        </form>
    </div>
    <div class="col">
        <h2>teste</h2>
    </div>
</div>
@endsection
@section('js')
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('APP_USR-ecec5f84-d03a-44aa-bae5-fb7ac1a428dd');

    const cardForm = mp.cardForm({
        amount: "100.5",
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
                placeholder: "Installments",
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
                placeholder: "Issuer",
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

            const progressBar = document.querySelector(".progress-bar");
            progressBar.removeAttribute("value");

            return () => {
                progressBar.setAttribute("value", "0");
            };
        },
    },
});
</script>
@endsection