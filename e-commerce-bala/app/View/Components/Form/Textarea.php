<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $atributo;
    public $entidade;
    public $label;
    public $valor = "";

    public function __construct($atributo, $label, $valor = "", $entidade)
    {
        $this->atributo = $atributo;
        $this->label = $label;
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
        return view('components.form.textarea');
    }
}
