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
			var id = event.target.id;
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

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="well">
		    	<div class="row">
					<div class="col-md-4">
						<img src="<?php echo $img?>" width="75" height="75" >
					</div>
					<div class="col-md-8">
						<?php if($amistad):?>
							<p>Hola amigo</p>
						<?php else:?>
							<?php echo form_open('usuario/sol_amistad');?>
					    		<p><button class="btn btn-primary btn-xs" type="submit" value="upload">Solicitar Amistad</button></p>
					    		<input type="hidden" name="user_to" value="<?php echo $user2?>">
					    		<?php echo $user2?>
				    		</form>    	
			    		<?php endif;?>    	
						<?php echo $error;?>
					</div>
				</div>
		    </div>			
            <div class="list-group">
            	<!--<a href="<?php //echo site_url('post/add_new_entry') ?>" class="list-group-item">Preguntar</a>
          		<a href="<?php //echo site_url('welcome') ?>" class="list-group-item">Volver</a>          
            	<a href="#" class="list-group-item">Grupos</a> -->
        	</div>
        </div>
        <div class="col-md-7">
	      	<!-- -->
		    <div class="panel panel-default">
		        <div class="panel-heading"> 
		    	    <h3>Perfil</h3>
		        </div>
		        <div class="panel-body">

		        	<?php if($amistad):?>
						<?php if($query): foreach($query as $post1):?>
							<h3><?php echo $post1->first_name;?>  <?php echo $post1->last_name;?></h3>							
						<?php endforeach; else:?>							
						<?php endif;?>
					<?php else:?>
						 <h4>Opps</h4>   	
			    	<?php endif;?>


			    	<?php if($amistad):?>
			    		<?php if($query2):foreach($query2 as $post2):?>
							<h6>(<?php echo $post2->date_added;?>)</h6>  
							<p id="<?php echo $post2->id;?>"><?php echo $post2->body;?></p>
							<span><a id="<?php echo $post2->id.'_upvote';?>" class="voteMe"><span class="glyphicon glyphicon-thumbs-up"></span></a><span id="1_upvote_result" ><?php echo $post2->up_vote;?></span></span> | 
							<a id="<?php echo $post2->id.'_downvote';?>" class="voteMe"><span class="glyphicon glyphicon-thumbs-down"></a><span id="1_downvote_result" ><?php echo $post2->down_vote;?></span>
							
							<?php $q = get_comentarios($post2->id);
						     if($q):foreach($q as $p):
						     	echo '<br>';	
						     	echo $p->comentario;?>
						     
						     <?php endforeach; else:?>
						     	
							 <?php endif;?>
							 <br><br>
					    	<textarea id="<?php echo $post2->id.'_coment';?>" placeholder="Escribe un comentario..." name="publicacion" class="form-control" rows="1"></textarea>

						<?php endforeach; else:?>
							<h4>No hay publicaciones!</h4>
						<?php endif;?>
						
					<?php else:?>
						   	
		    		<?php endif;?>
		        </div>
		    </div>
        </div>
	</div>
</div>






<?php $this->load->view('includes/footer'); ?>