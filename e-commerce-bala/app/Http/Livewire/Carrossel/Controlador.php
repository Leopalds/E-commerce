<?php

namespace App\Http\Livewire\Carrossel;

use Livewire\Component;

class Controlador extends Component
{
    public $tipo;
    public $texto;

    public function render()
    {
        return view('livewire.carrossel.controlador');
    }
}
