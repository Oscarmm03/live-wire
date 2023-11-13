<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $welcome = "Hola Oscar, aquí tienes tus recados";

    protected $listeners = ['taskSaved' => 'taskSaved'];
                //esucha el evento
    public function taskSaved($message) //ejecuta este metodo
    {
        dd('hshshs');
        session()->flash('message', $message); // que crea el mensaje
    }
    
    public function render()
    {
        return view('livewire.main');
    }
}
