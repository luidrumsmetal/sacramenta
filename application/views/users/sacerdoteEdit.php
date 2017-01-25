<?php echo form_open('users/update', 'role="form"'); ?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/validate.js"></script>

<section id = "content">
		<div class="section">
      <div class="row">
				<div class="col s12 m12 l12">

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
			</div>
            <div class="col s12 m12 l12">
              <div class="card-panel">
                
                <nav class="amber darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12">
                    <h1 class="brand-logo center">Registrar Sacerdote</h1>
                    </div>
                  </div>
                </nav>

                <h4 class="header2"><b>Información General</b></h4><br>
                <div class="row">
                  
                    <div class="row">
											<?php echo validation_errors(); ?>
											<?php echo form_error('ci'); ?>

                      <div class="input-field col s6">
                        <i class="mdi-action-credit-card prefix"></i>
                        <input id="ci" name="ci" type="text" value="<?php echo $ci ?>">
                        <label for="ci" class="active"><b>Carnet de Identidad</b></label>
                      </div>


                      <div class="input-field col s6">
                            <i class="mdi-action-event prefix"></i>
                            <input id="fechanacimiento" name="fechanacimiento" type="date" value="<?php echo $fechanacimiento ?>">
                            <label for="fechanacimiento" class="active"><b>Fecha Nacimiento</b></label>
                      </div>

											
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>">
                        <label for="nombre" class="active"><b>Nombre</b></label>
                      </div>

                        <div class="input-field col s6">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="apellido" name="apellido" type="text" value="<?php echo $apellido ?>">
                          <label for="apellido" class="active"><b>Apellido</b></label>
                        </div>
                    </div>
                    <br>
                    <h4 class="header2"><b>Información de Sacerdote</b></h4><br>
                    <div class="row">


                                       

                      <div class="input-field col s6">
                        <i class="mdi-file-folder-shared prefix"></i>
                        <input id="tipoSacerdote" name="tipoSacerdote" type="text" value="<?php echo $tipoSacerdote ?>">
                        <input id="tipoSacerdote_id" name="tipoSacerdote_id" type="hidden">
                        <label for="tipoSacerdote" class="active"><b>Tipo Sacerdote</b></label>
                      </div> 
                    </div>

                    <BR>
                    <h4 class="header2"><b>Información de la Cuenta</b></h4><Br>
                    <div class="row">

                      <div class="input-field col s6">
                        <i class="mdi-communication-quick-contacts-mail prefix"></i>
                        <input id="email" name="email" type="text" value="<?php echo $email ?>">
                        <label for="email" class="active"><b>Correo Electrónico</b></label>
                      </div>                    

                      <div class="input-field col s6">
                        <i class="mdi-communication-vpn-key prefix"></i>
                        <input id="password" name="password" type="password" value="<?php echo $password ?>">
                        <label for="password" class="active"><b>Contraseña</b></label>
                      </div>  
                    </div>
                      <br>
                    <div class="row">
                        <div class="input-field col s7">
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                          <button class="btn cyan waves-effect waves-light right" value="Update" type="submit" name="mit">Registrar
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
		</div>
</section>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){

		$("#parroquia").autocomplete({
        source: "<?php echo base_url(); ?>jurisdiccion/autoCompleteParroquia",
        minLength: 1,
        select: function( event, ui ) {
           $("#parroquia_id").val(ui.item.id);
        }
      });
		$("#tipoSacerdote").autocomplete({
				source: "<?php echo base_url(); ?>users/autoCompleteTipoSacerdote",
				minLength: 1,
				select: function (event, ui) {
						$("#tipoSacerdote_id").val(ui.item.id);
				}
		});
});
</script>
