<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        {{--Forelse es como foreach pero condicion, solo existe en laravel--}}
        @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                {{--leading es un separador como space-y-3--}}
            <div class="leading-10">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-sm text-grey-600 font-semibold ">{{$vacante->empresa}}</p>
                    <p class="text-xs text-grey-500">ultimo día: {{$vacante->ultimo_dia->format('d/m/y')}}</p>
            </div>
            
            {{--items-strech hace que se ajuste al largo del div pad--}}
            <div class="flex gap-3 flex-col md:flex-row items-strech items center mt-3 md:mt-0">
                <div class="relative group">    
                    <button
                        href="#"
                        class="bg-slate-800 hover:bg-slate-700 active:border-blue-900 py-2 px-4 rounded-lg text-white
                        text-xs font-bold uppercase text-center
                        items-center justify-center flex w-full"
                        >
                        
                        <svg class="w-6 h-6 hidden md:inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                        <span class="inline md:hidden ml-2">Candidatos</span>
                    </button>
                    <div class="text-xs hidden md:group-hover:block absolute top-full left-1/2 transform -translate-x-1/2 bg-slate-800 text-white px-2 py-1 rounded mt-1">
                        Candidatos
                    </div> 
                </div>
                <div class="relative group">    
                    <button
                        wire:click=""
                        href="{{route('vacantes.edit', $vacante->id)}}"
                        class="bg-blue-800 hover:bg-blue-700 py-2 px-4 rounded-lg text-white
                        text-xs font-bold uppercase text-center
                        items-center justify-center flex w-full"
                        >
                        <svg class="w-6 h-6 hidden md:inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg>
                        <span class="inline md:hidden ml-2">Editar</span>
                    </button>
                    <div class="text-xs hidden md:group-hover:block absolute top-full left-1/2 transform -translate-x-1/2 bg-blue-800 text-white px-2 py-1 rounded mt-1">
                        Editar
                    </div> 
                </div>
                <div class="relative group">
                    <button
                        wire:click="$emit('mostrarAlerta', {{$vacante->id}})"
                        class="bg-red-800 hover:bg-red-700 py-2 px-4 rounded-lg text-white
                        text-xs font-bold 
                        uppercase text-center
                        items-center justify-center flex w-full"
                        >
                        <svg class="w-6 h-6 hidden md:inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        <span class="inline md:hidden ml-2">Eliminar</span>
                    </button>
                    <div class="md:text-xs hidden md:group-hover:block absolute top-full left-1/2 transform -translate-x-1/2 bg-red-800 text-white px-2 py-1 rounded mt-1">
                        Eliminar
                    </div>
                </div> 
            </div>
        </div>
        {{--Este es como else, pero cuando detecta vacio--}}
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>
        {{--Paginacion--}}
    <div class="sm:block flex justify-center sm:justify-center mt-10">
        {{$vacantes->links()}}
    </div>

    {{-- <button class="p-2 text-white rounded-lg bg-blue-500" wire:click="emitirEventoComponente">compomente Java</button>
    <button class="p-2 text-white rounded-lg border-lg bg-blue-500" wire:click="emitirEventoComponenteDD">compomente DD</button> --}}
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
   
        Livewire.on('mostrarAlerta',  vacanteId => {
            Swal.fire({
            title: '¿Estas seguro que quieres borrar la vacante?:' + vacanteId,
            text: "No es posible revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                //comunicarse de java a componente
                Livewire.emit('eliminarVacante', vacanteId)
                Swal.fire(
                'Eliminado',
                'Tu vacante ha sido eliminada.',
                'success'
                )
            }
            })
        })


     </script> 

@endpush
