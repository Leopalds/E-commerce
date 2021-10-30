<?php

namespace App\Http\Livewire\Carrossel;

use Livewire\Component;

class Imagem extends Component
{
    public $imagens;

    public function render()
    {
        return view('livewire.carrossel.imagem');
    }
}
