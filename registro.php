<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Registro de usuario</title>
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
			<h1 class="textJumbotron">Regístrate y se parte de Mahatma librerías</h1>

		</div>
		<br><br><br>
	</div>
	
	<!-- BannerJumbo end -->
	
	<br>
	<div class="container">
		<form id="formRegistro">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2>Regístro.</h2>
					<br>
					<div class="form-group" id="formGroupNombre">										
						<label for="nombre">Nombre</label>
						<input class="form-control" type="text" name="nombre" id="nombre" onfocus="limpiaErrorFormulario('formGroupNombre','errorFormulario')" >
					</div>
						<br>
					<div class="form-group" id="formGroupApellido">
						<label for="apelldo">Apellido(s)</label>
						<input class="form-control" type="text" name="apellido" id="apellido" 
							onfocus="limpiaErrorFormulario('formGroupApellido','errorFormulario')">
						<br>
					</div>
					<div class="form-group" id="formGroupEmail">
						<label for="email">Correo electrónico</label>
						<input class="form-control" type="email" name="emailRegistro" id="emailRegistro" onfocus="limpiaErrorFormulario('formGroupEmail','errorFormulario')">
						<br>
					</div>
					<div class="form-group" id="formGroupContrasenaReg">
						<label for="contrasena">Contraseña</label>
						<input class="form-control" type="password" name="contrasenaRegistro" id="contrasenaRegistro" 
							onfocus="limpiaErrorFormulario('formGroupContrasenaReg','errorFormulario')">
						<br>					
						<label for="contrasenaR">Repetir contraseña</label>
						<input class="form-control" type="password" name="contrasenaR" id="contrasenaR"
							onfocus="limpiaErrorFormulario('formGroupContrasenaReg','errorFormulario')">
						<br>
					</div>
					<div class="form-group" id="formGroupEstado">
						<label for="estado">Estado</label>
						<select class="form-control" name="estado" id="estado" onfocus="limpiaErrorFormulario('formGroupEstado','errorFormulario')">
							<option value="1">Aguascalientes</option>
								<option value="2">Baja California</option>

								<option value="3">Baja California Sur</option>

								<option value="4">Campeche</option>

								<option value="5">Coahuila de Zaragoza</option>

								<option value="6">Colima</option>

								<option value="7">Chiapas</option>

								<option value="8">Chihuahua</option>

								<option value="9">Distrito Federal</option>

								<option value="10">Durango</option>

								<option value="11">Guanajuato</option>

								<option value="12">Guerrero</option>

								<option value="13">Hidalgo</option>

								<option value="14">Jalisco</option>

								<option value="15">México</option>

								<option value="16">Michoacán de Ocampo</option>

								<option value="17">Morelos</option>

								<option value="18">Nayarit</option>

								<option value="19">Nuevo León</option>

								<option value="20">Oaxaca</option>

								<option value="21">Puebla</option>

								<option value="22">Querétaro</option>

								<option value="23">Quintana Roo</option>

								<option value="24">San Luis Potosí</option>

								<option value="25">Sinaloa</option>

								<option value="26">Sonora</option>

								<option value="27">Tabasco</option>

								<option value="28">Tamaulipas</option>

								<option value="29">Tlaxcala</option>

								<option value="30">Veracruz de Ignacio de la Llave</option>

								<option value="31">Yucatán</option>

								<option value="32">Zacatecas</option>
						</select>
						<br>
					</div>	
					<span id="errorFormulario"></span>						
					<br>
					<button class="btn btn-success" id="btnRegistra" data-loading-text="Cargando..." type="button" onclick="validaFormularioRegistro()">Registrar</button>	
				</div>
			</div>
		</form>
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
		});
	</script>
	
	

</body>
</html>