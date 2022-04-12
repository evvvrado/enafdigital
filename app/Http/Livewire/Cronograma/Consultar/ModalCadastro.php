<?php

namespace App\Http\Livewire\Cronograma\Consultar;

use Livewire\Component;
use App\Models\Midiakit;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Classes\Util;


class ModalCadastro extends Component
{

    protected $listeners = ["abreModalEdicao", "abreModalCadastro"];

    public function abreModalCadastro()
    {
        $this->dispatchBrowserEvent("abreModalCadastro");
    }
    public function render()
    {
        return view('livewire.cronograma.consultar.modal-cadastro');
    }
}
