<?php

namespace App\Http\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class Card extends Component
{
    public Produto $produto;

    public function imagemDestaque()
    {
        $imagem = $this->produto->imagens->take(1)->first();

        if (is_null($imagem)) {
            return 'https://t3.ftcdn.net/jpg/03/49/45/70/360_F_349457036_XWvovNpNk79ftVg4cIpBhJurdihVoJ2B.jpg';
        }

        return '/storage/img/' . $imagem->nome;
    }

    public function render()
    {
        $imagem = $this->imagemDestaque();

        return view('livewire.produto.card', compact('imagem'));
    }
}
