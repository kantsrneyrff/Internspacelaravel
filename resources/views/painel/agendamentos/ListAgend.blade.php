@extends('layouts.template')

@section('title', 'Pesquisar Agendamentos')

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
                            <th>Período</th>
                            <th>Local</th>
                            <th>Setor</th>
                            <th>Status Aluno</th>
                            <th>Status</th>
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
                            <td>
                                @switch($agendamento->statusAluno)
                                @case('A')
                                <span class="badge text-bg-danger">Ausente</span>
                                @break

                                @case('P')
                                <span class="badge text-bg-success">Presente</span>
                                @break

                                @case('AA')
                                <span class="badge text-bg-primary">Pendente</span>
                                @break

                                @case('C')
                                <span class="badge text-bg-secondary">Agend. Recusado</span>
                                @break
                                @endswitch
                            </td>
                            <td>
                                @switch($agendamento->status)
                                @case('A')
                                <span class="badge text-bg-primary">Análise</span>
                                @break

                                @case('L')
                                <span class="badge text-bg-success">Aprovado</span>
                                @break

                                @case('C')
                                <span class="badge text-bg-secondary">Concluído</span>
                                @break

                                @case('R')
                                <span class="badge text-bg-danger">Recusado</span>
                                @break

                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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