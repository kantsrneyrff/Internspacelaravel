@extends('layouts.template')

@section('title')
Olá, {{ auth()->user()->nome }}
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Status dos Agendamentos
            </div>
            <div class="card-body">
                <table id="tabela" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
        <!-- <div class="row">
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
        </div> -->
    </div>
</div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="/js/chart-bar-demo.js"></script>
<script src="/js/chart-pie-demo.js"></script>
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