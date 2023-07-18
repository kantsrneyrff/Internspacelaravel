@extends('layouts.header')
@extends('layouts.sidebarUsuario')
@extends('layouts.nav')

@section('title', 'Painel')

@section('content')

    <!DOCTYPE html>
    <html lang="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <body class="sb-nav-fixed">
        
        <!--NAV -->
    @section('navbar')
    @endsection

        <!---Linha importante abaixo-->
        <div id="layoutSidenav">
            <!---------------SIDE---------------->
           @section('sidebarUsuario')
           @endsection
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Status dos Agendamentos
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>Período</th>
                                            <th>Local</th>
                                            <th>Setor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Horas/Setor
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
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/js/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="/js/datatables-simple-demo.js"></script>
        <script src="/js/chart-pie-demo.js"></script>

        <script>
            /* governanca = <?php //echo $dataGraficos['horas'] 
                            ?>
            console.log(governanca)*/
        </script>
    </body>
    <?php /*$this->view('includes/footer');*/ ?>
    </html>
@endsection
