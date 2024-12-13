{{-- 
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
    </div> --}}
<!-- This is an example component -->
<div wire:poll="getTask" class='min-h-screen items-center justify-center min-h-screen from-purple-200 via-purple-300 to-purple-500 bg-gradient-to-br'>
    <div class="flex items-center justify-center min-h-[450px]">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="text-center py-3 px-6">Título</th>
                            <th scope="col" class="text-center py-3 px-6">Descripción</th>
                            <th colspan="3" class="text-center py-3 px-6">Acciones</th>
                        </tr>
                    </thead>
                    @foreach ($tasks as $task )
                        <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6">{{$task->title}}</td>
                            <td class="py-4 px-6">{{$task->description}}</td>
                            @if (isset($task->pivot) && ($task->pivot->permission == 'edit') || auth()->user()->id == $task->user_id)
                                <td class="py-4 px-6"><button class="border border-slate-400 rounded p-2 text-white bg-yellow-500" wire:click="opencreatemodal({{$task}})">Editar</button></td>
                                <td class="py-4 px-6"><button class="border border-slate-400 rounded p-2 text-white bg-green-500" wire:click="openShareModal({{$task}})">Compartir</button></td>
                                <td class="py-4 px-6"><button class="border border-slate-400 rounded p-2 text-white bg-red-500" wire:click="deleteTask({{$task}})" wire:confirm="¿Está seguro de que desea eliminar?">Eliminar</button></td>
                            @endif
                        </tr>
                        </tbody>
                    @endforeach
                    <button wire:click="opencreatemodal">abrir modal</button>
                </table>
            </div>
        </div>
    </div>
    <div>
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">Compartir tarea</h1>
                        </div>
                        <form class="text-center">
                            <label for="usuario">Escoge el usuario a quién compartir</label><br><br>
                            <select name="usuario" id="usuario">
                                <option value="">XD</option>
                                {{-- @foreach ($users as $user )
                                        <option value="">{{$user}}</option>
                                @endforeach --}}
                            </select><br><br>
                            <label for="permisos">Escoge el permiso que tendrá</label><br><br>
                            <select name="permisos" id="permisos">
                                <option value="">Vista</option>
                                <option value="">Editar</option>
                            </select><br><br>
                        </form>
                        <div class="space-y-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @if ($modal)    
    <!-- component -->
    <div>
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">{{$this->editingTask->id !== null ? 'Actualizar' : 'Crear'}} tarea</h1>
                        </div>
                        <form class="text-center">
                            <label for="title">Título</label><br>
                            <input class="border border-slate-900 rounded w-full" type="text" id="title" wire:model="title"><br><br>
                            <label for="description">Escribe la descripción</label><br>
                            <input class="border border-slate-900 rounded w-full" id="description" type="text" wire:model="description"><br><br>
                        </form>
                        <div class="space-y-4">
                            <button class="p-3 bg-black rounded-full text-white w-full font-semibold" wire:click="createTask">{{$this->editingTask->id !== null ? 'Actualizar' : 'Crear'}} tarea</button>
                            <button class="p-3 bg-white border rounded-full w-full font-semibold" wire:click="closecreatemodal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>