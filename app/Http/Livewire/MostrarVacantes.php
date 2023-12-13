<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarVacantes extends Component
{
    //agregar para la paginacion
    use WithPagination;
   
    protected $listeners = ['eliminarVacante'];

    //Livewire soporta route model binding por lo cual puedo llamar con el id directo al objeto de vacante
    public function eliminarVacante(Vacante $vacante){
       $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(3);
        return view('livewire.mostrar-vacantes',compact('vacantes'));
    }
}
