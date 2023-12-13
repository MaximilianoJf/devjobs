<?php

namespace App\Http\Livewire;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    //declarar los wire:model para asignar valores
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

     //permite usar imagenes
     use WithFileUploads;

     protected $rules = [
         'titulo' => 'required|string',
         'salario' => 'required',
         'categoria' => 'required',
         'empresa' => 'required',
         'ultimo_dia' => 'required',
         'descripcion' => 'required',
         'imagen_nueva' => 'nullable|image|max:1024',
     ];
    
    public function editarVacante(){
        $datos =  $this->validate();
       
        //si hay una imagen nueva
        if($this->imagen_nueva){
            //guardar imagen en public
            $imagen = $this->imagen_nueva->store('public/vacantes');
            //limpiar nombre para guardar
            $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
        }
        //encontrar vacante a editar
        $vacante = Vacante::find($this->vacante_id);
        //asignar valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        
        //guardar la vacante

        $vacante->save();

        //redireccionar
        session()->flash('mensaje' , 'La vacante se actualizó correctamente');
        return redirect()->route('vacantes.index');

    }

    //metodo de inicialización
    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id; //esto no va a funcionar si pongo $id por que esta reservado a livewire ese termino
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        //formatear la fecha a la requerida año mes y dia con Carbon
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }
    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    
    }
}
