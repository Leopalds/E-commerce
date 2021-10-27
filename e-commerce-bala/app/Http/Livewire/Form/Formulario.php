<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class Formulario extends Component
{
    public $action = "#";
    public $name = "";
    public $identificador = "";

    public function render()
    {
        return view('livewire.form.formulario');
    }
}
