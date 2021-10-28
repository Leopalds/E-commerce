<?php

namespace App\Http\Controllers\Publico;

use MercadoPago\SDK;
use MercadoPago\Payer;
use App\Models\Produto;
use MercadoPago\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    private $pagamento;

    public function __construct()
    {
        SDK::setAccessToken(env('MERCADO_PAGO_SC'));
        $this->pagamento = new Payment();
        $this->comprador = new Payer();
    }

    public function index()
    {
        $itens = Cart::content();
        $valorTotal = Cart::priceTotal(2, '.', '');
        $produtos = Produto::all();

        return response()
            ->view(
                'paginas.publico.checkout',
                compact('itens', 'valorTotal', 'produtos')
            );
    }

    public function store(Request $request)
    {
        $this->pagamento->transaction_amount = (float)$request->transactionAmount;
        $this->pagamento->token = $request->token;
        $this->pagamento->description = $request->description;
        $this->pagamento->installments = (int)$request->installments;
        $this->pagamento->payment_method_id = $request->paymentMethodId;
        $this->pagamento->issuer_id = (int)$request->issuer;

        $this->comprador->email = $request->email;
        $this->comprador->identification = array(
            "type" => $request->docType,
            "number" => $request->docNumber
        );
        $this->pagamento->payer = $this->comprador;

        $this->pagamento->save();

        $response = array(
            'status' => $this->pagamento->status,
            'status_detail' => $this->pagamento->status_detail,
            'id' => $this->pagamento->id
        );
        echo json_encode($response);
        }
}
