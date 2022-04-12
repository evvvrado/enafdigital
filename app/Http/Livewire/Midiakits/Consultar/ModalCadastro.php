<?php

namespace App\Http\Livewire\Midiakits\Consultar;

use Livewire\Component;
use App\Models\Midiakit;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Classes\Util;


class ModalCadastro extends Component
{
    use WithFileUploads;

    public $nome;
    public $arquivo;
    public $mostrar = 1;
    public $midiakit_id;
    public $tipo = 0;

    protected $listeners = ["abreModalEdicao", "abreModalCadastro"];

    public function abreModalEdicao(Midiakit $midiakit)
    {
        $this->midiakit_id = $midiakit->id;
        $this->nome = $midiakit->nome;
        $this->arquivo = null;
        $this->mostrar = $midiakit->mostrar;
        $this->tipo = $midiakit->tipo;
        $this->dispatchBrowserEvent("abreModalParceiros");
        $this->dispatchBrowserEvent("limpaInputFile");
    }

    public function abreModalCadastro()
    {
        $this->resetar();
        $this->dispatchBrowserEvent("limpaInputFile");
        $this->dispatchBrowserEvent("abreModalParceiros");
    }

    public function salvar()
    {

        if ($this->midiakit_id) {
            $midiakit = Midiakit::find($this->midiakit_id);
        } else {
            $midiakit = new Midiakit;
        }

        $midiakit->nome = $this->nome;
        $midiakit->mostrar = $this->mostrar;
        $midiakit->tipo = $this->tipo;

        if ($this->arquivo) {
            Storage::delete($midiakit->arquivo);
            $midiakit->arquivo = $this->arquivo->store("site/midiakits/", 'local');
            Util::limparLivewireTemp();
        }

        $midiakit->save();
        $this->resetar();
        $this->emit("atualizaDatatable");
        $this->dispatchBrowserEvent("fechaModalParceiros");
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Midiakit salvo com sucesso!!']);
    }

    public function resetar()
    {
        $this->midiakit_id = null;
        $this->nome = null;
        $this->arquivo = null;
        $this->mostrar = 1;
        $this->tipo = 0;
    }

    public function render()
    {
        return view('livewire.midiakits.consultar.modal-cadastro');
    }
}
