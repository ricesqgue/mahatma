<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mahatma librerías - Búsqueda</title>
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

		$query = "select l.id as id, l.nombre as nombreLibro, l.precioFisico, l.precioDigital, l.rutaImagen, l.genero, a.nombre as nombreAutor, e.nombre as nombreEditorial from libro l inner join autor a on a.id=l.idAutor inner join editorial e on e.id=l.idEditorial order by l.nombre";

		require "php/conexionMySQL.php";
		$resultSet = $conn->query($query);

	?>
	<div class="container-fluid" style="min-height:400px">
		<?php 
		if($resultSet->num_rows >0){
			?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<br><br>
					<div class="table-responsive " style="padding-left:20px; padding-right:20px">
					<table class="table table-striped " id="tableSearch">
						<thead>
							<tr>
								<th style='text-align: center; vertical-align:middle;'></th>		
							</tr>
						</thead>
						<tbody>
							<?php 
							while($libro = $resultSet->fetch_assoc()){
								?>
								<tr>
									<td>
										<div class="row">
											<div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-3" id="divImagenLibro">
												<img class="img-responsive img-thumbnail" width="200px" src="images/portadas/<?php echo $libro['rutaImagen'] ?>" alt="" data-toggle="tooltip" title="Ver libro" onclick="window.location.href='<?php echo "infoLibro.php?idLibro=". $libro["id"] ?>'" style='cursor:pointer' >
											</div>

											<div class="col-sm-offset-1 col-sm-10 col-md-6" id="divInfoLibro">
											<h4> <strong data-toggle="tooltip" title="Ver libro" onclick="window.location.href='<?php echo "infoLibro.php?idLibro=". $libro["id"] ?>'" style='cursor:pointer' ><?php echo $libro['nombreLibro'] ?></strong>
											</h4>
												<ul>												
										
													<li><h5>Autor: <?php echo $libro['nombreAutor'] ?></h5></li>
													<li><h5>Género: <?php echo $libro['genero'] ?></h5></li>
													<li><h5>Editorial: <?php echo $libro['nombreEditorial'] ?></h5></li>
													<li><h5>Precio (físico): $<?php echo $libro['precioFisico'] ?></h5></li>
													<li><h5>Precio (digital): $<?php echo $libro['precioDigital'] ?></h5></li>
												</ul>
												
												<br><br>
											  
									  		</div>
								  		</div>

									</td>
								</tr>
							<?php							
							}

							?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
			<?php
			}
			else{
			?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<center>
						<h1>Libro no encontrado</h1>
						<img src="images/notFound.png">
						<h1>Cada día crece más nuestro catálogo. <br>Vuelve a buscar en unos días.</h1>
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
	<script src="js/dataTables.js"></script>


	<script>
		$(document).ready(function(){
			//Activar Tooltip de bootstrap
		    $('[data-toggle="tooltip"]').tooltip();
		    $("#tableSearch").DataTable({
		    	language:{
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar:",
				    "sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    }
				},
				"lengthChange": false,
				"pageLength" : 5
		    });

		    $("#tableSearch_wrapper").find(".col-sm-6")[0].remove();
		    setInterval(function(){
		    	$('.paginate_button').click(function() {$('a.back-to-top').click();});
		    },3000);

		    $("#menuCatalogo").addClass("active");




		});
	</script>
	
	

</body>
</html>