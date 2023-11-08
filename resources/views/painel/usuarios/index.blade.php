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
                            <th>Ações</th>
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
                            <td class="d-flex">
                                <a href="{{ route('usuarios-edit', ['id'=>$usuario->id]) }}" class="btn btn-primary me-2"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                                <button type="button" usuario="{{json_encode($usuario)}}" onclick="mostrarExcluir(<?php echo $usuario->id ?>)" id="btnExcluir{{$usuario->id}}" class="btn btn-danger">Desativar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">
                    <p id="tituloModal">Desativar Usuário?</p>
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" onclick="$('#modal').modal('hide')" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" disabled>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="dataNascimento">Data Nasc.</label>
                        <input type="text" class="form-control" id="dataNascimento" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cargo">Cargo:</label>
                        <input type="text" class="form-control" id="cargo" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="modalFooter">
                <form action="{{route('usuarios-destroy', ['id'=>'ID'])}}" id="formExcluir" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Desativar</button>
                </form>
                <button type="button" class="btn btn-secondary" onclick="$('#modal').modal('hide')">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    function mostrarExcluir(e) {
        $('#modal').modal('show')
        let usuario = JSON.parse(document.getElementById('btnExcluir' + e).getAttribute('usuario'));
        const id = usuario.id;
        var data = usuario.dataNascimento;

        var partesData = data.split("-");
        var mes = partesData[1];
        var dia = partesData[2];
        var ano = partesData[0];
        var dataCerta = dia + "/" + mes + "/" + ano;

        if (usuario.cargo == 'aluno') {
            usuario.cargo = 'Aluno(a)';
        } else if (usuario.cargo == 'adm') {
            usuario.cargo = 'Administrador(a)';
        } else {
            usuario.cargo = 'Orientador(a)';
        }

        document.querySelector('#nome').value = usuario.nome;
        document.querySelector('#cpf').value = usuario.cpf;
        document.querySelector('#dataNascimento').value = dataCerta;
        document.querySelector('#cargo').value = usuario.cargo;

        const formulario = document.querySelector('#formExcluir');
        formulario.action = formulario.action.replace('ID', id);
    }
</script>
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