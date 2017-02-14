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
                    <h1 class="brand-logo center">Confirmación</h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <div class="row">
                  <form class="col s12" id="formConfirmacion" method="post" action="<?php echo base_url(); ?>confirmacion/confirmacionRegister">
                  <font color="black" size="5" face="Lucida Calligraphy">Datos Generales</font><br><Br>

                      <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input placeholder="Ingrese nombre completo" id="feligres" name="feligres" type="text">
                            <input id="persona_id" name="persona_id" type="hidden">                            
                            <label for="feligres" class="active"><b>Feligrés (*)</b></label>
                        </div>
                      </div>  


                    <div class="row">               
                      <div class="input-field col s6">
                        <i class="mdi-action-home prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text">
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Parroquia que inscribe el sacramento (*)</b></label>
                      </div>

                      	<div class="input-field col s6">
                            <i class="mdi-action-event prefix"></i>
                            <input placeholder="" id="fechacom" name="fechacom" type="date">
                            <label for="fechacom" class="active"><b>Fecha Confirmación (*)</b></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-action-room prefix"></i>
                            <input placeholder="Ingrese lugar de Confirmación" id="jurisdiccion" name="jurisdiccion" type="text">
                            <input id="jurisdiccion_id" name="jurisdiccion_id" type="hidden">                            
                            <label for="jurisdiccion" class="active"><b>Jurisdicción Eclesiástica (*)</b></label>
                        </div>
                    </div>  

                  <div class="row">
                      <div class="input-field col s6">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese apellido o nombre del sacerdote Celebrante" id="sacerdote" name="sacerdote" type="text">
                        <input id="sacerdoteCelebrante_id" name="sacerdoteCelebrante_id" type="hidden">
                        <label for="sacerdote" class="active"><b>Sacerdote Celebrante (*)</b></label>
                      </div>
                      <div class="input-field col s6">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese apellido o nombre del sacerdote Certificador" id="sacerdote1" name="sacerdote1" type="text">
                        <input id="sacerdoteCertificador_id" name="sacerdoteCertificador_id" type="hidden">
                        <label for="sacerdote1" class="active"><b>Sacerdote Certificador (*)</b></label>
                      </div>
                    </div>
                 
                    <font color="black" size="5" face="Lucida Calligraphy">Libro Sacramental</font><br><Br>
                    <div class="row">
                      <div class="input-field col s4">
                        <i class="mdi-action-book prefix"></i>
                        <input placeholder="Ingrese libro de registro" id="libroOne" name="libroOne" type="text">
                        <label for="libro" class="active"><b>Libro (*)</b></label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-action-find-in-page prefix"></i>
                        <input placeholder="Ingrese número de página" id="paginaOne" name="paginaOne" type="text">
                        <label for="pagina" class="active"><b>Página (*)</b></label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-editor-format-list-numbered prefix"></i>
                        <input placeholder="Ingrese número registro" id="numeroOne" name="numeroOne" type="text">
                        <label for="numero" class="active"><b>Número (*)</b></label>
                      </div>
                    </div>
                    <font color="black" size="5" face="Lucida Calligraphy">Padrinos</font><br><Br>
                    <div class="row">


                      <div class="input-field col s6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="Ingrese el apellido y nombre del Padrino " id="apellidoNombrePadrino" name="apellidoNombrePadrino" type="text">
                        <label for="nombrePadrino" class="active"><b>Nombre Padrino</b></label>
                      </div>    

                       <div class="input-field col s6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="Ingrese el apellido y nombre de la Madrina " id="apellidoNombreMadrina" name="apellidoNombreMadrina" type="text">
                        <label for="nombrePadrino" class="active"><b>Nombre Madrina</b></label>
                      </div>                                          

                    </div>


                    <br><br>
               
					
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
    $("#feligres").autocomplete({
        source: "<?php echo base_url(); ?>users/autoCompleteFeligresConfirmacion",
        minLength: 1,
        select: function( event, ui ) {
           $("#persona_id").val(ui.item.id);
        }
      });  
    $("#jurisdiccion").autocomplete({
        source: "<?php echo base_url(); ?>Jurisdiccion/autoCompleteJurisdiccion",
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
		
    

    
});
</script>