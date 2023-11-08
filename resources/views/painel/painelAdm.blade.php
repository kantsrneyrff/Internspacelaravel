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
                    Usuarios Cadastrados
                </div>
                <div class="card-body" style="position: relative;">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>

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
@section('scripts')
    <!-- Primeiro, carregue as bibliotecas e plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Em seguida, carregue a biblioteca Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <!-- Por último, carregue o plugin chartjs-plugin-datalabels -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    </head>

    <script>
        var usuarios = {{ $usuarios }};
        var userAno = '{{ $userAno }}';
        var userLabel = '{{ $userLabel }}';
        var userTotal = '{{ $userTotal }}';

        var ctx = document.getElementById("myBarChart");
        var userAnoArray = userAno.split(',');
        var userTotalArray = userTotal.split(',').map(Number);

        userTotalArray.unshift(usuarios); // Adiciona a contagem total como o primeiro elemento

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total', ...userAnoArray], // Adiciona "Total" como a primeira etiqueta
                datasets: [{
                    label: userLabel,
                    backgroundColor: ["rgba(248,181,52)", ...Array(userAnoArray.length).fill(
                        "rgba(125,221,79,1)")],
                    borderColor: ["rgba(2,117,216,1)", ...Array(userAnoArray.length).fill(
                        "rgba(255,0,0,1)")],
                    data: userTotalArray,
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: Math.max(20), // Define o máximo com base nos dados
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return tooltipItem.yLabel + ' usuários';
                        }
                    }
                }

            }
        });
        var ctx = document.getElementById("myPieChart");
        var setoresNomes = {!! json_encode($setoresNomes) !!};
        var setoresValores = {!! json_encode($valores) !!};
        var total = setoresValores.reduce((a, b) => a + b, 0);

        var data = {
            labels: setoresNomes,
            datasets: [{
                data: setoresValores,
                backgroundColor: ['#4F79E4', '#7DDD4F', '#ED2139', '#F8B534', '#aa48e5'],
                borderWidth: 1
            }]
        };

        var options = {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (value,ctx) => {
                        let percentage = (value * 100 / total).toFixed(2) + "%";
                        return percentage;
                    },
                    color: '#fff',
                }
            }
        };

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        }); 
    </script>
@endsection
@endsection
