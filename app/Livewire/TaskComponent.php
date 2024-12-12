<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskComponent extends Component
{
    public $user;
    public $tasks = [];
    public function render()
    {
        return view('livewire.task-component');
    }
    public function mount(){
        $this->user = Auth::user()->name;
        $this->tasks = Auth::user()->tasks;
    }
}
