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
                            <label for="feligres" class="active"><b>Nombre</b></label>
                        </div>
                      </div>  


                    <div class="row">               
                      <div class="input-field col s6">
                        <i class="mdi-action-home prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text">
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Parroquia</b></label>
                      </div>

                      	<div class="input-field col s6">
                            <i class="mdi-action-event prefix"></i>
                            <input placeholder="" id="fecha" name="fecha" type="date">
                            <label for="fecha" class="active"><b>Fecha Confirmación</b></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-action-room prefix"></i>
                            <input placeholder="Ingres lugar de Comunión" id="jurisdiccion" name="jurisdiccion" type="text">
                            <input id="jurisdiccion_id" name="jurisdiccion_id" type="hidden">                            
                            <label for="jurisdiccion" class="active"><b>Lugar</b></label>
                        </div>
                    </div>  

                    <div class="row">               
                      <div class="input-field col s6">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese nombre del Celebrante" id="Celebrante" name="parroquia" type="text">
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Sacerdote Celebrante</b></label>
                      </div>

                      <div class="input-field col s6">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese nombre del Certificador" id="parroquia" name="parroquia" type="text">
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Sacerdote Certificador</b></label>
                      </div>
                    </div>                    
                    <font color="black" size="5" face="Lucida Calligraphy">Libro Sacramental</font><br><Br>
                    <div class="row">
                      <div class="input-field col s4">
                        <i class="mdi-action-book prefix"></i>
                        <input placeholder="Ingrese el libro" id="libroOne" name="libroOne" type="text">
                        <label for="libro" class="active"><b>Libro</b></label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-action-find-in-page prefix"></i>
                        <input placeholder="Ingrese el pagina" id="paginaOne" name="paginaOne" type="text">
                        <label for="pagina" class="active"><b>Página</b></label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-editor-format-list-numbered prefix"></i>
                        <input placeholder="Ingrese el numero" id="numeroOne" name="numeroOne" type="text">
                        <label for="numero" class="active"><b>Número</b></label>
                      </div>
                    </div>
                    <font color="black" size="5" face="Lucida Calligraphy">Padrinos</font><br><Br>
                    <div class="row">


                      <div class="input-field col s6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="" id="nombrePadrino" name="nombrePadrino" type="text">
                        <label for="nombrePadrino" class="active"><b>Nombre Padrino</b></label>
                      </div>    

                       <div class="input-field col s6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="" id="nombreMadrina" name="nombreMadrina" type="text">
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
        source: "<?php echo base_url(); ?>firstCommunion/autoCompleteFeligres",
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



