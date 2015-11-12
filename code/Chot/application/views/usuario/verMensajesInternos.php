<?php $this->load->view('includes/header'); ?>

<style>
  td.hidden {
      visibility: hidden
  }
</style>
</head>

<script>
  $(document).ready(function(){
      $(".leido").click(function() {
      var Id = this.id;
      //var upOrDown = voteId.split('_'); 
      $.ajax({
        type: "post",
        url: "http://104.131.29.243/index.php/usuario/actualizaMenInter",
        cache: false,       
        data:'Id='+Id,
        success: function(response){        
          try{
            if(response=='true'){ 
              //var newValue = parseInt($("#"+voteId+'_result').text()) + 1;            
              //$("#"+voteId+'_result').html(newValue);
              //location.reload();
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
          <table id="menInter" class="table table-striped ">
            <thead>
              <tr>
                <th>De</th>
                <th>Mensaje</th>                
                <th>Fecha</th>               
              </tr>
            </thead>
            <tbody>
              <?php if($query):foreach($query as $mensaje): if($mensaje -> leido == "si"):?>    
                  <tr class="success">
                     <td><?php echo $mensaje -> fromUser;?></td>
                     <td>
                        <a href="#" data-toggle="modal" data-target="#myModal1" />Leer...</a>
                        <!-- Modal -->
                          <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                  <p> <?php echo $mensaje -> texto;?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>                          
                      </td >
                      <td ><?php echo $mensaje -> fecha;?></td>                     
                  </tr>
                  <?php else:?>
                    <tr class="danger">
                      <td><?php echo $mensaje -> fromUser;?></td>
                      <td>
                        <a id="<?php echo $mensaje->id;?>" class="leido" href="#" data-toggle="modal" data-target="#myModal1" />Leer...</a>
                        <!-- Modal -->
                          <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                  <p> <?php echo $mensaje -> texto;?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>                          
                      </td >
                      <td><?php echo $mensaje -> fecha;?></td>
                    </tr>
                  <?php endif;?>
              <?php endforeach; else:?>          
                <div class="jumbotron">
                  <h2>No hay mensajes Internos</h2>              
                </div>
              <?php endif;?>
            </tbody>
          </table>              
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  
$('body').on('hidden.bs.modal', '.modal', function () {
   document.location.reload();
});
</script>

<?php $this->load->view('includes/footer'); ?>