
<section id = "content">
    <div class="section">
      <div class="row">
          <?php if (!$results){ ?>
                        <h4 align="center">Lista de Parroquias</h4>
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
                        <td>No existe parroquia</td>
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
                    <h4 align="left">Lista de Parroquias</h4><hr><br>
                    <table class="bordered striped">
                      <thead>
                        <tr>
                          <th data-field="id">ID</th>
                          <th data-field="nombre">Nombre de la parroquia</th>
                          <th data-field="direccion">Direccion</th>
                          <th data-field="opciones">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($results as $r) {
                            echo '<tr>';
                            echo '<td>'.$r->idParroquia.'</td>';
                            echo '<td>'.$r->nombre.'</td>';
                            echo '<td>'.$r->direccion.'</td>';
                            echo '<td>';
            #if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
            #echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>';
            #}
            #if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                echo '<a href="'.base_url().'jurisdiccion/editParroquia/'.$r->idParroquia.'" style="margin-right: 2%" class="btn waves-effect waves-light amber darken-4" title="Editar Cliente"><i class="mdi-editor-border-color"></i></a>';
          #  }
          #  if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
                echo '<a href="#modal1" cliente="'.$r->idParroquia.'" style="margin-right: 1%" class="btn waves-effect waves-light btn modal-trigger red darken-4" title="Excluir Cliente"><i class="mdi-action-delete"></i></a>';
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
            <!--<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h5 id="myModalLabel">Excluir Cliente</h5>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="idCliente" name="id" value="" />
                  <h5 style="text-align: center">¿Realmente desea eliminar este cliente y los datos asociados con él (OS, ventas, ingresos)?</h5>
                </div>
                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                  <button class="btn btn-danger">Excluir</button>
                </div>
                </form>
              </div>-->

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
</section>
