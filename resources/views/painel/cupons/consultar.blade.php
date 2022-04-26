@extends('painel.template.main')

@section('styles')
    
@endsection

@section('titulo')
    Cupons
@endsection

@section('botoes')
    <a name="" id="" class="btn btn-success" onclick="Livewire.emit('carregaModalCadastro')" role="button">Novo Cupom</a>
@endsection

@section('conteudo')
    @livewire('cupons.consultar.datatable')

    @livewire('cupons.consultar.modal-cadastro')
    @livewire('cupons.consultar.modal-produtos')
@endsection

@section('scripts')
    
@endsection