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
		$("#listaCarrito").html($("#listaCarrito").html() + "<li><a style=\"cursor:pointer\" data-toggle=\"tooltip\" title=\"Abrir carrito\" class=\"text-center\" onclick=\"$('#jsonLibro').val(sessionStorage.getItem('libros')); document.getElementById('formCarrito').submit();\">Ver carrito</a></li>")
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
		var edad = $("#edad").val();
		var genero = $("#genero").val();
		

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
			$("#formGroupEmailReg").addClass("has-error");
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
		}
		else if(edad === "" || !$.isNumeric(edad)){
			$("#errorFormulario").html("Inserte su edad<br>");
			$("#formGroupEdad").addClass("has-error");
			$("#btnRegistra").button("reset");
		}
		else if(genero === ""){
			$("#errorFormulario").html("Seleccione su género<br>");
			$("#formGroupGenero").addClass("has-error");
			$("#btnRegistra").button("reset");
		}
		else{
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


//Add Hover effect to menus
jQuery('ul.nav li.dropdown').hover(function() {
  		jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
	}, function() {
  			jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
});//Add Hover effect to menus



//***************************************************************************


//***************************************************************************

//Valida formulario de compra.

	function validaFormularioCompra(){

		$("#btnContinuar").button("loading");

		var calle = $("#calle").val();
		var numero = $("#numero").val();
		var colonia = $("#colonia").val();
		var municipio = $("#municipio").val();
		var estado = $("#estado").val();
		var cp = $("#cp").val();

		var numeroTarjeta = $("#numeroTarjeta").val();
		var nombreTitular = $("#nombreTitular").val();
		var fechaVencimiento = $("#fechaVencimiento").val();
		var codigoSeguridad = $("#codigoSeguridad").val();
		

		if (calle === "") {			
			$("#errorFormulario").html("Ingrese la calle de su domicilio<br>");
			$("#formGroupCalle").addClass("has-error");
			$("#btnContinuar").button("reset");
		}
		else if (numero === "") {
			$("#errorFormulario").html("Ingrese el número de su domicilio<br>");
			$("#formGroupNumero").addClass("has-error");
			$("#btnContinuar").button("reset");	
		}
		else if (colonia === "") {
			$("#errorFormulario").html("Ingrese la colonia de su domicilio<br>");
			$("#formGroupColonia").addClass("has-error");
			$("#btnContinuar").button("reset");	
		}
		else if (municipio === "" || !(/^[a-zA-z\ áéíóúÁÉÍÓÚ]{4,}$/.test(municipio))) {
			$("#errorFormulario").html("Ingrese su municipio<br>");
			$("#formGroupMunicipio").addClass("has-error");
			$("#btnContinuar").button("reset");	
		}
		else if (estado === "") {
			$("#errorFormulario").html("Seleccione su estado<br>");
			$("#formGroupEstado").addClass("has-error");
			$("#btnContinuar").button("reset");	
		}
		else if (cp === "" || !/^[0-9]{5}$/.test(cp)) {
			$("#errorFormulario").html("Ingrese su código postal<br>");
			$("#formGroupCP").addClass("has-error");
			$("#btnContinuar").button("reset");	
		}
		else if (numeroTarjeta === "" || !/^[0-9]{16}$/.test(numeroTarjeta)) {
			$("#errorFormulario").html("Ingrese el número de su tarjeta<br>");
			$("#formGroupNumeroTarjeta").addClass("has-error");
			$("#btnContinuar").button("reset");
		}
		else if (nombreTitular === "" || !/^[a-zA-Z\ áéíóúÁÉÍÓÚ]{6,}$/.test(nombreTitular) ){
			$("#errorFormulario").html("Ingrese el nombre del titular de la tarjeta<br>");
			$("#formGroupNombreTitular").addClass("has-error");
			$("#btnContinuar").button("reset");
		}
		else if (fechaVencimiento === "" || !/^(([0][1-9])|([1][0-2]))\/[1-9]{2}$/.test(fechaVencimiento)){
			$("#errorFormulario").html("Ingrese la fecha de vencimiento de la tarjeta<br>");
			$("#formGroupFechaVencimiento").addClass("has-error");
			$("#btnContinuar").button("reset");
		}
		else if (codigoSeguridad === "" || !/^[0-9]{3}$/.test(codigoSeguridad)){
			$("#errorFormulario").html("Ingrese el código de seguridad de la tarjeta<br>");
			$("#formGroupCodigoSeguridad").addClass("has-error");
			$("#btnContinuar").button("reset");
		}
		else{
			//Se envia los datos al servidor para generar  la orden de compra.
			
			$("#jsontl").val(JSON.stringify(libros));

			document.getElementById("formCompra").submit();

		}
	}

//***************************************************************************

function aceptaCompra(){
	$("#modalCompraBody").hide();
	$("#loader").show();
	setTimeout(function(){
		$("#statusCompra").text("Validando tarjeta...");
		setTimeout(function(){
			$("#statusCompra").text("Conectando con el banco...");	
			setTimeout(function(){
				
				$.post("php/terminaCompra.php",$("#formTerminaCompra").serialize(),function(res){
					sessionStorage.clear();
					window.location.href="misCompras.php?msj="+res.mensaje;
				},"json");


			}, 2500);
		},3000);
	}, 3000);
}


//***************************************************************************

//***************************************************************************
//Show detalle Compra
function showDetalleCompra(compra){
	$("#modalDetalleCompraBody").html("<center><div class='loader'></div></center>");
	$("#modalDetalle").modal("toggle");
	$.post("php/detalleCompra.php",{id:compra},function(res){
		$("#modalDetalleCompraBody").html(res.tabla);

	},"json");
}



//***************************************************************************

//DescargaLibro

function descargaLibro()
{
	document.getElementById("formDescargaLibro").submit();
}