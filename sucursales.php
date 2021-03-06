<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Sucursales</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/eCommerce/css/bootstrap.min.css">
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
	
	<!-- BannerJumbo -->
	<div class="jumbotron bannerJumbo" style="background: url('images/bannerJumbo4.jpg') no-repeat;">
		<div class="container">
			<h1 class="textJumbotron">Visita nuestras librerías</h1>
			<p></p>
		</div>
		<br><br><br>
	</div>
	
	<!-- BannerJumbo end -->
	<div class="container">	
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h1 class="lineaTitulo">C.C. El Parián</h1>
				<p style="margin-left:10px">
					Rivero Y Gutierrez Esq Morelos 29<br>
					Zona Centro, 20000 Aguascalientes, Ags.<br>	
					Local #38 <br>
					Horario 9:30am - 8:00pm<br> 					
				</p>
				<img class="img-rounded" width="75%" src="images/ccParian.png" alt="">
				<br><br>
			</div>
			<div class="col-md-5">	
				<h1 class="lineaTitulo">C.C. Altaria</h1>
				<p style="margin-left:10px">
					Boulevard a Zacatecas Norte 849, Trojes de Alonso<br>
					Desarrollo Especial Bulevar a Zacatecas, 20116 Aguascalientes, Ags.<br>	
					Local #145 <br>
					Horario 9:30am - 8:00pm<br>  
				</p>
				<img class="img-rounded" width="75%" src="images/ccAltaria.png" alt="">
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h1 class="lineaTitulo">C.C. Espacio Aguascalientes</h1>
				<p style="margin-left:10px" style="margin-left:10px">
					Avenida Tecnológico 120<br>
					Ojocaliente, 20198 Aguascalientes, Ags. <br>	
					Local #87 <br>
					Horario 9:30am - 8:00pm<br>  
				</p>
				<img class="img-rounded" width="75%" src="images/ccEspacio.png" alt="">
			</div>
			
			<div class="col-md-5">	
				<h1 class="lineaTitulo">C.C. Villasunción</h1>
				<p style="margin-left:10px">
					Boulevard José Ma. Chávez s/n, Mesoneros<br>
					Centro Comercial Villa Asunción, 20280 Aguascalientes, Ags.<br>	
					Local #12 <br>
					Horario 9:30am - 8:00pm<br>  
				</p>
				<img class="img-rounded" width="75%" src="images/ccVillasuncion.png" alt="">
			</div>
			</div>
		</div>
	</div>		
	<br><br><br>

	<!-- Content end -->


	<!--FOOTER-->
		<?php 
			require "php/footer.php";
		 ?>
	<!-- FOOTER END -->



	

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/scrollReveal.min.js"></script>
	<script src="js/eCommerce.js"></script>	

	<script>
		$(document).ready(function(){
			//Activar Tooltip de bootstrap
		    $('[data-toggle="tooltip"]').tooltip();
		    $("#menuSucursales").addClass("active");
		});
	</script>
	
	

</body>
</html>