<?php 
	session_start();

	$json = array();
	$email = $_POST["emailInicioSesion"];
	$contrasena = $_POST["contrasenaInicioSesion"];

	if(trim($contrasena) == ''){
		$json['error'] = array('mensaje'=>'Ingrese su contraseña','formGroup'=>'Contrasena');		
	}
	else if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
		$json['error'] = array('mensaje'=>'Ingrese un correo electrónico válido','formGroup'=>'Email');		
	}
	else{

		include 'conexionMySQL.php';

		$query = "SELECT id, nombre, apellido, idEstado, fechaRegistro FROM usuario WHERE email = '".$email."' and contrasena = md5('".$contrasena."')";

		$resultado = $conn->query($query);

		if($resultado->num_rows > 0){
			while ($row = $resultado->fetch_assoc()) {
				$_SESSION["id"] = $row["id"];
				$_SESSION["nombre"] = $row["nombre"];
				$_SESSION["apellido"] = $row["apellido"];
				$_SESSION["idEstado"] = $row["idEstado"];
				$_SESSION["fechaRegistro"] = $row["fechaRegistro"];
				$_SESSION["email"] = $email;
				$json["exito"] = "Sesion iniciada";
			}
		}
		else{
			$json["error"] = array('mensaje'=>'Correo electrónico y/o contraseña incorrecto(s).','formGroup'=>'Email');
		}
	}
	$conn->close();

	echo json_encode($json);


 ?>