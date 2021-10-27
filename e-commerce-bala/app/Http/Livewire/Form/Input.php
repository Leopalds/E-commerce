<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class Input extends Campo
{
    public $type = "";

    public function render()
    {
        return view('livewire.form.input');
    }
}
