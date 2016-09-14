<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Información de libro</title>
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
		//Saca informacion del libro.
		$idLibro = $_GET["idLibro"];
		require "php/conexionMysql.php";
		$query = "select l.id as id, l.nombre as nombreLibro, l.precioFisico, l.precioDigital, l.descripcion, l.rutaImagen, l.genero, l.numPaginas, l.anio, a.nombre as nombreAutor, e.nombre as nombreEditorial from libro l inner join autor a on a.id=l.idAutor inner join editorial e on e.id=l.idEditorial where l.id = '".$idLibro."'";
		$resultSet = $conn->query($query);
		if($resultSet->num_rows >0){
			$libro = $resultSet->fetch_assoc();
		}

	 ?>
	
	<br><br>
	<div class="container" style="min-height: 400px;">
		<?php 
		if(isset($libro)){

		 ?>	
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4" id="divImagenLibro">
				<img class="img-responsive img-thumbnail" src="images/portadas/<?php echo $libro['rutaImagen'] ?>" alt="">
			</div>

			<div class="col-sm-offset-1 col-sm-10 col-md-6" id="divInfoLibro">
				<h2><?php echo $libro['nombreLibro'] ?></h2>
				<h4>Autor: <?php echo $libro['nombreAutor'] ?></h4>
				<h4>Editorial: <?php echo $libro['nombreEditorial'] ?></h4>
				<h2>Precio: $<span id="precioLibro"><?php echo $libro['precioFisico'] ?></span></h2>
				<button id="btnAgregaCarrito" data-loading-text="Cargando.." data-toggle="tooltip" title="Agregar al carrito" class="btn btn-md btn-info" onclick="agregaCarrito(<?php echo $libro['id'] .',\''. $libro['nombreLibro'] . '\''?>,$('input[name=tipoLibro]:checked').val())"><span class="icon-plus"> </span> <span class="icon-cart"></span>
				</button>
				<span id="msjAgregaCarrito"></span>
				<br><br>
			  	<form>
			    	<label class="radio-inline">
			      		<input type="radio" name="tipoLibro"  checked value="fisico" onclick="$('#precioLibro').text('<?php echo $libro['precioFisico'] ?>')">Físico
			    	</label>
			    	<label class="radio-inline">
			     	 	<input type="radio" name="tipoLibro"  value="digital" onclick="$('#precioLibro').text('<?php echo $libro['precioDigital'] ?>')">Digital
			    	</label>
			  	</form>

				<br><br><br>
				<ul class="nav nav-tabs">
				   <li class="active"><a data-toggle="tab" href="#descripcion">Descripción</a></li>
				   <li><a data-toggle="tab" href="#masInfo">Más información</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="descripcion" class="tab-pane fade in active">
						<br>
						<p class="text-justify"><?php echo $libro['descripcion'] ?></p>
					</div>
					<div id="masInfo" class="tab-pane fade">
						<br>
						<ul>
							<li><strong>Año de publicación:</strong> <?php echo $libro['anio'] ?>. </li><br>
							<li><strong>Género:</strong> <?php echo $libro['genero'] ?>. </li><br>
							<li><strong>Número de páginas:</strong> <?php echo $libro['numPaginas'] ?>. </li><br>

						</ul>
					</div>
				</div>

			</div>
		</div>
		
		<div class="row" >
			<h3>Comentarios</h3>
			<div id="comentarios"></div>

		</div>
	
		<?php 
		}
		else{
		?>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<center>
						<h1>Libro no encontrado</h1>
						<img src="images/notFound.png">
					</center>
				</div>
			</div>
			
		<?php
		}
		 ?>	


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
		    comentarios(<?php echo $idLibro ?>);
		});
	</script>
	
	

</body>
</html>