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
                    <h1 class="brand-logo center">Registrar Cuenta Parroquia</h1>
                    </div>
                  </div>
                </nav>
              <div class="card-panel">
                <h4 class="header2"><b>Información General</b></h4><br>
                <div class="row">
                  <form class="col s12" id="formPriest" method="post" action="<?php echo base_url(); ?>jurisdiccion/createAccount">

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input placeholder="Ingrese la parroquia" id="parroquia" name="parroquia" type="text" >
                          <input  id="parroquia_id" name="parroquia_id" type="hidden">
                        <label for="parroquia" class="active"><b>Parroquia </b></label>
                      </div>
                    </div>
                    <br>
                    <h4 class="header2"><b>Información de la Cuenta</b></h4><Br>
                    <div class="row">

                      <div class="input-field col s6">
                        <i class="mdi-communication-quick-contacts-mail prefix"></i>
                        <input placeholder="Ingrese su correo electrónico" id="email" name="email" type="text" value='<?php echo set_value('email') ?>'>
                        <label for="email" class="active"><b>Correo Electrónico</b></label>
                      </div>

                      <div class="input-field col s6">
                        <i class="mdi-communication-vpn-key prefix"></i>
                        <input placeholder="Ingrese su Contraseña" id="password" name="password" type="password">
                        <label for="password" class="active"><b>Contraseña</b></label>
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
});
</script>
