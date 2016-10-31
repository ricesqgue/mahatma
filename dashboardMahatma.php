<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Contacto</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/eCommerce/css/SuperHero/bootstrap.min.css">
	<link rel="stylesheet" href="/eCommerce/css/icons.css">
	<link rel="stylesheet" href="/eCommerce/css/eCommerce.css">
	<link rel="stylesheet" href="/eCommerce/css/animate.css">
	<link rel="icon" type="image/png" href="/eCommerce/images/icono.png" />
</head>

<body>
	<!--HEADER-->
		<?php 
			require "php/header.php";
		 ?>	
	<!-- HEADER END -->
	
	

	<!-- Content -->
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-sm-offset-1">
				<h1 class="text-center" data-sr="wait 0.3s then enter left">Categorias más vendidas</h1>
				<canvas id="grafica1" width="100%"  ></canvas>
				<br>
			</div>

			<div class="col-xs-12 col-sm-4 col-sm-offset-1">
				<h1 class="text-center" data-sr="wait 0.3s then enter left">Articulos vendidos x día</h1>
				<canvas id="grafica4" width="100%"  height="120px"></canvas>
				<p class="text-center text-muted">Dias del mes</p>
				<br>
			</div>

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<h1 class="text-center" data-sr="wait 0.3s then enter left">Libros más vendidos</h1>		
				<canvas id="grafica2" height="200px" ></canvas>
			</div>		
		</div>
	</div>
	<br><br><br>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-sm-offset-1">
				<h1 class="text-center" data-sr="wait 0.3s then enter left">Ventas por género</h1>
				<canvas id="grafica3" width="100%"  ></canvas>
			</div>

			<div class="col-xs-12 col-sm-4 col-sm-offset-1">
				<h1 class="text-center" data-sr="wait 0.3s then enter left">Usuarios registrados que han comprado.</h1>		
				<div id="chart_div" style="width: 100%;" ></div>

			</div>			
		</div>
		<br><br><br>
		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">Ventas por estado</h1>
				<div id="regions_div" style="width: 100%"></div>
			</div>
		</div>
	</div>
	
	<br><br><br>

	<!-- Content end -->


	<!--FOOTER-->

	<!-- FOOTER END -->



	

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/scrollReveal.min.js"></script>
	<script src="js/eCommerce.js"></script>
	<script src="js/Chart.min.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


	<script>
		$(document).ready(function(){
			window.sr = new scrollReveal();
			$.post("php/getInfoDashboard.php",function(res){
				var ctx1 = document.getElementById("grafica1");
				var myChart = new Chart(ctx1, {
				    type: 'bar',
				    responsive : true,
				    data: {
				        labels: res.genero.labels,
				        datasets: [{
				        	label: "# de libros vendidos",
				            data: res.genero.data,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.5)',
				                'rgba(54, 162, 235, 0.5)',
				                'rgba(255, 206, 86, 0.5)',
				                'rgba(75, 192, 192, 0.5)',
				                'rgba(153, 102, 255, 0.5)',
				                'rgba(255, 159, 64, 0.5)'
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1,
				        }]
				    }
				});	

				var ctx2 = document.getElementById("grafica2");
			    myChart = new Chart(ctx2, {
				    type: 'pie',
				    responsive : true,
				    data: {
				        labels: res.topLibros.labels,
				        datasets: [{
				            data: res.topLibros.data,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.5)',
				                'rgba(54, 162, 235, 0.5)',
				                'rgba(255, 206, 86, 0.5)',
				                'rgba(75, 192, 192, 0.5)',
				                'rgba(153, 102, 255, 0.5)',
				                'rgba(30, 102, 255, 0.5)',
				                'rgba(255, 159, 64, 0.5)',
				                'rgba(55, 95, 74, 0.5)',
				                'rgba(100, 22, 139, 0.5)',
				                'rgba(90, 120, 33, 0.5)'
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(30, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)',
				                'rgba(55, 95, 74, 1)',
				                'rgba(100, 22, 139, 1)',
				                'rgba(90, 120, 33, 1)'
				            ],
				            borderWidth: 1
				 
				        }]
				    }
				});
				

				google.charts.load('upcoming', {'packages':['geochart','gauge']});
		      	google.charts.setOnLoadCallback(drawRegionsMap);

		    	function drawRegionsMap() {

			        var data = google.visualization.arrayToDataTable(res.libroEstado);

				    var options = {
				      	region: "MX",
				      	resolution: "provinces",
				      	colorAxis: {colors: ['red', 'yellow', 'green']},
				      	backgroundColor: "#2B3E50",
				      	datalessRegionColor: "a0a0a0"
				    };

				    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
			        chart.draw(data, options);
		     	 }

		     	  google.charts.load('current', {'packages':['gauge']});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {

			        var data2 = google.visualization.arrayToDataTable(res.usuariosCompras);

			        var options2 = {
			          width: 400, height: 400,
			          greenFrom: 90, greenTo: 100,
			          yellowFrom:75, yellowTo: 90,
			          minorTicks: 5
			        };

			        var chart2 = new google.visualization.Gauge(document.getElementById('chart_div'));

			        chart2.draw(data2, options2);
			    }




				var ctx3 = document.getElementById("grafica3");
			    myChart = new Chart(ctx3, {
				    type: 'doughnut',
				    responsive : true,
				    data: {
				        labels: res.chartSexo.labels,
				        datasets: [{
				            data: res.chartSexo.data,
				            backgroundColor: [
				                'rgba(19, 111, 210, 0.5)',
				                'rgba(235, 44, 222, 0.5)'
				            ],
				            borderColor: [
				                'rgba(19, 111, 210,1)',
				                'rgba(235, 44, 222, 1)',
				            ],
				            borderWidth: 1
				 
				        }]
				    }
				});


				var ctx4 = document.getElementById("grafica4");
			    myChart = new Chart(ctx4, {
				    type: 'line',
				    responsive : true,
				    data: {
				        labels: res.ventasMes.labels,
				        datasets: [{
				        	label: "Cantiad de libros por día",
				            data: res.ventasMes.data,
				            borderWidth: 1,
				            backgroundColor: "rgba(20,150,20,.3)",
				            borderColor: "rgba(0,150,0,1)"			    
				 
				        }]
				    }
				});


			},"json");
		});



	</script>
	


</body>
</html