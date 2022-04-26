<div class="row mt-3">
    <div class="col-9">
        <div class="col-sm-12 col-md-6 mb-3  bg-primary" style=" border-radius: 5px; width: 100%;">
            <a class="btn"
                style="line-height: 29px;padding-left: 21px; color: white; height: 100%; cursor: default; "
                href="">Listagem</a>
        </div>
        <div class="card">
            <div class="card-body" style="overflow-x: scroll;">
                <table class="table table-bordered dt-responsive wrap w-100">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Identificador, Descrição</th>
                            <th>Válido para</th>
                            <th>Vigência</th>
                            <th>Quantidade</th>
                            <th>Desconto</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>


                    <tbody>

                        @foreach($cupons as $cupom)
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown mt-4 mt-sm-0">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-bars" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a name="" id="" class="dropdown-item" onclick="Livewire.emit('carregaModalEdicao', {{ $cupom->id }})" role="button"><i class="bx bx-edit-alt px-2"></i>Editar</a>
                                            <a name="" id="" class="dropdown-item" onclick="Livewire.emit('carregaModalCupomProdutos', {{ $cupom->id }})" role="button"> <i class="fas fa-list px-2"></i> Vigência</a>
                                            @if($cupom->estoque == $cupom->quantidade)
                                                <a name="" id="" class="dropdown-item" wire:click='remove_cupom({{ $cupom->id }})' role="button"> <i class="fas fa-times px-2"></i> Excluir</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ $cupom->codigo }} <br>
                                    {{ $cupom->descricao }}
                                </td>
                                <td style="vertical-align: middle;">
                                    @if($cupom->validade)
                                        {{ date("d/m/Y", strtotime($cupom->inicio)) }} até {{ date("d/m/Y", strtotime($cupom->fim)) }}
                                    @else
                                        Sem prazo de validade
                                    @endif
                                </td>
                                <td style="vertical-align: middle;">
                                    @if($cupom->cursos_presenciais == 1)
                                        Todos os cursos presenciais <br>
                                    @elseif($cupom->cursos_presenciais == 2)
                                        {{ $cupom->cupom_produtos->where("tipo", 0)->count() }} Cursos Presenciais <br>
                                    @endif

                                    @if($cupom->cursos_online == 1)
                                        Todos os cursos online<br>
                                    @elseif($cupom->cursos_online == 2)
                                        {{ $cupom->cupom_produtos->where("tipo", 1)->count() }} Cursos Online<br>
                                    @endif

                                    @if($cupom->eventos == 1)
                                        Todos os eventos
                                    @elseif($cupom->eventos == 2)
                                        {{ $cupom->cupom_produtos->where("tipo", 2)->count() }} Eventos
                                    @endif
                                </td>
                                <td style="vertical-align: middle;">{{ $cupom->estoque }} de {{ $cupom->quantidade }}</td>
                                <td style="vertical-align: middle;">
                                    @if($cupom->tipo == 0)
                                        {{ number_format($cupom->valor, 2, ",", ".") }}%
                                    @else
                                        R${{ number_format($cupom->valor, 2, ",", ".") }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row row-paginacao">
                    {{ $cupons->links() }}
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-3">

        <div class="col-sm-12 col-md-6 mb-3  bg-primary" style=" border-radius: 5px; width: 100%;">
            <a class="btn"
                style="line-height: 29px;padding-left: 21px; color: white; height: 100%; cursor: default; "
                href="">Filtros</a>
        </div>

        <div class="card filter-body">
            <div class="card-body">

                <form id="form-filtro" action="{{ route('painel.prospeccoes') }}" method="POST">
                    @csrf
                    {{-- <div class="mb-3">
                        <label for="filtro_status">Status</label>
                        <select id="filtro_status" name="filtro_status" class="form-control">
                            <option value="-1"> Todos</option>
                            @foreach(config("prospeccoes.status") as $key => $status)
                                <option value="{{ $key }}" @if(isset($filtros) && isset($filtros["filtro_status"]) && $filtros["filtro_status"] == $key) selected @endif>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="button-row">
                        <div class="row">
    
                            <div class="col">
                                <button type="submit" class="btn  btn-success waves-effect waves-light"
                                    style="width: 100%;">
                                    <i class="bx bx-check-double font-size-16  align-middle me-2"></i> Filtrar
                                </button>
    
                            </div>
    
                            <div class="col">
                                <button type="button" class="btn btn-danger  waves-effect waves-light"
                                    style="width: 100%;">
                                    <i class="bx bx-block font-size-16 align-middle me-2 "></i> Limpar
                                </button>
                            </div>
                        </div>
                    </div> --}}

                </form>

            </div>
        </div>
    </div>
</div> <!-- end row -->
