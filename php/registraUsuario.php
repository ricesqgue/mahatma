<?php 
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$contrasena = $_POST["contrasena"];
	$estado = $_POST["estado"];


	$json = array();

	//Se hace una validacion del formulario.
	if(trim($nombre) == ''){
		$json['error'] = array('mensaje'=>'Ingrese su nombre','formGroup'=>'Nombre');		
	}
	else if(trim($apellido) == ''){
		$json['error'] = array('mensaje'=>'Ingrese su apellido','formGroup'=>'Apellido');		
	}
	else if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
		$json['error'] = array('mensaje'=>'Ingrese un correo electrónico válido','formGroup'=>'Email');		
	}
	else{
		//pasa validacion
		
		//conexion BD
		include 'conexionMySQL.php';

		//Se checa que el correo no este registrado.
		$query = "SELECT count(1) AS cantidad FROM usuario WHERE email = '".$email."'";		
		$resultado = $conn->query($query);		
		if($resultado->num_rows > 0){			
			while ($row = $resultado->fetch_assoc()) {				
				if($row["cantidad"] > 0){
					$json['error'] = array('mensaje'=>'Ese correo electrónico ya está registrado','formGroup'=>'Email');			
				}
				else{
					$query = "INSERT INTO usuario VALUES (default, '".$nombre."','".$apellido."','".$email."',md5('".$contrasena."'),".$estado.",DATE(now()))";					
					if ($conn->query($query) === true ) {
						$json['exito'] = 'Usuario registrado correctamente';
					}else{
						$json['error'] = array('mensaje'=>'Error interno. ','formGroup'=>'');
					}
				}
			}
		}
		$conn->close();
	}

	echo json_encode($json)


?>