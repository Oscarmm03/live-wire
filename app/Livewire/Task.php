<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{
    public $tasks;
    public $taskText;

    protected $rules = ['taskText' => 'required|max:40'];
    protected $messages = ['taskText.required' => 'No puedes dejar el campo vacío'];

    public function mount()
    {
        $this->loadTasksData();
        $this->taskText = '';
    }

    public function loadTasksData()
    {
        $this->tasks = TaskModel::orderBy('id', 'desc')->get();
    }

    public function updatedTaskText()
    {
        $this->validate(
            ['taskText' => 'max:40'],
            ['taskText.max' => 'No puedes escribir más de 40 caracteres']
        );
    }

    public function save()
    {
        $this->validate();

        TaskModel::create(['text' => $this->taskText]);

        $this->emitUp('taskSaved'); 
            //metodo    evento
        $this->loadTasksData(); // Actualizar la lista de tareas después de guardar
    }

    public function render()
    {
        return view('livewire.task');
    }
}
