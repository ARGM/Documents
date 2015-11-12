<?php $this->load->view('includes/header'); ?>
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
						<a href="<?php echo site_url('usuario/configuracion')?>" class="btn btn-default btn-xs">Editar Informaci&oacute;n</a>
					</div>
				</div>
			</div>
			<div class="list-group">
				<a href="./?view=editinformation" class="list-group-item">Informaci&oacute;n Personal</a>
				<a href="./?view=editbasicinfo" class="list-group-item">Informacion B&aacute;sica</a>
				<!--  <a href="./?view=editcontactinfo" class="list-group-item">Informacion de Contacto</a>-->
			</div>
		</div>
		<div class="col-md-7">
			<h1>Editar Informaci&oacute;n</h1>
			<?php echo $error;?>
			<?php echo form_open_multipart('usuario/do_upload'); ?>
				<div class="form-group">
					<p>
						<label for="exampleInputFile">Imagen de Perfil (100x100)</label>
						<input type="file"  name="userfile" >
						<br>
						<button class="btn btn-default " type="submit" value="upload">Cambiar</button>	
					</p>
				</div>
			</form>				
		
				
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
			<?php echo validation_errors(); ?>
			
			<?php foreach($query as $post):?>
				<table class="table">
					<thead>
					  <tr>        
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Nombre</td>
						<td id="body1"><?php echo $post->first_name;?></td>
						<td><a id="edit" onClick="copyText1()" data-toggle="modal" data-target="#myModal1" href=""> Editar</a></td>
					  </tr>
					  <tr>
						<td>Apellido</td>
						<td id="body2"><?php echo $post->last_name;?></td>
						<td><a id="edit" onClick="copyText2()" data-toggle="modal" data-target="#myModal2" href=""> Editar</a></td>
					  </tr>
					  <tr>
						<td>Correo</td>
						<td id="body3"><?php echo $post->email;?></td>
						<td><a id="edit" onClick="copyText3()" data-toggle="modal" data-target="#myModal3" href=""> Editar</a></td>
					  </tr>
					  <tr>
						<td>Contrase&ntilde;a</td>
						<td></td>
						<td><a id="edit" onClick="copyText()" data-toggle="modal" data-target="#myModal4" href=""> Editar</a></td>
					  </tr>
					</tbody>
				</table>
			<?php endforeach;?>
			
		</div>
		
		<!-- Modal #1 -->
		<div class="modal fade" id="myModal1" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Editar Nombre</h4>
		        </div>
		        <div class="modal-body">
		          <?php echo form_open('usuario/actualizar_nombre');?>
					<div class="form-group">
						<label>Nombre</label>
						<input id="output1" type="text" class="form-control" name="fname" />
					</div>
										
				    <button data-toggle="modal" data-target="#myModal5" type="submit" value="submit" class="btn btn-primary">Editar</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				  <?php echo form_close();?>
		        </div>		        
		      </div>		      
		    </div>
		  </div> 
	  			
		<!-- Modal #2 -->
		<div class="modal fade" id="myModal2" role="dialog">
		    <div class="modal-dialog">		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Editar Appellido</h4>
		        </div>
		        <div class="modal-body">
		          <?php echo form_open('usuario/actualizar_apellido');?>
					<div class="form-group">
						<label>Apelllido</label>
						<input id="output2" type="text" class="form-control" name="lname" />
					</div>
										
				    <button type="submit" value="submit" class="btn btn-primary">Editar</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				  <?php echo form_close();?>
		        </div>		        
		      </div>
		    </div>		      
		</div>
		 
	  	<!-- Modal #3 -->
		<div class="modal fade" id="myModal3" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Editar Correo</h4>
		        </div>
		        <div class="modal-body">
		          <?php echo form_open('usuario/actualizar_email');?>
					<div class="form-group">
						<label>Correo</label>
						<input id="output3" type="text" class="form-control" name="email" />
					</div>					
				    <button type="submit" value="submit" class="btn btn-primary">Editar</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				  <?php echo form_close();?>
		        </div>		        
		      </div>		      
		    </div>		  
	  	</div>		
			  	
	  	<!-- Modal #4 -->
		<div class="modal fade" id="myModal4" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Editar Contrase&ntilde;a</h4>
		        </div>
		        <div class="modal-body">
		          <?php echo form_open('usuario/actualizar_password');?>
					<div class="form-group">
						<label>Tu vieja contrase&ntilde;a</label>
						<input type="password" class="form-control" name="opassword" />
					</div>
					<div class="form-group">
						<label>Tu nueva contrase&ntilde;a</label>
						<input type="password" class="form-control" name="npassword" />
					</div>
					<div class="form-group">
						<label>Repite nueva contrase&ntilde;a</label>
						<input type="password" class="form-control" name="cpassword" />
					</div>
				    <button type="submit" value="submit" class="btn btn-primary">Editar</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				  <?php echo form_close();?>
		        </div>		        
		      </div>
		      
		    </div>		  
	  	</div>
		
		
		<div class="col-md-2">
		</div>
	</div>
</div>


</div>
<br><br><br><br><br><!-- - - - - - - - - - - - - - - -->
<br><br>



<div class="container-fuid">
	<div class="row">	  	
	 
	  <!--<div class="col-md-4">
    		<img src="<?php //echo $img?>" width="125" height="125" >    		
    		<?php //echo $error;?>
			<?php //echo form_open_multipart('usuario/do_upload'); ?>
				<p>
					<button class="btn btn-primary btn-xs" id="input-file">
	    				<input type="file"  name="userfile" >
	    				<span>Foto </span>
					</button>
					<button class="btn btn-primary btn-xs" type="submit" value="upload">Cambiar</button>				
											
				</p>
			</form>		  		
    	</div> -->	
		
	  
	</div>
</div>

<script language="javascript" type="text/javascript">	
	function copyText1() {
		var output = document.getElementById("body1").innerHTML;
		document.getElementById("output1").value = output;
	}
	function copyText2() {
		var output = document.getElementById("body2").innerHTML;
		document.getElementById("output2").value = output;
	}
	function copyText3() {
		var output = document.getElementById("body3").innerHTML;
		document.getElementById("output3").value = output;
	}
</script>



<?php $this->load->view('includes/footer'); ?>