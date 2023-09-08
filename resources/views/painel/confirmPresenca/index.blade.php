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
                                <a href="" class="btn btn-success me-2"><i class="fa-solid fa-check"></i></a>
                                <a href="" class="btn btn-danger me-3"><i class="fa-solid fa-x"></i></a>
                            </td>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">
                        <p id="tituloModal">Confirmar Presença</p>
                    </h5>
                    <button type="button" class="close btn btn-secondary" data-dismiss="modal" onclick="$('#modal').modal('hide')" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="cpf">Data</label>
                            <input type="text" class="form-control" id="cpf" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="dataNascimento">Local</label>
                            <input type="text" class="form-control" id="dataNascimento" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cargo">Periodo</label>
                            <input type="text" class="form-control" id="cargo" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cargo">Setor</label>
                            <input type="text" class="form-control" id="cargo" disabled>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer" id="modalFooter">
                    <form action="{{route('usuarios-destroy', ['id'=>'ID'])}}" id="formExcluir" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                <button type="button" class="btn btn-secondary" onclick="$('#modal').modal('hide')">Cancelar</button>
            </div> --}}
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')
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