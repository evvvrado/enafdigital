<?php

namespace App\Http\Livewire\Cupons\Consultar;

use Livewire\Component;
use App\Models\Cupom;

class ModalCadastro extends Component
{

    public $cupom_id;
    public $codigo;
    public $descricao;
    public $tipo = 0;
    public $valor;
    public $validade = 0;
    public $inicio;
    public $fim;
    public $quantidade;

    protected $listeners = ["carregaModalCadastro", "carregaModalEdicao"];

    public function salvar(){
        if($this->cupom_id){
            $cupom = Cupom::find($this->cupom_id);
        }else{
            $cupom = new Cupom;
            $cupom->quantidade = $this->quantidade;
            $cupom->estoque = $this->quantidade;
        }

        $cupom->codigo = $this->codigo;
        $cupom->descricao = $this->descricao;
        $cupom->tipo = $this->tipo;
        $cupom->valor = $this->valor;
        $cupom->validade = $this->validade;
        $cupom->inicio = $this->inicio;
        $cupom->fim = $this->fim;
        if($cupom->quantidade != $this->quantidade){
            $diferenca = $cupom->quantidade - $this->quantidade;
            $cupom->estoque -= $diferenca;
            $cupom->quantidade = $this->quantidade;
        }
        $cupom->save();
        $this->emit("atualizaDatatable");
        $this->dispatchBrowserEvent("fechaModalCadastroCupom");

    }

    public function carregaModalCadastro(){
        $this->resetar();
        $this->dispatchBrowserEvent("abreModalCadastroCupom");
    }

    public function carregaModalEdicao(Cupom $cupom){
        $this->cupom_id = $cupom->id;
        $this->codigo = $cupom->codigo;
        $this->descricao = $cupom->descricao;
        $this->tipo = $cupom->tipo;
        $this->valor = $cupom->valor;
        $this->validade = $cupom->validade;
        $this->inicio = $cupom->inicio;
        $this->fim = $cupom->fim;
        $this->quantidade = $cupom->quantidade;
        $this->dispatchBrowserEvent("abreModalCadastroCupom");
    }

    public function resetar(){
        $this->cupom_id = null;
        $this->codigo = null;
        $this->descricao = null;
        $this->tipo = 0;
        $this->valor = null;
        $this->validade = 0;
        $this->inicio = null;
        $this->fim = null;
        $this->quantidade = null;
    }

    public function render()
    {
        return view('livewire.cupons.consultar.modal-cadastro');
    }
}
