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
	<?php 

		$numeroTarjeta = $_POST['numeroTarjeta'];
		$nombreTitular = $_POST['nombreTitular'];
		$codigoSeguridad = $_POST['codigoSeguridad'];
		$fechaVencimiento = $_POST['fechaVencimiento'];
		$total = $_POST['total'];
		$jsontl = json_decode($_POST['jsontl']);

		$direccion = array();
		$direccion["calle"] = $_POST['calle'];
		$direccion["numero"] = $_POST['numero'];
		$direccion["colonia"] = $_POST['colonia'];
		$direccion["municipio"] = $_POST['municipio'];
		$direccion["estado"] = $_POST['estado'];
		$direccion["cp"] = $_POST['cp'];


		date_default_timezone_set('America/Mexico_City');
	 ?>

 	<form id="formTerminaCompra">
		<input type="hidden" name="jsontl" value='<?php echo json_encode($jsontl)?>'>
		<input type="hidden" name="direccion" value='<?php echo json_encode($direccion)?>'>
		<input type="hidden" name="numeroTarjeta" value='<?php echo $numeroTarjeta ?>'>
	</form>


	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Orden de compra</h1>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6">
				<h4><strong><span class="icon-user"> </span>Cliente: </strong><?php echo $_SESSION['nombre'].' '. $_SESSION['apellido'] ?></h4><br>
				<h4><strong>No. de cliente: </strong><?php echo $_SESSION['id'] ?></h4><br>
				<h4><strong><span class="icon-calendar"> </span>Fecha: </strong> <?php echo date('d/m/Y') ?></h4><br>
				<h4><strong><span class="icon-books"> </span>Cantidad de artículos: </strong><?php echo count($jsontl) ?></h4><br>
				<h4>
					<strong><span class="icon-list2"> </span>Lista de artículos:</strong>
				</h4>
				<h5>
					<ul>
						<?php 
						for ($i = 0; $i < count($jsontl); $i++){
							echo '<li>' . $jsontl[$i]->nombre . ' ('. $jsontl[$i]->tipo .')</li>';
						}
						 
					    ?>
						
					</ul>
				</h5><br>
				<h4><strong><span class="icon-truck"> </span>Direccion de envío: </strong> <?php echo $direccion["calle"] . ' ' . $direccion["numero"]. ', ' . $direccion["municipio"] . ' ('. $direccion["cp"] .')'?></h4><br>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-6">
				<h4><strong><span class="icon-credit-card"> </span>Tarjeta de crédito/débito: </strong> <?php echo $numeroTarjeta ?></h4><br>
				<h4><strong><span class="glyphicon glyphicon-usd"> </span>Total de compra: </strong><?php echo '$' . $total ?></h4><br>
				<h4><strong><span class="glyphicon glyphicon-usd"> </span>Total de envío: </strong>$0</h4><br>
				<h4><strong><span class="icon-coin-dollar"> </span>Total a pagar: </strong><?php echo '$' . $total ?></h4><br>
			</div>

		</div>

		<div class="row">
		<br><br><br>
			<div class="col-xs-2 col-xs-offset-5">
				<a class="btn btn-success" data-toggle="modal" href='#modalCompra'>Terminar compra</a>
			</div>
		</div>
	</div>
	

	<div class="modal fade" id="modalCompra">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" data-backdrop="static" data-keyboard="false" aria-hidden="true">&times;</button>
					<h1 class="modal-title">Confirmar compra</h1>
				</div>
				<div class="modal-body">
					<div id="loader">
						<div class="row">
							<div class="col-xs-12 col-sm-2 col-sm-offset-5">
								<div class="loader" id="loadtl"></div>
								<br>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h3 class="text-center" id="statusCompra">Espere...</h3>
							</div>
						</div>
						
						
					</div>
					<div id="modalCompraBody">
						<h3 class="text-center">
							Presiona aceptar para terminar con la compra.
						</h3>
						<h5 class="text-center">El envío es totalmente gratis. Recibirás tu(s) libro(s) dentro de 2 ó 3 días hábiles.</h5>
						<h5 class="text-center">Tendrás acceso a tus libros digitales en tu apartado de compras.</h5>
						<h5 class="text-center"><em>Tu compra y tus datos estan protegidos por nuestro sistema de protección al comprador.</em></h5>
					</div>
				</div>
				<div class="modal-footer">
					<img src="images/creditCards.png" width="40%" style="margin-right: 10%" alt="">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" onclick="aceptaCompra()">Aceptar</button>
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
		    $("#loader").hide();
		});
	</script>
	
	

</body>
</html>