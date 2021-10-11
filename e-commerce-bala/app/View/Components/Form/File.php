<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class File extends Component
{
    public $atributo;
    public $label;
    public $entidade;

    public function __construct($atributo, $label, $entidade)
    {
        $this->atributo = $atributo;
        $this->label = $label;
        $this->entidade = $entidade;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.file');
    }
}
