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
                    <div class="row">

                      <div class="input-field col s4">
                          <i class="mdi-action-credit-card prefix"></i>
                          <input placeholder="Ingrese su carnet de identidad" id="ci" name="ci" type="text"><div id="msgUsuario"></div>
                          <label for="ci" class="active"><b>Carnet de Identidad</b></label>
                        <span id="comprobar_mensaje"></span>
                    </div>                    

                      <div class="input-field col s4">
                        <i class="mdi-action-home prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text">
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Parroquia</b></label>
                      </div>


                      	<div class="input-field col s4">
                            <i class="mdi-action-event prefix"></i>
                            <input placeholder="" id="fecha" name="fecha" type="date">
                            <label for="fecha" class="active"><b>Fecha Confirmación</b></label>
                        </div>

                      <!--<div class="input-field col s6">
                        <input placeholder="Ingrese su nombre completo" id="presbitero" name="presbitero" type="text">
                        <label for="presbitero" class="active"><b>Presbitero</b></label>
                      </div>-->
                    </div>

                    <br>

                    <div class="row">
                    <div class="input-field col s6">
                        <i class="mdi-action-credit-card prefix"></i>
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadrino" name="carnetPadrino" type="text">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadrino_id" name="carnetPadrino_id" type="hidden">
                        <label for="carnetPadrino" class="active"><b>CI del Padrino</b></label>
                      </div>

                      <div class="input-field col s6">
                        <i class="mdi-social-person prefix"></i>
                        <input placeholder="" id="nombrePadrino" name="nombrePadrino" type="text">
                        <label for="nombrePadrino" class="active"><b>Nombre del Padrino</b></label>
                      </div>                       
                    </div>

                  <!--  <h4 class="header2">Informacion de Registro</h4>--><Br>
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



