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
<script src="/js/chart-bar-demo.js"></script>


<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
@endsection
@endsection

@push('graficos')

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx = document.getElementById("myPieChart");

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [{{ $AgenLabel }}],
    datasets: [{
      data: [{{ $AgenTotal }}],
      backgroundColor: ['#4F79E4', '#7DDD4F', '#ED2139', '#F8B534', '#aa48e5'],
    }],
  },
  options: {
    title: {
      text: 'Gráfico de setores',
    },
    legend: {
      display: true,
      position: 'bottom',
    },
  }
});

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [4215, 5312, 6251, 7841, 9821, 14984],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
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
          max: 15000,
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
@endpush