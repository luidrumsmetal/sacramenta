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
                    <div class="col s12">
                    <h1 class="brand-logo center">Primera Comunión</h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <div class="row">
                  <form class="col s12" id="formPriest" method="post" action="<?php echo base_url(); ?>firstCommunion/FirstCommunionRegister">
                  <font color="black" size="5" face="Lucida Calligraphy">Datos Generales</font><br><Br>
                    <!--<div class="row">
                      <div class="input-field col s6">
                        <i class="mdi-action-credit-card prefix"></i>
                        <input placeholder="Ingrese su carnet de identidad" id="ci" name="ci" type="text"><div id="msgUsuario"></div>
                        <input id="ci_id" name="ci_id" type="hidden">
                        <label for="ci" class="active"><b>Carnet de Identidad</b></label>
												<span id="comprobar_mensaje"></span>
                      </div>
                      <div class="input-field col s6">
                        <i class="mdi-action-event prefix"></i>
                        <input placeholder="" id="fechanac" disabled  name="fechanac" type="date">
                        <label for="first_name" class="active"><b>Fecha Nacimiento</b></label>
                      </div>
                    </div>-->

                      <div class="row">
                        <div class="input-field col s12 m6 l12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input placeholder="Ingrese nombre completo" id="feligres" name="feligres" type="text" value='<?php echo set_value('feligres') ?>'>
                            <input id="feligres_id" name="feligres_id" type="hidden">                            
                            <label for="feligres" class="active"><b>Feligrés (*)</b></label>
                            <?php echo form_error('feligres')?>
                        </div>
                       <!-- <div class="input-field col s6">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input placeholder="Ingrese su nombre completo" disabled id="apellido" name="apellido" type="text">
                          <label for="apellido" class="active"><b>Apellido</b></label>
                        </div>-->
                      </div>

                      <div class="row">
                        <div class="input-field col s12 m6 l6">
                              <i class="mdi-action-event prefix"></i>
                              <input placeholder="" id="fechacom" name="fechacom" type="date" value='<?php echo set_value('fechacom') ?>'>
                              <label for="first_name" class="active"><b>Fecha Comunión (*)</b></label>
                              <?php echo form_error('fechacom')?>
                        </div>

                        <div class="input-field col s12 m6 l6">
                          <i class="mdi-action-home prefix"></i>
                          <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text" value='<?php echo set_value('parroquia') ?>'>
                          <input id="parroquia_id" name="parroquia_id" type="hidden">
                          <label for="parroquia" class="active"><b>Parroquia de registro (*)</b></label>
                          <?php echo form_error('parroquia')?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l12">
                            <i class="mdi-action-room prefix"></i>
                            <input placeholder="Ingrese lugar de Comunión" id="jurisdiccion" name="jurisdiccion" type="text" value='<?php echo set_value('jurisdiccion') ?>'>
                            <input id="jurisdiccion_id" name="jurisdiccion_id" type="hidden">                            
                            <label for="jurisdiccion" class="active"><b>Jurisdicción Eclesiástica (*)</b></label>
                            <?php echo form_error('jurisdiccion')?>
                        </div>
                    </div>

                  <font color="black" size="5" face="Lucida Calligraphy">Libro Sacramental</font><br><Br>
                    <div class="row">
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-action-book prefix"></i>
                        <input placeholder="Ingrese libro de registro" id="libroOne" name="libroOne" type="text" value='<?php echo set_value('libroOne') ?>'>
                        <label for="libro" class="active"><b>Libro (*)</b></label>
                        <?php echo form_error('libroOne')?>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-action-find-in-page prefix"></i>
                        <input placeholder="Ingrese número de página" id="paginaOne" name="paginaOne" type="text" value='<?php echo set_value('paginaOne') ?>'>
                        <label for="pagina" class="active"><b>Página (*)</b></label>
                        <?php echo form_error('paginaOne')?>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-editor-format-list-numbered prefix"></i>
                        <input placeholder="Ingrese número registro" id="numeroOne" name="numeroOne" type="text" value='<?php echo set_value('numeroOne') ?>'>
                        <label for="numero" class="active"><b>Número (*)</b></label>
                        <?php echo form_error('numeroOne')?>
                      </div>
                    </div>

                    <font color="black" size="5" face="Lucida Calligraphy">Observaciones</font><br><Br>

                      <div class="row">
                        <div class="input-field col s12 m6 l12">
                          <i class="mdi-social-person prefix"></i>
                          <input placeholder="Ingrese las observaciones de este certificado" id="observacion" name="observacion" type="text" value='<?php             echo set_value('observacion') ?>'>
                          <label for="observacion" class="active"><b>Obsevacion</b></label>
                        </div>
                      </div>            
                    <Br><BR>
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
<!--<script type="text/javascript">
  function comprobar(ci)
  {
    //var url = 'http://'+location.host+'/ajax/ajax_comprobar_nick.php';
    var url = '<?php echo base_url(); ?>users/testare';
    var pars= ('ci=' + document.getElementById('ci').value);

    var myAjax = new Ajax.Updater( 'comprobar_mensaje', url, { method: 'get', parameters: pars});
  }
</script>-->
<script type="text/javascript">
$(document).ready(function(){

		$("#parroquia").autocomplete({
        source: "<?php echo base_url(); ?>jurisdiccion/autoCompleteParroquia",
        minLength: 1,
        select: function( event, ui ) {
           $("#parroquia_id").val(ui.item.id);
        }
      });
    $("#feligres").autocomplete({
        source: "<?php echo base_url(); ?>firstCommunion/autoCompleteFeligres",
        minLength: 1,
        select: function( event, ui ) {
           $("#feligres_id").val(ui.item.id);
        }
      });  
    $("#jurisdiccion").autocomplete({
        source: "<?php echo base_url(); ?>Jurisdiccion/autoCompleteJurisdiccion",
        minLength: 1,
        select: function( event, ui ) {
           $("#jurisdiccion_id").val(ui.item.id);
        }
      });        
    $('#ci').autocomplete({
      source: "<?php echo base_url(); ?>users/autoCompleteCarnetCommunion",
      minLength: 5,
      select: function( event, ui ) {
         $("#ci_id").val(ui.item.ci);
         $("#nombre").val(ui.item.nombre);
         $("#apellido").val(ui.item.apellido);
         $("#fechanac").val(ui.item.fechanac);
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
