<?php

namespace App\Http\Livewire\Carrinho;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Contador extends Component
{
    public $contador;

    public function mount()
    {
        $this->contador = Cart::content()->count();
    }

    public function render()
    {
        return view('livewire.carrinho.contador');
    }
}
