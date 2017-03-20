
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
<section id = "content">
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <nav class="amber darken-4">
                    <div class="nav-wrapper">
                        <div class="col s12">
                            <h1 class="brand-logo center">Lista de Usuarios</h1>
                        </div>
                    </div>
                </nav>
                <br>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="col s12 m12 l12">
                                <!-- <div class="box box-primary"> -->
                                <table id="tblPersonas" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;background-color: #006699; color: white;">#</th>
                                        <th style="width: 10%;background-color: #006699; color: white;">CI</th>
                                        <th style="width: 10%;background-color: #006699; color: white;">Paterno</th>
                                        <th style="width: 10%;background-color: #006699; color: white;">Materno</th>
                                        <th style="width: 10%;background-color: #006699; color: white;">Nombre</th>
                                        <th style="width: 10%;background-color: #006699; color: white;">Email</th>
                                        <th style="width: 10%;background-color: #006699; color: white;">Tipo</th>
                                        <th style="width: 10%;background-color: #006699; color: white;">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                                <!-- </div> -->
                            </div>

                        </div>
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
        </div>
    </div>
</section>

<script src="<?php echo base_url(); ?>assets/demo/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/demo/js/plugins/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">

        //datables con Server side processing
        $('#tblPersonas').DataTable().destroy();
        $('#tblPersonas').DataTable({
            "language": {
                      "emptyTable": "Usuario inexistente."
            },
            "lengthMenu": [[5, 10, 15, 20], [5, 10, 15, 20]],
            'paging': true,
            'info': true,
            'filter': true,
            'stateSave': true,
            'processing':true,
            'serverSide':true,

            'ajax': {
                "url":"<?php echo base_url()?>users/getPersonas",
                "type":"POST"
            },
            'columns': [
                {data: 'rownum'},
                {data: 'ci'},
                {data: 'apellidoPaterno'},
                {data: 'apellidoMaterno'},
                {data: 'nombres'},
                {data: 'email'},
                {data: 'tipoUsuario'},
                {"orderable": true,
                    render: function (data, type, row) {
                       return '<span class="pull-right">' +
                        '    <a href="<?php echo base_url();?>users/edit_user/'+row.rownum+'" title="Editar informacion" class="btn waves-effect waves-light amber darken-4""><i class="mdi-editor-border-color"></i></a>' +
                        '    <a href="#modal1" cliente='+row.rownum+' style="margin-right: 1%" class="btn waves-effect waves-light btn modal-trigger red darken-4" "><i class="mdi-action-delete"></i></a>' +
                        '</span>';
        }
                }
            ],
            "order": [[ 1, "asc" ]],
        });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', 'a', function(event) {
            var cliente = $(this).attr('cliente');
            $('#id').val(cliente);

        });
    });

</script>