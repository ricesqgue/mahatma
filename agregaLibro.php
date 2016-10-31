<?php 
$nombre = $_POST["nombre"];
$genero = $_POST["genero"];
$editorial = $_POST["editorial"];
$autor = $_POST["autor"];
$descripcion = $_POST["descripcion"];
$preciof = $_POST["preciof"];
$preciod = $_POST["preciod"];
$ano = $_POST["ano"];
$paginas = $_POST["paginas"];
$imagen = $_POST["imagen"];


require 'php/conexionMySQL.php';

$query = "select id from editorial where nombre = '".$editorial."'";

$result = $conn->query($query);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$editorial = $row["id"];
}else{
	$query = "insert into editorial values (default,'".$editorial."')";
	if($conn->query($query) === TRUE){
		$editorial = $conn->insert_id;
	}
}

$query = "select id from autor where nombre = '".$autor."'";

$result = $conn->query($query);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$autor = $row["id"];
}else{
	$query = "insert into autor values (default,'".$autor."')";
	if($conn->query($query) === TRUE){
		$autor = $conn->insert_id;
	}
}

$query = "insert into libro (id,nombre,precioFisico,precioDigital, descripcion, genero, numPaginas, anio, idAutor, idEditorial,cantidad,rutaImagen) values (default,'".$nombre."',".$preciof.",".$preciod.",'".$descripcion."','".$genero."',".$paginas.",".$ano .",".$autor.",".$editorial.",30,'".$imagen."')";

$conn->query($query);

header('Location: agregaLibros.html')


 ?>