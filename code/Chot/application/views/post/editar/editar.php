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
        <a href="<?php echo site_url('usuario/mis_amigos')?>" class="list-group-item">Amigos <span class="label label-default pull-right"><?php echo $total?></span></a>
        <!--<a href="#" class="list-group-item">Fotos <span class="label label-default pull-right">0</span></a>-->
        <a href="<?php echo site_url('usuario/verMensajesInternos') ?>" class="list-group-item">Mensajes</a>
        <!--  <a href="#" class="list-group-item">Grupos</a> -->
        <!--  <a href="#" class="list-group-item">Grupos</a> -->
      </div>
    </div>
    <div class="col-md-7">
      <!-- -->
      <div class="panel panel-default">
        <div class="panel-heading"> 
          <h3>Editar Pregunta</h3>
        </div>
        <div class="panel-body">
          <?php echo validation_errors(); ?>  
          <?php echo form_open('post/editar/'.$id_post);?>
          <?php if($query):foreach($query as $post):?>
          <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" value="<?php echo $post->title;?>" name="title" />
                <?php echo $post->categoria; ?>
           </div>

           <div class="form-group">
                <label>Reformular</label>
                <textarea name="description" class="form-control"  rows="5"><?php echo $post->description;?></textarea>
           </div>

           <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label>Categoria</label>
                        <select class="form-control" name="categoria" value="<?php echo $post->categoria;?>">
                            <option value="<?php echo $post->categoria?>"><?php echo ucfirst($post->categoria);?></option>
                            <option value="matematicas">Matematicas</option>
                            <option value="fisica">Física</option>
                            <option value="programacion">Programación</option>
                            <option value="programacion">Otros</option>
                        </select>
                    </div>
                </div>
            </div>
          
          <button type="submit" value="submit" class="btn btn-primary">Editar</button>
          <?php echo form_close();?>
          <?php endforeach; else:?>
          <a href="<?php echo site_url('post/index') ?>" >Volver</a>  
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>



