<?php $this->load->view('includes/header'); ?>
	<!-- - - - - - - - - - - - - - - -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading"> 
					Hola como estan
				</div>
				<div class="panel-body">
					<?php if($this->session->userdata('datos')):?>
			    		<p>hola <?php echo $id ?></p>
			    		<?php echo form_open('usuario/ir_perfil');?>
							<div class="form-group">
								<input type="hidden" name="view" value="search">
								<input type="text" name="usuario" class="form-control" id="usuarios" placeholder="Buscar personas ..." />								
							</div>							
							<button type="submit" value="submit" class="btn btn-primary">Buscar</button>
						</form>			    		
					<?php else:?>
						<p>no</p>
					<?php endif;?>
				</div>
			</div>			
		</div>
	</div>
</div>


<script type="text/javascript">
   $(function(){
   	$("#usuarios").autocomplete({
    source: "usuario/buscar_amigos" // path to the get_birds method
  	});
   }); 
</script>
	
<?php $this->load->view('includes/footer'); ?>
	