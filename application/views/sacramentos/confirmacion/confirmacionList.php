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
                    <h1 class="brand-logo center">Lista de Confirmados</h1>
                    </div>
                  </div>
                </nav>


          <div id="borderless-table">
              <div class="row">
                <div class="col s12 m12 12">
                  <table id="striped-table">
                    <thead>
                      <tr>
                          <th data-field="nombre">Apellido Paterno</th>
                          <th data-field="direccion">Apellido Materno</th>
                          <th data-field="direccion">Nombres</th>
                          <th data-field="direccion">Fecha de Confirmación</th>
                          <th data-field="direccion">Genero</th>
                          <th data-field="opciones">Opciones</th>
                      </tr>
                    </thead>

                    <tbody><br>
                      <tr>
                        <td>No existe confirmados registrados</td>
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
                    <h1 class="brand-logo center">Lista de Confirmados</h1>
                    </div>
                  </div>
                </nav>
                    <h4 align="left"></h4><hr><br>
                    <table class="bordered striped">
                      <thead>
                        <tr>
                          <th data-field="nombre">Apellido Paterno</th>
                          <th data-field="direccion">Apellido Materno</th>
                          <th data-field="direccion">Nombres</th>
                          <th data-field="direccion">Fecha de Confirmación</th>
                          <th data-field="direccion">Genero</th>
                          <th data-field="opciones">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($results as $r) {
                            echo '<tr>';
                            #echo '<td>'.$r->idCertificado.'</td>';
                            echo '<td>'.$r->apellidoPaterno.'</td>';
                            echo '<td>'.$r->apellidoMaterno.'</td>';
                            echo '<td>'.$r->nombres.'</td>';
                            echo '<td>'.$r->fecha.'</td>';
                            echo '<td>'.$r->genero.'</td>';
                            echo '<td>';

                echo '<a href="'.base_url().'confirmacion/edit/'.$r->idCertificado.'" style="margin-right: 2%" class="btn waves-effect waves-light amber darken-4" title="Editar Cliente"><i class="mdi-editor-border-color"></i></a>';

                echo '<a href="#modal1" cliente="'.$r->idCertificado.'" style="margin-right: 1%" class="btn waves-effect waves-light btn modal-trigger red darken-4" title="Excluir Cliente"><i class="mdi-action-delete"></i></a>';



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
              <form action="<?php echo base_url(); ?>confirmacion/delete" method="post">
                  <div class="modal-content">x
                      <h4 align="center">Eliminar Confirmacion</h4>
                      <input type="hidden" id="idCertificado" name="id" value="" />
                      <h6 style="text-align: center">¿Desea eliminar este registro de confirmacion?</h6>
                  </div>
                  <div class="modal-footer orange">
                      <a href="#" class="waves-effect waves-orange btn-flat modal-action modal-close" style="margin-right: 2%">Cancelar</a>
                      <button type="submit" name="action">Eliminar
                          <i class="mdi-content-send right"></i>
                      </button>
                  </div>
              </form>
          </div>
      </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', 'a', function(event) {
            var cliente = $(this).attr('cliente');
            $('#idCertificado').val(cliente);

        });

    });

</script>
