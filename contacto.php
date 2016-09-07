<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Contacto</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/icons.css">
	<link rel="stylesheet" href="css/eCommerce.css">
</head>

<body>
	<!--HEADER-->
		<?php 
			require "php/header.php";
		 ?>	
	<!-- HEADER END -->
	


	<!-- Content -->
	
	<!-- BannerJumbo -->
	<div class="jumbotron bannerJumbo" style="background: url('images/bannerJumbo2.jpg') no-repeat;">
		<div class="container">
			<h1 class="textJumbotron">Nos interesa saber tu opinión</h1>
			<p></p>
		</div>
		<br><br><br>
	</div>
	
	<!-- BannerJumbo end -->
	<div class="container">	
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h1 class="lineaTitulo">¿Tienes algúna duda?</h1>
				<p>
					&nbsp;&nbsp;&nbsp;Llámanos al télefono 9-12-53-46 o al 01-800-MAHATMA <br>	
					&nbsp;&nbsp;&nbsp;Uno de nuestros operadores te atenderá. <br> 
				</p>
				<br><br>
			</div>
			<div class="col-md-5">	
				<h1 class="lineaTitulo">Horario de atención</h1>
				<p>
					&nbsp;&nbsp;&nbsp;De lunes a sábado. <br>	
					&nbsp;&nbsp;&nbsp;9:00 am - 6:00pm <br> 
				</p>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h1 class="lineaTitulo">Envíanos un email</h1>
				<p>
					&nbsp;&nbsp;&nbsp;También nos puedes contactar enviando un email a <br>
					&nbsp;&nbsp;&nbsp;<a href="mailto:atencion_clientes@mahatma.com.mx?subject=Atencion%20a%20clientes">atencion_clientes@mahatma.com.mx</a> <br>	
					&nbsp;&nbsp;&nbsp;Te responderemos lo antes posible. <br> 
				</p>
				<br><br>
			</div>
			<div class="col-md-5">	
				<h1 class="lineaTitulo">Redes sociales</h1>
				<p>
					&nbsp;&nbsp;&nbsp;Síguenos en nuestras redes sociales y enterate de las novedades <br> 
					&nbsp;&nbsp;&nbsp;que librerías Mahatma tiene para tí.	
					&nbsp;&nbsp;&nbsp;<h3>&nbsp;&nbsp;&nbsp;<span data-toggle="tooltip" title="Google+" class="icon-google-plus2">&nbsp;</span>
					<span data-toggle="tooltip" title="Facebook" class="icon-facebook2">&nbsp;</span>
					<span data-toggle="tooltip" title="Instagram" class="icon-instagram">&nbsp;</span>
					<span data-toggle="tooltip" title="Twitter" class="icon-twitter"></span></h3>
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
		    $("#menuContacto").addClass("active");
		});
	</script>
	
	

</body>
</html>