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
    public $editingTask = null;
    public $description;
    public $id;
    public function render()
    {
        return view('livewire.task-component');
    }
    public function mount(){
        $this->user = Auth::user()->name;
        $this->getTask();
    }
    public function getTask(){
        $tasks = Auth::user()->tasks;
        $shared = Auth::user()->sharedTasks()->get();
        $this->tasks = $shared->merge($tasks);
    }
    public function clearfields(){
        $this->title = '';
        $this->description = '';
        $this->editingTask = null;
        $this->id = '';
    }
    public function opencreatemodal(Task $task = null){
        if ($task) {
            $this->editingTask = $task;
            $this->title = $task->title;
            $this->description = $task->description;
            $this->id = $task->id;
        }else{
            $this->clearfields();
        }
        $this->modal = 1;
    }
    public function closecreatemodal(){
        $this->modal = 0;
    }public function createTask(){
        if ($this->editingTask->id) {
            $task = Task::find($this->editingTask->id);
            $task->update(
                [
                    'title' => $this->title,
                    'description' =>$this->description
                ]
                );
        } else {
            Task::create(
                [
                    'user_id' => Auth::id(),
                    'title' => $this->title,
                    'description' => $this->description
                ]
                );
        }

        $this->clearfields();
        $this->closecreatemodal();
        $this->getTask();
    }

    public function deleteTask(Task $task){
        $task->delete();
        $this->clearfields();
        $this->closecreatemodal();
        $this->getTask();
    }
}
