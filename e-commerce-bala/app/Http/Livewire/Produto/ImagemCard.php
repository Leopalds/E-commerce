<?php

namespace App\Http\Livewire\Produto;

use Livewire\Component;

class ImagemCard extends Component
{
    public $imagem;

    public function render()
    {
        return view('livewire.produto.imagem-card');
    }
}
