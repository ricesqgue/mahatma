<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Nosotros</title>
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
	<div class="jumbotron bannerJumbo" style="background: url('images/bannerJumbo.jpg') no-repeat;">
		<div class="container">
			<h1 class="textJumbotron">Conoce más acerca de Mahatma</h1>
			<p></p>
			<p>
				
			</p>
		</div>
		<br><br><br>
	</div>
	
	<!-- BannerJumbo end -->
	
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-7 text-justify">
				<h1 class="lineaTitulo">Historia</h1>
				<p>
				Librerías Mahatma se fundó el 6 de febrero de 2006. Nuestro primer local fué ubicado en el centro de la ciudad de Aguascalientes.
				</p>
				<p>
				Hoy existen 4 librerías Mahatma ubicadas en puntos estratégicos en la ciudad de Aguascalientes gracias al crecimiento que hemos tenido en los últimos años. (<a href="sucursales.php">Ver sucursales</a>)
				</p>
				<p>Nuestra clientela está compuesta principalmene por hombres y mujeres estudiantes, maestros, profesionales y todos los que sientes interés por la cultura y buscan información y entretenimiento.</p>
				<p>Estamos orgullosos de nuestro trabajo, y por eso nos hemos propuesto continuar nuestro crecimiento, en beneficio de la cultura de nuestro país.
				Dentro de los planes de expansión de librerías Mahatma está el abrir nuevas sucursales en diferentes puntos de la República Mexicana.
				</p>
			</div>
			<div class="col-xs-12 col-md-5">
				<br><br>
				<center><img src="images/bannerJumbo3.jpg" alt="" class="img-responsive"></center>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6 text-justify">
				<h1 class="lineaTitulo">Misión</h1>
				<p>
					Contribuir a la difusión de la cultura y entretenimiento, creando espacios propicios para el encuentro con el conocimiento. Además de ofrecer mejor servico y atención a nuestros clientes. 
				</p>
			</div>
			<div class="col-xs-12 col-md-5 col-md-offset-1 text-justify">
				<h1 class="lineaTitulo">Visión</h1>
				<p>
					Consolidar el liderazgo de la marca en Aguascalientes y acceder a nuevos lugares enriqueciendo nuestra oferta cultural.
				</p>
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
		    $("#menuNosotros").addClass("active");
		});
	</script>
	
	

</body>
</html>