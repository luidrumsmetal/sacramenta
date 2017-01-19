<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/validate.js"></script>

<section id = "content">
    <div class="section">
      <div class="row">


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

          <div class="col s12 m12 l12">
            <div class="card-panel">
              <h1 align="center">Registro de Iglesia Parroquial</h1>
              <h4 class="header2">Informacion General</h4>
            <div class="row">
          <form class="col s12" id="formParroquia" method="post" action="<?php echo base_url(); ?>jurisdiccion/parroquiaRegistro">


          <div class="row">
            <div class="input-field col s6">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="nombre" name="nombre" type="text">
              <label for="nombre">Nombre de la Iglesia Parroquial</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="direccion" name="direccion" type="text">
              <label for="direccion" >Direccion</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
              <i class="mdi-social-person-outline prefix"></i>                
              <input id="jurisdiccion" name="jurisdiccion" type="text">
              <input type="hidden" name="jurisdiccion_id" id="jurisdiccion_id">
              <label for="jurisdiccion" >Jurisdiccion</label>
            </div>
          </div>

          
      
          <!--<div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="password-again" type="password">
              <label for="password-again">Password again</label>
            </div>
          </div>-->
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
<script type="text/javascript">

$("#jurisdiccion").autocomplete({
       source: "<?php echo base_url(); ?>jurisdiccion/autoCompleteJurisdiccion",
       minLength: 1,
       select: function( event, ui ) {
       $("#jurisdiccion_id").val(ui.item.id);
       }
    });
</script>