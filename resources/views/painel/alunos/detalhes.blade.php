@extends('painel.template.main')

@section('styles')
<!-- DataTables -->
<link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
Projeto / <a style="color: unset" href="{{route('painel.alunos')}}">Alunos</a> / Detalhes
@endsection

@section('botoes')
@endsection

@section('conteudo')
<div class="row">

    <div class="col-sm-12 col-md-6 mb-3" style=" border-radius: 5px; background-color:var(--principal); width: 100%;">

        <a name="" id="button-add" class="btn" style="float: right;" href="{{ route('painel.alunos') }}">
            Voltar
        </a>

    </div>

    <div class="col-12">

        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Foto do Aluno</h4>
                        <div class=" mt-5">
                            <div class="row flex align-items-center justify-content-center pb-4">
                                <div class="col-sm-9">
                                    <div class="avatar-md profile-user-wid mb-4" style="margin-left: 0; height: 250px; width: 250px;">
                                        <img src="{{ asset(($aluno->avatar) ? $aluno->avatar : 'admin/images/padrao.png') }}" alt="" class="img-thumbnail rounded-circle" style="object-fit: cover; height: 100%; width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-9">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Informações sobre o Aluno</h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0" style="vertical-align: middle">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nome Completo :</th>
                                        <td>{{ $aluno->nome }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">E-mail :</th>
                                        <td>{{ $aluno->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">CPF :</th>
                                        <td>{{ $aluno->cpf }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telefone :</th>
                                        <td>{{ $aluno->telefone }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Endereço :</th>
                                        <td>{{ "$aluno->rua, $aluno->numero - $aluno->bairro - $aluno->cidade/$aluno->estado - $aluno->cep"}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Data de Nascimento :</th>
                                        <td>{{ date("d/m/Y", strtotime($aluno->nascimento)) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Último Acesso :</th>
                                        <td>{{ date("d/m/Y", strtotime($aluno->ultimo_acesso)) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Senha :</th>
                                        <td><a name="" id="" class="btn btn-danger" href="{{ route('painel.alunos.senha.resetar', ['aluno' => $aluno]) }}" role="button">Resetar</a></td>
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