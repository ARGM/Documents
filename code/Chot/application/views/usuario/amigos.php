<?php $this->load->view('includes/header'); ?>


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
			<div class="panel panel-default">
				<div class="panel-heading"> 
					Mis Amigos
				</div>
				<div class="panel-body">
					<?php echo validation_errors(); ?>
					<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
					<table id="example" class="table table-striped ">
						<thead>
							<tr>
								<th>Amigo</th>
								<th>Enviar mensaje</th>
								<th>Dejar de ser Amigos</th>								
							</tr>
						</thead>
						<tbody>
							<?php if($query2):foreach($query2 as $user):?>						
								<tr>
						        	<td id="body2"><a href="<?php echo site_url('post/ver_perfil/'.$user->amigo) ?>" ><?php echo $user->amigo;?></a></td>
						        	<td><a id="<?php echo  $user->amigo;?>" class="mensaje" href="" onClick="copyText1()" data-toggle="modal" data-target="#myModal1">Mensaje</a></td>
						        	<td><a id="<?php echo  $user->amigo;?>" class="dejar" href="" onClick="copyText1()" data-toggle="modal" data-target="#myModal2">Eliminar</a></td>				        					        	
						      	</tr>    
							<?php endforeach; else:?>
							
							<h3>No amigos<h3>     	
							<?php endif;?>
						</tbody>
                    </table>				
				</div>
			</div>
			
		</div>

		<!-- Modal 1-->
		<div class="modal fade" id="myModal1" role="dialog">
		    <div class="modal-dialog">		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Mensaje</h4>
		        </div>
		        <div class="modal-body">
		          <?php echo form_open('usuario/mensajeInterno');?>
					<div class="form-group">						
						<input id="toUser" type="hidden" class="form-control" name="toUser" />
						<label>Mensaje</label>
						<textarea placeholder="Escriba su mensjae" name="mensaje" class="form-control" rows="5" id="mensaje"></textarea>
					</div>
										
				    <button data-toggle="modal" type="submit" value="submit" class="btn btn-primary">Enviar</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				  <?php echo form_close();?>
		        </div>		        
		      </div>		      
		    </div>
		</div> 
		<!-- Fin Modal 1-->

		<!-- Modal 2-->
		<div class="modal fade" id="myModal2" role="dialog">
		    <div class="modal-dialog modal-sm">		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Eliminar</h4>
		        </div>
		        <div class="modal-body">
		          <?php echo form_open('usuario/eliminarAmigo');?>
					<div class="form-group">						
						<input id="toUser2" type="hidden" class="form-control" name="toUser2" />
						<p>Dejar de ser amigos?</p>						
					</div>
										
				    <button data-toggle="modal" type="submit" value="submit" class="btn btn-primary">Si</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				  <?php echo form_close();?>
		        </div>		        
		      </div>		      
		    </div>
		</div> 

		<!-- Fin Modal 2-->

	</div>
</div>


<script>
	$(document).ready(function(){
		  $(".mensaje").click(function() {
			var user = this.id;
			document.getElementById("toUser").value = user;			
		});
	});
</script>

<script>
	$(document).ready(function(){
		  $(".dejar").click(function() {
			var user = this.id;
			document.getElementById("toUser2").value = user;			
		});
	});
</script>

<?php $this->load->view('includes/footer'); ?>