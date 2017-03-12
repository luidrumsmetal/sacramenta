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
            <div class="col s12">
                
                <nav class="amber darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12 m6 l3">
                    <h1 class="brand-logo center">Registrar Usuario</h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <h4 class="header2"><b>Información General</b></h4><br>
                <div class="row">
                  <?php echo form_open('users/update_user', 'role="form"', 'method=post'); ?>
                    <div class="row">
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese el apellido paterno" id="apellidoPaterno" name="apellidoPaterno" type="text" value="<?php echo $get->apellidoPaterno ?>">
                        <label for="apelliodPaterno" class="active"><b>Apellido Paterno</b></label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese el apellido materno" id="apellidoMaterno" name="apellidoMaterno" type="text" value="<?php echo $get->apellidoMaterno ?>">
                        <label for="apelliodMaterno" class="active"><b>Apellido Materno</b></label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input  placeholder="Ingrese el nombre completo" id="nombres" name="nombres" type="text" value="<?php echo $get->nombres ?>">
                        <label for="nombres" class="active"><b>Nombres</b></label>
                       </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-credit-card prefix"></i>
                        <input placeholder="Ingrese su carnet de identidad" id="ci" name="ci" type="text" value="<?php echo $get->ci ?>">
                        <label for="ci" class="active"><b>Carnet de Identidad</b></label>
                      </div>

                      <div class="input-field col s12 m6 l6">
                            <i class="mdi-action-event prefix"></i>
                            <input placeholder="" id="fechanac" name="fechanac" type="date" value="<?php echo $get->fechaNacimiento ?>">
                            <label for="fechanac" class="active"><b>Fecha Nacimiento</b></label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-home prefix"></i>
                        <input placeholder="Ingrese su número celular" id="celular" name="celular" type="text" value="<?php echo $get->celular ?>">
                        <label for="celular" class="active"><b>Celular</b></label>
                      </div>                    

                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-file-folder-shared prefix"></i>
                        <input placeholder="Ingrese su nombre de Facebook" id="facebook" name="facebook" type="text" value="<?php echo $get->facebook ?>">
                        <label for="facebook" class="active"><b>Facebook</b></label>
                      </div>
                    </div>
                      <div class="row">
                         <!-- <div class="input-field col s1 m1 ">
                              <i class="mdi-action-account-circle prefix"></i>
                          </div>-->
                          <div class="input-field col s11 m5 l6">

                          <select id="genero" name="genero">
                              <option value="<?php echo $get->genero ?>"><?php echo $get->genero ?></option>
                              <option value="1">Masculino</option>
                              <option value="2">Femenino</option>
                          </select>
                          <label>Genero: </label>
                          </div>
                       </div>
                    <br>
                    <h4 class="header2"><b>Información de la Cuenta</b></h4><Br>
                    <div class="row">

                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-communication-quick-contacts-mail prefix"></i>
                        <input placeholder="Ingrese su correo electrónico" id="email" name="email" type="text" value="<?php echo $get->email ?>">
                        <label for="email" class="active"><b>Correo Electrónico</b></label>
                      </div>                    

                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-communication-vpn-key prefix"></i>
                        <input placeholder="Ingrese su Contraseña" id="password" name="password" type="password" value="<?php echo $get->password ?>">
                        <label for="password" class="active"><b>Contraseña</b></label>
                      </div>  
                    </div>
                    
                    <div class="row">

                        <div class="input-field col s11 m5 l6">
                          <select id="tipoUsuario" name="tipoUsuario" required="required" >
                              <option value="<?php echo $get->tipoUsuario ?>"> <b><?php echo $get->tipoUsuario ?></b></option>
                            <option value="administrador">Administrador</option>
                            <option value="sacerdote">Sacerdote</option>
                          </select>
                        <label>Tipo Usuario: </label>
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="input-field col s7">
                        <input type="hidden" name="id" id="id" value="<?php echo $get->id ?>" />
                        <input type="hidden" name="idCuenta" id="idCuenta" value="<?php echo $get->idCuenta ?>" />
                          <button type="submit" name="mit" class="btn cyan waves-effect waves-light" >Guardar
                          </button>
                          <button type="button" onclick="location.href='<?php echo site_url('users/listUser') ?>'" class="btn btn-danger">Volver Atras<i class="mdi-content-send right"></i></button>
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