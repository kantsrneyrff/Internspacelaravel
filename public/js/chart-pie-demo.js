// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");

var governanca = 10;
var garcom = 10;
var bar = 10;
var cozinha = 15;
var recpcao = 10;
console.log(governanca)

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Governaça", "Garçom", "Bar", "Cozinha","Recepção"],
    datasets: [{
      data: [governanca, garcom, bar, cozinha, recpcao],
      backgroundColor: ['#4F79E4', '#7DDD4F', '#ED2139', '#F8B534', '#aa48e5'],
    }],
  },
});
