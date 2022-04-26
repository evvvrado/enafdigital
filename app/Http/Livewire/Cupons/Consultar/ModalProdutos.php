<?php

namespace App\Http\Livewire\Cupons\Consultar;

use Livewire\Component;
use App\Models\Cupom;
use App\Models\CupomProduto;

class ModalProdutos extends Component
{

    public $cupom;
    public $cursos_presenciais;
    public $cursos_online;
    public $eventos;
    public $curso_presencial_selecionado;
    public $curso_online_selecionado;
    public $evento_selecionado;

    protected $listeners = ["carregaModalCupomProdutos"];

    public function salvar(){
        $this->cupom->cursos_presenciais = $this->cursos_presenciais;
        $this->cupom->cursos_online = $this->cursos_online;
        $this->cupom->eventos = $this->eventos;
        $this->cupom->save();
        $this->dispatchBrowserEvent("fechaModalCupomProdutos");
        $this->emit("atualizaDatatable");
    }

    public function adicionar_presencial(){
        if($this->curso_presencial_selecionado == -1){
            return;
        }

        $cupom_produto = new CupomProduto;
        $cupom_produto->cupom_id = $this->cupom->id;
        $cupom_produto->curso_id = $this->curso_presencial_selecionado;
        $cupom_produto->tipo = 0;
        $cupom_produto->save();

        $this->cupom->refresh();
        $this->curso_presencial_selecionado = -1;
        
        $this->emit('$refresh');
    }

    public function adicionar_online(){
        if($this->curso_online_selecionado == -1){
            return;
        }

        $cupom_produto = new CupomProduto;
        $cupom_produto->cupom_id = $this->cupom->id;
        $cupom_produto->curso_id = $this->curso_online_selecionado;
        $cupom_produto->tipo = 1;
        $cupom_produto->save();

        $this->cupom->refresh();
        $this->curso_online_selecionado = -1;
        
        $this->emit('$refresh');
    }

    public function adicionar_evento(){
        if($this->evento_selecionado == -1){
            return;
        }

        $cupom_produto = new CupomProduto;
        $cupom_produto->cupom_id = $this->cupom->id;
        $cupom_produto->evento_id = $this->evento_selecionado;
        $cupom_produto->tipo = 2;
        $cupom_produto->save();

        $this->cupom->refresh();
        $this->evento_selecionado = -1;
        
        $this->emit('$refresh');
    }

    public function remove_produto(CupomProduto $cupom_produto){
        $cupom_produto->delete();
        $this->cupom->refresh();
        $this->emit('$refresh');
    }

    public function carregaModalCupomProdutos(Cupom $cupom){
        $this->cupom = $cupom;
        $this->cursos_presenciais = $cupom->cursos_presenciais;
        $this->cursos_online = $cupom->cursos_online;
        $this->eventos = $cupom->eventos;
        $this->dispatchBrowserEvent("abreModalCupomProdutos");
    }

    public function render()
    {
        return view('livewire.cupons.consultar.modal-produtos');
    }
}
