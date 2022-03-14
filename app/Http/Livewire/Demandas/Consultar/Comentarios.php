<?php

namespace App\Http\Livewire\Demandas\Consultar;

use Livewire\Component;
use App\Models\Demanda;
use Illuminate\Support\Facades\Log;
use App\Models\DemandaComentario;

class Comentarios extends Component
{

    public $demanda;
    public $comentarios;
    public $conteudo;

    protected $listeners = ["carregaModalComentarios", "atualizaComentarios"];

    public function enviaComentario(){
        Log::info("FOI COMENTARIO");
        $comentario = new DemandaComentario;
        $comentario->demanda_id = $this->demanda->id;
        $comentario->usuario_id = session()->get("usuario")["id"];
        $comentario->conteudo = $this->conteudo;
        $comentario->save();
        $this->conteudo = null;
        $this->emit("atualizaComentarios");
    }

    public function atualizaComentarios(){
        if($this->demanda){
            $this->comentarios = $this->demanda->comentarios;
        }
    }

    public function carregaModalComentarios(Demanda $demanda){
        $this->demanda = $demanda;
        $this->comentarios = $demanda->comentarios;
        $this->dispatchBrowserEvent("abreModalComentarios");
    }

    public function render()
    {
        return view('livewire.demandas.consultar.comentarios');
    }
}
