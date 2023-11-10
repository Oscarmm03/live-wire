<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $welcome = "Hola Oscar, aquí tienes tus recados";
    
    public function render()
    {
        return view('livewire.main');
    }
}
