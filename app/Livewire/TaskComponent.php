<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskComponent extends Component
{
    public $user;
    public $tasks = [];
    public $modal = 0;
    public $title;
    public $description;
    public function render()
    {
        return view('livewire.task-component');
    }
    public function mount(){
        $this->user = Auth::user()->name;
        $this->tasks = Auth::user()->tasks;
    }
    public function getTask(){
        $this->tasks = Auth::user()->tasks;
    }
    public function clearfields(){
        $this->title = '';
        $this->description = '';
    }
    public function opencreatemodal(){
        $this->clearfields();
        $this->modal = 1;
    }
    public function closecreatemodal(){
        $this->modal = 0;
    }public function createTask(){
        Task::create([
            'user_id' =>Auth::id(),
            'title' => $this->title,
            'description' => $this->description
        ]);
        $this->closecreatemodal();
        $this->getTask();
    }
}
