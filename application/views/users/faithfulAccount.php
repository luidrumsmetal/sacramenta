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
    <form class="login-form" id="formLogin" method="post" action="<?php echo base_url(); ?>users/faithfulAccountRegister">
          <div class="row margin">
            <div class="input-field col s12 center">
              <h4>Registro de Fieles</h4>
            </div>
          </div><hr><br>
          <p class="left">Información General</p><br><br>
          <hr>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-credit-card prefix"></i>
              <input id="ci" name="ci" type="number" value='<?php echo set_value('ci') ?>'>
              <label for="ci" class="center-align">Carnet de Identidad</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-account-circle prefix"></i>
              <input id="apellidoPaterno" name="apellidoPaterno" type="text" value='<?php echo set_value('apellidoPaterno') ?>'>
              <label for="apellidoPaterno" class="center-align">Apellido Paterno</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-account-circle prefix"></i>
              <input id="apellidoMaterno" name="apellidoMaterno" type="text" value='<?php echo set_value('apellidoMaterno') ?>'>
              <label for="apelliodMaterno" class="center-align">Apellido Materno</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="nombres" name="nombres" type="text" value='<?php echo set_value('nombres') ?>'>
              <label for="nombres" class="center-align">Nombres</label>
            </div>
          </div><br>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-event prefix"></i>
              <input placeholder="" id="fechanac" name="fechanac" type="date" value='<?php echo set_value('fechanac') ?>'>
              <label for="fechanac" class="active">Fecha de nacimiento</label>
            </div>          
    			</div>
          <div class="row margin">
						<div class="input-field col s1">
							  <i class="mdi-action-account-circle prefix"></i>
						</div>
				    <div class="input-field col s11">
				      <select id="genero" name="genero" value='<?php echo set_value('genero') ?>'>
				        <option value="" disabled selected>  Seleccione sexo</option>
				        <option value="1">Masculino</option>
				        <option value="2">Femenino</option>
				      </select>
				      <label>&nbsp&nbspSexo: </label>
				  	</div>
					</div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-communication-phone prefix"></i>
              <input id="celular" name="celular" type="number" value='<?php echo set_value('celular') ?>'>
              <label for="celular" class="center-align">celular</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-face-unlock prefix"></i>
              <input id="facebook" name="facebook" type="text" value='<?php echo set_value('facebook') ?>'>
              <label for="facebook" class="center-align">Nombre de Facebook</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12 center">
            <p class="left">Información de la Cuenta</p>
            </div>
          </div><hr>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-communication-email prefix"></i>
              <input id="email" name="email" type="email" value='<?php echo set_value('email') ?>'>
              <label for="email" class="center-align">Email</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="password" name="password" type="password" value='<?php echo set_value('password') ?>'>
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <!--<a href="index.html" class="btn waves-effect waves-light col s12">Register Now</a>-->

                <button type="submit" class="btn waves-effect waves-light col s12"><i class="icon-ok icon-white"></i> Registrarse</button>
            </div>
            <div class="input-field col s12">
              <p class="margin center medium-small sign-up">¿Ya tiene una cuenta? <a href="<?php echo base_url(); ?>login"><font color="black"><u>ATRAS</u></a></p>
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
