<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Inicio</title>
	<meta name="viewport" content="widtd=device-widtd, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/eCommerce/css/Cosmo/bootstrap.min.css">
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

	<?php 
	require 'php/conexionMySQL.php';
	$query = "select * from vw_resumenCompra where idUsuario = " . $_SESSION["id"] . " order by fecha desc";


	?>

	<!-- Content -->
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Mis compras</h1>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1">
				<?php 
				if(isset($_GET['msj'])){
					echo "<h3 class='text-center' id='mensaje' style='color:green'>".$_GET['msj']."</h3>";

					echo "<script>var bandera = 1; setTimeout(function(){\$" . 
					"('#mensaje').hide('slow',function(){\$('tbody').children().eq(0).removeAttr('style');})},3000);</script>";
				}
				$resultset = $conn->query($query);
				if ($resultset->num_rows > 0) {
					?>
					<div class="table-responsive ">
						<table class="table table-striped table-bordered">
							<thead>
								<tr class="text-center">
									<td><strong>No. de Compra</strong></td>
									<td><strong>Dirección de envío</strong></td>
									<td><strong>Fecha</strong></td>
									<td><strong>No. de artículos</strong></td>
									<td><strong>Total $</strong></td>
									<td><strong>Detalle</strong></td>
								</tr>
							</thead>
							<tbody>
								<?php 
								while($compra = $resultset->fetch_assoc()){
								  echo "<tr class='text-center'>" .
								  			"<td>".$compra['idCompraTotal']."</td>".
								  			"<td>".$compra['direccion']."</td>".
								  			"<td>".$compra['fecha']."</td>".
								  			"<td>".$compra['cantidad']."</td>".
								  			"<td>$".$compra['precio']."</td>".
								  			"<td><span class='icon-eye' onclick='showDetalleCompra(\"".$compra['idCompraTotal']."\")' style='cursor:pointer'> </span></td>".
										"</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
					<?php
				} else {
					echo "<br><h2>Aún no tienes compras registradas</h2><br>";
				}


				?>
				<div class="modal fade" id="modalDetalle">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h1 class="modal-title">Detalle de compra</h1>
							</div>
							<div class="modal-body" id="modalDetalleCompraBody">
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
			</div>
		</div>
	</div>

	<!-- Content end -->


	<!--FOOTER-->
	<?php 
	require "php/footer.php"
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
			$("#menuInicio").addClass("active");

			if (bandera === 1){
				$("tbody").children().eq(0).attr("style","background-color:rgba(0,255,0,0.4)");
			}
		});
	</script>
	
	

</body>
</html>

