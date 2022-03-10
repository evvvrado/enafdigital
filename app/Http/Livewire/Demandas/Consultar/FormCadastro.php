<?php

namespace App\Http\Livewire\Demandas\Consultar;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Demanda;
use Illuminate\Support\Facades\Storage;
use App\Classes\Util;

class FormCadastro extends Component
{

    use WithFileUploads;

    public $usuarios;
    public $demanda_id;
    public $solicitante_id;
    public $solicitado_id;
    public $descricao;
    public $arquivo;
    public $estimativa;

    protected $rules = [
        "solicitante_id" => "required|not_in: -1",
        "solicitado_id" => "required|not_in: -1",
    ];

    protected $messages = [
        "solicitante_id.required" => "Selecione um solicitante",
        "solicitado_id.required" => "Selecione um solicitado",
        "solicitante_id.not_in" => "Selecione um solicitante",
        "solicitado_id.not_in" => "Selecione um solicitado",
    ];

    protected $listeners = ["carregaModalEdicao", "carregaModalCadastro"];

    public function mount($usuarios){
        $this->usuarios = $usuarios;
    }

    public function carregaModalCadastro(){
        $this->solicitante_id = null;
        $this->solicitado_id = null;
        $this->descricao = null;
        $this->estimativa = null;
        $this->demanda_id = null;
        $this->arquivo = null;
        $this->dispatchBrowserEvent("abreModalCadastro");
    }

    public function carregaModalEdicao($demanda){
        $demanda = Demanda::find($demanda);
        $demanda = $demanda->first();
        $this->solicitante_id = $demanda->solicitante_id;
        $this->solicitado_id = $demanda->solicitado_id;
        $this->descricao = $demanda->descricao;
        $this->estimativa = $demanda->estimativa;
        $this->demanda_id = $demanda->id;
        $this->dispatchBrowserEvent("abreModalCadastro");
    }

    public function salvar(){
        $this->validate();
        if($this->demanda_id){
            $demanda = Demanda::find($this->demanda_id);
        }else{
            $demanda = new Demanda;
        }
        $demanda->solicitante_id = $this->solicitante_id;
        $demanda->solicitado_id = $this->solicitado_id;
        $demanda->descricao = $this->descricao;

        if($this->arquivo){
            Storage::delete($demanda->arquivo);
            $demanda->arquivo = $this->arquivo->store('admin/demandas/', 'local');
        }

        $demanda->estimativa = $this->estimativa;
        $demanda->save();
        Util::limparLivewireTemp();
        $this->emit('atualizaConsulta');
        $this->dispatchBrowserEvent('fechaModalCadastro');

        $this->solicitante_id = null;
        $this->solicitado_id = null;
        $this->descricao = null;
        $this->arquivo = null;
        $this->estimativa = null;
        $this->demanda_id = null;
    }

    public function render()
    {
        return view('livewire.demandas.consultar.form-cadastro');
    }
}
