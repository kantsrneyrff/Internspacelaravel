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
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-bars-progress"></i>
                    Progresso
                </div>
                <div class="p-3">
                <a class="d-flex" style="justify-content: flex-end; text-decoration:none;">230h</a>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="230"
                        style="width:55%">

                    </div>
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


    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
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
        var total = setoresValores.reduce((a, b) => a + b, 0);

        console.log(setoresValores)



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
                    formatter: (value, ctx) => {

                        let sum = ctx.dataset._meta[0].total;
                        let percentage = (value * 100 / sum).toFixed(2) + "%";
                        return percentage;
                        console.log(percentage)

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

        var setoresNomes = {!! json_encode($setoresNomes) !!};
        var valores = {!! json_encode($valores) !!};
        var setorLabel = '{{ $setorLabel }}';
        var setorIds = {!! json_encode($setorIds) !!};
        var setorTotalHoras = '{{ $setorTotalHoras }}';

        if (typeof setoresNomes !== 'undefined') {
            var ctx = document.getElementById("myBarChart");
            var setorTotalHorasArray = setorTotalHoras.split(',').map(Number);

            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: setoresNomes,
                    datasets: [{
                        label: setorLabel,
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",

                        data: setorTotalHorasArray,
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
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        labels: {
                            fontColor: 'black', // Cor do texto da legenda
                            fontWeight: "bold",
                        },
                        display: false
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return tooltipItem.yLabel + ' horas';
                            }
                        }
                    },
                    labels: {
                        fontSize: 24,
                        color: "black"
                    }
                }
            });
        }



        const totalHoras = {!! json_encode($totalHoras) !!};
        const progressValue = parseInt(document.querySelector('.progress-bar').getAttribute('aria-valuenow'));

        let novoTotalHoras = totalHoras;
        if (totalHoras > 230) {
            novoTotalHoras = 230;
        }

        const novoProgresso = (novoTotalHoras / 230) * 100; // Agora estamos usando 230 como valor máximo

        const progressBar = document.querySelector('.progress-bar');
        progressBar.style.width = `${novoProgresso}%`;
        progressBar.textContent = `${novoTotalHoras}h`;
    </script>
@endsection
@endsection
