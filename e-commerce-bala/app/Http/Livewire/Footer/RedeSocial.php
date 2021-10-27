<?php

namespace App\Http\Livewire\Footer;

use Livewire\Component;

class RedeSocial extends Component
{
    public $url;
    public $rede;

    public function render()
    {
        return view('livewire.footer.rede-social');
    }
}
