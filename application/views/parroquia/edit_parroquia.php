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
                    <h1 class="brand-logo center">Editar Parroquia</h1>
                    </div>
                  </div>
                </nav>
                <br>
              <font color="black" size="5" face="sans-serif">Información General</font><br><Br>

            <div class="row">
            <?php echo form_open('Jurisdiccion/update', 'role="form"','method=post'); ?>
        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-action-home prefix"></i>
              <input id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>">
              <label for="parroquia" class="active"><b>Parroquia</b></label>
         </div>  
        </div>

        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-maps-directions-walk prefix"></i>
              <input id="direccion" name="direccion" type="text" value="<?php echo $direccion ?>">
              <label for="parroquia" class="active"><b>Dirección</b></label>
          </div>  
        </div>

        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-maps-place prefix"></i>
              <input id="jurisdiccion" name="jurisdiccion" type="text" value="<?php echo $jurisdiccion ?>">
              <input type="hidden" name="jurisdiccion_id" id="jurisdiccion_id" value="<?php echo $jurisdiccion_id ?>">
              <input type="hidden" name="idParroquia" id="idParroquia" value="<?php echo $idParroquia ?>">
              <label for="parroquia" class="active"><b>Jurisdicción</b></label>
          </div>            
        </div>

        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-communication-phone prefix"></i>
              <input id="telefono" name="telefono" type="text" value="<?php echo $telefono ?>">
              <label for="parroquia" class="active"><b>Teléfono</b></label>
          </div>  
        </div>
          
        <div class="row">
          <div class="input-field col s6">
              <i class="mdi-communication-email prefix"></i>
              <input id="email" name="email" type="text" value="<?php echo $email ?>">
              <label for="parroquia" class="active"><b>E-mail</b></label>
          </div>  
        </div>      

          <div class="row">
            <div class="input-field col s7">
              <center>
              <button type="submit" name="mit" class="btn waves-effect waves-light light-blue darken-4" value="Guardar">Guardar</button>

              <button type="button" onclick="location.href='<?php echo site_url('Jurisdiccion/listParroquia') ?>'" class="btn waves-effect waves-light  deep-purple">Salir</button>
              </center>
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

$("#jurisdiccion").autocomplete({
       source: "<?php echo base_url(); ?>jurisdiccion/autoCompleteJurisdiccion",
       minLength: 1,
       select: function( event, ui ) {
       $("#jurisdiccion_id").val(ui.item.id);
       }
    });
</script>