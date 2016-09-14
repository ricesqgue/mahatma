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
	<link rel="stylesheet" href="/eCommerce/css/animate.css">
	<link rel="stylesheet" href="/eCommerce/css/eCommerce.css">
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
		$busqueda = $_GET["busqueda"];
		$query = "select l.id as id, l.nombre as nombreLibro, l.precioFisico, l.precioDigital, l.rutaImagen, l.genero, a.nombre as nombreAutor, e.nombre as nombreEditorial from libro l inner join autor a on a.id=l.idAutor inner join editorial e on e.id=l.idEditorial where l.nombre like '%".$busqueda."%' or a.nombre like '%".$busqueda."%' ";

		require "php/conexionMySQL.php";
		$resultSet = $conn->query($query);

	?>
	<div class="container-fluid" style="min-height:400px">
		<?php 
		if($resultSet->num_rows >0){
			?>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
				<h3>Mostrando resultados de <strong>'<?php echo $busqueda?>'</strong></h3>
					<br><br>
					<div class="table-responsive " style="padding-left:20px; padding-right:20px">
					<table class="table table-striped table-bordered" id="tableSearch">
						<thead>
							<tr>
								<th style='text-align: center; vertical-align:middle;'></th>	
								<th style='text-align: center; vertical-align:middle;'>Nombre</th>	
								<th style='text-align: center; vertical-align:middle;'>Autor</th>	
								<th style='text-align: center; vertical-align:middle;'>Género</th>	
								<th style='text-align: center; vertical-align:middle;'>Editorial</th>	
								<th style='text-align: center; vertical-align:middle;'>Precio físico</th>	
								<th style='text-align: center; vertical-align:middle;'>Precio digital</th>	
								<th style='text-align: center; vertical-align:middle;'></th>	
							</tr>
						</thead>
						<tbody>
							<?php 
							while($libro = $resultSet->fetch_assoc()){
								echo "<tr>" .
									"<td style='text-align: center; vertical-align:middle;'><img src='images/portadas/". $libro['rutaImagen'] ."' width='60px'></td>" .
									"<td style='text-align: center; vertical-align:middle;'>".$libro['nombreLibro']."</td>" .
									"<td style='text-align: center; vertical-align:middle;'>".$libro['nombreAutor']."</td>" .
									"<td style='text-align: center; vertical-align:middle;'>".$libro['genero']."</td>" .
									"<td style='text-align: center; vertical-align:middle;'>".$libro['nombreEditorial']."</td>" .
									"<td style='text-align: center; vertical-align:middle;'>$".$libro['precioFisico']."</td>" .
									"<td style='text-align: center; vertical-align:middle;'>$".$libro['precioDigital']."</td>" .
									"<td style='text-align: center; vertical-align:middle;'><span data-toggle='tooltip' title='Ver libro' class='icon-book' style='cursor:pointer' onclick=\"window.location.href='infoLibro.php?idLibro=".$libro['id']."'\"></span></td>" .
								"</tr>";
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
				"pageLength" : 10
		    });

		    $("#tableSearch_wrapper").find(".col-sm-6")[0].remove();
		    setInterval(function(){
		    	$('.paginate_button').click(function() {$('a.back-to-top').click();});
		    },3000);
		});
	</script>
	
	

</body>
</html>