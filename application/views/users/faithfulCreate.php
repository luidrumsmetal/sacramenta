<div id="login-page" class="row">
  <div class="col s12 z-depth-4 card-panel teal">
    <form class="login-form" id="formLogin" method="post" action="<?php echo base_url(); ?>users/faithfulRegister">
          <div class="row margin">
            <div class="input-field col s12 center">
              <h4>Registro de Fieles</h4>
            <p class="left">Informacion General</p>
            </div>
          </div><hr>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="ci" name="ci" type="text">
              <label for="ci" class="center-align">Carnet de Identidad</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="nombre" name="nombre" type="text">
              <label for="nombre" class="center-align">Nombre</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="apellido" name="apellido" type="text">
              <label for="apellido" class="center-align">Apellido</label>
            </div>
          </div>
          <div class="row margin">
    				<div class="input-field col s1">
    					  <i class="mdi-action-account-circle prefix"></i>
    				</div>
    				<div class="input-field col s11">
    			    <input placeholder="dia-mes-año" id="fechanac" name="fechanac" type="text" class="">
    			    <label for="fechanac">Fecha Nacimiento: </label>
    			  </div>
    			</div>
          <div class="row margin">
						<div class="input-field col s1">
							  <i class="mdi-action-account-circle prefix"></i>
						</div>
				    <div class="input-field col s11">
				      <select id="genero" name="genero">
				        <option value="" disabled selected>  Seleccione un genero</option>
				        <option value="1">Masculino</option>
				        <option value="2">Femenino</option>
				      </select>
				      <label>Genero: </label>
				  	</div>
					</div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="celular" name="celular" type="text">
              <label for="celular" class="center-align">celular</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="facebook" name="facebook" type="text">
              <label for="facebook" class="center-align">Link de Facebook</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12 center">
            <p class="left">Informacion de la Cuenta</p>
            </div>
          </div><hr>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-communication-email prefix"></i>
              <input id="email" type="email">
              <label for="email" class="center-align">Email</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="password" type="password">
              <label for="password">Password</label>
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
              <a href="index.html" class="btn waves-effect waves-light col s12">Register Now</a>
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
