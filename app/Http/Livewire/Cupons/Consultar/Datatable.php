<?php

namespace App\Http\Livewire\Cupons\Consultar;

use Livewire\Component;
use App\Models\Cupom;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ["atualizaDatatable" => '$refresh'];

    public function remove_cupom(Cupom $cupom) {
        $cupom->delete();
        $this->emit('$refresh');
    }

    public function render()
    {
        $cupons = Cupom::orderBy("created_at")->paginate(10);
        return view('livewire.cupons.consultar.datatable', ["cupons" => $cupons]);
    }
}
