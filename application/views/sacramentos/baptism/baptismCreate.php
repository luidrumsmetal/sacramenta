<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/validate.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/prototype-1.6.0.2.js"></script>-->
  
<!--<?php //echo form_open('baptism/baptismRegister','role="form"','method=post'); ?>-->
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
                    <h1 class="brand-logo center">Bautizo</h1>
                    </div>
                  </div>
               </nav>
              <div class="card-panel">
                <div class="row">
                  <form class="col s12" id="formPriest" method="post" action="<?php echo site_url(); ?>baptism/baptismRegister">
                  	<font color="black" size="5" face="Lucida Calligraphy">Datos Generales</font><br><Br>
                      <div class="row">
						<div class="input-field col s12 m6 l12">
							<i class="mdi-action-account-circle prefix"></i>
							<input id="feligres_id" name="feligres_id" type="hidden" >
							<input placeholder="Ingrese nombre completo" id="feligres" name="feligres" type="text" value="<?php echo set_value('feligres'); ?>"/>
							<label for="apellidoPaterno" class="active"><b>Feligrés (*)</b></label>
							<?php echo form_error('feligres')?>
						</div>

                    </div>

                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-home prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text" value='<?php echo set_value('parroquia') ?>'/>
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Parroquia de registro (*)</b></label>
                        <?php echo form_error('parroquia')?>
                      </div>
						<div class="input-field col s12 m6 l6">
							<i class="mdi-action-event prefix"></i>
							<input placeholder="" id="fechabautismo" name="fechabautismo" type="date">
							<label for="fechabautismo" class="active"><b>Fecha de Celebración (*)</b></label>
							<?php echo form_error('fechabautismo')?>
						</div>                      
                    </div>

                    <div class="row">
						<div class="input-field col s12 m6 l12">
							<i class="mdi-action-room prefix"></i>
							<input placeholder="Ingrese lugar de Bautizo" id="jurisdiccion" name="jurisdiccion" type="text" value='<?php echo set_value('jurisdiccion') ?>'/>
							<input id="jurisdiccion_id" name="jurisdiccion_id" type="hidden">
							<label for="jurisdiccion" class="active"><b>Jurisdicción Eclesiástica (*)</b></label>
							<?php echo form_error('jurisdiccion')?>
						</div>
                    </div>                    

					<div class="row">
							<div class="input-field col s12 m6 l6">
								<i class="mdi-social-person-outline prefix"></i>
								<input placeholder="Ingrese apellido o nombre del sacerdote Celebrante" id="sacerdoteCelebrante" name="sacerdoteCelebrante" type="text" value='<?php echo set_value('sacerdoteCelebrante') ?>'/>
								<input placeholder="" id="sacerdoteCelebrante_id" name="sacerdoteCelebrante_id" type="hidden">
								<label for="sacerdoteCelebrante" class="active"><b>Sacerdote Celebrante (*)</b></label>
								<?php echo form_error('sacerdoteCelebrante')?>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="mdi-social-person-outline prefix"></i>
								<input placeholder="Ingrese apellido o nombre del sacerdote Certificador" id="sacerdoteCertificador" name="sacerdoteCertificador" type="text" value='<?php echo set_value('sacerdoteCertificador') ?>'>
								<input placeholder="" id="sacerdoteCertificador_id" name="sacerdoteCertificador_id" type="hidden">
								<label for="sacerdoteCertificador" class="active"><b>Sacerdote Certificador (*)</b></label>
								<?php echo form_error('sacerdoteCertificador')?>
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

					<font color="black" size="5" face="Lucida Calligraphy">Padrinos</font><br><Br>

					<div class="row">
						<div class="input-field col s12 m6 l6">
							<i class="mdi-social-person prefix"></i>
							<input placeholder="Ingrese el apellido y nombre del Padrino " id="apellidosNombrePadrino" name="apellidosNombrePadrino" type="text" value='<?php echo set_value('apellidosNombrePadrino') ?>'>
							<label for="apellidosNombrePadrino" class="active"><b>Nombre completo Padrino</b></label>
						</div>
						<div class="input-field col s12 m6 l6">
							<i class="mdi-social-person prefix"></i>
							<input placeholder="Ingrese el apellido y nombre de la Madrina " id="apellidosNombreMadrina" name="apellidosNombreMadrina" type="text" value='<?php echo set_value('apellidosNombreMadrina') ?>'>
							<label for="apellidosNombreMadrina" class="active"><b>Nombre completo Madrina</b></label>
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
		$("#feligres").autocomplete({
			source: "<?php echo base_url(); ?>users/autoCompleteFeligres",
			minLength: 1,
			select: function( event, ui ) {
				 $("#feligres_id").val(ui.item.id);
			}
		});
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
			$("#sacerdoteCelebrante").autocomplete({
					source: "<?php echo base_url(); ?>users/autoCompleteSacerdoteCelebrante",
					minLength: 1,
					select: function( event, ui ) {
						 $("#sacerdoteCelebrante_id").val(ui.item.id);
					}
				});
				$("#sacerdoteCertificador").autocomplete({
						source: "<?php echo base_url(); ?>users/autoCompleteSacerdoteCelebrante",
						minLength: 1,
						select: function( event, ui ) {
							 $("#sacerdoteCertificador_id").val(ui.item.id);
						}
					});
	/*	$("#carnetPadre").autocomplete({
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
    }*/
});

</script>
