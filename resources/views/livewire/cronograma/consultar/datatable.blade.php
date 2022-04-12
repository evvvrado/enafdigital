<div class="row">
    <div class="col-9">

        <div class="row"">

                               
                    <div class="                      col-sm-12 col-md-6 mb-3"
            style=" border-radius: 5px; background-color:var(--principal); width: 100%;">

            <a name="" id="button-add" class="btn" style="height: 100%; padding-left: 0;"
                style="padding-left: 0;" onclick="Livewire.emit('abreModalCadastro')"">
                <i class="      bx bx-plus" aria-hidden="true"></i> Adicionar</a>
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 125px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Nome e Mês</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 70px;"
                                        aria-label="Position: activate to sort column ascending">Descrição</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 10px;"
                                        aria-label="Start date: activate to sort column ascending"></th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($cronogramas as $cronograma)
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">{{ $cronograma->titulo }} <br> 
                                            <small>{{ $cronograma->mes_ano }}</small></td>
                                        <td class="depoimento-row" style="white-space: unset; width: 60%;">{{ $cronograma->descricao }}</td>
                                        <td>
                                            <div class="btn-group edit-table-button ">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-edit"></i></button>
                                                <div class="dropdown-menu" style="margin: 0px;">
                                                    <a class="dropdown-item cpointer" onclick="Livewire.emit('abreModalEdicao', {{ $cronograma->id }})">Editar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item cpointer" style="color: red" wire:click="removeCronograma({{ $cronograma->id }})">Excluir</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row row-paginacao">
                            {{ $cronogramas->links() }}
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div> <!-- end col -->
<div class="col-3">


    <div class="col-sm-12 col-md-6 mb-3" style=" border-radius: 5px; background-color:var(--principal); width: 100%;">
        <a class="btn" style="padding-left: 21px; color: white; height: 100%; cursor: default;"
            href="">Filtros</a>
    </div>
    <div class="card filter-body">
        <div class="card-body">

            <form id="form-filtro" action="{{ route('painel.depoimento') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome">Título</label>
                    <input id="nome" name="nome" type="text" class="form-control" placeholder="" wire:model="filtro_titulo">
                </div>
                <div class="mb-3">
                    <label for="depoimento">Descrição</label>
                    <input id="depoimento" name="depoimento" type="text" class="form-control" placeholder="" wire:model="filtro_descricao">
                </div>
            </form>



            <div class="buttons-row">
                <div>
                    <button id="btn-filtrar" type="button" class="btn btn-success waves-effect waves-light" wire:click="setFiltros">
                        <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Filtrar
                    </button>
                </div>
                <div>
                    <button id="btn-limpar" type="button" class="btn btn-danger waves-effect waves-light" wire:click="limpaFiltros">
                        <i class="bx bx-block font-size-16 align-middle me-2"></i> Limpar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
