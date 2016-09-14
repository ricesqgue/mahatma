//Session Storage Carrito de compras.
if(window.sessionStorage){
	var libros;
	if(sessionStorage.getItem("libros") !== null){
		libros = JSON.parse(sessionStorage.getItem("libros"));
		llenaListaCarrito();
	}
	else{
		libros = new Array();
	}

	$("#cantidadCarrito").text(libros.length);
}
else{
	console.log("Tu navegador no soporta session storage");
}


//Guarda libro en el carrito.
function agregaCarrito(id,nombre,tipo){
	$("#btnAgregaCarrito").button("loading");
	libros.push({id: id, nombre: nombre, tipo: tipo});
	sessionStorage.setItem("libros",JSON.stringify(libros));
	console.log(JSON.parse(sessionStorage.getItem("libros")));
	$("#cantidadCarrito").addClass("bounce");
	$("#cantidadCarrito").text(libros.length);

	setTimeout(function(){
		$("#cantidadCarrito").removeClass("bounce");
		$("#btnAgregaCarrito").button("reset");
		llenaListaCarrito();
		$("#msjAgregaCarrito").html("<span id='checkmark' class='animated fadeIn'><span style='color:green; margin-left:10px' class='icon-checkmark'>Agregado</span></span>")
		setTimeout(function(){
			$("#checkmark").removeClass("fadeIn");
			$("#checkmark").addClass("fadeOut");
		},2000);
	},800);

}

function llenaListaCarrito(){
	if(libros.length < 1){
		$("#listaCarrito").html("<li><a>Carrito vacío</a></li>");
	}
	else{
		$("#listaCarrito").html("");
		for(var i=0; i<libros.length; i++){
			$("#listaCarrito").html($("#listaCarrito").html() + "<li><a><span style='cursor:pointer' data-toggle='tooltip' title='Ver libro' onclick=\"window.location.href='infoLibro.php?idLibro="+libros[i].id+"'\" class='icon-book'>&nbsp;"+libros[i].nombre + " - " + libros[i].tipo +"</span> | <span data-toggle='tooltip' title='Eliminar del carrito' style='cursor:pointer' onclick='eliminaCarrito("+i+")'>&nbsp; &times;</span></a></li>");
		}
	}
	$("#cantidadCarrito").removeClass("bounce");
}

function eliminaCarrito(index){
	libros.splice(index,1);
	sessionStorage.setItem("libros",JSON.stringify(libros));
	console.log(JSON.parse(sessionStorage.getItem("libros")));
	$("#cantidadCarrito").addClass("bounce");
	$("#cantidadCarrito").text(libros.length);
	setTimeout(function(){
		$("#cantidadCarrito").removeClass("bounce"); 
		llenaListaCarrito();
	},800);

}



//**********************************************************************


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
		var email = $("#emailRegistro").val();
		var contrasena = $("#contrasenaRegistro").val();
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
			$("#formGroupContrasenaReg").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}
		else if (contrasenaR === "") {
			$("#errorFormulario").html("Repita su contraseña<br>");
			$("#formGroupContrasenaReg").addClass("has-error");
			$("#btnRegistra").button("reset");	
		}
		else if (contrasena !== contrasenaR) {
			$("#errorFormulario").html("Las contraseñas no coinciden<br>");
			$("#formGroupContrasenaReg").addClass("has-error");
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


//Comentarios 

function comentarios(idLibro){
	$.post("php/checaComentarios.php",{idLibro: idLibro}, function(data){
		$("#comentarios").html(data.codigo);
	},"json");
}

function enviaComentario(idLibro){
	var comment = $("#comment").val();
	if(comment.length < 10){
		$("#errorComentario").html("<span id='msjComentario' class='animated fadeIn'><span style='color:red; margin-left:10px' class='icon-cross'> Comentario demasiado corto</span></span>");
		setTimeout(function(){
			$("#msjComentario").removeClass("fadeIn");
			$("#msjComentario").addClass("fadeOut");
		},2000);
	}
	else{
		$.post("php/comenta.php",{idLibro: idLibro, comentario: comment},function(data){
			if(data.exito !== undefined){
				comentarios(idLibro);
			}
			else{
				$("#errorComentario").html("<span id='msjComentario' class='animated fadeIn'><span style='color:red; margin-left:10px' class='icon-cross'>"+data.error+"</span></span>");
				setTimeout(function(){
					$("#msjComentario").removeClass("fadeIn");
					$("#msjComentario").addClass("fadeOut");
				},2000);
			}
		},"json");
	}

}
//***************************************************************************


