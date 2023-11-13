<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $welcome = "Hola Oscar, aquí tienes tus recados";

    protected $listeners = ['taskSaved'];
                //esucha el evento
    public function taskSaved() //ejecuta este metodo
    {
        session()->flash('message', 'Tarea guardada con éxito!'); // que crea el mensaje
    }
    
    public function render()
    {
        return view('livewire.main');
    }
}
