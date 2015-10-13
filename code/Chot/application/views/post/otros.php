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
          <a href="<?php echo site_url('post/add_new_entry') ?>" class="list-group-item">Preguntar</a>
          <a href="<?php echo site_url('welcome') ?>" class="list-group-item">Volver</a>          
          <!--  <a href="#" class="list-group-item">Grupos</a> -->
        </div>
      </div>
      <div class="col-md-7">
        <!-- -->
        <div class="panel panel-default">
          <div class="panel-heading"> 
            <h3>Categor&iacute;a Otros</h3>
          </div>
          <div class="panel-body">
            <?php if($query):foreach($query as $post):?>
              <h4><?php echo $post->title;?> (<?php echo $post->date;?>)</h4>
              <h6><a href="<?php echo site_url('post/ver_perfil/'.$post->username) ?>" ><?php echo $post->username;?></a></h6>
              <?php echo $post->description;?>
              <?php echo anchor('post/ver/'.$post->id_post, 'Ver'); ?>&nbsp
              <?php echo anchor('post/comentar/'.$post->id_post, 'Comentar'); ?>
            <?php endforeach; else:?>
              <h4>Categor&iacute;a vacia.</h4>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div> 
<?php $this->load->view('includes/footer'); ?>