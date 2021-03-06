<?php
	session_start();
	require 'php/conexionMySQL.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Inicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

	<!-- Content -->
	
	<!-- BannerJumbo -->
	<div class="jumbotron bannerJumbo" style="background: url('images/bannerJumbo3.jpg') no-repeat;">
		<div class="container">
			<h1 class="textJumbotron">¡Encuentra los mejores libros!</h1>
			<?php
				if(isset($_SESSION['nombre'])){
				?>
					<p>Mahatma librerías.</p>
				<?php
				}else{
				?>
					<p>Únete a nuestra comunidad</p>
					<p>
						<a class="btn btn-success btn-lg" href="registro.php">Registrarse</a>
					</p>
				<?php
				}
				?>
		</div>
	</div>
	
	<!-- BannerJumbo end -->
	
	<div class="container">
		<div class="row">
			<center>
			<div class="col-xs-12">
				<div class="banner">
					<img src="images/banner1.jpg" class="img-responsive" alt="">
				</div>
			</div>
			</center>
		</div>
	</div>
	<br>
	<br>

	<div class="container">
		<?php 
		$query = 'select id,nombre,precioFisico from libro order by rand() limit 3';
		$resultset = $conn->query($query);

		 ?>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Recomendaciones</h1>
				</div>
				<div class="panel-body">
					<?php 
					while($libro = $resultset->fetch_assoc()){
						echo '<div class="col-sm-4 col-md-4">' .
								'<center><img class="img-responsive"  src="images/portadas/'.$libro["id"].'.jpg" alt=""></center>' .
								'<h2 data-toggle="tooltip" title="Ver libro" onclick=\'window.location.href="infoLibro.php?idLibro='.$libro["id"].'"\'><p class="text-center"><span class="label label-info">$'.$libro["precioFisico"].'</span></p></h2>'.
								'<br>'.
							 '</div>';
					}
				 	?>
									
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<?php 
		$query = 'select id,nombre,precioFisico from libro where genero like "%Novela%" order by rand() limit 3;';
		$resultset = $conn->query($query);

		 ?>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Novelas</h1>
				</div>
				<div class="panel-body">
					<?php 
					while($libro = $resultset->fetch_assoc()){
						echo '<div class="col-sm-4 col-md-4">' .
								'<center><img class="img-responsive"  src="images/portadas/'.$libro["id"].'.jpg" alt=""></center>' .
								'<h2 data-toggle="tooltip" title="Ver libro" onclick=\'window.location.href="infoLibro.php?idLibro='.$libro["id"].'"\'><p class="text-center"><span class="label label-info">$'.$libro["precioFisico"].'</span></p></h2>'.
								'<br>'.
							 '</div>';
					}
				 	?>
									
				</div>
			</div>
		</div>
	</div>

		<div class="container">
		<?php 
		$query = 'select id,nombre,precioFisico from libro where genero like "%Filosofía%" order by rand() limit 3;';
		$resultset = $conn->query($query);

		 ?>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Filosofía</h1>
				</div>
				<div class="panel-body">
					<?php 
					while($libro = $resultset->fetch_assoc()){
						echo '<div class="col-sm-4 col-md-4">' .
								'<center><img class="img-responsive" src="images/portadas/'.$libro["id"].'.jpg" alt=""></center>' .
								'<h2 data-toggle="tooltip" title="Ver libro" onclick=\'window.location.href="infoLibro.php?idLibro='.$libro["id"].'"\'><p class="text-center"><span class="label label-info">$'.$libro["precioFisico"].'</span></p></h2>'.
								'<br>'.
							 '</div>';
					}
				 	?>
									
				</div>
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
		});
	</script>
	
	

</body>
</html>