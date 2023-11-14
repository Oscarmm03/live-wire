<div>
    <form class="p-4" wire:submit.prevent="save">
        <div class="mb-2">
            <input wire:model.live="taskText" class="p-2 bg-gray-200 w-full" type="text" placeholder="Recados...">
            @error("taskText") <div class="mt-1 text-red-600 text-sm">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="bg-indigo-700 text-white font-bold w-full rounded shadow p-2" wire:loading.attr="disabled">Guardar</button>
        
        @if (session()->has('message'))
            <h3 class="bg-green-400 font-bold p-2 w-full rounded text-center text-sm text-white mt-2">{{ session('message') }}</h3>
        @endif
    </form>

    @if ($editing)
        Editando tarea: {{ $editing->text }}
    @endif

    <table class="shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">Listo!</th>
                <th class="py-3 px-6 text-left">Recados</th>
                <th class="py-3 px-6 text-left">&nbsp;</th>
            </tr>
        </thead>

        <tbody class="text-gray-600">
            @foreach ($tasks as $task)
            <tr class="border-b border-gray-200 {{$task->done ? 'bg-green-200' : ''}}">
                
                <td class="px-4 py-2"><input type="checkbox" wire:click="done({{$task->id}})" {{$task->done ? 'checked' : ''}}></td>
                <td class="px-4 py-2 {{$task->done ? 'line-through' : ''}} "> {{$task->text}}</td>
                <td class="px-4 py-2">
                    <button wire:click="edit({{$task}})" type="button" class="bg-indigo-400 px-2 py-1 text-white text-xs rounded">Editar</button>
                    <button wire:click="delete({{$task->id}})" type="button" class="bg-red-500 px-2 py-1 text-white text-xs rounded">Eliminar</button>
                </td>
            </tr> 
            @endforeach
    </table>
</div>