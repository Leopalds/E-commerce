<?php

namespace App\Http\Livewire\Carrossel;

use Livewire\Component;

class Carrossel extends Component
{
    public $produto;

    public function render()
    {
        return view('livewire.carrossel.carrossel');
    }
}
