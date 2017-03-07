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
                  <form class="col s12 m10 l12" id="formPriest" method="post" action="<?php echo base_url(); ?>users/faithfullCreate">
                    <div class="row">
										  <div class="input-field col s12 m6 l6">
										    <i class="mdi-action-account-circle prefix"></i>
										    <input placeholder="INGRESE SU APELLIDO PATERNO" id="apellidoPaterno" name="apellidoPaterno" type="text" value='<?php echo set_value('apellidoPaterno') ?>'>
										    <label for="apellidoPaterno" class="active"><b>Apellido Paterno (*)</b></label>
										  </div>
											<div class="input-field col col s12 m6 l6">
										    <i class="mdi-action-account-circle prefix"></i>
										    <input placeholder="INGRESE SU APELLIDO MATERNO" id="apellidoMaterno" name="apellidoMaterno" type="text" value='<?php echo set_value('apellidoMaterno') ?>'>
										    <label for="apellidoMaterno" class="active"><b>Apellido Materno (*)</b></label>
										  </div>
                    </div>
                    <div class="row">
                        <div class="input-field col col s12 m6 l6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input placeholder="INGRESE SUS NOMBRES" id="nombres" name="nombres" type="text" value='<?php echo set_value('nombres') ?>'>
                            <label for="nombres" class="active"><b>Nombres (*)</b></label>
                          </div>
												  <div class="input-field col col s12 m6 l6">
												          <i class="mdi-action-event prefix"></i>
												          <input placeholder="" id="fechanac" name="fechanac" type="date" value='<?php echo set_value('fechanac') ?>'>
												          <label for="first_name" class="active"><b>Fecha de Nacimiento (*)</b></label>
												  </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-credit-card prefix"></i>
                        <input placeholder="Ingrese su carnet de identidad" id="ci" name="ci" type="text" value='<?php echo set_value('ci') ?>'>
                        <div id="msgUsuario"></div>
                        <label for="ci" class="active"><b>Carnet de Identidad</b></label>
                        <span id="comprobar_mensaje"></span>
                      </div>

                      <div class="input-field col col s12 m6 l6">
										    <i class="mdi-action-home prefix"></i>
										    <input placeholder="INGRESE SU DIRECCIÓN" id="procedencia" name="procedencia" type="text" value='<?php echo set_value('procedencia') ?>'>
										    <label for="procedencia" class="active"><b>Procedencia (*)</b></label>
										  </div>
                    </div>

										<div class="row">
                      <div class="input-field col s0">
                          <i class="mdi-action-account-circle prefix"></i>
                      </div>

                      <div class="input-field col s12 m5 l6">
                        <select id="genero" name="genero" value='<?php echo set_value('genero') ?>'>
                          <option value="" disabled selected>&nbsp&nbspSeleccione un género</option>
                        <option value="1">Masculino</option>
                          <option value="2">Femenino</option>
                        </select>
                        <label><b>&nbsp&nbsp&nbsp&nbsp&nbspGénero: </b></label>
                      </div>
										</div>

                    <h5><span class="card-title"><b>DATOS DE LOS PADRES</b></span></h5><hr><br><br>
                      <div class="row">
  										  <div class="input-field col s12 m6 l6">
  										    <i class="mdi-action-account-circle prefix"></i>
  										    <input placeholder="INGRESE SU APELLIDO Y NOMBRE COMPLETO" id="apellidoPaterno" name="apellidoNombrePadre" type="text" value='<?php echo set_value('apellidoNombrePadre') ?>'>
  										    <label for="apellidoPaterno" class="active"><b>Nombre completo Padre</b></label>
  										  </div>
  											<div class="input-field col s12 m6 l6">
  										    <i class="mdi-action-account-circle prefix"></i>
  										    <input placeholder="INGRESE SU APELLIDO Y NOMBRE COMPLETO" id="apellidoMaterno" name="apellidoNombreMadre" type="text" value='<?php echo set_value('apellidoNombreMadre') ?>'>
  										    <label for="apellidoMaterno" class="active"><b>Nombre completo Madre</b></label>
  										  </div>
                      </div>
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-maps-place prefix"></i>
                        <input placeholder="INGRESE LA PROCEDENCIA DEL PADRE" id="procedenciaPadre" name="procedenciaPadre" type="text" value='<?php echo set_value('procedenciaPadre') ?>'>
                        <label for="procedenciaPadre" class="active"><b>Procedencia de Padre</b></label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-maps-place prefix"></i>
                        <input placeholder="INGRESE LA PROCEDENCIA DE LA MADRE " id="procedenciaMadre" name="procedenciaMadre" type="text"
                        value='<?php echo set_value('procedenciaMadre') ?>'>
                        <label for="procedenciaMadre" class="active"><b>Procedencia de la Madre</b></label>
                      </div>
                    </div>
                  <h5><span class="card-title"><b>OFICIALÍA DE REGISTRO CIVIL (CERTIFICADO DE NACIMIENTO)</b></span></h5><hr><br><br>
                  <div class="row">
                    <div class="input-field col s12 m6 l4">
                      <i class="mdi-action-book prefix"></i>
                      <input placeholder="Ingrese el numero de oficialía" id="orc" name="orc" type="text" value='<?php echo set_value('orc') ?>'>
                      <label for="orc" class="active"><b>ORC (*)</b></label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                      <i class="mdi-action-find-in-page prefix"></i>
                      <input placeholder="Ingrese el numero libro" id="libro" name="libro" type="text" value='<?php echo set_value('libro') ?>'>
                      <label for="libro" class="active"><b>Libro (*)</b></label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                      <i class="mdi-editor-format-list-numbered prefix"></i>
                      <input placeholder="Ingrese el numero partida" id="partida" name="partida" type="text" value='<?php echo set_value('partida') ?>'>
                      <label for="partida" class="active"><b>Partida (*)</b></label>
                    </div>
                  </div>
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

    $('#ci').focusout( function(){
    if($('#ci').val()!= ""){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>users/testare",
            data: "ci="+$('#ci').val(),
            beforeSend: function(){

              $('#msgUsuario').html('<img src="<?php echo base_url(); ?>assets/loader.gif"/> verificando');
            },
            success: function( respuesta ){
              if(respuesta == '1')
                $('#msgUsuario').html("<div id='card-alert' class='card green'><div class='card-content white-text'><b>Carnet de identidad disponible</b></div></div>");
              else if (respuesta == '0') {
                $('#msgUsuario').html("<div id='card-alert' class='card red'><div class='card-content white-text'><b>Carnet de identidad No Disponible</b></div></div>");
              }
              else {
                $('#msgUsuario').html("<div id='card-alert' class='card red'><div class='card-content white-text'><b>Ingrese un numero de carnet correcto</b></div></div>");
              }

            }
        });
    }
});
});
</script>
