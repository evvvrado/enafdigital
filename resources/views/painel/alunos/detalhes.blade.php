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
                                        <img src="{{ asset('admin/images/padrao.png') }}" alt="" class="img-thumbnail rounded-circle" style="object-fit: cover; height: 100%; width: 100%">
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
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nome Completo :</th>
                                        <td>Cynthia Price</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">E-mail :</th>
                                        <td>contato@email.gmail</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">CPF :</th>
                                        <td>154.828.816-01</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telefone :</th>
                                        <td>(35) 9 88090305</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Endereço :</th>
                                        <td>Alfenas Minas Gerais</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Endereço :</th>
                                        <td>Alfenas Minas Gerais</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Endereço :</th>
                                        <td>Alfenas Minas Gerais</td>
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