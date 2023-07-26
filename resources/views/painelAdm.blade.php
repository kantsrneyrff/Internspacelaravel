@extends('layouts.template')


@section('title', 'Painel')

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
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Alunos/Horas
                                </div>
                                <div class="card-body" style="position: relative;">
                                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
                                        <p style="color: black; text-align: center; font-size: 44px; font-family: 'Montserrat';font-weight: bold;">EM CONSTRUÇÃO!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Horas/Setor
                                </div>
                                <div class="card-body" style="position: relative;">
                                    <canvas id="myPieChart" width="100%" height="40"></canvas>
                                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
                                        <p style="color: black; text-align: center; font-size: 44px; font-family: 'Montserrat';font-weight: bold;">EM CONSTRUÇÃO!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php /* <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Agendamentos para Confirmar
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Periodo</th>
                                        <th>Hotel</th>
                                        <th>Setor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($retorno) {
                                            foreach ($row as $registro) { ?>
                                                <tr>
                                                    <td><?= $registro->id ?></td>
                                                    <td><?= $registro->idAluno ?></td>
                                                    <td><?= $registro->data ?></td>
                                                    <td><?= $registro->periodo ?></td>
                                                    <td><?= $registro->idHotel ?></td>
                                                    <td><?= $registro->idSetor ?></td>
                                                </tr>
                                    <?php } } ?>
                                </tbody>        
                            </table>
                        </div>
                    </div> */ ?>
                </div>
            </main>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/js/chart-area-demo.js"></script>
    <script src="/js/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="/js/datatables-simple-demo.js"></script>
    <script src="/js/chart-pie-demo.js"></script>
    <script src="/js/painel.js"></script>
</body>



        @endsection