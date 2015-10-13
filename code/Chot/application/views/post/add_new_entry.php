<?php $this->load->view('includes/header'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="well">
        <div class="row">
          <div class="col-md-4">
            <!--<img src="<?php //echo $img?>" width="75" height="75" >  -->
          </div>
          <div class="col-md-8">
            <!--<h5><a href="<?php //echo site_url('usuario/')?>">Falta nombre!!!</a></h5>
            <a href="<?php //echo site_url('usuario/configuracion')?>" class="btn btn-default btn-xs">Editar Informacion</a>
            -->          
          </div>
        </div>
      </div>
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
          <h3>Hacer Pregunta</h3>
        </div>
        <div class="panel-body">
          <?php echo validation_errors(); ?>
          <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
          <?php echo form_open('post/add_new_entry');?>

            <div class="form-group">
                  <label>Titulo</label>
                  <input type="text" class="form-control" name="title" />
            </div>

            <div class="form-group">
              <label>Descripci&oacute;n</label>
              <textarea name="description" class="form-control" rows="5"></textarea>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-xs-6">
                  <label>Categor&iacute;a</label>
                  <select class="form-control " name="categoria">
                    <option value="">Escoge una categor&iacute;a</option>
                    <option value="matematicas">Matematicas</option>
                    <option value="fisica">F&iacute;sica</option>
                    <option value="programacion">Programaci&0acute;n</option>
                    <option value="programacion">Otros</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" value="submit" class="btn btn-primary">Preguntar</button>
          <?php echo form_close();?>
          <a href="<?php echo site_url('post/index') ?>" >Volver</a>
          <?php echo $id ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('includes/footer'); ?>

