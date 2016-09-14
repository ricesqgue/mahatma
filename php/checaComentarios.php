<?php
	session_start();

	require "conexionMySQL.php";
	$json = array();
	$codigo = "";
	$idLibro = $_POST["idLibro"];

	$query = "select c.comentario, u.nombre, c.fecha from comentario c inner join usuario u on c.idUsuario = u.id where c.idLibro = " . $idLibro;
	$resultSet = $conn->query($query);
	if($resultSet->num_rows > 0){
		while($comentario = $resultSet->fetch_assoc()){

			$codigo .= "<hr>".
				"<h5>" . $comentario["nombre"] . " - ". $comentario['fecha']."</h5>" .
				"<p>" .
					 $comentario["comentario"] .
				"</p>";

		}
	}else{
		$codigo =  "<h5>Aún no hay comentarios de este libro.</h5>";
	}
	if(isset($_SESSION["nombre"])){

		$codigo .= "<hr><br><form id='formComentario'>" .
			"<div class='col-sm-8 col-md-6'> " .
				"<strong>Escribe un comentario...</strong>" .
				"<textarea class='form-control' id='comment'></textarea><br>".
				"<button class='btn btn-info' data-loading-text='Enviando...' type='button' onclick=\"enviaComentario(".$idLibro.")\">Enviar</button><span id='errorComentario'></span>".
			"</div>".
		"</form>";
		}

		$json["codigo"] = $codigo;
		 echo json_encode($json);
	?>
