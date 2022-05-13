<?php

namespace App\Http\Livewire\Institucional\Cursos;

use Livewire\Component;
use App\Models\Curso;
use Livewire\WithPagination;

class Listar extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $tipo = -1;
    public $filtro_nome;

    public function updatedTipo(){
        $this->emit('$refresh');
    }

    public function render()
    {
        $cursos = Curso::where(null);
        if($this->tipo != -1){
            $cursos = $cursos->where("tipo", $this->tipo);
        }
        
        if($this->filtro_nome){
            $cursos = $cursos->where("nome", "LIKE", "%" . $this->filtro_nome . "%");
        }

        $cursos = $cursos->where("pacote", false)->orderBy("created_at", "DESC")->paginate(10);
        return view('livewire.institucional.cursos.listar', ["cursos" => $cursos]);
    }
}
