
//Codigo que genera boton para subir el scroll hasta el top**************

$('body').prepend('<a href="#" class="btn btn-default back-to-top"></a>');

var amountScrolled = 500;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top').click(function() {
	$('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});
//***************************************************************************

//Valida formulario de registro de usuario.

	function validaFormularioRegistro(){

		$("#btnRegistra").button("loading");
		
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var email = $("#email").val();
		var contrasena = $("#contrasena").val();
		var contrasenaR = $("#contrasenaR").val();
		var estado = $("#estado").val();
		
		if (nombre === "") {
			
			$("#errorFormulario").html("Inserte su nombre<br>");
			$("#formGroupNombre").addClass("has-error");
			$("#btnRegistra").button("reset");
		}
		else if (apellido === "") {
			$("#errorFormulario").html("Inserte su apellido<br>");
			$("#formGroupApellido").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}
		else if (email === "") {
			$("#errorFormulario").html("Inserte su correo electónico<br>");
			$("#formGroupEmail").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}
		else if (contrasena === "") {
			$("#errorFormulario").html("Inserte su contraseña<br>");
			$("#formGroupContrasena").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}
		else if (contrasenaR === "") {
			$("#errorFormulario").html("Repita su contraseña<br>");
			$("#formGroupContrasena").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}
		else if (contrasena !== contrasenaR) {
			$("#errorFormulario").html("Las contraseñas no coinciden<br>");
			$("#formGroupContrasena").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}
		else if (estado === "") {
			$("#errorFormulario").html("Seleccione su estado<br>");
			$("#formGroupEstado").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}else{
			//Se envia los datos al servidor para registar al usuario.
		
			$.post("php/registraUsuario.php",$("#formRegistro").serialize(),function (data){
				if(data.exito !== undefined){
					$.post("php/iniciaSesion.php",{emailInicioSesion:email,contrasenaInicioSesion:contrasena},function(res){
						window.location.href="/eCommerce/";
					},"json");

				}
				else if(data.error !== undefined){
					$("#errorFormulario").html(data.error.mensaje + "<br>");
					$("#formGroup"+data.error.formGroup).addClass("has-error");
					$("#btnRegistra").button("reset");	
				}
			},"json"); 
		}
		

		


	}

	function limpiaErrorFormulario(idGrupo,idFormError){
		$("#"+idGrupo).removeClass("has-error");
		$("#"+idFormError).html("");	
			
	}

//***************************************************************************


//Funcion para inicio de sesion

	function iniciarSesion(){
		$("#btnInicia").button("loading");
		var email = $("#emailInicioSesion").val();
		var contrasena = $("#contrasenaInicioSesion").val();
		if (email === "") {
			$("#errorFormularioInicioSesion").html("Inserte su correo electónico<br>");
			$("#formGroupEmail").addClass("has-error");
			$("#btnInicia").button("reset");	
		}
		else if (contrasena === "") {
			$("#errorFormularioInicioSesion").html("Inserte su contraseña<br>");
			$("#formGroupContrasena").addClass("has-error");
			$("#btnInicia").button("reset");	
		}
		else{
			$.post("php/iniciaSesion.php",$("#formIniciaSesion").serialize(),function(data){
				if(data.exito !== undefined){
					window.location.href="/eCommerce/";
				}
				else if(data.error !== undefined){
					$("#errorFormularioInicioSesion").html(data.error.mensaje );
					$("#formGroup"+data.error.formGroup).addClass("has-error");
					$("#btnInicia").button("reset");	
				}
			},"json");
		}

	}



//***************************************************************************


