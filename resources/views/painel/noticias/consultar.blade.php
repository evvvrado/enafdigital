@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
    Blog / <a style="color: unset" href="{{ route('painel.noticias') }}">Noticias</a>
@endsection


@section('conteudo')

    <div class="row">
        <div class="col-9">

            <div class="row"">

                               
                    <div class=" col-sm-12 col-md-6 mb-3"
                style=" border-radius: 5px; background-color:var(--principal); width: 100%;">

                <a name="" id="button-add" class="btn" style="height: 100%; padding-left: 0;"
                    style="padding-left: 0;" href="{{ route('painel.noticia.cadastro') }} ">
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">T??tulo</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 70px;"
                                            aria-label="Position: activate to sort column ascending">Categoria</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 20px;"
                                            aria-label="Office: activate to sort column ascending">Autor</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;"
                                            aria-label="Age: activate to sort column ascending">Publicada</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 131px;"
                                            aria-label="Start date: activate to sort column ascending">Data</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 10px;"
                                            aria-label="Start date: activate to sort column ascending"></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($noticias as $noticia)
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">{{ $noticia->titulo }}</td>
                                            <td>{{ $noticia->categoria->nome }}</td>
                                            <td>{{ $noticia->autor }}</td>
                                            <td>{{ date('d/m/Y', strtotime($noticia->publicacao)) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($noticia->created_at)) }}</td>
                                            <td>
                                                <div class="btn-group edit-table-button ">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="bx bx-edit"></i></button>
                                                    <div class="dropdown-menu" style="margin: 0px;">
                                                        <a class="dropdown-item"
                                                            href="{{ route('painel.noticia.editar', ['noticia' => $noticia]) }}">Editar</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" style="color: red" href="{{route('painel.noticia.deletar', ['noticia' => $noticia])}}">Excluir</a>
                                                    </div>
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


        <div class="col-sm-12 col-md-6 mb-3" style=" border-radius: 5px; background-color:var(--principal); width: 100%;">
            <a class="btn" style="padding-left: 21px; color: white; height: 100%; cursor: default;"
                href="">Filtros</a>
        </div>
        <div class="card filter-body">
            <div class="card-body">

                <form id="form-filtro" action="{{route('painel.noticias')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo">T??tulo</label>
                        <input id="titulo" name="titulo" type="text" class="form-control" @if (isset($filtros) && isset($filtros['titulo'])) value="{{ $filtros['titulo'] }}" @endif>
                    </div>
                    <div class="mb-3">
                        <label class="control-label">Categoria</label>
                        <select class="form-control" name="categoria_id">
                            <option value="-1">Todas</option>
                            @foreach (\App\Models\Categoria::all() as $categoria)
                                <option value="{{ $categoria->id }}"  @if(isset($filtros) && isset($filtros["categoria_id"]) && $filtros["categoria_id"] == $categoria->id) selected @endif >{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="autor">Autor</label>
                        <input id="autor" name="autor" type="text" class="form-control" @if (isset($filtros) && isset($filtros['autor'])) value="{{ $filtros['autor'] }}" @endif>
                    </div>
                    <div class="mb-3">
                        <label for="publicacao">Data de Publica????o</label>
                        <input id="publicacao" name="publicacao" type="date" class="form-control" @if (isset($filtros) && isset($filtros['publicacao'])) value="{{ $filtros['publicacao'] }}" @endif>
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

@endsection


@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                language: {
                    "emptyTable": "Nenhum registro encontrado",
                    "info": "Mostrando de _START_ at?? _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 at?? 0 de 0 registros",
                    "infoFiltered": "(Filtrados de _MAX_ registros)",
                    "infoThousands": ".",
                    "loadingRecords": "Carregando...",
                    "processing": "Processando...",
                    "zeroRecords": "Nenhum registro encontrado",
                    "search": "",
                    "paginate": {
                        "next": "Pr??ximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "??ltimo"
                    },
                    "aria": {
                        "sortAscending": ": Ordenar colunas de forma ascendente",
                        "sortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        },
                        "1": "%d linha selecionada",
                        "_": "%d linhas selecionadas",
                        "cells": {
                            "1": "1 c??lula selecionada",
                            "_": "%d c??lulas selecionadas"
                        },
                        "columns": {
                            "1": "1 coluna selecionada",
                            "_": "%d colunas selecionadas"
                        }
                    },
                    "buttons": {
                        "copySuccess": {
                            "1": "Uma linha copiada com sucesso",
                            "_": "%d linhas copiadas com sucesso"
                        },
                        "collection": "Cole????o  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Visibilidade da Coluna",
                        "colvisRestore": "Restaurar Visibilidade",
                        "copy": "Copiar",
                        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a ??rea de transfer??ncia do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                        "copyTitle": "Copiar para a ??rea de Transfer??ncia",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todos os registros",
                            "1": "Mostrar 1 registro",
                            "_": "Mostrar %d registros"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Preencher todas as c??lulas com",
                        "fillHorizontal": "Preencher c??lulas horizontalmente",
                        "fillVertical": "Preencher c??lulas verticalmente"
                    },
                    "lengthMenu": "Exibir _MENU_ resultados por p??gina",
                    "searchBuilder": {
                        "add": "Adicionar Condi????o",
                        "button": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "clearAll": "Limpar Tudo",
                        "condition": "Condi????o",
                        "conditions": {
                            "date": {
                                "after": "Depois",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "not": "N??o",
                                "notBetween": "N??o Entre",
                                "notEmpty": "N??o Vazio"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "gt": "Maior Que",
                                "gte": "Maior ou Igual a",
                                "lt": "Menor Que",
                                "lte": "Menor ou Igual a",
                                "not": "N??o",
                                "notBetween": "N??o Entre",
                                "notEmpty": "N??o Vazio"
                            },
                            "string": {
                                "contains": "Cont??m",
                                "empty": "Vazio",
                                "endsWith": "Termina Com",
                                "equals": "Igual",
                                "not": "N??o",
                                "notEmpty": "N??o Vazio",
                                "startsWith": "Come??a Com"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Excluir regra de filtragem",
                        "logicAnd": "E",
                        "logicOr": "Ou",
                        "title": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Limpar Tudo",
                        "collapse": {
                            "0": "Pain??is de Pesquisa",
                            "_": "Pain??is de Pesquisa (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Nenhum Painel de Pesquisa",
                        "loadMessage": "Carregando Pain??is de Pesquisa...",
                        "title": "Filtros Ativos"
                    },
                    "searchPlaceholder": "Filtrar",
                    "thousands": "."
                }
            });

            $("#btn-filtrar").click(function(){
                $("#form-filtro").submit();
            });

            $("#btn-limpar").click(function(){
                $("input[type!='hidden']").val("");
                $("select").val("-1");
            });
        });

        $(document).ready(() => {

            $('div.dataTables_wrapper div.dataTables_filter label').prepend($('#search-icon'));
        })
    </script>
@endsection
