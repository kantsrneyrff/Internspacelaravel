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
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; backdrop-filter:">
                    {{-- <p style="color: black; text-align: center; font-size: 44px; font-family: 'Montserrat';font-weight: bold;">EM MANUTENÇÃO!</p> --}}
                </div>
            </div>
        </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script>
        var usuarios = {{ $usuarios }};
        var userAno = '{{ $userAno }}';
        var userLabel = '{{ $userLabel }}';
        var userTotal = '{{ $userTotal }}';

        console.log(usuarios);
        console.log(userAno);
        console.log(userLabel);
        console.log(userTotal);

        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var userAnoArray = [{{ $userAno }}];
        var maxUserTotal = {{ $maxUserTotal }};

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: userAnoArray, // Agora usamos os anos como rótulos
    datasets: [{
      label: userLabel,
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: userTotal.split(','), // Convertendo a string em um array de números
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
          max: maxUserTotal,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});       



    </script>

@endsection
@endsection

