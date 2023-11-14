<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $welcome = "Hola Oscar, aquí tienes tus recados";

    protected $listeners = ['taskSaved' => 'taskSaved', 'taskDeleted' => 'taskDeleted'];

    public function taskSaved($message)
    {
        session()->flash('message', $message);
    }

    public function taskDeleted($message)
    {
        session()->flash('message', $message);
    }

    public function render()
    {
        return view('livewire.main');
    }
}