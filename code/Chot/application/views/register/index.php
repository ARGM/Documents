<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Choteando</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-ui.css" />		
		<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
		<script src="<?php echo base_url() ?>assets/js/myjavascript.js"></script>		
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
				<a class="navbar-brand" href="<?php echo base_url('')?>">Choteando</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li><a class="navbar-brand" href="<?php echo base_url('')?>">Inicio</a></li>
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
					<li><b>Usuarios</b>: Se pueden registrar para acceder a sus cuentas.</li>
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
			
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Registro Gratis por Siempre!
					</div>
					<div class="panel-body">
						<div id="element" class="alert alert-info" style=''>
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Mensaje!</strong> 
  							<?php echo validation_errors(); ?>
							<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>						
						</div>
						
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
								<input type="text" id="user" name="username" class="form-control" placeholder="Usuario">	
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
									<input type="checkbox"  name="checkbox"> Acepto terminos y condiciones
								</label>
							</div>
							<button id="show" type="submit" class="btn btn-block btn-default">Registrar</button>
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
	
	<script type="text/javascript">
	 $(function(){
	   	$("#user").autocomplete({
	    source: "usuario/verificar_usuario" // path to the get_birds method
	  	});
	   }); 
	</script>

	
</body>
</html>