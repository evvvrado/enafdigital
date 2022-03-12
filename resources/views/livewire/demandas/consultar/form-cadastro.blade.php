<div class="container-fluid">
    <div class="row">
        @if($demanda_id)
            <input type="hidden" name="" wire:model='demanda_id'>
        @endif
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Solicitante</label>
                <select class="form-control" name="" id="" wire:model='solicitante_id'>
                    <option value="-1">Selecione o solicitante</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" @if(session()->get("usuario")["id"] == $usuario->id) selected @endif>{{ $usuario->nome }}</option>
                    @endforeach
                </select>
                @error('solicitante_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Solicitado</label>
                <select class="form-control" name="" id="" wire:model='solicitado_id'>
                    <option value="-1">Selecione o solicitado</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                    @endforeach
                </select>
                @error('solicitado_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
              <label for="" class="form-label">Descrição</label>
              <input type="text"
                class="form-control" name="" id="" aria-describedby="helpId" maxlength="255" placeholder="" wire:model='descricao'>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Setor</label>
                <select class="form-control" name="" id="" wire:model='setor'>
                    <option value="-1">Selecione o setor</option>
                    @foreach(config("demandas.setores") as $key => $setor)
                        <option value="{{ $key }}">{{ $setor }}</option>
                    @endforeach
                </select>
                @error('setor') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
              <label for="" class="form-label">Estimativa de Entrega</label>
              <input type="date" class="form-control" min="{{ date('Y-m-d') }}" required wire:model='estimativa'>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
              <label for="" class="form-label">Arquivo (Não obrigatório)</label>
              <input type="file" class="form-control" name="" id="" placeholder="" aria-describedby="fileHelpId" wire:model="arquivo">
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <a name="" id="" class="btn btn-primary" role="button" wire:click='salvar'>Salvar</a>
            </div>
        </div>
    </div>
</div>