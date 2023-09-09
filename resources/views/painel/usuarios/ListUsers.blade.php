@extends('layouts.template')

@section('title', 'Pesquisar Usuário')

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
                            <th>CPF</th>
                            <th>Data Nasc.</th>
                            <th>Cidade </th>
                            <th>Cargo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->nome}}</td>
                            <td>{{$usuario->cpf}}</td>
                            <td>{{date('d/m/Y', strtotime($usuario->dataNascimento))}}</td>
                            <td>{{$usuario->cidade}}</td>
                            <td>
                                @if($usuario->cargo === 'adm')
                                Administrador(a)
                                @elseif($usuario->cargo === 'prof')
                                Orientador(a)
                                @else
                                Aluno(a)
                                @endif
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