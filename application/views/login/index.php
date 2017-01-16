<div id="login-page" class="row">
  <div class="col s12 z-depth-5 card-panel">
    <form class="login-form">
      <div class="row">
        <div class="input-field col s12 center">
          <h1>Bienvenido</h1>
          <img src="<?php echo base_url(); ?>assets/demo/images/logo.jpg" alt="" class="circle responsive-img valign profile-image-login">
          <p class="center login-form-text"><b>Ingreso de Fieles</b></p>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="mdi-social-person-outline prefix"></i>
          <input id="username" type="text">
          <label for="username" class="center-align">Correo</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="mdi-action-lock-outline prefix"></i>
          <input id="password" type="password">
          <label for="password">Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12 l12  login-text">
            <input type="checkbox" id="remember-me" />
            <label for="remember-me">Recordar</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <a href="index.html" class="btn waves-effect waves-light col s12">Aceptar</a>
        </div>
      </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
                <p><a class="btn waves-effect waves-light light-blue darken-4" href="{!!URL::to('login/create')!!}">Registrate Ahora</a></p>
            </div>
            <div class="input-field col s6 m6 l6">
                <p><a class="btn waves-effect waves-light light-blue darken-4">Recuperar Cuenta</a></p>
            </div>
          </div>

    </form>
  </div>
</div>
