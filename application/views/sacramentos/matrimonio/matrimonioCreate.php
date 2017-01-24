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
                    <h1 class="brand-logo center">Registro Canonico <small>Matrimonio</small></h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <div class="row">
                  <form class="col s12" id="formWedding" method="post" action="<?php echo base_url(); ?>matrimonio/matrimonioRegister">

                    <div class="row">
                      <div class="input-field col s4">
                        <input placeholder="Carnet del esposo" id="carnetEsposo" name="carnetEsposo" type="text"><div id="msgUsuario"></div>
                        <input id="carnetEsposo_id" name="carnetEsposo_id" type="hidden">
                        <label for="carnetEsposo" class="active"><b>Carnet del esposo</b></label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Carnet de la esposa" id="carnetEsposa" name="carnetEsposa" type="text"><div id="msgUsuario"></div>
                        <input id="carnetEsposa_id" name="carnetEsposa_id" type="hidden">
                        <label for="carnetEsposa" class="active"><b>Carnet de la esposa</b></label>
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="input-field col s4">
                        <input placeholder="" id="nombreEsposo" name="nombreEsposo" type="text">
                        <label for="nombreEsposo" class="active"><b>Nombre de esposo</b></label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="" id="nombreEsposa" name="nombreEsposa" type="text">
                        <label for="nombreEsposa" class="active"><b>Nombre de la esposa</b></label>
                      </div>
                      <div class="input-field col s4">
                              <input placeholder="" id="fechacom" name="fechacom" type="date">
                              <label for="first_name" class="active"><b>Fecha de Matrimonio</b></label>
                        </div>
                      
                    </div><br>


                    

                      
                    <div class="row">
                      <div class="input-field col s6">
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text">
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Parroquia</b></label>
                      </div>
                      <div class="input-field col s6">
            				    <select id="lugarNacimiento" name="lugarNacimiento">
            				      <option value="" disabled selected>Selecccione un lugar</option>
            				      <option value="1">La Paz</option>
            			        <option value="2">Cochabamba</option>
                          <option value="3">Santa Cruz</option>
                          <option value="4">Oruro</option>
                          <option value="5">Potosi</option>
                          <option value="6">Sucre</option>
                          <option value="7">Beni</option>
                          <option value="8">Pando</option>
                          <option value="9">Tarija</option>
          				      </select>
          				      <label><b>Lugar de Matrimonio</b> </label>
            				  </div>
                    </div>
                  <!--  <h4 class="header2">Informacion de Registro</h4>--><br>
                    <div class="row">
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el libro" id="libroOne" name="libroOne" type="text">
                        <label for="libro" class="active"><b>Libro</b></label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el pagina" id="paginaOne" name="paginaOne" type="text">
                        <label for="pagina" class="active"><b>Pagina</b></label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el numero" id="numeroOne" name="numeroOne" type="text">
                        <label for="numero" class="active"><b>Numero</b></label>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="input-field col s4">
                        <input placeholder="Ingrese la Oficialia" id="oficialia" name="oficialia" type="text">
                        <label for="oficialia" class="active"><b>Oficialia</b></label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el partido" id="partida" name="partida" type="text">
                        <label for="partida" class="active"><b>Partida</b></label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el numero" id="numeroOf" name="numeroOf" type="text">
                        <label for="numeroOf" class="active"><b>Numero</b></label>
                      </div>
                    </div><br>


                    <div class="row">
                    <!--  <h4 class="header2">Informacion de Familiares</h4>--><br>
                      <div class="input-field col s3">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadrino" name="carnetPadrino" type="text">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadrino_id" name="carnetPadrino_id" type="hidden">
                        <label for="carnetPadre" class="active"><b>CI del Padrino (Esposo)</b></label>
                      </div>
                      <div class="input-field col s3">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetMadrina" name="carnetMadrina" type="text">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetMadrina_id" name="carnetMadrina_id" type="hidden">
                        <label for="carnetMadre" class="active"><b>CI de la Madrina (Esposo)</b></label>
                      </div>
                      <div class="input-field col s3">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadrino1" name="carnetPadrino1" type="text">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadrino1_id" name="carnetPadrino1_id" type="hidden">
                        <label for="carnetPadre" class="active"><b>CI del Padrino (Esposa)</b></label>
                      </div>
                      <div class="input-field col s3">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetMadrina1" name="carnetMadrina1" type="text">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetMadrina1_id" name="carnetMadrina1_id" type="hidden">
                        <label for="carnetMadre" class="active"><b>CI de la Madrina (Esposa)</b></label>
                      </div>
                    </div>
										<div class="row">
                      <div class="input-field col s3">
                        <input placeholder="" id="nombrePadrino" name="nombrePadrino" type="text">
                        <label for="nombrePadrino" class="active"><b>Nombre del Padrino (Esposo)</b></label>
                      </div>
                      <div class="input-field col s3">
                        <input placeholder="" id="nombreMadrina" name="nombreMadrina" type="text">
                        <label for="nombreMadrina" class="active"><b>Nombre de la Madrina (Esposo)</b></label>
                      </div>
                      <div class="input-field col s3">
                        <input placeholder="" id="nombrePadrino1" name="nombrePadrino1" type="text">
                        <label for="nombrePadrino1" class="active"><b>Nombre del Padrino (Esposa)</b></label>
                      </div>
                      <div class="input-field col s3">
                        <input placeholder="" id="nombreMadrina1" name="nombreMadrina1" type="text">
                        <label for="nombreMadrina1" class="active"><b>Nombre de la Madrina (Esposa)</b></label>
                      </div>
										</div>


                    <div class="row">
                        <div class="input-field col s12">
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
    $('#carnetEsposo').autocomplete({
      source: "<?php echo base_url(); ?>users/autoCompleteCarnetMatrimonioEsposo",
      minLength: 5,
      select: function( event, ui ) {
         $("#carnetEsposo_id").val(ui.item.ci);
         $("#nombreEsposo").val(ui.item.nombre);
         $("#apellido").val(ui.item.apellido);
         $("#fechanac").val(ui.item.fechanac);
      }
    });
    $('#carnetEsposa').autocomplete({
      source: "<?php echo base_url(); ?>users/autoCompleteCarnetMatrimonioEsposa",
      minLength: 5,
      select: function( event, ui ) {
         $("#carnetEsposa_id").val(ui.item.ci);
         $("#nombreEsposa").val(ui.item.nombre);
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

    $("#carnetMadrina").autocomplete({
        source: "<?php echo base_url(); ?>users/autoCompleteCarnetMadrina",
        minLength: 1,
        select: function (event, ui) {
            $("#carnetMadrina_id").val(ui.item.id);
             $("#nombreMadrina").val(ui.item.nombre);
        }
    });

    $("#carnetPadrino1").autocomplete({
        source: "<?php echo base_url(); ?>users/autoCompleteCarnetPadrino",
        minLength: 1,
        select: function (event, ui) {
            $("#carnetPadrino1_id").val(ui.item.id);
             $("#nombrePadrino1").val(ui.item.nombre);
        }
    });

    $("#carnetMadrina1").autocomplete({
        source: "<?php echo base_url(); ?>users/autoCompleteCarnetMadrina",
        minLength: 1,
        select: function (event, ui) {
            $("#carnetMadrina1_id").val(ui.item.id);
             $("#nombreMadrina1").val(ui.item.nombre);
        }
    });

});
</script>



