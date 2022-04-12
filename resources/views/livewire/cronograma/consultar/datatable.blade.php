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
                                <tr class="odd">
                                    <td class="sorting_1 dtr-control">Evento em Moçambique <br> <small>Abril de
                                            2022</small></td>
                                    <td class="depoimento-row" style="white-space: unset; width: 60%;">Lorem ipsum
                                        dolor sit amet
                                        consectetur, adipisicing elit.
                                        Culpa molestiae facere, quaerat saepe quibusdam dolor odit amet aspernatur,
                                        maxime quia esse rerum consequatur dignissimos vero quidem quasi delectus
                                        veritatis! Dolorem.</td>
                                    <td>
                                        <div class="btn-group edit-table-button ">
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="bx bx-edit"></i></button>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a class="dropdown-item" href="">Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" style="color: red" href="">Excluir</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" type="text" class="form-control" placeholder=""
                        @if (isset($filtros) && isset($filtros['nome'])) value="{{ $filtros['nome'] }}" @endif>
                </div>
                <div class="mb-3">
                    <label for="depoimento">Depoimento</label>
                    <input id="depoimento" name="depoimento" type="text" class="form-control" placeholder=""
                        @if (isset($filtros) && isset($filtros['depoimento'])) value="{{ $filtros['depoimento'] }}" @endif>
                </div>
            </form>



            <div class="buttons-row">
                <div>
                    <button id="btn-filtrar" type="button" class="btn btn-success waves-effect waves-light">
                        <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Filtrar
                    </button>
                </div>
                <div>
                    <button id="btn-limpar" type="button" class="btn btn-danger waves-effect waves-light">
                        <i class="bx bx-block font-size-16 align-middle me-2"></i> Limpar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
