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
                            <th>Cpf</th>
                            <th>Data de nascimento</th>
                            <th>Cidade </th>
                            <th>Cargo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir?</h5>
                <button type="button" class="btn btn-secondary close" onclick="$('#modalExcluir').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    Deseja realmente excluir este usuário ?<br><br>

                    <input type="hidden" name="id" id="id">
                    <strong>Nome: </strong><input type="text" id="nome" disabled=""><br>
                    <strong>CPF: </strong><input type="text" id="cpf" disabled=""><br>
                    <strong>Cidade: </strong><input type="text" id="cidade" disabled=""><br>
                    <strong>Cargo: </strong><input type="text" id="cargo" disabled=""><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#modalExcluir').modal('hide')">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function mostrarExcluir(e) {
        var linha = $(e).closest("tr");

        var id = linha.find("td:eq(0)").text().trim();
        var nome = linha.find("td:eq(1)").text().trim();
        var cpf = linha.find("td:eq(2)").text().trim();
        var cidade = linha.find("td:eq(4)").text().trim();
        var cargo = linha.find("td:eq(5)").text().trim();

        $("#id").val(id);
        $("#nome").val(nome);
        $("#cpf").val(cpf);
        $("#cidade").val(cidade);
        $("#cargo").val(cargo);

        $(document).ready(function() {
            $('#modalExcluir').modal('show');
        });
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
@endsection