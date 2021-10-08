@extends('painel.template.main')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    {{-- <link href="{{asset('admin/libs/select2/css/select2-bootstrap4.css')}}" id="app-style" rel="stylesheet" type="text/css" /> --}}

    <style>
        .filters {
            cursor: default;
            border-radius: 5px 5px 0 0;
            width: 100%;
            color: white;
            font-size: .8125rem;
            display: flex;
            max-width: max-content;
            /* border: solid white 1px; */
        }

        .filters span {
            cursor: pointer;
            transition: 0.32s;
            padding: .84rem 1rem;

            /* border: solid white 1px; */
            border-radius: 5px 5px 0 0;

            color: #495057;

            font-weight: 600;
        }

        .filters span:hover {
            opacity: 0.7;
        }

        .filters span.active {
            color: var(--principal);
            background: white;
        }

        .card:not(.inicio) {
            display: none;
        }

    </style>
@endsection

@section('titulo')
    Catálogo / <a style="color: unset" href="{{ route('painel.expositores') }}">Expositores</a> / Hotsite
@endsection


@section('conteudo')


    <div class="filters col-12">
        <span data-filter="inicio" class="active">Informações</span>
        {{-- <span data-filter="cursos">Cursos</span> --}}
        <span data-filter="textos">Textos</span>
        <span data-filter="imagens">Imagens</span>
        <span data-filter="depoimentos">Parceiros</span>
        <span data-filter="galerias">Galerias</span>
        {{-- <span data-filter="depoimentosVideo">Depoimento em vídeo</span> --}}
        <span data-filter="duvidas">Duvidas</span>
    </div>


    @include('painel.includes.errors')
    <div class="row">
        <div class="col-12">
            <div class="card inicio">
                <div class="card-body">
                    <h4 class="card-title">Informações</h4>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Slogan</label>
                                    <input id="productname" name="productname" type="text" placeholder="Insira o Slogan"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="price">Telefone</label>
                                    <input class="form-control" type="tel" placeholder="Insira o telefone"
                                        id="example-tel-input">
                                </div>

                                <div class="mb-3">
                                    <label for="manufacturername">Slug</label>
                                    <input class="form-control" type="url" placeholder="Insira o SLUG que ira pra URL"
                                        id="example-url-input">
                                </div>

                                <div class="mb-3">
                                    <label for="manufacturername">Cor de destaque</label>
                                    <input class="form-control form-control-color" style="max-width:100%" type="color"
                                        value="#556ee6" id="example-color-input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="manufacturername">Site</label>
                                    <input class="form-control" type="url" placeholder="Insira a URL"
                                        id="example-url-input">
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturername">E-mail</label>
                                    <input class="form-control" type="email" placeholder="Insira o e-mail"
                                        id="example-email-input">
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturername">Endereço</label>
                                    <input id="endereco" name="endereco" type="text" placeholder="Insira o endereço"
                                        class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="manufacturername">Cor de Fundo</label>
                                    <input class="form-control form-control-color" style="max-width:100%" type="color"
                                        value="#556ee6" id="example-color-input">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Salvar</button>
                                <button type="button" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            {{-- <div class="card cursos">
                <div class="card-body">
                    <h4 class="card-title">Cursos Vinculados</h4>



                    <form>
                        <div class="row">
                            <div class="mb-3">
                                <label class="control-label">Selecionar Curso</label>
                                <select class="form-control">
                                    <option data-select2-id="3">Selecionar Curso</option>
                                    <option value="FA">Curso 1</option>
                                    <option value="EL">Curso 2</option>
                                    <option value="EL">Curso 3</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="manufacturername">Data de Exibição</label>
                                <input class="form-control" type="date" id="example-date-input">
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Curso</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 70px;"
                                            aria-label="Position: activate to sort column ascending">Data</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 10px;"
                                            aria-label="Start date: activate to sort column ascending"></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Curso 01</td>
                                        <td>31/02/2022</td>
                                        <td>
                                            <div class="btn-group edit-table-button ">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="height: 34px!important;"><i class="bx bx-edit"></i></button>
                                                <div class="dropdown-menu" style="margin: 0px;">
                                                    <a class="dropdown-item" style="color: red" href="#">Excluir</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>

            </div> --}}


            <div class="card textos">
                <div class="card-body">
                    <h4 class="card-title">Textos</h4>
                    <form>
                        <div class="row">
                            <div class="mb-3">
                                <label for="productname">Sessão 1</label>
                                <input id="productname" name="productname" type="text" placeholder="Texto inicial"
                                    class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <textarea class="form-control" name="resumo" placeholder="Paragrafo da Sessão"
                                    style="min-height: 200px!important;" rows="6"></textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="productname">Coluna 01</label>
                                    <input id="productname" name="productname" type="text" placeholder="Título da Coluna"
                                        class="form-control">
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea class="form-control" name="resumo" placeholder="Paragrafo da Coluna"
                                        style="min-height: 200px!important;" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="productname">Coluna 02</label>
                                    <input id="productname" name="productname" type="text" placeholder="Título da Coluna"
                                        class="form-control">
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea class="form-control" name="resumo" placeholder="Paragrafo da Coluna"
                                        style="min-height: 200px!important;" rows="6"></textarea>
                                </div>
                            </div>
                        </div>



                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Salvar</button>
                            <button type="button" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card depoimentos">
                <div class="card-body">
                    <h4 class="card-title">Cadastro de Parceiros</h4>



                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Nome</label>
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Insira o nome">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="manufacturerbrand">URL</label>
                                    <input class="form-control" type="url" placeholder="Insira a URL"
                                        id="example-url-input">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Adicionar</button>
                        </div>
                    </form>


                    <h4 class="card-title my-3">Logo do Parceiro</h4>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                <picture
                                    style="height: 281px; max-width: 281px; overflow: hidden; display: flex; align-items:center; justify-content: center;">
                                    <img id="parceiro-preview" src="{{ asset('admin/images/thumb-padrao.png') }}"
                                        style="height: 100%;" alt="">
                                </picture>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <label class="btn btn-primary" for="parceiro-upload">Escolher</label>
                                <input name="parceiro" id="parceiro-upload" style="display: none;" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 70px;"
                                            aria-label="Position: activate to sort column ascending">Depoimento</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 10px;"
                                            aria-label="Start date: activate to sort column ascending"></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Everaldo Júnior</td>
                                        <td>Meu nome é Everaldo e eu moro em alfenas mas queria estar
                                            morando em alfenas onde posso comprar todos os alfenas de toda alfenas</td>
                                        <td>
                                            <div class="btn-group edit-table-button ">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="height: 34px!important;"><i class="bx bx-edit"></i></button>
                                                <div class="dropdown-menu" style="margin: 0px;">
                                                    <a class="dropdown-item" style="color: red" href="#">Excluir</a>
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




            <div class="card galerias">
                <div class="card-body">
                    <h4 class="card-title">Primeira Galeria</h4>



                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Título</label>
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Insira o nome">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Descrição</label>
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Insira o nome">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Salvar</button>
                            <a name="" data-bs-toggle="modal" data-bs-target="#myModal" id="button-add"
                                class="btn btn-success" style="height: 100%;">
                                <i class="bx bx-plus" aria-hidden="true"></i> Adicionar</a>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 70px;"
                                            aria-label="Position: activate to sort column ascending">Depoimento</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 10px;"
                                            aria-label="Start date: activate to sort column ascending"></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Everaldo Júnior</td>
                                        <td>Meu nome é Everaldo e eu moro em alfenas mas queria estar
                                            morando em alfenas onde posso comprar todos os alfenas de toda alfenas</td>
                                        <td>
                                            <div class="btn-group edit-table-button ">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="height: 34px!important;"><i class="bx bx-edit"></i></button>
                                                <div class="dropdown-menu" style="margin: 0px;">
                                                    <a class="dropdown-item" style="color: red" href="#">Excluir</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="card galerias">
                    <div class="card-body">
                        <h4 class="card-title">Segunda Galeria</h4>



                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="productname">Título</label>
                                        <input id="productname" name="productname" type="text" class="form-control"
                                            placeholder="Insira o nome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="productname">Descrição</label>
                                        <input id="productname" name="productname" type="text" class="form-control"
                                            placeholder="Insira o nome">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Salvar</button>
                                <a name="" data-bs-toggle="modal" data-bs-target="#myModal" id="button-add"
                                    class="btn btn-success" style="height: 100%;">
                                    <i class="bx bx-plus" aria-hidden="true"></i> Adicionar</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="datatable_wrapper" xclass="dataTables_wrapper dt-bootstrap4 no-footer">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable"
                                    class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                    role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 68px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Nome</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 70px;"
                                                aria-label="Position: activate to sort column ascending">Depoimento</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 10px;"
                                                aria-label="Start date: activate to sort column ascending"></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">Everaldo Júnior</td>
                                            <td>Meu nome é Everaldo e eu moro em alfenas mas queria estar
                                                morando em alfenas onde posso comprar todos os alfenas de toda alfenas</td>
                                            <td>
                                                <div class="btn-group edit-table-button ">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="height: 34px!important;"><i
                                                            class="bx bx-edit"></i></button>
                                                    <div class="dropdown-menu" style="margin: 0px;">
                                                        <a class="dropdown-item" style="color: red" href="#">Excluir</a>
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


            {{-- <div class="card depoimentosVideo">
                <div class="card-body">
                    <h4 class="card-title">Cadastro de Depoimento <i> *Máximo de 6</i></h4>



                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Nome</label>
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Insira o nome">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="manufacturerbrand">URL Do Vídeo</label>
                                    <input class="form-control" type="url" placeholder="Insira a URL"
                                        id="example-url-input">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 70px;"
                                            aria-label="Position: activate to sort column ascending">URL</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 10px;"
                                            aria-label="Start date: activate to sort column ascending"></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Everaldo Júnior</td>
                                        <td>www.youtube.com/videolegalfenomenal
                                        <td>
                                            <div class="btn-group edit-table-button ">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="height: 34px!important;"><i class="bx bx-edit"></i></button>
                                                <div class="dropdown-menu" style="margin: 0px;">
                                                    <a class="dropdown-item" style="color: red" href="#">Excluir</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div> --}}


            <div class="card imagens">

                <div class="card-body row">
                    <h4 class="card-title">Foto Principal</h4>



                    <div class="col-12 mt-3">
                        <div class="row">

                            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                <picture
                                    style="height: 464px; max-width: 281px; overflow: hidden; display: flex; align-items:center; justify-content: center;">
                                    <img id="principal-preview" src="{{ asset('admin/images/thumb-padrao.png') }}"
                                        style="height: 100%;" alt="">
                                </picture>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <label class="btn btn-primary" for="principal-upload">Escolher</label>
                                <input name="principal" id="principal-upload" style="display: none;" type="file">
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-3">
                    <h4 class="card-title mb-3">Foto Principal *SEM FUNDO</h4>
                    <form action="https://themesbrand.com/" method="post" class="dropzone dz-clickable"
                        style="height: 600px !important; display: flex; align-items: center; justify-content: center;">
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                            </div>
                            <h4>Inserir imagem</h4>
                        </div>


                    </form>
                </div> --}}
                </div>


                <div class="card-body row">
                    <h4 class="card-title">Foto da segunda sessão</h4>



                    <div class="col-12 mt-3">
                        <div class="row">

                            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                <picture
                                    style="height: 281px; max-width: 281px; overflow: hidden; display: flex; align-items:center; justify-content: center;">
                                    <img id="principal-preview" src="{{ asset('admin/images/thumb-padrao.png') }}"
                                        style="height: 100%;" alt="">
                                </picture>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <label class="btn btn-primary" for="principal-upload">Escolher</label>
                                <input name="principal" id="principal-upload" style="display: none;" type="file">
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-3">
                    <h4 class="card-title mb-3">Foto Principal *SEM FUNDO</h4>
                    <form action="https://themesbrand.com/" method="post" class="dropzone dz-clickable"
                        style="height: 600px !important; display: flex; align-items: center; justify-content: center;">
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                            </div>
                            <h4>Inserir imagem</h4>
                        </div>


                    </form>
                </div> --}}
                </div>

                {{-- <div class="card-body">
                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable"
                            class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                            role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 68px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Nome</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 70px;"
                                        aria-label="Position: activate to sort column ascending">Depoimento</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 10px;"
                                        aria-label="Start date: activate to sort column ascending"></th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr class="odd">
                                    <td class="sorting_1 dtr-control">Everaldo Júnior</td>
                                    <td>Meu nome é Everaldo e eu moro em alfenas mas queria estar
                                        morando em alfenas onde posso comprar todos os alfenas de toda alfenas</td>
                                    <td>
                                        <div class="btn-group edit-table-button ">
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                style="height: 34px!important;"><i class="bx bx-edit"></i></button>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a class="dropdown-item" style="color: red" href="#">Excluir</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div> --}}
            </div>


            <div class="card duvidas">
                <div class="card-body">
                    <h4 class="card-title">Cadastro de Dúvidas</h4>



                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Dúvida</label>
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Insira o nome">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="manufacturerbrand">Resposta</label>
                                    <textarea id="textarea" class="form-control" maxlength="107" rows="3"
                                        placeholder="Limite de 107 Caracteres"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Módulo</th>
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
                                        <td class="sorting_1 dtr-control">Quem é Everaldo?</td>
                                        <td>Meu nome é Everaldo e eu moro em alfenas mas queria estar
                                            morando em alfenas onde posso comprar todos os alfenas de toda alfenas</td>
                                        <td>
                                            <div class="btn-group edit-table-button ">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="height: 34px!important;"><i class="bx bx-edit"></i></button>
                                                <div class="dropdown-menu" style="margin: 0px;">
                                                    <a class="dropdown-item" style="color: red" href="#">Excluir</a>
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
    </div>

    </div>



