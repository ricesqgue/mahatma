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
		$jsonLibro = json_decode($_POST["jsonLibro"]);
		$total = 0;

		require "php/conexionMysql.php";

	 ?>	
	<br>
	<div class="container">
	<?php 
		if (sizeof($jsonLibro) > 0){
			?>
			 	<div class="row">
			 		<div class="col-md-10 col-md-offset-1">
			 			<h1>Lista de compra</h1>
			 			<hr>
			 		</div>
			 	</div>
			 	<br>
				<div class="table-responsive " style="padding-left:20px; padding-right:20px">
					<table class="table table-striped table-bordered" id="tableSearch">
						<thead>
							<tr>
								<th style='text-align: center; vertical-align:middle;'></th>	
								<th style='text-align: center; vertical-align:middle;'>Nombre</th>	
								<th style='text-align: center; vertical-align:middle;'>Autor</th>	
								<th style='text-align: center; vertical-align:middle;'>Género</th>	
								<th style='text-align: center; vertical-align:middle;'>Editorial</th>	
								<th style='text-align: center; vertical-align:middle;'>Precio</th>	
								<th style='text-align: center; vertical-align:middle;'>Tipo</th>	
								<th style='text-align: center; vertical-align:middle;'></th>	
							</tr>
						</thead>
						<tbody>
							<?php 
							for($i = 0; $i < sizeof($jsonLibro); $i++){
								$query = "select l.id as id, l.nombre as nombreLibro, precio".$jsonLibro[$i]->tipo ." as precio ,l.rutaImagen, l.genero, a.nombre as nombreAutor, e.nombre as nombreEditorial from libro l inner join autor a on a.id=l.idAutor inner join editorial e on e.id=l.idEditorial where l.id = '" .$jsonLibro[$i]->id . "';";

								$resultSet = $conn->query($query);

								if($resultSet->num_rows > 0){
									while($libro = $resultSet->fetch_assoc()){

										$total += $libro["precio"];
										echo "<tr>" .
											"<td style='text-align: center; vertical-align:middle;'><img src='images/portadas/". $libro['rutaImagen'] ."' width='60px'></td>" .
											"<td style='text-align: center; vertical-align:middle;'>".$libro['nombreLibro']."</td>" .
											"<td style='text-align: center; vertical-align:middle;'>".$libro['nombreAutor']."</td>" .
											"<td style='text-align: center; vertical-align:middle;'>".$libro['genero']."</td>" .
											"<td style='text-align: center; vertical-align:middle;'>".$libro['nombreEditorial']."</td>" .
											"<td style='text-align: center; vertical-align:middle;'>$".$libro['precio']."</td>" .
											"<td style='text-align: center; vertical-align:middle;'>".$jsonLibro[$i]->tipo."</td>" .
											"<td style='text-align: center; vertical-align:middle;'><span data-toggle='tooltip' title='Ver libro' class='icon-book' style='cursor:pointer' onclick=\"window.location.href='infoLibro.php?idLibro=".$libro['id']."'\"></span></td>" .
										"</tr>";								
									}
								}

								
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<center><h1>Total: $<span id="total"><?php echo $total ?></span></h1></center>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<?php 
							if (isset($_SESSION["nombre"])){
								?>
								<center>
								<form action="pagoCompra.php" method="POST">
									<button type="submit" class="btn btn-success">Continuar</button>
									<input type="hidden" name="total" value="<?php echo $total ?>">
								</form>

								</center>
								<?php
							} else{
								?>
								<h2>Para continuar con la compra tienes que estar registrado.</h2> <br>
								<center>	
									<a href="registro.php" class="btn btn-info">Regístrate</a>
									<a style="margin-left:100px" data-toggle="modal" href='#modalIniciaSesion' class="btn btn-info">Iniciar sesión</a>
								</center>
								<?php
							}
						 ?>
					</div>
				</div>				
			<?php
		} else {
			?>
			<div class="row" style="min-height: 400px">
				<div class="col-md-8 col-md-offset-2">
					<br>
					<h2>No hay libros agregados a tu carrito de compras :(</h2>
					<br>
					<br>
					<center>
						<h4>Checa la gran variedad de libros que ofrecemos.</h4>
						<a class="btn btn-info" href="catalogo.php">Catálogo</a>
					</center>
				</div>
			</div>			
			<?php
		}		
	 ?>

	</div>

	<br>

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