<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use FlyingLuscas\Correios\Client;
use FlyingLuscas\Correios\Service;
use App\Http\Controllers\Controller;

class FreteController extends Controller
{
    private $correios;

    public function __construct(Client $correios)
    {
        $this->correios = $correios;
    }

    public function store(Request $request)
    {
        $cep = $request->cep; 
        $quantidade = $request->quantidade_frete;
        
        $calculoFrete = $this->correios->freight()
        ->origin(env('CEP'))
        ->destination($cep)
        ->services(Service::PAC)
        ->item(16, 16, 16, .3, $quantidade)
        ->calculate();

        return redirect()->back()->with('frete', $calculoFrete[0]['price']);
    }
}
