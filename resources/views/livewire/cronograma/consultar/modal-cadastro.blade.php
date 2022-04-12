<div class="container-fluid">
    <form class="row" wire:submit.prevent='salvar' method="POST" enctype="multipart/form-data">
        <div class="col-12" style="height: 100%">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row my-3">
                                <picture
                                    style="height: 150px;width: 150px;border-radius: 15px;overflow: hidden; display: block; margin: 0 auto;">
                                    <img id="foto-preview"
                                        style="width: 100%; height:100%; object-fit: cover; border-radius: 15px;"
                                        @if($nova_imagem) src="{{ $nova_imagem->temporaryUrl() }}" @elseif($imagem) src="{{ asset($imagem) }}" @else src="{{ asset('admin/images/thumb-padrao.png') }}" @endif alt="">
                                </picture>


                                <div class="col-12 mt-3 text-center">
                                    <label style="width: 60%" class="btn btn-primary" for="foto-upload"><i
                                            class='bx bx-upload text-white'></i></label>
                                    <input name="foto" id="foto-upload" style="display: none;" type="file" wire:model="nova_imagem">
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="productname">Mês e Ano (*)</label>
                                <input id="productname" name="nome" type="text" class="form-control contador"
                                    placeholder="" maxlength="45" wire:model='mes_ano' required>
                                @error('mes_ano')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productname">Início</label>
                                <input id="productname" name="nome" type="date" class="form-control contador" wire:model='inicio' required>
                                @error('inicio')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productname">Fim</label>
                                <input id="productname" name="nome" type="date" class="form-control contador" wire:model='fim' required>
                                @error('fim')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productname">Título (*)</label>
                                <input id="productname" name="nome" type="text" class="form-control contador"
                                    placeholder="" maxlength="45" wire:model='titulo' required>
                                @error('titulo')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productname">Descrição (*)</label>
                                <textarea class="form-control contador" maxlength="500" wire:model='descricao' required></textarea>
                                @error('descricao')
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
    <script>
        $(document).ready(function(){
            var inp = document.getElementById('foto-upload');
            inp.addEventListener('change', function(e){
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(){
                    document.getElementById('foto-preview').src = this.result;
                    };
                reader.readAsDataURL(file);
            },false);
        });
    </script>
@endpush
