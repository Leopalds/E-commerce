<?php

namespace App\Http\Controllers\Publico;

use MercadoPago\SDK;
use MercadoPago\Payer;
use MercadoPago\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    private $pagamento;

    public function __construct()
    {
        SDK::setAccessToken('APP_USR-8202366884661980-102613-916923f58dc2c1d9b5ef93cdd9adcebe-1007167226');
        $this->pagamento = new Payment();
        $this->comprador = new Payer();
    }

    public function index()
    {
        return response()
            ->view(
                'paginas.publico.checkout'
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
