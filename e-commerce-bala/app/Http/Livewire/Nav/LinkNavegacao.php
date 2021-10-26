<?php

namespace App\Http\Livewire\Nav;

use Livewire\Component;

class LinkNavegacao extends Component
{
    public $rota;
    public $nomePagina;

    public function render()
    {
        return view('livewire.nav.link-navegacao');
    }
}
