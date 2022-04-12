<?php

namespace App\Http\Livewire\Midiakits\Consultar;

use Livewire\Component;
use App\Models\Midiakit;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Datatable extends Component
{
    use WithPagination;

    public $filtros;
    public $filtro_nome;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ["atualizaDatatable" => '$refresh'];

    public function excluirMidiakit(Midiakit $midiakit){
        Storage::delete(str_replace(url("/"), "", $midiakit->arquivo));
        $midiakit->delete();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Midiakit removido com sucesso!']);
    }

    public function setFiltros(){
        $this->filtros = [];
        if($this->filtro_nome){
            $this->filtros[] = ["nome", "like", "%" . $this->filtro_nome . "%"];
        }
        $this->resetPage();
    }

    public function limpaFiltros(){
        $this->filtros = null;
        $this->filtro_nome = null;
        $this->resetPage();
    }

    public function render()
    {
        if($this->filtros){
            $midiakits = Midiakit::where($this->filtros)->paginate(10);
        }else{
            $midiakits = Midiakit::paginate(10);
        }
        return view('livewire.midiakits.consultar.datatable', ["midiakits" => $midiakits]);
    }
}
