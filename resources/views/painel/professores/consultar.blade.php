@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Projeto / <a style="color: unset" href="{{route('painel.professores')}}">Professores</a>
@endsection

@section('botoes')
@endsection


{{-- 
@section('conteudo')
    @include('painel.includes.errors')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach($categorias as $categoria)
                                <tr>
                                    <td>{{$categoria->nome}}</td>
                                    <td>
                                        <a href="" id="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditaCategoria{{$categoria->id}}" role="button">Editar</a>
                                        <a name="" id="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluiCategoria{{$categoria->id}}" role="button">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    <div class="modal fade" id="modalNovaCategoria" tabindex="-1" role="dialog" aria-labelledby="modalNovaCategoriaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('painel.categoria.cadastrar')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome"
                                    id="nome" aria-describedby="helpId" 
                                >
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <button type="submit"
                                    class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach($categorias as $categoria)
        <div class="modal fade" id="modalEditaCategoria{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaCategoria{{$categoria->id}}Label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{route('painel.categoria.salvar', ['categoria' => $categoria])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome"
                                        id="nome" aria-describedby="helpId" 
                                        value="{{$categoria->nome}}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-end">
                                    <button type="submit"
                                        class="btn btn-primary">Salvar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalExcluiCategoria{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="modalExcluiCategoria{{$categoria->id}}Label"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5>Ao excluir a categoria "{{$categoria->nome}}" todas as notícias relacionadas a ela também serão excluídas. Deseja continuar ?</h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <a name="" id="" class="btn btn-danger" href="{{route('painel.categoria.deletar', ['categoria' => $categoria])}}" role="button">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection --}}



@section('conteudo')

    <div class="row">
        <div class="col-9">
            
            <div class="row"">

                           
                <div class="col-sm-12 col-md-6 mb-3"  style=" border-radius: 5px; background-color:var(--principal); width: 100%;">
                    
                 <a name="" id="button-add" class="btn" style="height: 100%; padding-left: 0;" style="padding-left: 0;" href="{{route('painel.professores.cadastrar')}}">
                    <i class="bx bx-plus" aria-hidden="true"></i> Adicionar</a>
             </div>
            <div class="card">
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                           
                           <i id="search-icon" class="bx bx-search" aria-hidden="true"></i>
                           
                        </div>
                        <div class="row">
                        <div class="col-sm-12">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable_info" style="width: 1185px;">
                        <thead>
                           <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 68px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nome</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 70px;" aria-label="Position: activate to sort column ascending">Empresa</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 20px;" aria-label="Office: activate to sort column ascending">Atuação</th>    
                              <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10px;" aria-label="Start date: activate to sort column ascending"></th>
                           </tr>
                        </thead>


                        <tbody>    
                            <tr class="odd">
                                <td class="sorting_1 dtr-control">Paulo Guerra</td>
                                <td>Rihappy</td>
                                <td>Crosstraining</td>
                                <td>
                                     <div class="btn-group edit-table-button ">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-edit"></i></button>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a class="dropdown-item" href="{{ route('painel.professores.editar') }}">Editar</a>
                                            <a class="dropdown-item" href="{{ route('painel.professores.hotsite') }}">Hotsite</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" style="color: red" href="#">Excluir</a>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr> 
                        </tbody>
                    </table>
                </div></div>


          
                </div>

                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-3">

                           
            <div class="col-sm-12 col-md-6 mb-3"  style=" border-radius: 5px; background-color:var(--principal); width: 100%;">
                <a class="btn" style="padding-left: 21px; color: white; height: 100%; cursor: default;"  href="">Filtros</a>
            </div> <div class="card filter-body">
                <div class="card-body">

                  <form action="javascript: void(0);">
                      
                  </form>



                   <div class="buttons-row">
                       <div>
                        <button type="button" class="btn btn-success waves-effect waves-light">
                            <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Filtrar
                        </button>
                       </div>
                       <div>
                        <button type="button" class="btn btn-danger waves-effect waves-light">
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
    <script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                language:{
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
            } );
        } );    

        $(document).ready(() => {
            
        $('div.dataTables_wrapper div.dataTables_filter label').prepend($('#search-icon'));
        })
    </script> 
@endsection