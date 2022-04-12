<div class="container-fluid">
    <form class="row" wire:submit.prevent='salvar' method="POST" enctype="multipart/form-data">
        <div class="col-12" style="height: 100%">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-3">Subir arquivo</h4>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3 text-center">
                                <input class="form-control" type="file" id="arquivo" wire:model='arquivo'>
                                <small>Ao editar, escolher um arquivo irá substituir o anterior</small>
                            </div>
                            <div class="mb-3">
                                <label for="productname">Nome (*)</label>
                                <input id="productname" name="nome" type="text" class="form-control contador"
                                    placeholder="Insira o nome do arquivo" maxlength="45" wire:model='nome' required>
                                @error('nome')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo</label>
                                <select class="form-control" name="" id="" wire:model="tipo" required>
                                    @foreach (config('documentos.tipos') as $key => $tipo)
                                        <option value="{{ $key }}">{{ $tipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mostrar no site</label>
                                <select class="form-control" name="" id="" wire:model="mostrar" required>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
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