@endsection



<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Insira uma imagem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card-body container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img id="galeria-preview" src="{{ asset('admin/images/thumb-padrao.png') }}"
                                style="height: 200px; max-width: 100%;" alt="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <label class="btn btn-primary" for="galeria-upload">Escolher</label>
                            <label class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Fechar</label>
                            <input name="galeria" id="galeria-upload" style="display: none;" type="file">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script>
        var inp = document.getElementById('principal-upload');
        inp.addEventListener('change', function(e) {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('principal-preview').src = this.result;
            };
            reader.readAsDataURL(file);
        }, false);
        var inp = document.getElementById('parceiro-upload');
        inp.addEventListener('change', function(e) {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('parceiro-preview').src = this.result;
            };
            reader.readAsDataURL(file);
        }, false);
        var inp = document.getElementById('galeria-upload');
        inp.addEventListener('change', function(e) {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('galeria-preview').src = this.result;
            };
            reader.readAsDataURL(file);
        }, false);
        $('.filters span').click(function() {
            $('.card').hide();
            $(`.${$(this).data('filter')}`).show();
            $('.filters span').removeClass('active');
            $(this).addClass('active');
        })

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 600,
            });

            $('#select_tag').select2({});

            $('#select_hashtag').select2({});
        });
    </script>
@endsection