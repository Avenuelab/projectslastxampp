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
		var ctx = $("#myChart");

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
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Loan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : Loan
        },
        {
          label               : 'LoanPayment',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : LoanPayment
        },
      ]
    }

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

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })
  })
</script>

   
    <!-- /Flot -->