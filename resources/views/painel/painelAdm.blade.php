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
                Alunos/Horas
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
                Horas/Setor
            </div>
            <div class="card-body" style="position: relative;">
                <canvas id="myPieChart" width="100%" height="40"></canvas>
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; ">
                    {{-- <p style="color: black; text-align: center; font-size: 44px; font-family: 'Montserrat';font-weight: bold;">EM MANUTENÇÃO!</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

{{-- <script src="/js/chart-pie-demo.js"></script> --}}

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

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
      backgroundColor: ["rgba(170, 72, 229, 1)", ...Array(userAnoArray.length).fill("rgba(255,0,0,1)")],
      borderColor: ["rgba(248, 181, 52, 1)", ...Array(userAnoArray.length).fill("rgba(255,0,0,1)")],
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
          max: Math.max(...userTotalArray), // Define o máximo com base nos dados
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

var ctx = document.getElementById('myChart').getContext('2d');

var setoresNomes = {{'$setoresNomes'}}.split(',');
var setoresValores = {{'$setoresValores'}}.split(',').map(Number);

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: setoresNomes,
    datasets: [{
      data: setoresValores,
      backgroundColor: ['#4F79E4', '#7DDD4F', '#ED2139', '#F8B534', '#aa48e5'],
    }],
  },
});

</script>


@endsection
@endsection

