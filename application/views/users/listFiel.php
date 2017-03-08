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
                        <h4 align="center">Lista de Fiel</h4>


          <div id="borderless-table">
              <div class="row">
                <div class="col s12 m8 l9">
                  <table id="striped-table">
                    <thead>
                      <tr>
                        <th data-field="id">ID</th>
                        <th data-field="name">Nombre</th>
                        <th data-field="price">Direccion</th>
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

            <div id="centered-table" class="col s10 m8 l9">
                <div class="row">

                  <div class="col s12 m12 l12">
                    <h4 align="left">Lista de Fieles</h4><hr><br>
                    <table class="striped-table">
                      <thead>
                        <tr>
                          <th data-field="id">#</th>
                          <th data-field="ci">CI</th>
                          <th data-field="nombre">Nombre</th>
                          <th data-field="apellido">Apellido</th>
                          <th data-field="tipoUsuario">Tipo de Usuario</th>
                          <th data-field="email">fecha de Nacimiento</th>
                          <th data-field="opciones">Genero</th>
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
            <?php } ?>
            <?php echo $this->pagination->create_links();?>

              <div id="modal1" class="modal">
                <form action="<?php echo base_url(); ?>Users/delete_fiel" method="post">
                  <div class="modal-content">
                    <h4 align="center">Eliminar Usuario</h4>
                      <input type="hidden" id="id" name="id" value="" />
                      <h6 style="text-align: center">¿Realmente desea eliminar este usuario?</h6>
                  </div>
                  <div class="modal-footer orange">
                    <a href="#" class="waves-effect waves-orange btn-flat modal-action modal-close" style="margin-right: 2%">Cancelar</a>
                    <a href="<?php echo site_url('Users/delete_fiel/' .$r->id); ?>" class="waves-effect waves-red btn-flat modal-action modal-close">Elminar</a>
                  </div>
                </form>
              </div>
      </div>
    </div>
</section>
