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
                    <h1 class="brand-logo center">Matrimonio</h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <div class="row">
                  <form class="col s12" id="formWedding" method="post" action="<?php echo base_url(); ?>matrimonio/matrimonioRegister">
                    <font color="black" size="5" face="Lucida Calligraphy">Datos Generales</font><br><Br>
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input placeholder="Apellidos y nombres del Esposo" id="esposo" name="esposo" type="text"><div id="msgUsuario" value='<?php echo set_value('esposo') ?>'></div>
                        <input id="esposo_id" name="esposo_id" type="hidden">
                        <label for="esposo" class="active"><b>Nombre completo Esposo(*)</b></label>
                        <?php echo form_error('esposo')?>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input placeholder="Apellidos ynombres de la Esposa" id="esposa" name="esposa" type="text"><div id="msgUsuario" value='<?php echo set_value('esposa') ?>'></div>
                        <input id="esposa_id" name="esposa_id" type="hidden">
                        <label for="esposa" class="active"><b>Nombre completo Esposa(*)</b></label>
                        <?php echo form_error('esposa')?>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="input-field col s12 m6 l6 ">
                        <i class="mdi-action-home prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text" value='<?php echo set_value('parroquia') ?>'>
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Parroquia (*)</b></label>
                        <?php echo form_error('parroquia')?>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-event prefix"></i>
                        <input placeholder="" id="fechacom" name="fechacom" type="date">
                        <label for="first_name" class="active"><b>Fecha de Matrimonio (*)</b></label>
                        <?php echo form_error('fechacom')?>
                      </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l12">
                        <i class="mdi-action-room prefix"></i>
                        <input placeholder="Ingrese lugar de matrimonio" id="jurisdiccion" name="jurisdiccion" type="text" value='<?php echo set_value('jurisdiccion') ?>'>
                        <input id="jurisdiccion_id" name="jurisdiccion_id" type="hidden">
                        <label for="jurisdiccion" class="active"><b>Jurisdicción Eclesiástica (*)</b></label>
                        <?php echo form_error('jurisdiccion')?>
                      </div>
                    </div>
                  <!--  <h4 class="header2">Informacion de Registro</h4>--><br>
                  <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese apellido o nombre del sacerdote Celebrante" id="sacerdote" name="sacerdote" type="text" value='<?php echo set_value('sacerdoteCelebrante') ?>'>
                        <input id="sacerdoteCelebrante_id" name="sacerdoteCelebrante_id" type="hidden">
                        <label for="sacerdote" class="active"><b>Sacerdote Celebrante (*)</b></label>
                        <?php echo form_error('sacerdote')?>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese apellido o nombre del sacerdote Certificador" id="sacerdote1" name="sacerdote1" type="text" value='<?php echo set_value('sacerdote1') ?>'>
                        <input id="sacerdoteCertificador_id" name="sacerdoteCertificador_id" type="hidden">
                        <label for="sacerdote1" class="active"><b>Sacerdote Certificador (*)</b></label>
                        <?php echo form_error('sacerdote1')?>
                      </div>
                    </div>
                    <font color="black" size="5" face="Lucida Calligraphy">Libro Sacramental</font><br><Br>
                    <div class="row">
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-action-book prefix"></i>
                        <input placeholder="Ingrese libro de registro" id="libroOne" name="libroOne" type="text" value='<?php echo set_value('libroOne') ?>'>
                        <label for="libro" class="active"><b>Libros (*)</b></label>
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

                    <font color="black" size="5" face="Lucida Calligraphy">Registro Civil</font><br><Br>
                    <div class="row">
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-maps-store-mall-directory prefix"></i>
                        <input placeholder="Ingrese Oficialía" id="oficialia" name="oficialia" type="text" value='<?php echo set_value('oficialia') ?>'>
                        <label for="oficialia" class="active"><b>Oficialía (*)</b></label>
                        <?php echo form_error('oficialia')?>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-editor-border-color prefix"></i>
                        <input placeholder="Ingrese número de partida" id="partida" name="partida" type="text" value='<?php echo set_value('partida') ?>'>
                        <label for="partida" class="active"><b>Partida (*)</b></label>
                        <?php echo form_error('partida')?>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-editor-format-list-numbered prefix"></i>
                        <input placeholder="Ingrese número" id="numeroOf" name="numeroOf" type="text" value='<?php echo set_value('numeroOf') ?>'>
                        <label for="numeroOf" class="active"><b>Número (*)</b></label>
                        <?php echo form_error('numeroOf')?>
                      </div>
                    </div>

                    <font color="black" size="5" face="Lucida Calligraphy">Padrinos</font><br><Br>
                   
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="Ingrese el apellido y nombre de la Madrina" id="nombreMadrina" name="nombreMadrina" type="text" value='<?php echo set_value('nombreMadrina') ?>'>
                        <label for="nombreMadrina" class="active"><b>Nombre completo Madrina</b></label>
                      </div>                    

                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="Ingrese el apellido y nombre del Padrino" id="nombrePadrino" name="nombrePadrino" type="text" value='<?php echo set_value('nombrePadrino') ?>'>
                        <label for="nombrePadrino" class="active"><b>Nombre completo Padrino</b></label>
                      </div>
                    </div>
                    
                    <font color="black" size="5" face="Lucida Calligraphy">Testigos</font><br><Br>

                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="Ingrese los apellidos y nombres del Testigo" id="nombreTestigo" name="nombreTestigo" type="text" value='<?php echo set_value('nombreTestigo') ?>'>
                        <label for="nombreTestigo" class="active"><b>1er Testigo Presencial</b></label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="Ingrese los apellidos y nombres del Testigo" id="nombreTestigoseg" name="nombreTestigoseg" type="text" value='<?php echo set_value('nombreTestigoseg') ?>'>
                        <label for="nombreTestigoseg" class="active"><b>2er Testigo Presencial</b></label>
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
    $("#jurisdiccion").autocomplete({
        source: "<?php echo base_url(); ?>jurisdiccion/autoCompleteJurisdiccion",
        minLength: 1,
        select: function( event, ui ) {
           $("#jurisdiccion_id").val(ui.item.id);
        }
      });
    $("#sacerdote").autocomplete({
        source: "<?php echo base_url(); ?>users/autoCompleteSacerdoteCelebrante",
        minLength: 1,
        select: function (event, ui) {
            $("#sacerdoteCelebrante_id").val(ui.item.id);
        }
    });
    $("#sacerdote1").autocomplete({
        source: "<?php echo base_url(); ?>users/autoCompleteSacerdoteCelebrante",
        minLength: 1,
        select: function (event, ui) {
            $("#sacerdoteCertificador_id").val(ui.item.id);
        }
    });
    $('#esposo').autocomplete({
      source: "<?php echo base_url(); ?>users/autoCompleteEsposo",
      minLength: 1,
      select: function( event, ui ) {
         $("#esposo_id").val(ui.item.id);
      }
    });
    $('#esposa').autocomplete({
      source: "<?php echo base_url(); ?>users/autoCompleteEsposa",
      minLength: 1,
      select: function( event, ui ) {
         $("#esposa_id").val(ui.item.id);
      }
    });
    
   
    
    

});
</script>



