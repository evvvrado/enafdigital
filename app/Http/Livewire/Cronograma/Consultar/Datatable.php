<?php

namespace App\Http\Livewire\Cronograma\Consultar;

use Livewire\Component;
use App\Models\Cronograma;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Datatable extends Component
{
    use WithPagination;

    public $filtros;
    public $filtro_titulo;
    public $filtro_descricao;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ["atualizaDatatable" => '$refresh'];

    public function setFiltros(){
        $this->filtros = [];

        if($this->filtro_titulo){
            $this->filtros[] = ["titulo", "LIKE", "%$this->filtro_titulo%"];
        }

        if($this->filtro_descricao){
            $this->filtros[] = ["descricao", "LIKE", "%$this->filtro_descricao%"];
        }

        $this->resetPage();
    }

    public function limpaFiltros(){
        $this->filtros = null;
        $this->filtro_titulo = null;
        $this->filtro_descricao = null;

        $this->resetPage();
    }

    public function removeCronograma(Cronograma $cronograma){
        Storage::delete($cronograma->imagem);
        $cronograma->delete();
        $this->emit("atualizaDatatable");
    }

    public function render()
    {
        if($this->filtros){
            $cronogramas = Cronograma::where($this->filtros)->paginate(10);
        }else{
            $cronogramas = Cronograma::paginate(10);
        }
        return view('livewire.cronograma.consultar.datatable', ["cronogramas" => $cronogramas]);
    }
}
