<?php $this->load->view('includes/header'); ?>

<script>
	$(document).ready(function(){
		  $(".voteMe").click(function() {
			var voteId = this.id;
			var upOrDown = voteId.split('-'); 
			$.ajax({
				type: "post",
				url: "http://104.131.29.243/index.php/post/likes",
				cache: false,				
				data:'voteId='+upOrDown[0] + '&upOrDown=' +upOrDown[1],
				success: function(response){				
					try{
						if(response=='true'){	
							var newValue = parseInt($("#"+voteId+'_result').text()) + 1;            
							$("#"+voteId+'_result').html(newValue);
							location.reload();
						}else{
							alert('Sorry Unable to update..');
						}
					}catch(e) {		
						alert('Exception while request..');
					}		
				},
				error: function(){						
					alert('Error while request..');
				}
			 });
		});
	});
</script>




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
						<span><a id="<?php echo $post2->id_comentario.'-upvote';?>" class="voteMe"><span class="glyphicon glyphicon-thumbs-up"></span></a><span id="1_upvote_result" ><?php echo $post2->up_vote;?></span></span> | 
						<a id="<?php echo $post2->id_comentario.'-downvote';?>" class="voteMe"><span class="glyphicon glyphicon-thumbs-down"></span></a><span id="1_downvote_result" ><?php echo $post2->down_vote;?></span>
							
					<?php endforeach; else:?>
					<h4>No hay respuestas a tu pregunta.</h4>	
					<?php endif;?>
				</div>
			</div>

		</div>
	</div>
</div>  

<?php $this->load->view('includes/footer'); ?>