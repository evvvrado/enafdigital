<div clas="row" wire:poll.5000ms='atualizaComentarios'>
    <div class="col-12 text-end">
        Último atualização: {{ date("d/m/Y H:i:s") }}
    </div>
    <div class="col-12 py-2">
        <div class="box-comentarios py-3">
            <div class="container-fluid">
                @if($comentarios)
                    @foreach($comentarios as $comentario)
                        <div class="row mb-4">
                            <div class="d-flex @if($comentario->usuario_id == session()->get('usuario')['id']) justify-content-end @else justify-content-start @endif">
                                <div class="@if($comentario->usuario_id == session()->get('usuario')['id']) comentario-proprio @else comentario-outros @endif text-end">
                                    <b>{{ $comentario->usuario->nome }}</b>
                                    <p>{{ $comentario->conteudo }}</p>
                                    <small>{{ date("d/m/Y H:i:s", strtotime($comentario->created_at)) }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-12 mt-3 d-flex flex-row w-100">
        <div class="mb-3 w-100">
            <input type="text" class="form-control input-comentario" name="" id="" maxlength="255" wire:model="conteudo">
        </div>
        <div class="mb-3 ms-3">
            <a name="" id="" class="btn btn-primary" role="button" wire:click='enviaComentario'><i class="fas fa-paper-plane"></i></a>
        </div>
    </div>
</div>

@push('styles')
<style>
    .box-comentarios{
        border: 1px solid rgba(0,0,0,0.2);
        width: 100%;
        height: 500px;
        overflow-y: scroll;
    }
    .input-comentario{
        /* width: 90%; */
    }
    .comentario-outros{
        width: auto;
        max-width: 100%;
        min-width: 40%;
        background-color: #3e4042;
        color: white;
        padding: 10px 10px;
        border-radius: 10px;
        position: relative;
    }
    .comentario-proprio{
        width: auto;
        max-width: 100%;
        min-width: 40%;
        background-color: rgb(0, 132, 255);
        color: white;
        padding: 10px 10px;
        border-radius: 10px;
        position: relative;
    }
    .comentario-proprio>small{
        position: absolute;
        bottom: -20px;
        left: 0px;
        color: rgba(0,0,0,0.45);
    }
    .comentario-proprio>p{
        margin: 0;
    }
    .comentario-outros>small{
        position: absolute;
        bottom: -20px;
        right: 0px;
        color: rgba(0,0,0,0.45);
    }
    .comentario-outros>p{
        margin: 0;
    }
</style>
@endpush