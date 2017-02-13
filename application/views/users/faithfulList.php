
<section id = "content">
    <div class="section">
      <div class="row">
        <h4 align="center">Lista de Fieles</h4>
        <div class="col s11 offset-s1">
        <?php if($this->session->flashdata('error')) {?>
            <div id="card-alert" class="card red">
              <div class="card-content white-text">
                <p><?php echo $this->session->flashdata('error') ?></p>
              </div>
              <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('success')) {?>
            <div id="card-alert" class="card green">
              <div class="card-content white-text">
                <p><?php echo $this->session->flashdata('success') ?></p>
              </div>
              <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
        <?php } ?><br>
        <div class="input-field col s12">
              <i class="mdi-action-account-circle prefix"></i>
              <input placeholder="Ingrese nombre completo" id="txtBuscarFiel" name="txtBuscarFiel" type="text">                       
              <label for="feligres" class="active"><b>Ingrese el Nombre del Feligrés (*)</b></label>
        </div>
          
          <div id="borderless-table">
              <div class="row">
                <div class="col s12 m8 l9">
                <br><br>
                  <table id="striped-table">
                    <thead>
                      <tr>
                        <th data-field="paterno">Apellido Paterno</th>
                        <th data-field="materno">Apellido Materno</th>
                        <th data-field="nombres">Nombres</th>
                        <th data-field="fechanac">Fecha Nacimiento</th>
                        <th data-field="nombres">Bautizo</th>
                        <th data-field="comunion">Comunion</th>
                        <th data-field="confirmacion">Confirmacion</th>
                        <th data-field="matrimonio">Matrimonio</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>No existe parroquia</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      


              <div id="modal1" class="modal">
                <form action="<?php echo base_url(); ?>jurisdiccion/parroquiaDelete" method="post">
                  <div class="modal-content">
                    <h4 align="center">Eliminar Parroquia</h4>
                      <input type="hidden" id="idParroquia" name="idParroquia" value="" />
                      <h6 style="text-align: center">¿Realmente desea eliminar esta parroquia?</h6>

                  </div>
                  <div class="modal-footer orange">
                    <a href="#" class="waves-effect waves-orange btn-flat modal-action modal-close" style="margin-right: 2%">Cancelar</a>
                    <button class="waves-effect waves-red btn-flat modal-action modal-close">Eliminar</button>
                  </div>
                </form>
              </div>
            </div>
      </div>
    </div>
</section>
<script type="text/javascript">
  $('#txtBuscarFiel').keyup(function(){
    //alert($('#txtBuscarFiel').val());
 
    var text = $('#txtBuscarFiel').val();
    var length = $('#txtBuscarFiel').val().length;
    if (length >= 2) {
      $('#striped-table tbody').html('');
        //var baseurl = '<?php echo base_url() ?>';
        $.post('<?php echo base_url() ?>'+'faithful/faithfulListAjax', {texto : text}, function(data){
              var obj = JSON.parse(data);
              var output = '';
              $.each(obj, function(i, item){
                  output += 
                  '<tr>' +
                  '   <td>'+item.apellidoPaterno+'</td>'+
                  '   <td>'+item.apellidoMaterno+'</td>'+
                  '   <td>'+item.nombres+'</td>'+
                  '   <td>'+item.fechanacimiento+'</td>'+
                  '   <td><a class="btn btn-default"><i class="fa fa-eye">'+item.sacramento+'</td>'+
                  '   <td><a class="btn btn-default"><i class="fa fa-eye">'+item.sacramento+'</td>'+
                  '   <td><a class="btn btn-default"><i class="fa fa-eye">'+item.sacramento+'</td>'+
                  '   <td><a class="btn btn-default"><i class="fa fa-eye">'+item.sacramento+'</td>'+
                  '</tr>';
              });
              $('#striped-table tbody').append(output);
          });
    }else if(length==0){
       $('#striped-table tbody').html('');
    }
        
  });
</script>
