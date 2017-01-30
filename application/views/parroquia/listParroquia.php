
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
                    <h1 class="brand-logo center">Lista de Parroquias</h1>
                    </div>
                  </div>
                </nav>

                       
          <div id="borderless-table">
              <div class="row">
                <div class="col s12 m12 12">
                  <table id="striped-table">
                    <thead>
                      <tr>
                        <th data-field="id">ID</th>
                        <th data-field="name">Nombre</th>
                        <th data-field="price">Dirección</th>
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

            <div id="centered-table" class="col s12 m12 l12">
                <div class="row">

                  <div class="col s12 m12 l12">
                <nav class="amber darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12">
                    <h1 class="brand-logo center">Lista de Parroquias</h1>
                    </div>
                  </div>
                </nav>
                    <h4 align="left"></h4><hr><br>
                    <table class="bordered striped">
                      <thead>
                        <tr>
                          <th data-field="id">ID</th>
                          <th data-field="nombre">Nombre de la parroquia</th>
                          <th data-field="direccion">Dirección</th>
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

                echo '<a href="'.base_url().'jurisdiccion/edit/'.$r->idParroquia.'" style="margin-right: 2%" class="btn waves-effect waves-light amber darken-4" title="Editar Cliente"><i class="mdi-editor-border-color"></i></a>';

                echo '<a href="#modal1" cliente="'.$r->idParroquia.'" style="margin-right: 1%" class="btn waves-effect waves-light btn modal-trigger red darken-4" title="Excluir Cliente"><i class="mdi-action-delete"></i></a>';



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
                <form action="<?php echo base_url(); ?>jurisdiccion/delete" method="post">
                  <div class="modal-content">
                    <h4 align="center">Eliminar Parroquia</h4>
                      <input type="hidden" id="idParroquia" name="idParroquia" value="" />
                      <h6 style="text-align: center">¿Desea eliminar esta parroquia?</h6>
                  </div>
                  <div class="modal-footer orange">
                    <a href="#" class="waves-effect waves-orange btn-flat modal-action modal-close" style="margin-right: 2%">Cancelar</a>
                    <a href="<?php echo site_url('jurisdiccion/delete/' .$r->idParroquia); ?>" class="waves-effect waves-red btn-flat modal-action modal-close">Elminar</a>
                  </div>
                </form>
              </div>
      </div>
    </div>
</section>
