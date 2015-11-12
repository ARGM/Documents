<?php $this->load->view('includes/header'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			
			<div class="list-group">
				<a href="<?php echo site_url('usuario/mis_amigos')?>" class="list-group-item">Amigos <span class="label label-default pull-right"><?php echo $total?></span></a>
				<!--<a href="#" class="list-group-item">Fotos <span class="label label-default pull-right">0</span></a>-->
				<a href="<?php echo site_url('usuario/verMensajesInternos') ?>" class="list-group-item">Mensajes</a>
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
						<p> <?php echo $post->description;?><p>
					<?php endforeach; ?>				
				</div>
			</div>

			<div class="panel panel-default">				
				<div class="panel-body">
					<?php echo validation_errors(); ?> 
					<?php echo form_open('post/comentar/'.$this->uri->segment(3));?>
						<div class="form-group">
						 	<label>Comentar</label>
					        <textarea name="comentario" class="form-control" rows="5"></textarea>
					 	</div>
					    <button type="submit" value="submit" class="btn btn-primary">Comentar</button>
					<?php echo form_close();?>
				</div>
			</div>

		</div>
	</div>
</div>



<?php $this->load->view('includes/footer'); ?>
