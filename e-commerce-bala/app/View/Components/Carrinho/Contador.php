<?php

namespace App\View\Components\Carrinho;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\Component;

class Contador extends Component
{
    public function render()
    {
        $contador = Cart::content()->count();
        return view('components.carrinho.contador', compact('contador'));
    }
}
