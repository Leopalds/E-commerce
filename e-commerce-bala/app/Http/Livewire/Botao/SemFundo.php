<?php

namespace App\Http\Livewire\Botao;

use Livewire\Component;
use App\Http\Livewire\Botao\Botao;

class SemFundo extends Botao
{
    public function render()
    {
        return view('livewire.botao.sem-fundo');
    }
}
