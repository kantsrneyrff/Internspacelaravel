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
            <div class="p-4">
                <div style="text-align: right;">
                    <a class="r-20" style="text-decoration:none;"><b>230h</b></a>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                        style="width:55%">
                        120h
                    </div>
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
<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
            },
        });
    });


    var ctx = document.getElementById('myPieChart');

    var setoresNomes = {
        !!json_encode($setoresNomes) !!
    };
    var setoresValores = {
        !!json_encode($valores) !!
    };

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
            }
        }
    });
}



    </script>
@endsection
@endsection
@endsection