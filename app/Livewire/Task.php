<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{
    public $tasks;
    public $taskText;
    public $editing;
    public $deleting; // Cambié $deliting a $deleting

    protected $rules = ['taskText' => 'required|max:40'];
    protected $messages = ['taskText.required' => 'No puedes dejar el campo vacío'];

    public function mount() {
        $this->taskText = '';
    }

    public function updatedTaskText()
    {
        $this->validate(
            ['taskText' => 'max:40'],
            ['taskText.max' => 'No puedes escribir más de 40 caracteres']
        );
    }

    public function edit(TaskModel $task)
    {
        $this->editing = $task;
        $this->taskText = $this->editing->text;
    }

    public function done(TaskModel $task)
    {
        $task->update(['done' => !$task->done]); 
    }


    public function save()
    {
        $this->validate();

        if ($this->editing) {
            // Si estamos editando, actualizamos la tarea existente
            $this->editing->update(['text' => $this->taskText]);
            session()->flash('message', 'Recado editado correctamente!');
        } else {
            // Si no estamos editando, creamos una nueva tarea
            TaskModel::create(['text' => $this->taskText]);
            session()->flash('message', 'Recado guardado correctamente!');
        }
        
        $this->clearForm(); // Limpiar el formulario después de guardar
    }

    public function delete($taskId)
    {
    TaskModel::find($taskId)->delete(); 
    session()->flash('message', 'Recado eliminado correctamente!');
    $this->mount();
    }

    public function clearForm()
    {
        $this->taskText = '';
        $this->editing = null;
    }

    public function render()
    {
        $this->tasks = TaskModel::orderBy('id', 'desc')->get();
        return view('livewire.task');
    }
}
