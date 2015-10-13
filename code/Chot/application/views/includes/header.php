<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Choteando</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendor/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendor/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/messages.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-ui.css" />		
		<script src="<?php echo base_url() ?>assets/js/vendor/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/vendor/jquery-ui.js"></script>		
	</head>
<body>


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
			<a class="navbar-brand" href="<?php echo site_url('welcome') ?>"><i class="fa fa-smile-o"></i> CHOTEANDO</a>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo site_url('welcome') ?>">INICIO</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="hidden" name="view" value="search">
					<input type="text" class="form-control" name="q" placeholder="Buscar personas ...">
				</div>
				
				<a type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></a>
			</form>
			<?php
				$session_data = $this->session->userdata('datos');
	     		$data['username'] = $session_data['username']; 
	            if($data['username']):
			?>			
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<b class="caret"></b></a>
					<span class="dropdown-arrow"></span>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('post/matematica') ?>">Matematicas</a></li>
						<li><a href="<?php echo site_url('post/fisica') ?>">F&iacute;sica</a></li>
						<li><a href="<?php echo site_url('post/programacion') ?>">Programaci&oacute;n</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url('post/otros') ?>">Otros</a></li>
					</ul>
				</li>
				<li><a href="<?php echo site_url('post/add_new_entry') ?>" >Nueva Pregunta</a></li>
				<li class="dropdown messages-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="label label-default">0</span> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="./?view=notifications">Ver notificaciones</a></li>
					</ul>
				</li>
				<li><a href="./?view=friendreqs"><i class="fa fa-male"></i> <span class='label label-default'>0</span></a></li>
				<li><a href="./?view=conversations"><i class="fa fa-envelope-o"></i> <span class='label label-default'>0</span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $data['username']?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('usuario/notificaciones') ?>">Notificaciones</a></li>
	                    <li><a href="<?php echo site_url('post/') ?> ">Mis preguntas</a></li>
	                    <li><a href="<?php echo site_url('usuario/')?>">Perfil</a></li>
	                    <li><a href="<?php echo site_url('usuario/configuracion')?>">Confiiguraci&oacute;n</a></li>
	                    <li class="divider"></li>
	                    <li><a href="<?php echo site_url('login/logout') ?>">Salir</a></li>
					</ul>
				</li>
				<?php else:?>
					<ul class="nav navbar-nav">
						<li><a href="<?php echo site_url('login') ?>">Conectarse</a></li>
					</ul>					
	            <?php endif;?>
			</ul>
		</nav>
	</div>
</header>






