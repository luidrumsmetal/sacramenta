<div id="login-page" class="row">
  <div class="col s12 z-depth-4 card-panel teal">
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
    <form class="login-form" id="formLogin" method="post" action="<?php echo base_url(); ?>jurisdiccion/addParroquia">
          <div class="row margin">
            <div class="input-field col s12 center">
              <h4>Registro de Parroquia</h4>
            <p class="left">Informacion General</p>
            </div>
          </div><hr>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="nombre" name="nombre" type="text">
              <label for="nombre" class="center-align">Nombre de la Iglesia Parroquial</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="direccion" name="direccion" type="text">
              <label for="direccion" class="center-align">Direccion</label>
            </div>
          </div>
          
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="celular" name="celular" type="text">
              <label for="celular" class="center-align">Jurisdiccion</label>
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
              <!--<a href="index.html" class="btn waves-effect waves-light col s12">Register Now</a>-->
                <button type="submit" class="btn waves-effect waves-light col s12"><i class="icon-ok icon-white"></i> Registrar</button>
            </div>
            <div class="input-field col s12">
              <p class="margin center medium-small sign-up">Already have an account? <a href="<?php echo base_url(); ?>login">ATRAS</a></p>
            </div>
          </div>
    </form>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/js/plugins/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/js/plugins/formatter/jquery.formatter.min.js"></script>
<script type="text/javascript">
$('#fechanac').formatter({
      'pattern': '{{99}}-{{99}}-{{9999}}',
    });
</script>