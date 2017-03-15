<section id = "content">
    <div class="section">
      <div class="row">
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
        <?php } ?>
          <?php if (!$results){ ?>
                 <nav class="amber darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12">
                    <h1 class="brand-logo center">Lista de Fieles</h1>
                    </div>
                  </div>
                </nav>


          <div id="borderless-table">
              <div class="row">
                <div class="col s12 m12 l9">
                  <table id="striped-table">
                    <thead>
                      <tr>
                          <th data-field="id">#</th>
                          <th data-field="ci">CI</th>
                          <th data-field="nombre">Nombre</th>
                          <th data-field="apellido">Apellido</th>
                          <th data-field="email">fecha de Nacimiento</th>
                          <th data-field="opciones">Opciones</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>No existe Fiel</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
          <?php } else{ ?>

            <div id="centered-table" class="col s12 m12 l12">
                <div class="row">

                <div class="col s12 m12 l12">
                  <nav class="amber darken-4">
                    <div class="nav-wrapper">
                      <div class="col s12">
                      <h1 class="brand-logo center">Lista de Fieles</h1>
                      </div>
                    </div>
                  </nav>
                  <h4 align="left"></h4><hr><br>
                    <table class="bordered striped">
                      <thead>
                        <tr>
                          <th data-field="id">#</th>
                          <th data-field="ci">CI</th>
                          <th data-field="nombre">Nombre</th>
                          <th data-field="apellido">Apellido</th>
                          <th data-field="email">fecha de Nacimiento</th>
                          <th data-field="opciones">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($results as $r) {
                            echo '<tr>';
                            echo '<td>'.$r->id.'</td>';
                            echo '<td>'.$r->ci.'</td>';
                            echo '<td>'.$r->nombres.'</td>';
                            echo '<td>'.$r->apellidoPaterno.' '.$r->apellidoMaterno.'</td>';
                            echo '<td>'.$r->fechanacimiento.'</td>';
                            echo '<td>'.$r->genero.'</td>';
                            echo '<td>';
            #if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
            #echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>';
            #}
            #if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                echo '<a href="'.base_url().'users/edit_fiel/'.$r->id.'" style="margin-right: 2%" class="btn waves-effect waves-light amber darken-4" title="Editar Cliente"><i class="mdi-editor-border-color"></i></a>';
          #  }
          #  if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
                echo '<a href="#modal1" cliente="'.$r->id.'" style="margin-right: 1%" class="btn waves-effect waves-light btn modal-trigger red darken-4" title="Excluir Cliente"><i class="mdi-action-delete"></i></a>';
          #  }


            echo '</td>';
                            echo '</tr>';
                        }?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            

              <div id="modal1" class="modal">
                <form action="<?php echo base_url(); ?>Users/delete_fiel" method="post">
                  <div class="modal-content">x
                    <h4 align="center">Eliminar Fiel</h4>
                      <input type="hidden" id="id" name="id" value="" />
                      <h6 style="text-align: center">¿Desea eliminar al Fiel?</h6>
                  </div>
                  <div class="modal-footer orange">
                    <a href="#" class="waves-effect waves-orange btn-flat modal-action modal-close" style="margin-right: 2%">Cancelar</a>

                    <button type="submit" name="action" class="btn cyan waves-effect waves-light right">Eliminar
                          <i class="waves-effect waves-orange btn-flat modal-action modal-close"></i>
                      </button>
                    
                  </div>
                </form>
              </div>

              <?php } ?>
            <?php echo $this->pagination->create_links();?>
      </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', 'a', function(event) {
            var cliente = $(this).attr('cliente');
            $('#id').val(cliente);

        });

    });

</script>