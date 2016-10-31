<?php 

session_start();
date_default_timezone_set('America/Mexico_City');

$jsontl = json_decode($_POST["jsontl"]);
$direccion = json_decode($_POST["direccion"]);
$jsonMensaje = array();
$idCompraTotal = 0;
require 'conexionMySQL.php';


$query = "insert into compratotal values(default, ".$_SESSION['id'].",now(),'".$direccion->calle."','".$direccion->numero."','".$direccion->colonia."','".$direccion->municipio."','".$direccion->cp."','".$direccion->estado."','".$_POST['numeroTarjeta']."')";


$jsontl = acomodaLista($jsontl);


if($conn->query($query) === TRUE){
	$idCompraTotal = $conn->insert_id;



	$count = count($jsontl);
	for ($i = 0; $i < $count; $i++){
		$query = "select precio".$jsontl[$i]->tipo." as precio from libro where id = ".$jsontl[$i]->id;
		$resultset = $conn->query($query);
		$row = $resultset->fetch_assoc();

		$query = "insert into compradetalle values('".$idCompraTotal."','".$jsontl[$i]->id."','".$jsontl[$i]->tipo."', '".$row['precio']."','".$jsontl[$i]->cantidad."');";
		
		if($conn->query($query) === TRUE){
			$jsonMensaje["mensaje"] = "Compra realizada correctamente.";
		}else{
			$jsonMensaje["mensaje"] = "Error al realizar la compra.";
		}
	}

}else{
	$jsonMensaje["mensaje"] = "Error al realizar la compra.";
}


$conn->close();
echo json_encode($jsonMensaje);


function acomodaLista($jsontl){
	$lista = array();
	array_push($lista, $jsontl[0]);
	$lista[0]->cantidad = 1;
	$flagEntra = 1;

	$count = count($jsontl);
	for($i = 1; $i < $count; $i++){
		$flagEntra = 1;
		for($j = 0 ; $j< count($lista); $j++){
			if($jsontl[$i]->nombre == $lista[$j]->nombre && $jsontl[$i]->tipo == $lista[$j]->tipo ){
				$cantidad = $lista[$j]->cantidad;
				$cantidad++;;
				$lista[$j]->cantidad = $cantidad;
				$flagEntra = 0;
			}
		}
		if($flagEntra){
			$jsontl[$i]->cantidad = 1;
			array_push($lista,$jsontl[$i]);
		}

	}


	return $lista;


}
