<?php

namespace App\View\Components\Nav;

use Illuminate\View\Component;

class LinkNavegacao extends Component
{
    public string $nomePagina; 
    public string $rota;

    public function __construct(string $nomePagina, string $rota)
    {
        $this->nomePagina = $nomePagina;
        $this->rota = $rota;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav.link-navegacao');
    }
}
