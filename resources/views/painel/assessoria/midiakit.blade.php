@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
    Institucional / Assessoria / Midia Kit
@endsection

@section('botoes')
@endsection



@section('conteudo')
    @livewire('midiakits.consultar.datatable')
    <!-- Modal -->
    <div class="modal fade" id="modalParceiro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Informações do Documento</h5>
                    <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times text-white cpointer"></i>
                </div>
                <div class="modal-body bg-modal">
                    @livewire('midiakits.consultar.modal-cadastro')
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        window.addEventListener("abreModalParceiros", (event) => {
            $("#modalParceiro").modal("show");
        })

        window.addEventListener("fechaModalParceiros", (event) => {
            $("#modalParceiro").modal("hide");
        })
    </script>
@endsection
