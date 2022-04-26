<div class="modal fade" id="modalCadastroCupom" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header" wire:ignore>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" wire:ignore.self>
                <div class="container-fluid">
                    <form wire:submit.prevent='salvar' class="row">
                        <div class="mb-3 col-4">
                            <label class="form-label">Identificador</label>
                            <input type="text" class="form-control" maxlength="50" wire:model="codigo">
                        </div>
                        <div class="mb-3 col-8">
                            <label class="form-label">Descrição</label>
                            <input type="text" class="form-control" maxlength="50" wire:model="descricao">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Tipo</label>
                            <select class="form-control" name="" id="" wire:model="tipo">
                                <option value="0">Porcentagem</option>
                                <option value="1">Valor</option>
                            </select>
                        </div>
                        <div class="mb-3 col-4">
                            <label class="form-label">Desconto</label>
                            <input type="number" class="form-control" min="0" step="0.01" wire:model="valor">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Validade</label>
                            <select class="form-control" name="" id="" wire:model="validade">
                                <option value="0">Não possui</option>
                                <option value="1">Possui</option>
                            </select>
                        </div>
                        @if($this->validade == 1)
                            <div class="mb-3 col-6">
                                <label class="form-label">Início</label>
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}" wire:model="inicio">
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Fim</label>
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}" wire:model="fim">
                            </div>
                        @endif
                        <div class="mb-3 col-4">
                            <label class="form-label">Quantidade</label>
                            <input type="number" class="form-control" min="0" step="1" wire:model="quantidade">
                        </div>
                        <div class="mb-3 col-12 text-end">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        window.addEventListener("abreModalCadastroCupom", (event) => {
            $("#modalCadastroCupom").modal("show");
        })

        window.addEventListener("fechaModalCadastroCupom", (event) => {
            $("#modalCadastroCupom").modal("hide");
        })
    </script>
@endpush
