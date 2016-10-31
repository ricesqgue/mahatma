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
	<div class="container">
		<form action="ordenCompra.php" method="POST" id="formCompra">
			<div class="row">
				<div class="col-md-12">
					<h1>Domicilio de envío</h1>
					<hr>
					<br>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group" id="formGroupCalle">										
						<label for="calle">Calle</label>
						<input class="form-control" type="text" name="calle" id="calle" onfocus="limpiaErrorFormulario('formGroupCalle','errorFormulario')" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group" id="formGroupNumero">
						<label for="numero">Número</label>
						<input class="form-control" type="text" name="numero" id="numero" placeholder="No. Exterior - No. Interior" 
							onfocus="limpiaErrorFormulario('formGroupNumero','errorFormulario')">
						<br>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group" id="formGroupColonia">
						<label for="colonia">Colonia</label>
						<input class="form-control" type="text" name="colonia" id="colonia" onfocus="limpiaErrorFormulario('formGroupColonia','errorFormulario')">
					</div>					
				</div>
				<div class="col-md-6">
					<div class="form-group" id="formGroupMunicipio">
						<label for="municipio">Municipio</label>
						<input class="form-control" type="text" name="municipio" id="municipio" 
							onfocus="limpiaErrorFormulario('formGroupMunicipio','errorFormulario')">
						<br>
					</div>					
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group" id="formGroupCP">
						<label for="cp">CP</label>
						<input class="form-control" type="number" name="cp" id="cp" onfocus="limpiaErrorFormulario('formGroupCP','errorFormulario')">

						<br>
					</div>
				</div>
				<div class="col-md-6">
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
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<h1>Método de pago</h1>
					<hr>
					<br>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<img src="images/creditCards.png" alt="" class="img-responsive">
					<br>
					<div class="form-group" id="formGroupNumeroTarjeta">
						<label for="numeroTarjeta">Número de tarjeta</label>
						<input class="form-control" type="number" name="numeroTarjeta" id="numeroTarjeta" onfocus="limpiaErrorFormulario('formGroupNumeroTarjeta','errorFormulario')">
						<br>
					</div>

					<div class="form-group" id="formGroupNombreTitular">
						<label for="nombreTitular">Nombre del titular</label>
						<input class="form-control" type="text" name="nombreTitular" id="nombreTitular" onfocus="limpiaErrorFormulario('formGroupNombreTitular','errorFormulario')">
						<br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-4">
					<div class="form-group" id="formGroupFechaVencimiento">
						<label for="fechaVencimiento">Fecha de vencimiento</label>
						<input class="form-control" type="text" placeholder="MM/AA" name="fechaVencimiento" id="fechaVencimiento" onfocus="limpiaErrorFormulario('formGroupFechaVencimiento','errorFormulario')">
						<br>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group" id="formGroupCodigoSeguridad">
						<label for="codigoSeguridad">CVV</label>
						<input class="form-control" type="number" name="codigoSeguridad" id="codigoSeguridad" onfocus="limpiaErrorFormulario('formGroupCodigoSeguridad','errorFormulario')">
						<br>
					</div>															
				</div>
			</div>

			<br>	
			<div class="row">
				<div class="col-md-3 col-md-offset-4">
					<span id="errorFormulario"></span>						
					<br>
					<button class="btn btn-success" id="btnContinuar" data-loading-text="Cargando..." type="button" onclick="validaFormularioCompra()">
						Continuar
					</button>	
				</div>
			</div>

			<input type="hidden" name="jsontl" id="jsontl" >
			<input type="hidden" name="total" value="<?php echo $_POST['total'] ?>">


					
			
			
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