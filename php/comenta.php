<?php 
	session_start();
	$idUsuario = $_SESSION["id"];
	$comentario = $_POST["comentario"];
	$idLibro = $_POST["idLibro"];
	require "conexionMySQL.php";
	$json = array();

	$query = "insert into comentario values (default,'".$comentario."','".$idUsuario."','".$idLibro."',now())";

	if($conn->query($query) === true){
		$json["exito"] = "Comentario registrado correctamente";
	}else{
		$json["error"] = "Error al comentar";
	}

	echo json_encode($json);
 ?>