<?php

namespace App\View\Components\Carrinho;

use App\Models\Produto;
use Illuminate\View\Component;

class Tabela extends Component
{
    public $carrinho;
    public $valorTotal;

    public function __construct($carrinho, $valorTotal)
    {
        $this->carrinho = $carrinho;
        $this->valorTotal = $valorTotal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carrinho.tabela', );
    }
}
