@extends('layouts.template')


@section('title', 'Pesquisar Usuário ')

@section('content')

<!---- css necessario para a pagina ---->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src=" /js/datatables-simple-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>

<body class="sb-nav-fixed">

    <!--NAV -->
    @component('components.nav')
    @endcomponent

    <!---Linha importante abaixo-->
    <div id="layoutSidenav">
        <!---------------SIDE---------------->
        @component('components.sidebarUsuario')
        @endcomponent
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pesquisar Usuário</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="painelAdm">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pesquisar Usuário</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
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
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Cpf</th>
                                        <th>Data de nascimento</th>
                                        <th>Cidade </th>
                                        <th>Cargo</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </main>
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
</body>




        @endsection