<?php

namespace App\View\Components\Footer;

use Illuminate\View\Component;

class RedeSocial extends Component
{
    public string $rede;
    public string $url;

    public function __construct($rede, $url = '#')
    {
        $this->url = $url;
        $this->rede = $rede;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer.rede-social');
    }
}
