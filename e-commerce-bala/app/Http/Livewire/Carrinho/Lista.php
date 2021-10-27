<?php

namespace App\Http\Livewire\Carrinho;

use Livewire\Component;

class Lista extends Component
{
    public $carrinho;
    public $valorTotal;

    public function render()
    {
        return view('livewire.carrinho.lista');
    }
}
