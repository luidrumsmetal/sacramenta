<link href="<?php echo base_url();?>assets/demo/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<!--
<section id = "content">
    <div class="section">
      <div class="row">
        <?php if($this->session->flashdata('error')) {?>
            <div id="card-alert" class="card red">
              <div class="card-content white-text">
                <p><?php echo $this->session->flashdata('error') ?></p>
                  <p>     <?php echo validation_errors();?></p>
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
                    <h1 class="brand-logo center">Lista de Usuarios</h1>
                    </div>
                  </div>
                </nav>


          <div id="borderless-table">
              <div class="row">
                <div class="col s12 m12 l12">
                  <table id="striped-table">
                    <thead>
                      <tr>
                          <th data-field="ci">CI</th>
                          <th data-field="nombre">Nombre</th>
                          <th data-field="apellido">Apellido</th>
                          <th data-field="tipoUsuario">Tipo de Usuario</th>
                          <th data-field="email">Correo</th>
                          <th data-field="opciones">Opciones</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>No existe usuario</td>
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
                        <h1 class="brand-logo center">Lista de Usuarios </h1>
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
                          <th data-field="tipoUsuario">Tipo de Usuario</th>
                          <th data-field="email">Correo</th>
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
                            echo '<td>'.$r->tipoUsuario.'</td>';
                            echo '<td>'.$r->email.'</td>';
                            echo '<td>';
                            echo '<a href="'.base_url().'users/edit_user/'.$r->id.'" style="margin-right: 2%" class="btn waves-effect waves-light amber darken-4" 
                              title="Editar Cliente"><i class="mdi-editor-border-color"></i></a>';
                            echo '<a href="#modal1" cliente="'.$r->id.'" style="margin-right: 1%" class="btn waves-effect waves-light btn modal-trigger red 
                              darken-4" title="Excluir Cliente"><i class="mdi-action-delete"></i></a>';
                            echo '</td>';
                            echo '</tr>';
                        }?>
                      </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>

            <?php echo $this->pagination->create_links();?>

              <div id="modal1" class="modal">
                <form action="<?php echo base_url(); ?>users/delete_user" method="post">
                  <div class="modal-content">x
                    <h4 align="center">Eliminar Usuario</h4>
                      <input type="hidden" id="id" name="id" value="" />
                      <h6 style="text-align: center">¿Realmente desea eliminar este usuario?</h6>
                  </div>
                  <div class="modal-footer orange">
                    <a href="#" class="waves-effect waves-orange btn-flat modal-action modal-close" style="margin-right: 2%">Cancelar</a>
                    <button type="submit" name="action" class="btn cyan waves-effect waves-light right">Eliminar
                          <i class="waves-effect waves-orange btn-flat modal-action modal-close"></i>
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
            $('#id').val(cliente);

        });
    });

</script>-->
<section id = "content">
    <div class="section">
        <div class="row">
            <div id="table-datatables">
                <h4 class="header" align="center">Lista de Usuarios</h4>
                <div class="row">

                    <div class="col s12 m8 l10 offset-l1">
                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Carnet</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Tipo Usuario</th>
                                <th>Email</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>

                            <!--<tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                            </tfoot>-->

                            <tbody>
                              <?php foreach ($results as $r) {
                                    echo '<tr>';
                                    echo '<td>'.$r->id.'</td>';
                                    echo '<td>'.$r->ci.'</td>';
                                    echo '<td>'.$r->nombres.'</td>';
                                    echo '<td>'.$r->apellidoPaterno.' '.$r->apellidoMaterno.'</td>';
                                    echo '<td>'.$r->tipoUsuario.'</td>';
                                    echo '<td>'.$r->email.'</td>';
                                    echo '<td>';
                                    echo '<a href="'.base_url().'users/edit_user/'.$r->id.'" style="margin-right: 2%" class="btn waves-effect waves-light amber darken-4" 
                              title="Editar Cliente"><i class="mdi-editor-border-color"></i></a>';
                                    echo '<a href="#modal1" cliente="'.$r->id.'" style="margin-right: 1%" class="btn waves-effect waves-light btn modal-trigger red 
                              darken-4" title="Excluir Cliente"><i class="mdi-action-delete"></i></a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }?>
                                <?php echo $this->pagination->create_links();?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/js/plugins/data-tables/data-tables-script.js"></script>
