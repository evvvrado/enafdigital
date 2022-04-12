<?php

namespace App\Http\Livewire\Cronograma\Consultar;

use Livewire\Component;
use App\Models\Cronograma;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Classes\Util;


class ModalCadastro extends Component
{

    use WithFileUploads;

    public $nova_imagem;
    public $cronograma;
    public $mes_ano;
    public $titulo;
    public $descricao;
    public $inicio;
    public $fim;
    public $imagem;

    protected $listeners = ["abreModalEdicao", "abreModalCadastro"];

    public function abreModalEdicao(Cronograma $cronograma)
    {
        $this->cronograma = $cronograma;
        $this->mes_ano = $cronograma->mes_ano;
        $this->titulo = $cronograma->titulo;
        $this->descricao = $cronograma->descricao;
        $this->inicio = $cronograma->inicio;
        $this->fim = $cronograma->fim;
        $this->imagem = $cronograma->imagem;
        $this->dispatchBrowserEvent("abreModalCadastro");
    }

    public function abreModalCadastro(){
        
        $this->resetar();
        $this->dispatchBrowserEvent("abreModalCadastro");
    }

    public function salvar(){
        if(!$this->cronograma){
            $cronograma = new Cronograma;
        }else{
            $cronograma = $this->cronograma;
        }

        $cronograma->titulo = $this->titulo;
        $cronograma->descricao = $this->descricao;
        $cronograma->mes_ano = $this->mes_ano;
        $cronograma->inicio = $this->inicio;
        $cronograma->fim = $this->fim;

        if($this->nova_imagem){
            Storage::delete($this->imagem);
            $cronograma->imagem = $this->nova_imagem->store('site/imagens/cronograma/', 'local');
            Util::limparLivewireTemp();
        }

        $cronograma->save();
        $this->emit("atualizaDatatable");
        $this->dispatchBrowserEvent("fechaModalCadastro");
    }

    public function resetar(){
        $this->imagem = null;
        $this->nova_imagem = null;
        $this->cronograma = null;
        $this->mes_ano = null;
        $this->titulo = null;
        $this->descricao = null;
        $this->inicio = null;
        $this->fim = null;
    }

    public function render()
    {
        return view('livewire.cronograma.consultar.modal-cadastro');
    }
}
