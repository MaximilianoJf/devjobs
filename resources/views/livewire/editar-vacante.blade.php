{{---Espace y -5 sirve para separar solo los div hijos---}}

<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
       
            wire:model="titulo"
            id="titulo"
            class="block mt-1 p-1 w-full" 
            type="text" 
            placeholder="Titulo Vacante"
           />
           {{--message es por defecto segun los rquired que especificas en la logica de validación, crear vacante.php--}}
           @error('titulo')
              <livewire:mostrar-alerta :message="$message"/>
           @enderror
    </div>

    
    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select 
            wire:model="salario" 
            id="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        @error('salario')
        <livewire:mostrar-alerta :message="$message"/>
     @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select 
            wire:model="categoria" 
            id="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >   
            <option value="">-- Selecciona un rol --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option> 
            @endforeach
        </select>
        @error('categoria')
          <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input
            wire:model="empresa" 
            id="empresa"
            class="block mt-1 p-1 w-full" 
            type="text" 
            :value="old('Empresa')"
           />
         @error('empresa')
           <livewire:mostrar-alerta :message="$message"/>
         @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input 
            wire:model="ultimo_dia" 
            id="ultimo_dia"
            class="block mt-1 p-1 w-full" 
            type="date" 
            :value="old('ultimo_dia')"
           />
         @error('ultimo_dia')
           <livewire:mostrar-alerta :message="$message"/>
         @enderror
    </div>

    
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
        <textarea 
            wire:model="descripcion"
            placeholder=""
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring
            focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72"
            ></textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('imagen')" />
        <x-text-input 
           wire:model="imagen_nueva"
           id="imagen"
           class="block mt-1 p-1 w-full" 
           type="file" 
           accept="image/*"
        />
        <div class="my-5 w-88">
            <x-input-label :value="__('Imagen Actual')"/>
            {{--Asset apunta a la carpeta public--}}
            <img src="{{asset('storage/vacantes/' . $imagen)}}" alt="{{'Imagen Vacante' . $titulo}}">
        </div>
        <div class="my-5 w-80">
            @if($imagen_nueva)
             {{--livewire detecta la imagen $imagen por wire:model, temporaryUrl es el metodo para ver la imagen sin cargarla al servidor--}}
             <x-input-label :value="__('Imagen Nueva')"/>
                <img src="{{$imagen_nueva->temporaryUrl()}}">
            @endif
        </div>
        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <x-primary-button class="w-full justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>

</form>