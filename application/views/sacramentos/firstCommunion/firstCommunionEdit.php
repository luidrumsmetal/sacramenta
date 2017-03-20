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
                  <form class="col s12" id="formPriest" method="post" action="<?php echo base_url(); ?>firstCommunion/update">
                  <font color="black" size="5" face="Lucida Calligraphy">Datos Generales</font><br><Br>

                      <div class="row">
                        <div class="input-field col s12 m6 l12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input placeholder="Ingrese nombre completo" id="feligres" name="feligres" type="text" value="<?php echo $get->Fiel?>" onclick="this.value=' '">
                            <input id="feligres_id" name="feligres_id" type="hidden" value="<?php echo $get->idPersona?>">
                            <input type="hidden" name="idCertificado" id="idCertificado" value="<?php echo $get->idCertificado  ?>">
                            <input type="hidden" name="idSacramento" id="idSacramento" value="<?php echo $get->sacramento_id  ?>">
                            <label for="feligres" class="active"><b>Feligrés (*)</b></label>
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
                              <input placeholder="" id="fecha" name="fecha" type="date" value="<?php echo $get->fecha?>" onclick="this.value=' '">
                              <label for="first_name" class="active"><b>Fecha Comunión (*)</b></label>
                        </div>

                        <div class="input-field col s12 m6 l6">
                          <i class="mdi-action-home prefix"></i>
                          <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text" value="<?php echo $get->parroquia ?>" onclick="this.value=' '">
                          <input id="parroquia_id" name="parroquia_id" type="hidden"value="<?php echo $get->parroquia_id?>">
                          <label for="parroquia" class="active"><b>Parroquia de registro (*)</b></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l12">
                            <i class="mdi-action-room prefix"></i>
                            <input placeholder="Ingrese lugar de Comunión" id="jurisdiccion" name="jurisdiccion" type="text" value="<?php echo $get->jurisdiccion?>" onclick="this.value=' '">
                            <input id="jurisdiccion_id" name="jurisdiccion_id" type="hidden" value="<?php echo $get->idJurisdiccion?>">
                            <label for="jurisdiccion" class="active"><b>Jurisdicción Eclesiástica (*)</b></label>
                        </div>

                    </div>

                  <font color="black" size="5" face="Lucida Calligraphy">Libro Sacramental</font><br><Br>
                    <div class="row">
                        <input type="hidden" name="idLibro" value="<?php echo $get->idLibroParroquia?>">
                        <div class="input-field col s12 m6 l4">
                        <i class="mdi-action-book prefix"></i>
                        <input placeholder="Ingrese libro de registro" id="libro" name="libro" type="text" value="<?php echo $get->libro ?>" onclick="this.value=' '">
                        <label for="libro" class="active"><b>Libro (*)</b></label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-action-find-in-page prefix"></i>
                        <input placeholder="Ingrese número de página" id="pagina" name="pagina" type="text" value="<?php echo $get->pagina?>" onclick="this.value=' '">
                        <label for="pagina" class="active"><b>Página (*)</b></label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <i class="mdi-editor-format-list-numbered prefix"></i>
                        <input placeholder="Ingrese número registro" id="numero" name="numero" type="text" value="<?php echo $get->numero?>" onclick="this.value=' '">
                        <label for="numero" class="active"><b>Número (*)</b></label>
                      </div>
                    </div>
                    <Br><BR>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input type="submit" name="mit" class="btn waves-effect waves-light light-blue darken-4" value="Guardar">
                          <button type="button" onclick="location.href='<?php echo site_url('firstCommunion/listComunion') ?>'" class="btn waves-effect waves-light  deep-purple">Cancelar</button>
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