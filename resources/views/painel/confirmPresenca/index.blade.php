@extends('layouts.template')

@section('title', 'Confirmar Presença')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-body">
                <table id="tabela" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Periodo</th>
                            <th>Local</th>
                            <th>Setor</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>{{$agendamento->id}}</td>
                            <td>{{$agendamento->aluno->nome}}</td>
                            <td>{{date('d/m/Y', strtotime($agendamento->data))}}</td>
                            <td>{{$agendamento->periodo->nome}}</td>
                            <td>{{$agendamento->local->nome}}</td>
                            <td>{{$agendamento->setor->nome}}</td>
                            <td class="d-flex">
                            <button type="button" agendamento="{{json_encode($agendamento)}}" onclick="Confirmar(<?php echo $agendamento->id ?>)" id="btnAprovar{{$agendamento->id}}" class="btn btn-success me-2"><i class="fa-solid fa-check"></i></button>
                            <button type="button" agendamento="{{json_encode($agendamento)}}" onclick="Recusar(<?php echo $agendamento->id ?>)" id="btnRecusar{{$agendamento->id}}" class="btn btn-danger"><i class="fa-solid fa-x"></i></button>

                            </td>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAprovado" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">
                        <p id="tituloModal">Confirmar Presença ?</p>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" onclick="$('#modalAprovado').modal('hide')" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="data">Data:</label>
                            <input type="text" class="form-control" id="data" disabled>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="periodo">Período:</label>
                            <input type="text" class="form-control" id="periodo" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="local">Local:</label>
                            <input type="text" class="form-control" id="local" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="setor">Setor:</label>
                            <input type="text" class="form-control" id="setor" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <form action="{{route('confirmPresenca-updatePresente')}}" id="formAprovar" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="id" name="id" hidden>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </form>
                    <button type="button" class="btn btn-secondary" onclick="$('#modalAprovado').modal('hide')">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRecusado" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">
                        <p id="tituloModal">Confirmar Ausencia</p>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" onclick="$('#modalRecusado').modal('hide')" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nomeR">Nome:</label>
                            <input type="text" class="form-control" id="nomeR" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="dataR">Data:</label>
                            <input type="text" class="form-control" id="dataR" disabled>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="periodoR">Período:</label>
                            <input type="text" class="form-control" id="periodoR" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="localR">Local:</label>
                            <input type="text" class="form-control" id="localR" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="setorR">Setor:</label>
                            <input type="text" class="form-control" id="setorR" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <form action="{{route('confirmPresenca-updateAusente')}}" id="formRecusar" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="idR" name="id" hidden>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                    <button type="button" class="btn btn-secondary" onclick="$('#modalRecusado').modal('hide')">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
function Confirmar(e) {
        $('#modalAprovado').modal('show')
        let agendamento = JSON.parse(document.getElementById('btnAprovar' + e).getAttribute('agendamento'));
        const id = agendamento.id;
        var data = agendamento.data;

        var partesData = data.split("-");
        var mes = partesData[1];
        var dia = partesData[2];
        var ano = partesData[0];
        var dataCerta = dia + "/" + mes + "/" + ano;

        document.querySelector('#id').value = id;
        document.querySelector('#nome').value = agendamento.aluno.nome;
        document.querySelector('#data').value = dataCerta;
        document.querySelector('#periodo').value = agendamento.periodo.nome;
        document.querySelector('#local').value = agendamento.local.nome;
        document.querySelector('#setor').value = agendamento.setor.nome;

        const formulario = document.querySelector('#formAprovar');
        formulario.action = formulario.action.replace('ID', id);
    }

    function Recusar(e) {
        $('#modalRecusado').modal('show')
        let agendamento = JSON.parse(document.getElementById('btnRecusar' + e).getAttribute('agendamento'));
        const id = agendamento.id;
        var data = agendamento.data;

        var partesData = data.split("-");
        var mes = partesData[1];
        var dia = partesData[2];
        var ano = partesData[0];
        var dataCerta = dia + "/" + mes + "/" + ano;

        document.querySelector('#idR').value = id;
        document.querySelector('#nomeR').value = agendamento.aluno.nome;
        document.querySelector('#dataR').value = dataCerta;
        document.querySelector('#periodoR').value = agendamento.periodo.nome;
        document.querySelector('#localR').value = agendamento.local.nome;
        document.querySelector('#setorR').value = agendamento.setor.nome;

        const formulario = document.querySelector('#formRecusar');
        formulario.action = formulario.action.replace('ID', id);
    }
</script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
            },

        });
    });
</script>
@endsection