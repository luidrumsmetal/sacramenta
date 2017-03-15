<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/validate.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/prototype-1.6.0.2.js"></script>-->

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
                    <div class="col s12 m12 l12 ">
                    <h1 class="brand-logo center">Registro de Fiel</h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <h5><span class="card-title"><b>DATOS PERSONALES</b></span></h5><hr><br><br>
                <div class="row">
                <?php echo form_open('Users/update_fiel', 'role="form"','method=post'); ?>
                    <div class="row">
										  <div class="input-field col s12 m6 l6">
										    <i class="mdi-action-account-circle prefix"></i>
										    <input placeholder="INGRESE SU APELLIDO PATERNO" id="apellidoPaterno" name="apellidoPaterno" type="text" value="<?php echo $get->apellidoPaterno ?>">
										    <label for="apellidoPaterno" class="active"><b>Apellido Paterno (*)</b></label>
										  </div>
											<div class="input-field col s6">
										    <i class="mdi-action-account-circle prefix"></i>
										    <input placeholder="INGRESE SU APELLIDO MATERNO" id="apellidoMaterno" name="apellidoMaterno" type="text" value="<?php echo $get->apellidoMaterno ?>">
										    <label for="apellidoMaterno" class="active"><b>Apellido Materno (*)</b></label>
										  </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input placeholder="INGRESE SUS NOMBRES" id="nombres" name="nombres" type="text" value="<?php echo $get->nombres ?>">
                            <label for="nombres" class="active"><b>Nombres (*)</b></label>
                          </div>
												  <div class="input-field col s6">
												          <i class="mdi-action-event prefix"></i>
												          <input placeholder="" id="fechanac" name="fechanac" type="date" value="<?php echo $get->fechanacimiento ?>">
												          <label for="fechanac" class="active"><b>Fecha de Nacimiento (*)</b></label>
												  </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s0">
                        <i class="mdi-social-group prefix"></i>&nbsp &nbsp
                      </div>
                      <div class="input-field col s5">
                        <select id="genero" name="genero">
                          <option value="<?php echo $get->genero ?>"> <?php echo $get->genero ?></option>
                          <option value="1">Masculino</option>
                          <option value="2">Femenino</option>
                        </select>
                        <label><b>Género (*) </b></label>
                      </div>
                      <div class="input-field col s0">
                        &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp
                      </div>
                      <div class="input-field col s6">
										    <i class="mdi-action-home prefix"></i>
										    <input placeholder="INGRESE SU DIRECCIÓN" id="procedencia" name="procedencia" type="text" value="<?php echo $get->procedencia ?>">
										    <label for="procedencia" class="active"><b>Procedencia (*)</b></label>
										  </div>
                    </div>
										<div class="row">
											<div class="input-field col s12">
												<i class="mdi-action-credit-card prefix"></i>

												<input placeholder="Ingrese su carnet de identidad" id="ci" name="ci" type="text" value="<?php echo $get->ci ?>">
                        <div id="msgUsuario"></div>
												<label for="ci" class="active"><b>Carnet de Identidad</b></label>

											</div>
										</div>


                    <h5><span class="card-title"><b>DATOS DE LOS PADRES</b></span></h5><hr><br><br>
                    <div class="row">
                      <div class="row">
  										  <div class="input-field col s6">
  										    <i class="mdi-action-account-circle prefix"></i>
  										    <input placeholder="INGRESE SU APELLIDO Y NOMBRE COMPLETO" id="apellidoPaterno" name="apellidoNombrePadre" type="text" value="<?php echo $get->apellidoNombrePadre ?>">
  										    <label for="apellidoPaterno" class="active"><b>Apellidos y Nombres del Padre</b></label>
  										  </div>
  											<div class="input-field col s6">
  										    <i class="mdi-action-account-circle prefix"></i>
  										    <input placeholder="INGRESE SU APELLIDO Y NOMBRE COMPLETO" id="apellidoMaterno" name="apellidoNombreMadre" type="text" value="<?php echo $get->apellidoNombrePadre ?>">
  										    <label for="apellidoMaterno" class="active"><b>Apellidos y Nombres de la Madre</b></label>
  										  </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input placeholder="INGRESE LA PROCEDENCIA DEL PADRE" id="procedenciaPadre" name="procedenciaPadre" type="text" value="<?php echo $get->procedenciaPadre ?>">
                        <label for="procedenciaPadre" class="active"><b>Procedencia de Padre</b></label>
                      </div>
                      <div class="input-field col s6">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input placeholder="INGRESE LA PROCEDENCIA DE LA MADRE " id="procedenciaMadre" name="procedenciaMadre" type="text"
                        value="<?php echo $get->procedenciaPadre ?>">
                        <label for="procedenciaMadre" class="active"><b>Procedencia de la Madre</b></label>
                      </div>
                    </div>


                  <h5><span class="card-title"><b>OFICIALÍA DE REGISTRO CIVIL (CERTIFICADO DE NACIMIENTO)</b></span></h5><hr><br><br>
                  <div class="row">
                    <div class="input-field col s4">
                      <i class="mdi-action-book prefix"></i>
                      <input placeholder="Ingrese el numero de oficialia" id="orc" name="orc" type="text" value="<?php echo $get->orc ?>">
                      <label for="orc" class="active"><b>ORC (*)</b></label>
                    </div>
                    <div class="input-field col s4">
                      <i class="mdi-action-find-in-page prefix"></i>
                      <input placeholder="Ingrese el numero libro" id="libro" name="libro" type="text" value="<?php echo $get->libro ?>">
                      <label for="libro" class="active"><b>Libro (*)</b></label>
                    </div>
                    <div class="input-field col s4">
                      <i class="mdi-editor-format-list-numbered prefix"></i>
                      <input placeholder="Ingrese el numero partida" id="partida" name="partida" type="text" value="<?php echo $get->partida ?>">
                      <label for="partida" class="active"><b>Partida (*)</b></label>
                    </div>
                  </div>
                    <div class="row">
                        <div class="input-field col s7">
                        <input type="hidden" name="idPadresFiel" value="<?php echo $get->idPadresFiel ?>" />
                        <input type="hidden" name="id" value="<?php echo $get->id ?>" />
                        <input type="hidden" name="idCertificadoNacimiento" value="<?php echo $get->idCertificadoNacimiento ?>" />
                          <button type="submit" name="mit" class="btn cyan waves-effect waves-light" >Guardar
                          </button>
                          <button type="button" onclick="location.href='<?php echo site_url('users/listFiel') ?>'" class="btn btn-danger">Volver Atras<i class="mdi-content-send right"></i></button>
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
		$("#carnetPadre").autocomplete({
				source: "<?php echo base_url(); ?>users/autoCompleteCarnetPadre",
				minLength: 1,
				select: function (event, ui) {
						$("#carnetPadre_id").val(ui.item.id);
             $("#nombrePadre").val(ui.item.nombre);
				}
		});
    $("#carnetMadre").autocomplete({
				source: "<?php echo base_url(); ?>users/autoCompleteCarnetMadre",
				minLength: 1,
				select: function (event, ui) {
						$("#carnetMadre_id").val(ui.item.id);
             $("#nombreMadre").val(ui.item.nombre);
				}
		});
    $("#carnetPadrino").autocomplete({
				source: "<?php echo base_url(); ?>users/autoCompleteCarnetPadrino",
				minLength: 1,
				select: function (event, ui) {
						$("#carnetPadrino_id").val(ui.item.id);
             $("#nombrePadrino").val(ui.item.nombre);
				}
		});
});
</script>
