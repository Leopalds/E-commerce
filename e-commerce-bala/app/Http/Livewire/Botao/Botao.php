<?php

namespace App\Http\Livewire\Botao;

use Livewire\Component;

class Botao extends Component
{
    public $conteudo = "";
    public $extraCss = "";
    public $identificador = "";

    public function render()
    {
        return view('livewire.botao.botao');
    }
}
