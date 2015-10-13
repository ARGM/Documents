<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Choteando</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendor/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/messages.css" />	
		<script src="<?php echo base_url() ?>assets/js/vendor/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.min.js"></script>
	</head>
<body>

	<header class="navbar navbar-default navbar-static-top" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url('welcome') ?>">Choteando</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li><a class="navbar-brand" href="<?php echo site_url('welcome') ?>">Inicio</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<?php echo form_open('login/', 'class="navbar-form navbar-right form-inline"') ?>
							<div class="form-group">
								<input type="hidden" name="r" value="search/results">
								<div class="row">
									<div class="col-md-6">
										<input type="text" name="username" class="form-control" id="username" placeholder="Usuario">
									</div>
									<div class="col-md-6">
										<input type="password" name="password" class="form-control" id="password" placeholder="password">
									</div>
								</div>
							</div>
							<button type="submit" data-toggle="modal" data-target="#myModal4" class="btn btn-default">Entrar</button>
						</form>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	
	<!-- - - - - - - - - - - - - - - -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>Choteando1.0 - Red Social</h2>
				<p>Choteando es un sistema de red social de proposito general, codigo abierto y gratis.</p>
				<img src="<?php echo base_url() ?>assets/main.png">
				<h3>Descripcion</h3>
				<p>Choteando es un sistema de red social en el que puedes rellenar tu perfil, hacer publicaciones de texto y/o imagenes, buscar amigos, enviar, recibir y aceptar solicitudes de amistad, enviar mensajes a amigos, comentar y/o dar likes a las publicaciones, recibir notificaciones y mucho mas.</p>
				<h3>Modulos</h3>
				<p>Defino a grandes rasgos los modulos generales del sistema</p>
				<ul>
					<li><b>Usuarios</b>: Se pueden registrar para acceder a sus cuentas y asi empezar la aventura smile.</li>
					<li><b>Publicaciones</b>: Cada usuario puede publicar lo que quiera y lo visualizara en su muro, el cual podran ver tambien sus amigos.</li>
					<li><b>Perfiles</b>: Los usuarios pueden rellenar su perfil, escribir sobre ellos, que les gusta y que no, sus amigos pueden ver esta informacion.</li>
					<li><b>Likes</b>: Los usuarios pueden darle likes a las publicaciones y/o imagenes de sus amigos.</li>
					<li><b>Comentarios</b>: Los usuarios pueden escribir comentarios a las publicaciones y/o imagenes de sus amigos.</li>
					<li><b>Imagenes</b>: Poder subir imagenes, poner imagen de perfil.</li>
					<li><b>Amigos</b>: Puedes buscar personas, enviarles solicitud de amistad, esperar a que te acepten o tu puedes recibir solicitudes y aceptarlas.</li>
					<li><b>Mensajes</b>: Puedes enviar mensajes a tus amigos y tener conversaciones.</li>
					<li><b>Notificaciones</b>: recibe notificaciones cuando tus amigos dan like o comentan tus publicaciones y/o imagenes.</li>
				</ul>
			</div>
			
			  <!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Validaciones</h4>
						</div>
						<div class="modal-body">
							<?php echo validation_errors(); ?>
							<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			
			
			
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Registro Gratis por Siempre!
					</div>
					<div class="panel-body">
						
						<?php echo form_open('register/registrar') ?>
							<div class="form-group">
								<label for="inputName">Nombre</label>
								<input type="text" name="fname" class="form-control" placeholder="Nombre">	
							</div>
							<div class="form-group">
								<label for="lastName">Apellidos</label>
								<input type="text" name="lname" class="form-control" placeholder="Apellido">
							</div>
							<div class="form-group">
								<label for="username">Usuario</label>
								<input type="text" name="username" class="form-control" placeholder="Usuario">	
							</div>
							<div class="form-group">
								<label for="inputEmail">Correo electronico</label>
								<input type="email" name="email" class="form-control" placeholder="Email">	
							</div>
							<div class="form-group">
								<label for="inputpassword">Password</label>
								 <input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="inputpassword2">Confirmar Password</label>
								<input type="password" name="cpassword" class="form-control" placeholder="Confirmar password">	
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox"> Acepto terminos y condiciones
								</label>
							</div>
							<button type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-default">Registrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<hr/>
			</div>
		</div>		
		<div class="row">
			<div class="col-md-12">
				<p>ARGM &copy; 2015. Todos los Derechos Reservados</p>
			</div>
		</div>
	</div>
	<br>
	


	
</body>
</html>