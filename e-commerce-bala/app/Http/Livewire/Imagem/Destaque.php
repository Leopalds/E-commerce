<?php

namespace App\Http\Livewire\Imagem;

use Livewire\Component;

class Destaque extends Component
{
    public $produto;

    public function render()
    {
        return view('livewire.imagem.destaque');
    }
}
