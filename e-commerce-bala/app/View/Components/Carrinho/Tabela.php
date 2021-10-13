<?php

namespace App\View\Components\Carrinho;

use Illuminate\View\Component;

class Tabela extends Component
{
    public $carrinho;

    public function __construct($carrinho)
    {
        $this->carrinho = $carrinho;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carrinho.tabela');
    }
}
