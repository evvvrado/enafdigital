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

        .card:not(.curso) {
            display: none;
        }

    </style>
@endsection

@section('titulo')
    Projetos / <a style="color: unset" href="{{ route('painel.cursos') }}">Cursos</a> / Cadastrar
@endsection

@section('conteudo')


    <div class="filters">
        <span data-filter="curso" class="active">Curso</span>
        <span data-filter="modulos">Modulos</span>
        <span data-filter="depoimentos">Depoimentos</span>
    </div>


    @include('painel.includes.errors')
    <div class="row">
        <div class="col-12">
            <div class="card curso">
                <div class="card-body">
                    <h4 class="card-title">Cadastro de Cursos</h4>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Nome</label>
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Insira o nome">
                                </div>
                                <div class="mb-3">
                                    <label for="price">Valor do Curso</label>
                                    <input id="price" name="price" type="tel" class="form-control"
                                        placeholder="Insira o valor">
                                </div>
                                <div class="mb-3">
                                    <label for="price">Total de Horas</label>
                                    <input id="price" name="price" type="tel" class="form-control"
                                        placeholder="Insira o total">
                                </div>
                                <div class="mb-3">
                                    <label for="price">URL Do Vídeo</label>
                                    <input id="price" name="price" type="tel" class="form-control"
                                        placeholder="youtu.be/linkdovideo">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="control-label">Professores</label>
                                    <select class="form-control">
                                        <option data-select2-id="3">Selecione os Professore</option>
                                        <option value="FA">Empresa 1</option>
                                        <option value="EL">Empresa 2</option>
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label class="control-label">Tipo de Curso</label>
                                    <select class="form-control">
                                        <option data-select2-id="3">Selecione o tipo</option>
                                        <option value="FA">EAD</option>
                                        <option value="EL">ONLINE</option>
                                        <option value="EL">PRESENCIAL</option>
                                    </select>
                                </div>



                                <div class="mb-3 ">
                                    <label for="productdesc">Certificado</label>
                                    <div class="form-check form-switch form-switch-lg pt-3 ">
                                        <input class="form-check-input form-control" type="checkbox" id="SwitchCheckSizelg"
                                            checked="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Salvar</button>
                            <button type="button" class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                        </div>
                    </form>
                </div>

                <div class="card-body row" id="logo-upload">
                    <div class="card-body col-2">
                        <h4 class="card-title mb-3">Thumbnail</h4>
                        <form action="https://themesbrand.com/" method="post" class="dropzone dz-clickable"
                            style="max-width: 335px; height:
                                                                                                                                                                                                                                                                                                                                                204px;">
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>Inserir imagem</h4>
                            </div>
                        </form>
                    </div>

                    <div class="card-body col-8">
                        <h4 class="card-title mb-3">Banner</h4>
                        <form action="https://themesbrand.com/" method="post" class="dropzone dz-clickable">
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>Inserir imagem</h4>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card modulos">
                <div class="card-body">
                    <h4 class="card-title">Cadastro de Módulo</h4>



                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="productname">Nome do Módulo</label>
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Insira o nome">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="manufacturerbrand">Descrição</label>
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
                                        <td class="sorting_1 dtr-control">Módulo 01</td>
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




        <div class="card depoimentos">
            <div class="card-body">
                <h4 class="card-title">Cadastro de Depoimento <i> *Máximo de 4</i></h4>



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
                                <label for="manufacturerbrand">Depoimento</label>
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
            <div class="card-body col-12">
                <h4 class="card-title mb-3">Foto do Depoimento</h4>
                <form action="https://themesbrand.com/" method="post" class="dropzone dz-clickable">
                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>
                        <h4>Inserir imagem</h4>
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



        </div>

    </div>





    <!-- end card-->
    {{-- <div class="card">
          <div class="card-body">
             <h4 class="card-title">Meta Data</h4>
             <p class="card-title-desc">Fill all information below</p>
             <form>
                <div class="row">
                   <div class="col-sm-6">
                      <div class="mb-3">
                         <label for="metatitle">Meta title</label>
                         <input id="metatitle" name="productname" type="text" class="form-control">
                      </div>
                      <div class="mb-3">
                         <label for="metakeywords">Meta Keywords</label>
                         <input id="metakeywords" name="manufacturername" type="text" class="form-control">
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <div class="mb-3">
                         <label for="metadescription">Meta Description</label>
                         <textarea class="form-control" id="metadescription" rows="5"></textarea>
                      </div>
                   </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                   <button type="submit" class="btn btn-primary waves-effect waves-light">Salvar</button>
                   <button type="submit" class="btn btn-secondary waves-effect waves-light">Cencelar</button>
                </div>
             </form>
          </div>
       </div> --}}


    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 600,
            });

            $('#select_tag').select2({});

            $('#select_hashtag').select2({});
        });


        $('.filters span').click(function() {
            $('.card').hide();
            $(`.${$(this).data('filter')}`).show();
            $('.filters span').removeClass('active');
            $(this).addClass('active');
        })
    </script>
@endsection
