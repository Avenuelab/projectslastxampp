<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Taraknishi Financial System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Area Chart</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>   
   
   
   <!-- Flot -->
    <script>

$(document).ready(function(){
$.ajax({
	url : "chart.php",
	type : "GET",
	success : function(data){
		console.log(data);

		var Month = [];
		var Loan= [];
		var LoanPayment = [];

		for(var i in data) {
			Month.push(data[i].Month);
			Loan.push(data[i].Loan);
			LoanPayment.push(data[i].LoanPayment);
		}

	  var chartdata = {
		  labels: Month,
		  datasets: [
			  {
				  label: "Loan",
				  fill: false,
				  lineTension: 0.1,
				  backgroundColor: "rgba(59, 89, 152, 0.75)",
				  borderColor: "rgba(59, 89, 152, 1)",
				  pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
				  pointHoverBorderColor: "rgba(59, 89, 152, 1)",
				  data: Loan
			  },
			  {
				  label: "LoanPayment",
				  fill: false,
				  lineTension: 0.1,
				  lineWidth: 2,
				  symbol: "circle",
				  backgroundColor: "rgba(29, 202, 255, 0.75)",
				  borderColor: "rgba(29, 202, 255, 1)",
				  pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
				  pointHoverBorderColor: "rgba(29, 202, 255, 1)",
				  data: LoanPayment
			  }
		  ]
	  };
		var ctx = $("#areaChart");

		var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata
		});
	},
	error : function(data) {

	}
});
});
$(function () {
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })

  })
</script>

   
    <!-- /Flot -->