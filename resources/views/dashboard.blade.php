<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-3xl text-purple-800">
                        Bienvenido {{$user}}
                        Usted tiene {{$tasks->count()}} tarea/s creadas
                    </div>
                    <div class="border border-purple-400 rounded p-4">
                        @foreach (Auth::user()->tasks as $task)
                           <p class="text-green-600">{{$task->title}}</p> <br>
                           <p class="text-green-400">{{$task->description}}</p> <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
