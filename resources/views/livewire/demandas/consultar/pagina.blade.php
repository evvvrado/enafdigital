<div class="row">

    <div class="col-12 mb-4">
        <a name="" id="" class="btn btn-primary" wire:click="$emit('carregaModalCadastro')">Nova Demanda</a>
    </div>
    <hr>
    <div class="col-12">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="accordion row">
                        @foreach ($demandas as $demanda)
                            <div class="accordion-item col-6">
                                <h2 class="accordion-header" id="demanda{{ $demanda->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseDemanda{{ $demanda->id }}" aria-expanded="true" aria-controls="collapseDemanda{{ $demanda->id }}">
                                        {{ $demanda->descricao }} @if($demanda->finalizada) <i class="fas fa-check-circle ms-4 fa-lg" style="color: green;"></i> @else <i class="fas fa-clock ms-4 fa-lg" style="color: orange;"></i> @endif
                                    </button>
                                </h2>
                                <div id="collapseDemanda{{ $demanda->id }}" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table" style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td><b>Solicitante</b></td>
                                                    <td>{{ $demanda->solicitante->nome }}</td>
                                                    <td><b>Solicitado</b></td>
                                                    <td>{{ $demanda->solicitado->nome }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Estimativa de Entrega</b></td>
                                                    <td>{{ date("d/m/Y", strtotime($demanda->estimativa)) }}</td>
                                                    <td><b>Entrega</b></td>
                                                    <td>@if($demanda->finalizada) {{ date("d/m/Y", strtotime($demanda->entrega)) }} @else A ser feita @endif</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="4">@if($demanda->arquivo) <a href="{{ asset($demanda->arquivo) }}" target="_blank"> Visualizar Arquivo </a> @else Nenhum arquivo @endif</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <i class="fas fa-edit fa-lg cpointer" wire:click='editar("{{ $demanda->id }}")' style="color: orange;"></i>
                                                <i class="fas fa-times-circle ms-3 fa-lg cpointer" wire:click='excluir("{{ $demanda->id }}")' style="color: red;"></i>
                                                <i class="fas fa-check ms-3 fa-lg cpointer" wire:click='finalizar("{{ $demanda->id }}")' style="color: green;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="col-3">
                <div class="col-sm-12 col-md-6 mb-3"
                    style=" border-radius: 5px; background-color:var(--principal); width: 100%;">
                    <a class="btn" style="padding-left: 21px; color: white; height: 100%; cursor: default;"
                        href="">Filtros</a>
                </div>
                <div class="card filter-body">
                    <div class="card-body">
                        <form id="form-filtro" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Descriçao</label>
                                <input type="text" class="form-control" wire:model="descricao">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Solicitante</label>
                                <select class="form-control" name="" id="" wire:model='solicitante_id'>
                                    <option value="-1">Selecione o Solicitante</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Solicitado</label>
                                <select class="form-control" name="" id="" wire:model='solicitado_id'>
                                    <option value="-1">Selecione o Solicitado</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Situação</label>
                                <select class="form-control" name="" id="" wire:model='finalizada'>
                                    <option value="-1">Selecione a Situação</option>
                                    <option value="0">Em aberto</option>
                                    <option value="1">Finalizado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Estimativa de Entrega</label>
                                <input type="date" class="form-control" wire:model='estimativa'>
                            </div>
                        </form>



                        <div class="buttons-row">
                            <div>
                                <button id="btn-filtrar" type="button" class="btn btn-success waves-effect waves-light" wire:click='setFiltros'>
                                    <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Filtrar
                                </button>
                            </div>
                            <div>
                                <button id="btn-limpar" type="button" class="btn btn-danger waves-effect waves-light" wire:click='limpaFiltros'>
                                    <i class="bx bx-block font-size-16 align-middle me-2"></i> Limpar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@push('styles')
    <style>
        .card-demanda {
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.45);
            width: 300px;
            padding: 10px;
        }

    </style>
@endpush
