<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabelaUsuarios extends Component
{
    public $titulo;
    public $users;

    public function __construct($titulo, $users)
    {
        $this->titulo = $titulo;
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabela-usuarios');
    }
}
