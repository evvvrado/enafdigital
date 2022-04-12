<div class="row">
    <div class="col-9">
        <div class="row">


            <div class=" col-sm-12 col-md-6 mb-3"
                style=" border-radius: 5px; background-color:var(--principal); width: 100%;">

                <a name="" id="button-add" class="btn" style="height: 100%; padding-left: 0;"
                    style="padding-left: 0;" onclick="Livewire.emit('abreModalCadastro')">
                    <i class="bx bx-plus" aria-hidden="true"></i> Adicionar</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">


                        <i id="search-icon" class="bx bx-search" aria-hidden="true"></i>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                                <thead>
                                    <tr role="row">
                                        <th class="" style="width: 5%">Tipo</th>
                                        <th class="" style="width: 55%">Nome</th>
                                        <th style="width: 15%">Data de Upload</th>
                                        <th class="text-center" style="width: 10%"></th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($midiakits as $midiakit)
                                        <tr>
                                            <td style="font-size: 24px; text-align: center;">
                                                {!! config('documentos.icones')[$midiakit->tipo] !!}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ $midiakit->arquivo }}"
                                                    download="{{ $midiakit->nome }}">{{ $midiakit->nome }}</a>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                {{ date('d/m/Y H:i:s', strtotime($midiakit->created_at)) }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="btn-group edit-table-button ms-2" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Editar">
                                                    <button type=" button" class="btn btn-info dropdown-toggle"
                                                        onclick="Livewire.emit('abreModalEdicao', {{ $midiakit->id }})"><i
                                                            class="bx bx-edit"></i></button>
                                                </div>

                                                <div class="ms-3 btn-group edit-table-button " wire:click=''>
                                                    <button type="button" class="btn btn-info "
                                                        wire:click='excluirMidiakit({{ $midiakit->id }})'><i
                                                            class="fa fa-times text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div> <!-- end col -->
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
                        <label for="titulo">Procurar</label>
                        <input id="titulo" name="nome" type="text" class="form-control" wire:model="filtro_nome">

                    </div>
                </form>

                <div class="buttons-row">

                    <div class="col">
                        <button id="btn-filtrar" type="button" class="btn  btn-success waves-effect waves-light"
                            style="width: 100%;" wire:click="setFiltros">
                            <i class="bx bx-check-double font-size-16  align-middle me-2"></i> Filtrar
                        </button>

                    </div>

                    <div class="col">
                        <button id="btn-limpar" type="button" class="btn btn-danger  waves-effect waves-light"
                            style="width: 100%;" wire:click="limpaFiltros">
                            <i class="bx bx-block font-size-16 align-middle me-2 "></i> Limpar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
