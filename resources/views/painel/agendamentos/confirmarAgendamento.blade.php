@extends('layouts.template')


@section('title', 'Confirmar Aegndamento')

@section('content')

<!---- css necessario para a pagina ---->

<body class="sb-nav-fixed">

    <!--NAV -->
    @component('components.nav')
    @endcomponent

    <!---Linha importante abaixo-->
    <div id="layoutSidenav">
        <!---------------SIDE---------------->
        @component('components.sidebarUsuario')
        @endcomponent

        <!--------------SIDE----------------->
      
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Aprovar/Recusar Agendamento</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="painelAdm">Dashboard</a></li>
                        <li class="breadcrumb-item active">Aprovar/Recusar Agendamento</li>
                    </ol>
                    <div class="card-color">
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Data</th>
                                            <th>Período</th>
                                            <th>Local</th>
                                            <th>Setor</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                                <tr>
                                                    <td> $registro->id     </td>
                                                    <td> $registro->idAluno</td>
                                                    <td> $registro->data   </td>
                                                    <td> $registro->periodo</td>
                                                    <td> $registro->idHotel</td>
                                                    <td> $registro->idSetor</td>
                                                    <td> $registro->status </td>
                                                    <td>
                                                        <div class="w-100 align-items-center justify-items-center"><button type="button" class="btn btn-success" onclick="mostrarConfirmar(this)">Confirmar</button><button type="button" class="btn btn-danger" onclick="mostrarRecusar(this)">Recusar</button></div>
                                                    </td>
                                                </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <style>

    </style>
    <!-- Modal -->
    <div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar?</h5>
                    <button type="button" class="btn btn-secondary close" onclick="$('#modalConfirmar').modal('hide')" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        Deseja confirmar o Agendamento com estas opções?<br><br>

                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="acao" value="1">
                        <strong> Nome: </strong><input type="text" id="nome" disabled=""><br>
                        <strong>Data </strong><input type="text" id="data" disabled=""><br>
                        <strong>Período: </strong><input type="text" id="periodo" disabled=""><br>
                        <strong>Local: </strong><input type="text" id="local" disabled=""><br>
                        <strong>Setor: </strong><input type="text" id="setor" disabled="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#modalConfirmar').modal('hide')">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalRecusar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar?</h5>
                    <button type="button" class="btn btn-secondary close" onclick="$('#modalRecusar').modal('hide')" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        Deseja recusar o Agendamento com estas opções?<br><br>

                        <input type="hidden" name="id" id="idR">
                        <input type="hidden" name="acao">
                        <strong> Nome: </strong><input type="text" id="nomeR" disabled=""><br>
                        <strong>Data </strong><input type="text" id="dataR" disabled=""><br>
                        <strong>Período: </strong><input type="text" id="periodoR" disabled=""><br>
                        <strong>Local: </strong><input type="text" id="localR" disabled=""><br>
                        <strong>Setor: </strong><input type="text" id="setorR" disabled="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#modalRecusar').modal('hide')">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Recusar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function mostrarConfirmar(e) {
            var linha = $(e).closest("tr");

            var id = linha.find("td:eq(0)").text().trim();
            var nome = linha.find("td:eq(1)").text().trim();
            var data = linha.find("td:eq(2)").text().trim();
            var periodo = linha.find("td:eq(3)").text().trim();
            var local = linha.find("td:eq(4)").text().trim();
            var setor = linha.find("td:eq(5)").text().trim();

            $("#id").val(id);
            $("#nome").val(nome);
            $("#data").val(data);
            $("#periodo").val(periodo);
            $("#local").val(local);
            $("#setor").val(setor);

            $(document).ready(function() {
                $('#modalConfirmar').modal('show');
            });
        }

        function mostrarRecusar(e) {
            var linha = $(e).closest("tr");

            var id = linha.find("td:eq(0)").text().trim();
            var nome = linha.find("td:eq(1)").text().trim();
            var data = linha.find("td:eq(2)").text().trim();
            var periodo = linha.find("td:eq(3)").text().trim();
            var local = linha.find("td:eq(4)").text().trim();
            var setor = linha.find("td:eq(5)").text().trim();

            $("#idR").val(id);
            $("#nomeR").val(nome);
            $("#dataR").val(data);
            $("#periodoR").val(periodo);
            $("#localR").val(local);
            $("#setorR").val(setor);
            $("#acaoR").val(2);

            $(document).ready(function() {
                $('#modalRecusar').modal('show');
            });
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="/js/datatables-simple-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>

</body>

</html>


@endsection