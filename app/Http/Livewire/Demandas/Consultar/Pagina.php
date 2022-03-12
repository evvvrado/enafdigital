<?php

namespace App\Http\Livewire\Demandas\Consultar;

use Livewire\Component;
use App\Models\Demanda;
use Illuminate\Support\Facades\Storage;

class Pagina extends Component
{

    public $usuarios;
    public $descricao;
    public $solicitante_id;
    public $solicitado_id;
    public $finalizada;
    public $estimativa;
    public $filtros;
    public $setor;

    protected $listeners = ["atualizaConsulta" => '$refresh'];

    public function mount($usuarios){
        $this->usuarios = $usuarios;
        $this->setor = 0;
    }

    public function editar($demenda){
        $this->emit("carregaModalEdicao", ["demanda" => $demenda]);
    }

    public function excluir($demanda){
        $demanda = Demanda::find($demanda);
        $demanda = $demanda->first();
        Storage::delete($demanda->arquivo);
        $demanda->delete();
    }

    public function finalizar($demanda){
        $demanda = Demanda::find($demanda);
        $demanda = $demanda->first();
        $demanda->finalizada = true;
        $demanda->entrega = date("Y-m-d");
        $demanda->save();
    }

    public function trocaSetor($setor){
        $this->setor = $setor;
        $this->limpaFiltros();
    }

    public function setFiltros(){
        $this->filtros = [];
        
        if($this->descricao){
            $this->filtros[] = ["descricao", "LIKE", "%" . $this->descricao . "%"];
        }

        if($this->solicitante_id !== null && $this->solicitante_id != -1){
            $this->filtros[] = ["solicitante_id", "=", $this->solicitante_id];
        }

        if($this->solicitado_id !== null && $this->solicitado_id != -1){
            $this->filtros[] = ["solicitado_id", "=", $this->solicitado_id];
        }

        if($this->finalizada !== null && $this->finalizada != -1){
            $this->filtros[] = ["finalizada", "=", $this->finalizada];
        }

        if($this->estimativa){
            $this->filtros[] = ["estimativa", "=", $this->estimativa];
        }

        $this->filtros[] = ["setor", "=", $this->setor];
    }

    public function limpaFiltros(){
        $this->filtros = null;
        $this->descricao = null;
        $this->solicitante_id = null;
        $this->solicitado_id = null;
        $this->finalizada = null;
        $this->estimativa = null;
    }

    public function render()
    {
        // dd($this->filtros);
        if($this->filtros){
            $demandas = Demanda::where($this->filtros)->orderBy("created_at", "DESC")->get();
        }else{
            $demandas = Demanda::where("setor", $this->setor)->orderBy("created_at", "DESC")->get();
        }
        return view('livewire.demandas.consultar.pagina', ["demandas" => $demandas]);
    }
}
