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
      <!-- -->
      <div class="panel panel-default">       
        <div class="panel-body">
          <?php if($query):foreach($query as $post):?>
          <div class="jumbotron">
            <h2>Notificaciones</h2>              
          </div> 
          <table class="table table-bordered">            
            <thead>
              <th>Persona</th>
              <th></th>
            </thead>               
              <tr>
              <td><?php echo $query -> user_from;?></td>
                <td style="width:60px;">  <a href="<?php echo site_url('usuario/aceptar_sol/'.$query -> user_from) ?>" name='aceptar' class="btn btn-success btn-xs">Aceptar Solicitud</a></td>
              </tr>            
          </table>
           <?php endforeach; else:?>
            <div class="jumbotron">
              <h2>No hay notificaciones</h2>              
            </div>
          <?php endif;?> 
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>