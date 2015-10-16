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
			    				    		
					<?php else:?>
						<p>no</p>
					<?php endif;?>
				</div>
			</div>			
		</div>
	</div>
</div>



	
<?php $this->load->view('includes/footer'); ?>
	