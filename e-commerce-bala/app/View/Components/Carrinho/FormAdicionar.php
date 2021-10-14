<?php

namespace App\View\Components\Carrinho;

use Illuminate\View\Component;

class FormAdicionar extends Component
{
    public $produto;

    public function __construct($produto)
    {
        $this->produto = $produto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carrinho.form-adicionar');
    }
}
