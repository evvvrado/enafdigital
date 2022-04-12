<div class="container-fluid">
    <form class="row" wire:submit.prevent='salvar' method="POST" enctype="multipart/form-data">
        <div class="col-12" style="height: 100%">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="productname">Mês e Ano (*)</label>
                                <input id="productname" name="nome" type="text" class="form-control contador"
                                    placeholder="" maxlength="45" wire:model='nome' required>
                                @error('nome')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productname">Título (*)</label>
                                <input id="productname" name="nome" type="text" class="form-control contador"
                                    placeholder="" maxlength="45" wire:model='nome' required>
                                @error('nome')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productname">Descrição (*)</label>
                                <input id="productname" name="nome" type="text" class="form-control contador"
                                    placeholder="" maxlength="125" wire:model='nome' required>
                                @error('nome')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 justify-content-end"
                            style="position: static; bottom: 15px; right: 15px; z-index: 10">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save fa-lg mx-2"></i>
                                Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
@endpush

@push('scripts')
    <script>
        window.addEventListener("limpaInputFile", (event) => {
            $("#arquivo").val("");
        });
    </script>
@endpush
