@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
    Catalogo / Expositores
@endsection

@section('botoes')
@endsection

@section('conteudo')

    <div class="row">
        <div class="col-9">

            <div class="row"">

                                       
                            <div class="   col-sm-12 col-md-6 mb-3"
                style=" border-radius: 5px; background-color:var(--principal); width: 100%;">

                <a name="" id="button-add" class="btn" style="height: 100%; padding-left: 0;"
                    style="padding-left: 0;" href="{{ route('painel.expositores.cadastro') }}">
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
                                            aria-label="Name: activate to sort column descending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 70px;"
                                            aria-label="Position: activate to sort column ascending">Site</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 20px;"
                                            aria-label="Office: activate to sort column ascending">Telefone</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 68px;"
                                            aria-label="Age: activate to sort column ascending">E-mail</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 10px;"
                                            aria-label="Start date: activate to sort column ascending"></th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 10px;"
                                            aria-label="Start date: activate to sort column ascending"></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($expositores as $expositor)
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">{{ $expositor->nome }}</td>
                                            <td>{{ $expositor->site }}</td>
                                            <td>{{ $expositor->telefone }}</td>
                                            <td>{{ $expositor->email }}</td>
                                            <td class="text-center">
                                                @if($expositor->destaque) 
                                                    <i class="fas fa-star active destaque cpointer" onclick="destaque({{ $expositor->id }}, this)"></i>
                                                @else
                                                    <i class="far fa-star destaque cpointer" onclick="destaque({{ $expositor->id }}, this)"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group edit-table-button ">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="bx bx-edit"></i></button>
                                                    <div class="dropdown-menu" style="margin: 0px;">
                                                        <a class="dropdown-item"
                                                            href="{{ route('painel.expositores.editar', ['expositor' => $expositor]) }}">Editar</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('painel.expositores.hotsite', ['expositor' => $expositor]) }}">Hotsite</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{ route('painel.expositores.deletar', ['expositor' => $expositor]) }}" style="color: red" >Excluir</a>
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

                <form id="form-filtro" action="{{ route('painel.expositores') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nome">Nome</label>
                        <input id="nome" name="nome" type="text" placeholder="Insira o Nome" class="form-control"
                            maxlength="100" @if (isset($filtros) && isset($filtros['nome'])) value="{{ $filtros['nome'] }}" @endif>
                    </div>
                    <div class="mb-3">
                        <label for="telefone">Telefone</label>
                        <input class="form-control" name="telefone" type="tel" placeholder="Insira o telefone"
                            id="example-tel-input" maxlength="20" @if (isset($filtros) && isset($filtros['telefone'])) value="{{ $filtros['telefone'] }}" @endif>
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" name="categoria" required>
                            <option value="-1">Todas</option>
                            @foreach (config('expositores.categorias_nome') as $codigo => $categoria)
                                <option value="{{ $codigo }}" @if (isset($filtros) && isset($filtros['categoria']) && $filtros['categoria'] == $codigo) selected @endif>{{ $categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="site">Site</label>
                        <input class="form-control" name="site" type="url" placeholder="Insira a URL"
                            id="example-url-input" maxlength="255" @if (isset($filtros) && isset($filtros['site'])) value="{{ $filtros['site'] }}" @endif>
                    </div>
                    <div class="mb-3">
                        <label for="email">E-mail</label>
                        <input class="form-control" name="email" type="email" placeholder="Insira o e-mail"
                            id="example-email-input" maxlength="100" @if (isset($filtros) && isset($filtros['email'])) value="{{ $filtros['email'] }}" @endif>
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
        function destaque(pid, element){
            var elem = $(element);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/sistema/expositores/destaque/" + pid,
                // beforeSend: function() {
                //     $("#botoes-prosseguir").hide();
                //     $("#gif-ajax-direto").show();
                // },
                success: function(ret) {
                    if(ret == "retirado"){
                        elem.removeClass("fas");
                        elem.addClass("far");
                        elem.removeClass("active");
                    }else if(ret == "destacado"){
                        elem.removeClass("far");
                        elem.addClass("fas");
                        elem.addClass("active");
                    }
                    
                },
                error: function(ret) {
                    console.log("Deu muito ruim");
                    console.log(ret);
                }
            });
        }

        $(document).ready(function() {
            $('#datatable').DataTable({
                language: {
                    "emptyTable": "Nenhum registro encontrado",
                    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "infoFiltered": "(Filtrados de _MAX_ registros)",
                    "infoThousands": ".",
                    "loadingRecords": "Carregando...",
                    "processing": "Processando...",
                    "zeroRecords": "Nenhum registro encontrado",
                    "search": "",
                    "paginate": {
                        "next": "Próximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "Último"
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
                            "1": "1 célula selecionada",
                            "_": "%d células selecionadas"
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
                        "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Visibilidade da Coluna",
                        "colvisRestore": "Restaurar Visibilidade",
                        "copy": "Copiar",
                        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                        "copyTitle": "Copiar para a Área de Transferência",
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
                        "fill": "Preencher todas as células com",
                        "fillHorizontal": "Preencher células horizontalmente",
                        "fillVertical": "Preencher células verticalmente"
                    },
                    "lengthMenu": "Exibir _MENU_ resultados por página",
                    "searchBuilder": {
                        "add": "Adicionar Condição",
                        "button": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "clearAll": "Limpar Tudo",
                        "condition": "Condição",
                        "conditions": {
                            "date": {
                                "after": "Depois",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "gt": "Maior Que",
                                "gte": "Maior ou Igual a",
                                "lt": "Menor Que",
                                "lte": "Menor ou Igual a",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "string": {
                                "contains": "Contém",
                                "empty": "Vazio",
                                "endsWith": "Termina Com",
                                "equals": "Igual",
                                "not": "Não",
                                "notEmpty": "Não Vazio",
                                "startsWith": "Começa Com"
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
                            "0": "Painéis de Pesquisa",
                            "_": "Painéis de Pesquisa (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Nenhum Painel de Pesquisa",
                        "loadMessage": "Carregando Painéis de Pesquisa...",
                        "title": "Filtros Ativos"
                    },
                    "searchPlaceholder": "Filtrar",
                    "thousands": "."
                }
            });

            $("#btn-filtrar").click(function() {
                $("#form-filtro").submit();
            });

            $("#btn-limpar").click(function() {
                $("input[type!='hidden']").val("");
                $("select").val("-1");
            });
        });

        $(document).ready(() => {

            $('div.dataTables_wrapper div.dataTables_filter label').prepend($('#search-icon'));

            // $(".destaque").click(function(){
            //     var pid = $(this).attr("pid");
            //     var elem = $(this);

                
            // }); 
        })
    </script>
@endsection
