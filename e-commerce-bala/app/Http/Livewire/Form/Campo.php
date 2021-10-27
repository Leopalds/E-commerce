<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

abstract class Campo extends Component
{
    public $name = "";
    public $label = "";
    public $placeholder = "";
    public $valor = ""; 
    public $extraCss = "";  
}
