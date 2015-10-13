<?php $this->load->view('includes/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			
			<div class="list-group">
				<a href="#" class="list-group-item">Amigos <span class="label label-default pull-right">0</span></a>
				<a href="#" class="list-group-item">Fotos <span class="label label-default pull-right">0</span></a>
				<a href="#" class="list-group-item">Mensajes</a>
				<!--  <a href="#" class="list-group-item">Grupos</a> -->
			</div>
		</div>
		<div class="col-md-7">
			<!-- -->
			<div class="panel panel-default">
				<div class="panel-heading"> 
					Pregunta
				</div>
				<div class="panel-body">
					<?php foreach($query as $post):?>
						<h4><?php echo $post->title;?> (<?php echo $post->date;?>)</h4>
						<p> <?php echo $post->description;?></p>
					<?php endforeach; ?>				
				</div>
			</div>

			<div class="panel panel-default">				
				<div class="panel-body">
					<h2>Comentarios</h2>
					<?php if($query2): foreach($query2 as $post2):?>
						<h6><a href="<?php echo site_url('post/ver_perfil/'.$post2->username) ?>" ><?php echo $post2->username;?></a>(<?php echo $post2->date;?>)</h6>
						<p> <?php echo $post2->comment;?></p>
					<?php endforeach; else:?>
					<h4>Query falso</h4>	
					<?php endif;?>
				</div>
			</div>

		</div>
	</div>
</div>  

<?php $this->load->view('includes/footer'); ?>