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
                    <h1 class="brand-logo center">Bautizo</h1>
                    </div>
                  </div>
               </nav>
              <div class="card-panel">
                <div class="row">
                <?php echo form_open('Baptism/update', 'role="form"', 'method=post'); ?>

                  	<font color="black" size="5" face="Lucida Calligraphy">Datos Generales</font><br><Br>
                      <div class="row">
						<div class="input-field col s12 m6 l12">
							<i class="mdi-action-account-circle prefix"></i>
							<input id="feligres" name="feligres" type="text" value="<?php echo $get->Fiel?>" onclick="this.value=' '">
							<input id="feligres_id" name="feligres_id" type="hidden" value="<?php echo $get->idFiel ?>">
                            <input type="hidden" name="idCertificado" id="idCertificado" value="<?php echo $get->idCertificado  ?>">
                            <label for="apellidoPaterno" class="active"><b>Feligrés (*)</b></label>

						</div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <i class="mdi-action-home prefix"></i>
                        <input id="parroquia" name="parroquia" type="text" value="<?php echo $get->nombre ?>" onclick="this.value=' '">
                        <input id="parroquia_id" name="parroquia_id" type="hidden" value="<?php echo $get->idParroquia ?>">
                        <label for="parroquia" class="active"><b>Parroquia de registro (*)</b></label>
                      </div>
						<div class="input-field col s12 m6 l6">
							<i class="mdi-action-event prefix"></i>
							<input id="fecha" name="fecha" type="date" value="<?php echo $get->fecha ?>" onclick="this.value=' '">
							<label for="fechabautismo" class="active"><b>Fecha de Celebración (*)</b></label>
						</div>
                    </div>

                    <div class="row">
						<div class="input-field col s12 m6 l12">
							<i class="mdi-action-room prefix"></i>
							<input id="jurisdiccion" name="jurisdiccion" type="text" value="<?php echo $get->jurisdiccion ?>" onclick="this.value=' '">
							<input id="jurisdiccion_id" name="jurisdiccion_id" type="hidden" value="<?php echo $get->jurisdiccion_id ?>">
							<label for="jurisdiccion" class="active"><b>Jurisdicción Eclesiástica (*)</b></label>
						</div>
                    </div>

					<div class="row">
							<div class="input-field col s12 m6 l6">
								<i class="mdi-social-person-outline prefix"></i>
								<input id="sacerdoteCelebrante" name="sacerdoteCelebrante" type="text" value="<?php echo $get->Sacerdote_certificador ?>" onclick="this.value=' '">
								<input id="sacerdoteCelebrante_id" name="sacerdoteCelebrante_id" type="hidden" value="<?php echo $get->sacerdoteCertificador?>" >
								<label for="sacerdoteCelebrante" class="active"><b>Sacerdote Celebrante (*)</b></label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="mdi-social-person-outline prefix"></i>
								<input  id="sacerdoteCertificador" name="sacerdoteCertificador" type="text" value="<?php echo $get->Sacerdote_certificante ?>" onclick="this.value=' '">
								<input id="sacerdoteCertificador_id" name="sacerdoteCertificador_id" type="hidden" value="<?php echo $get->sacerdoteCertificante?>">
								<label for="sacerdoteCertificador" class="active"><b>Sacerdote Certificador (*)</b></label>
							</div>
					</div>
				<font color="black" size="5" face="Lucida Calligraphy">Libro Sacramental</font><br><Br>
                    <div class="row">
                        <input type="hidden" name="idLibro" value="<?php echo $get->idLibroParroquia?>">
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-action-book prefix"></i>
                        <input id="libro" name="libro" type="text" value="<?php echo $get->libro ?>" onclick="this.value=' '">
                        <label for="libro" class="active"><b>Libro (*)</b></label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-action-find-in-page prefix"></i>
                        <input id="pagina" name="pagina" type="text" value="<?php echo $get->pagina ?>" onclick="this.value=' '">
                        <label for="pagina" class="active"><b>Página (*)</b></label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-editor-format-list-numbered prefix"></i>
                        <input id="numero" name="numero" type="text" value="<?php echo $get->numero ?>" onclick="this.value=' '">
                        <label for="numero" class="active"><b>Número (*)</b></label>
                      </div>
                    </div>

					<font color="black" size="5" face="Lucida Calligraphy">Padrinos</font><br><Br>

					<div class="row">
						<div class="input-field col s12 m6 l6">
							<i class="mdi-social-person prefix"></i>
							<input id="apellidoNombrePadrino" name="apellidoNombrePadrino" type="text" value="<?php echo $get->apellidosNombrePadrino ?>" onclick="this.value=' '">
							<label for="apellidoNombrePadrino" class="active"><b>Nombre completo Padrino</b></label>
						</div>
						<div class="input-field col s12 m6 l6">
							<i class="mdi-social-person prefix"></i>
							<input id="apellidoNombreMadrina" name="apellidoNombreMadrina" type="text" value="<?php echo $get->apellidosNombreMadrina ?>">
							<label for="apellidoNombreMadrina" class="active"><b>Nombre completo Madrina</b></label>
						</div>
					</div>

                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                          <input type="submit" name="mit" class="btn waves-effect waves-light light-blue darken-4" value="Guardar">
                          <button type="button" onclick="location.href='<?php echo site_url('baptism/listBaptism') ?>'" class="btn waves-effect waves-light  deep-purple">Cancelar</button>
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
