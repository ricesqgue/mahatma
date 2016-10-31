<?php 
	require 'conexionMySQL.php';

	$query = "select * from vw_detalleCompra where idCompratotal = " . $_POST["id"];


	$resultset = $conn->query($query);

	$json = array();
	$salida = "<div class='table-responsive'><table class='table table-stripped table-bordered><thead><tr><td></td><td></td></tr></thead><tbody>'";

	if($resultset->num_rows > 0){
		while($row = $resultset->fetch_assoc()){
			$salida .= "<tr><td><img width='80px' class='img-thumbnail' src='images/portadas/".$row["idLibro"].".jpg'></td><td><strong>".$row['nombre']." - ".$row['tipo']."</strong> <br> Cantidad: ".$row['cantidad']."<br>Precio unitario: $".$row['precio']."<br>Autor: ".$row['autor']."<br>Género: ".$row['genero']."</td></tr>";
		}
	}
	$salida .= "</tbody></table></div>";

	$json["tabla"] = $salida;

	$conn->close();

	echo json_encode($json);