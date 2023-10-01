@extends('layouts.template')

@section('title')
    Olá, {{ auth()->user()->nome }}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Horas/Setor
                </div>
                <div class="card-body" style="position: relative;">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                    <div
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
                        <p
                            style="color: black; text-align: center; font-size: 44px; font-family: 'Montserrat';font-weight: bold;">
                            EM MANUTENÇÃO!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Agendamentos/Setor
                </div>
                <div class="card-body" style="position: relative;">
                    <canvas id="myPieChart" width="100%" height="40"></canvas>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </main>
    </div>
    </div>
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/js/chart-bar-demo.js"></script>

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


  var ctx = document.getElementById('myPieChart');

        var setoresNomes = {!! json_encode($setoresNomes) !!};
        var setoresValores = {!! json_encode($valores) !!};

        var data = {
            labels: setoresNomes,
            datasets: [{
                data: setoresValores,
                backgroundColor: ['#4F79E4', '#7DDD4F', '#ED2139', '#F8B534', '#aa48e5'],
                borderWidth: 1
            }]
        };

        var options = {
            responsive: true
        };

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
</script>





@endsection
@endsection
