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
                <nav class="amber darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12">
                    <h1 class="brand-logo center">Registro de Parroquias</h1>
                    </div>

                  </div>
                </nav>
                <br>
                <font color="black" size="5" face="sans-serif">Información General</font><br><Br>
            <div class="row">
          <form class="col s12" id="formParroquia" method="post" action="<?php echo base_url(); ?>jurisdiccion/parroquiaRegistro">
        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-action-home prefix"></i>
              <input placeholder="Ingrese nombre de la parroquia" id="nombre" name="nombre" type="text">
              <label for="parroquia" class="active"><b>Parroquia</b></label>
         </div>  
        </div>

        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-maps-directions-walk prefix"></i>
              <input placeholder="Ingrese dirección" id="direccion" name="direccion" type="text">
              <label for="parroquia" class="active"><b>Dirección</b></label>
          </div>  
        </div>

        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-maps-place prefix"></i>
              <input placeholder="Ingrese jurisdicción" id="jurisdiccion" name="jurisdiccion" type="text">
              <input type="hidden" name="jurisdiccion_id" id="jurisdiccion_id">
              <label for="parroquia" class="active"><b>Jurisdicción</b></label>
          </div>            
        </div>

        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-communication-phone prefix"></i>
              <input placeholder="Ingrese teléfono" id="telefono" name="telefono" type="text">
              <label for="parroquia" class="active"><b>Teléfono</b></label>
          </div>  
        </div>

        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-communication-email prefix"></i>
              <input placeholder="Ingrese e-mail" id="email" name="email" type="text">
              <label for="parroquia" class="active"><b>E-mail</b></label>
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

$("#jurisdiccion").autocomplete({
       source: "<?php echo base_url(); ?>jurisdiccion/autoCompleteJurisdiccion",
       minLength: 1,
       select: function( event, ui ) {
       $("#jurisdiccion_id").val(ui.item.id);
       }
    });
</script>