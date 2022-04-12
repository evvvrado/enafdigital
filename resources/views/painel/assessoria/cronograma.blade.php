@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
    Institucional / Assessoria / Cronograma
@endsection

@section('botoes')
@endsection



@section('conteudo')
    @livewire('cronograma.consultar.datatable')
    <!-- Modal -->
    <div class="modal fade" id="modalParceiro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Informações da Data</h5>
                    <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times text-white cpointer"></i>
                </div>
                <div class="modal-body bg-modal">
                    @livewire('cronograma.consultar.modal-cadastro')
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        window.addEventListener("abreModalCadastro", (event) => {
            $("#modalParceiro").modal("show");
        })
    </script>
@endsection
