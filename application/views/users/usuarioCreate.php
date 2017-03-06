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
                
                <nav class="amber darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12">
                    <h1 class="brand-logo center">Registro de Usuario</h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <h4 class="header2"><b>Información General</b></h4><br>
                <div class="row">
                  <form class="col s12" id="formPriest" method="post" action="<?php echo base_url(); ?>users/usuarioCreate">

                    <div class="row">
                      <div class="input-field col s4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="apellidoPaterno" name="apellidoPaterno" type="text">
                        <label for="apelliodPaterno" class="active"><b>Apellido Paterno</b></label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="apellidoMaterno" name="apellidoMaterno" type="text">
                        <label for="apelliodMaterno" class="active"><b>Apellido Materno</b></label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input  placeholder="Ingrese la parroquia" id="nombres" name="nombres" type="text">
                        <label for="nombres" class="active"><b>Nombres</b></label>
                       </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                        <i class="mdi-action-credit-card prefix"></i>
                        <input placeholder="Ingrese su carnet de identidad" id="ci" name="ci" type="text">
                        <label for="ci" class="active"><b>Carnet de Identidad</b></label>
                      </div>

                      <div class="input-field col s6">
                            <i class="mdi-action-event prefix"></i>
                            <input placeholder="" id="fechanac" name="fechanac" type="date">
                            <label for="fechanac" class="active"><b>Fecha Nacimiento</b></label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <i class="mdi-communication-phone prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="celular" name="celular" type="number" >
                        <label for="celular" class="active"><b>Celular</b></label>
                      </div>                    

                      <div class="input-field col s6">
                        <i class="mdi-file-folder-shared prefix"></i>
                        <input placeholder="facebook" id="facebook" name="facebook" type="text">
                        <label for="facebook" class="active"><b>Facebook</b></label>
                      </div>

                      <div class="input-field col s0">
                          <i class="mdi-action-account-circle prefix"></i>
                      </div>

                      <div class="input-field col s6">
                        <select id="genero" name="genero">
                          <option value="" disabled selected>  Seleccione un género</option>
                        <option value="1">Masculino</option>
                          <option value="2">Femenino</option>
                        </select>
                        <label><b>&nbsp&nbsp&nbsp&nbsp&nbspGénero: </b></label>
                      </div>
                    </div>

                    

                    <BR>
                    <h4 class="header2"><b>Información de la Cuenta</b></h4><Br>
                    <div class="row">

                      <div class="input-field col s6">
                        <i class="mdi-communication-quick-contacts-mail prefix"></i>
                        <input placeholder="Ingrese su correo electrónico" id="email" name="email" type="text">
                        <label for="email" class="active"><b>Correo Electrónico</b></label>
                      </div>                    

                      <div class="input-field col s6">
                        <i class="mdi-communication-vpn-key prefix"></i>
                        <input placeholder="Ingrese su Contraseña" id="password" name="password" type="password">
                        <label for="password" class="active"><b>Contraseña</b></label>
                      </div>  
                    </div>
                    
                    <div class="row">
                    <div class="input-field col s0">
                          <i class="mdi-action-account-circle prefix"></i>
                      </div>
                        <div class="input-field col s6">
                          <select id="tipoUsuario" name="tipoUsuario">
                            <option value="" disabled selected>  Seleccione un Tipo de Usuario</option>
                            <option value="administrador">Administrador</option>
                            <option value="sacerdote">Sacerdote</option>
                          </select>
                        <label><b>Tipo Usuario: </b></label>
                      </div>
                    </div><br>


                    <div class="row">
                        <div class="input-field col s7">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Registrar
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
		</div>
</section>
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