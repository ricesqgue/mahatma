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
	$query = "select d.idLibro, l.nombre as libro, a.nombre as autor from compraDetalle d join compraTotal t on d.idCompraTotal = t.idCompraTotal join libro l on l.id = d.idLibro join autor a on a.id = l.idAutor where d.tipo = 'digital' and t.idUsuario = ".$_SESSION['id'].";";


	?>

	<!-- Content -->
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Mis libros digitales</h1>
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
									<td><strong>Título del libro</strong></td>
									<td><strong>Autor</strong></td>
									<td><strong>Descargar</strong></td>
								</tr>
							</thead>
							<tbody>
								<?php 
								while($compra = $resultset->fetch_assoc()){
								  echo "<tr class='text-center'>" .
								  			"<td>".$compra['libro']."</td>".
								  			"<td>".$compra['autor']."</td>".
								  			"<td><span style='font-size:18pt; cursor:pointer' data-toggle='tooltip' title='Descargar PDF' class='icon-cloud-download' onclick='descargaLibro()' style='cursor:pointer'> </span></td>".
										"</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
					<form id="formDescargaLibro" action="php/descargaLibro.php" method="post"></form>
					<?php
				} else {
					echo "<br><h2>Aún no tienes libros digitales</h2><br>";
				}


				?>
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
		});
	</script>
	
	

</body>
</html>

