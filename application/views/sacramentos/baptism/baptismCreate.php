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
              <div class="card-panel">
                <h1 align="center">Registro Canonico</h1>
                <h4 class="header2">Informacion General</h4>
                <div class="row">
                  <form class="col s12" id="formPriest" method="post" action="<?php echo base_url(); ?>users/priestRegister">
                    <div class="row">
                      <div class="input-field col s6">
                        <input placeholder="Ingrese su carnet de identidad" id="ci" name="ci" onKeyUp="comprobar(this);" type="text">
                        <label for="ci" class="active">Carnet de Identidad</label>
												<span id="comprobar_mensaje"></span>
                      </div>
                      <div class="input-field col s6">
          				      <select id="genero" name="genero">
          				        <option value="" disabled selected>  Seleccione un genero</option>
          				        <option value="1">Masculino</option>
          				        <option value="2">Femenino</option>
          				      </select>
          				      <label>Genero: </label>
          				  	</div>
                    </div>
                      <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Ingrese su nombre completo" id="nombre" name="nombre" type="text">
                            <label for="nombre" class="active">Nombre</label>
                          </div>
                        <div class="input-field col s6">
                          <input placeholder="Ingrese su nombre completo" id="apellido" name="apellido" type="text">
                          <label for="apellido" class="active">Apellido</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s6">
                              <input placeholder="" id="fechanac" name="fechanac" type="date">
                              <label for="first_name" class="active">Fecha Nacimiento</label>
                        </div>
                        <div class="input-field col s6">
                              <input placeholder="" id="fechabat" name="fechabat" type="date">
                              <label for="first_name" class="active">Fecha Bautizo</label>
                        </div>
                    </div>

                    <h4 class="header2">Informacion del Lugar</h4>
                    <div class="row">
                      <div class="input-field col s6">
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text">
                        <input id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active">Parroquia</label>
                      </div>
                      <div class="input-field col s6">
          				      <select id="lugarNacimiento" name="lugarNacimiento">
          				        <option value="" disabled selected>Selecccion un lugar</option>
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
          				      <label>Lugar de Nacimiento </label>
          				  	</div>
                    </div>
                    <h4 class="header2">Informacion de Registro</h4>
                    <div class="row">
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el libro" id="libroOne" name="libroOne" type="text">
                        <label for="libro" class="active">Libro</label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el pagina" id="paginaOne" name="paginaOne" type="password">
                        <label for="pagina" class="active">Pagina</label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el numero" id="numeroOne" name="numeroOne" type="password">
                        <label for="numero" class="active">Numero</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s4">
                        <input placeholder="Ingrese la oficialia"id="oficialiaTwo" name="oficialiaTwo" type="text">
                        <label for="oficialia" class="">Oficialia</label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el libro"id="libroTwo" name="libroTwo" type="password">
                        <label for="libro">Libro</label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese la pagina"id="paginaTwo" name="paginaTwo" type="password">
                        <label for="pagina">Pagina</label>
                      </div>
                    </div>
                    <div class="row">
                      <h4 class="header2">Informacion de Familiares</h4>

                      <div class="input-field col s4">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadre" name="carnetPadre" type="text">
                        <label for="carnetPadre" class="active">Carnet de Identidad del Padre</label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetMadre" name="carnetMadre" type="text">
                        <label for="carnetMadre" class="active">Carnet de Identidad del Madre</label>
                      </div>
                      <div class="input-field col s4">
                        <input placeholder="Ingrese el carnet de identidad" id="carnetPadrino" name="carnetPadrino" type="text">
                        <label for="carnetPadrino" class="active">Carnet de Identidad del Padrino</label>
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
		$("#tipoSacerdote").autocomplete({
				source: "<?php echo base_url(); ?>users/autoCompleteTipoSacerdote",
				minLength: 1,
				select: function (event, ui) {
						$("#tipoSacerdote_id").val(ui.item.id);
				}
		});
});
</script>
