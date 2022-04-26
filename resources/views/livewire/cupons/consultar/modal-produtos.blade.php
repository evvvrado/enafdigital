<div class="modal fade" id="modalCupomProdutos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header" wire:ignore>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" wire:ignore.self>
                <div class="container-fluid">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="" class="form-label">Cursos Presenciais</label>
                            <select class="form-control" name="" id="" wire:model="cursos_presenciais">
                                <option value="0">Nenhum</option>
                                <option value="1">Todos</option>
                                <option value="2">Cursos Específicos</option>
                            </select>
                        </div>
                        @if($this->cursos_presenciais == 2)
                            <div class="col-12">
                                <div class="row">
                                    <div style="width: 85%;">
                                        <select class="form-control" wire:model="curso_presencial_selecionado">
                                            <option value="-1">Selecione um curso</option>
                                            @foreach(\App\Models\Curso::where("tipo", 2)->whereNotIn("id", $this->cupom->cupom_produtos->pluck("curso_id"))->get() as $curso)
                                                <option value="{{ $curso->id }}">({{ $curso->id }}) {{ $curso->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="width: 15%;">
                                        <button type="submit" class="btn btn-primary" wire:click="adicionar_presencial"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <table class="table">
                                    <tbody>
                                        @foreach($this->cupom->cupom_produtos->where("tipo", 0) as $cupom_produto)
                                            <tr>
                                                <td>
                                                    ({{ $cupom_produto->curso->id }}) {{ $cupom_produto->curso->nome }}
                                                </td>
                                                <td class="text-end">
                                                    <i class="fas fa-times fa-lg text-danger cpointer" wire:click="remove_produto({{ $cupom_produto->id }})"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="" class="form-label">Cursos Online</label>
                            <select class="form-control" name="" id="" wire:model="cursos_online">
                                <option value="0">Nenhum</option>
                                <option value="1">Todos</option>
                                <option value="2">Cursos Específicos</option>
                            </select>
                        </div>
                        @if($this->cursos_online == 2)
                            <div class="col-12">
                                <div class="row">
                                    <div style="width: 85%;">
                                        <select class="form-control" wire:model="curso_online_selecionado">
                                            <option value="-1">Selecione um curso</option>
                                            @foreach(\App\Models\Curso::whereIn("tipo", [0,1])->whereNotIn("id", $this->cupom->cupom_produtos->pluck("curso_id"))->get() as $curso)
                                                <option value="{{ $curso->id }}">({{ $curso->id }}) {{ $curso->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="width: 15%;">
                                        <button type="submit" class="btn btn-primary" wire:click="adicionar_online"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <table class="table">
                                    <tbody>
                                        @foreach($this->cupom->cupom_produtos->where("tipo", 1) as $cupom_produto)
                                            <tr>
                                                <td>
                                                    ({{ $cupom_produto->curso->id }}) {{ $cupom_produto->curso->nome }}
                                                </td>
                                                <td class="text-end">
                                                    <i class="fas fa-times fa-lg text-danger cpointer" wire:click="remove_produto({{ $cupom_produto->id }})"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="" class="form-label">Eventos</label>
                            <select class="form-control" name="" id="" wire:model="eventos">
                                <option value="0">Nenhum</option>
                                <option value="1">Todos</option>
                                <option value="2">Eventos Específicos</option>
                            </select>
                        </div>
                        @if($this->eventos == 2)
                            <div class="col-12">
                                <div class="row">
                                    <div style="width: 85%;">
                                        <select class="form-control" wire:model="evento_selecionado">
                                            <option value="-1">Selecione um evento</option>
                                            @foreach(\App\Models\Evento::where("fim", ">", date("Y-m-d"))->whereNotIn("id", $this->cupom->cupom_produtos->pluck("evento_id"))->get() as $evento)
                                                <option value="{{ $evento->id }}">({{ $evento->id }}) {{ $evento->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="width: 15%;">
                                        <button type="submit" class="btn btn-primary" wire:click="adicionar_evento"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <table class="table">
                                    <tbody>
                                        @foreach($this->cupom->cupom_produtos->where("tipo", 2) as $cupom_produto)
                                            <tr>
                                                <td>
                                                    ({{ $cupom_produto->evento->id }}) {{ $cupom_produto->evento->nome }}
                                                </td>
                                                <td class="text-end">
                                                    <i class="fas fa-times fa-lg text-danger cpointer" wire:click="remove_produto({{ $cupom_produto->id }})"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2">
                            <button type="button" name="" id="" class="btn btn-primary" wire:click="salvar">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        window.addEventListener("abreModalCupomProdutos", (event) => {
            $("#modalCupomProdutos").modal("show");
        })

        window.addEventListener("fechaModalCupomProdutos", (event) => {
            $("#modalCupomProdutos").modal("hide");
        })
    </script>
@endpush
