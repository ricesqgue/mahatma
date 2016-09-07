	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Menú</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/eCommerce/"><img width="80px" src="images/logo.png" alt=""></a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li id="menuInicio"><a href="/eCommerce/"><span class="icon-home"> </span> INICIO</a></li>
						<li id="menuNosotros"><a href="nosotros.php"><span class="icon-profile"></span> NOSOTROS</a></li>
						<li id="menuCatalogo"><a href="#"><span class="icon-books"></span> CATÁLOGO</a></li>
						<li id="menuSucursales"><a href="sucursales.php"><span class="icon-location"></span> SUCURSALES </a></li>
						<li id="menuContacto"><a href="contacto.php"><span class="icon-phone"></span> CONTACTO </a></li>
	
					</ul>
	
					<ul class="nav navbar-nav navbar-right">
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" id="inputBuscar" name="inputBuscar" class="form-control" placeholder="Buscar...">
							</div>
							<button type="submit" id="btnBuscar" class="btn btn-default"><span class="icon-search"></span></button>
						</form>
	
						<li><a href="#" id="carrito"><span class="icon-cart carrito"> </span><span class="badge">0</span></a></li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
								<?php 
									if(isset($_SESSION['nombre'])){ 
										echo $_SESSION['nombre']; 
									}
									else{
										echo 'USUARIO';
									} 
			
								?> 
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<?php 
									if(isset($_SESSION['nombre'])){ 
									?>
										<li><a href="#">Mi cuenta</a></li>
										<li><a href="php/cerrarSesion.php">Cerrar sesión</a></li>
									<?php	
									}
									else{	
									?>
										<li><a data-toggle="modal" href='#modalIniciaSesion'>Iniciar sesión</a></li>
										<li><a href="registro.php">Registrarse</a></li>									
								<?php
									} 
								?>


							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header>
	
<?php 
	if(!isset($_SESSION["nombre"])){
		?>
		<div class="modal fade" id="modalIniciaSesion">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Iniciar sesión</h4>
					</div>
					<div class="modal-body">
						<form id="formIniciaSesion">
							<div class="form-group" id="formGroupEmail">
								<label for="emailInicioSesion">Correo electrónico</label>
								<input class="form-control" type="email" name="emailInicioSesion" id="emailInicioSesion" onfocus="limpiaErrorFormulario('formGroupEmail','errorFormularioInicioSesion')">
								<br>
							</div>
							<div class="form-group" id="formGroupContrasena">
								<label for="contrasenaInicioSesion">Contraseña</label>
								<input class="form-control" type="password" name="contrasenaInicioSesion" id="contrasenaInicioSesion" onfocus="limpiaErrorFormulario('formGroupContrasena','errorFormularioInicioSesion')">
								<br>
							</div>	
							
							<span id="errorFormularioInicioSesion"></span>
						</form>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" id="btnInicia" data-loading-text="Cargando..." onclick="iniciarSesion()">Entrar</button>	
					</div>
				</div>
			</div>
		</div>
		<?php
	}
 ?>

		   
