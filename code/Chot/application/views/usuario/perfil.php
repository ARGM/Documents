<?php $this->load->view('includes/header'); ?>

<style>
ul,ol,li{
	list-style-type: none;
}

h2{
	color: #2864B4;
	text-decoration: none;
}
</style>

<script>
	$(document).ready(function(){
		  $(".voteMe").click(function() {
			var voteId = this.id;
			var upOrDown = voteId.split('_'); 
			$.ajax({
				type: "post",
				url: "http://104.131.29.243/index.php/usuario/likes",
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

<script>
	$(document).keypress(function(e) {	
			var id = e.target.id;
			var id2 = id.split('_');	    	
	    	var uno =document.getElementById(id).value;
	    	if(e.which == 13) {		   		 	    
	    		$.ajax({
				    type: 'POST',
				    // make sure you respect the same origin policy with this url:
				    // http://en.wikipedia.org/wiki/Same_origin_policy
				    url: "http://104.131.29.243/index.php/usuario/comen_post",
				    data: { 
				        'id_post': parseInt(id2[0]), 
				        'comen': uno // <-- the $ sign in the parameter name seems unusual, I would avoid it
				    },
				    success: function(msg){
				        //alert('wow' + msg);
				        location.reload();
				    }
				});
	  		}	
	    
	  
	});
</script>



<!-- - - - - - - - - - - - - - - -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="well">
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo $img?>" width="75" height="75" >  
					</div>
					<div class="col-md-8">
						<h5><a href="<?php echo site_url('usuario/')?>"><?php echo $Nombre?></a></h5>
						<a href="<?php echo site_url('usuario/configuracion')?>" class="btn btn-default btn-xs">Editar Informacion</a>
					</div>
				</div>
			</div>
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
					Publicar Estado
				</div>
				<div class="panel-body">
					<?php echo validation_errors(); ?>
					<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
					<?php echo form_open('usuario/publicar');?>
						<div class="form-group">							
							<textarea name="publicacion" placeholder="Publicar Estado" class="form-control" rows="2"></textarea>							
						</div>						
						<!--  <button type="button" id="publish" class="btn btn-primary btn-block">Publicar</button>-->						
						<button type="submit" value="submit" class="btn btn-primary">Publicar</button>						
					</form>					
				</div>
			</div>

			<div class="panel panel-default">				
				<div class="panel-body">
					<?php if($query):foreach($query as $post):?>
						<h6>(<?php echo $post->date_added;?>)</h6>  
						<p id="<?php echo $post->id;?>"><?php echo $post->body;?></p>
						<span><a id="<?php echo $post->id.'_upvote';?>" class="voteMe"><span class="glyphicon glyphicon-thumbs-up"></a><span id="1_upvote_result" ><?php echo $post->up_vote;?></span></span> | 
						<a id="<?php echo $post->id.'_downvote';?>" class="voteMe"><span class="glyphicon glyphicon-thumbs-down"></a><span id="1_downvote_result" ><?php echo $post->down_vote;?></span>
						<?php echo '<a id="'.$post->id.'" data-toggle="modal" data-target="#myModal" href=""> Editar</a> ';?>		 
						<?php echo anchor('usuario/eliminar/'.$post->id, 'Eliminar', 
						array('onclick' => "return confirm
					            ('Are you sure want to delete this post?')")); ?>				    
					    					    
					     <?php $q = get_comentarios($post->id);
					     if($q):foreach($q as $p):
					     	echo '<br>';	
					     	echo '<b>'.$p->user.'</b>'.' '.$p->comentario.'<br>'.$p->date;?>
					     
					     <?php endforeach; else:?>
					     	
						 <?php endif;?>
					     
					    <br><br>
					    <textarea id="<?php echo $post->id.'_coment';?>" placeholder="Escribe un comentario..." name="publicacion" class="form-control" rows="1"></textarea>
					    
					<?php endforeach; else:?>
							<h4>No hay publicaciones!</h4>
					<?php endif;?>

								
				</div>
			</div>

		</div>
	</div>
</div>
 <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar Post</h4>
			</div>
			<div class="modal-body">				
				<?php echo form_open('usuario/editar/');?>
					<div class="form-group">					 	
						<textarea id="output" name="publicacion" class="form-control" rows="5"></textarea>
					</div>
					<input type="hidden" id="id_pos" name='id_pos'>
					<button type="submit" value="submit" class="btn btn-primary">Editar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div> 

<script language="javascript" type="text/javascript">	
	
	var id = "";
	$(document).ready(function() {
	    $("a").click(function(event) {
	    	var id = event.target.id.toString();
	    	var output = document.getElementById(event.target.id.toString()).innerHTML;
			document.getElementById("output").value = output;
			document.getElementById("id_pos").value = id;
	        //alert(event.target.id);        	        
	    });
	});		
</script>  
<?php $this->load->view('includes/footer'); ?>