<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $atributo;
    public $label;
    public $tipo;
    public $valor = "";
    public $entidade;
    

    public function __construct($atributo, $label, $tipo, $valor = "", $entidade)
    {
        $this->atributo = $atributo;
        $this->label = $label;
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->entidade = $entidade;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
