<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{
    public $tasks;
    public TaskModel $task;
    public function mount()
    {
        $this->tasks = TaskModel::get();
    }

    public function render()
    {
        return view('livewire.task');
    }
}
