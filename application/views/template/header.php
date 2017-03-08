
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title><?php echo $title ?></title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->

  <link href="<?php echo base_url(); ?>assets/demo/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url(); ?>assets/demo/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="<?php echo base_url(); ?>assets/demo/css/custom/custom.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url(); ?>assets/demo/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url(); ?>assets/demo/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url(); ?>assets/demo/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/js/plugins/jquery-1.11.2.min.js"></script>

</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->

  <header id="header" class="page-topbar" align="center">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
           <font color="white" size="6" face="Lucida Calligraphy" align="center">Pastoral Digital</font><br><Br>
                <div class="nav-wrapper">
                    <ul>
                      <li>
                      </li>
                    </ul>
                    <ul class="right hide-on-med-and-down">

                        <!--<li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                        </a>
                        </li>
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>-->
                    </ul>
                    <!-- translation-button -->
                    <!-- notifications-dropdown -->

                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>

  <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
     <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="left: 0px; height: 986px;">
         <li class="user-details orange lighten-1">
         <div class="row">
             <div class="col col s4 m4 l4">
                 <img src="<?php echo base_url(); ?>assets/demo/images/admin.png" alt="" class="circle responsive-img valign profile-image">
             </div>
             <div class="col col s8 m8 l8">

                 <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $this->session->userdata('nombre') ?><i class="mdi-navigation-arrow-drop-down right"></i></a><ul id="profile-dropdown" class="dropdown-content">
                     <li><a href="#"><i class="mdi-action-face-unlock"></i> Perfil</a>

                     </li>
                     <li class="divider"></li>
                     <li><a href="<?php echo base_url(); ?>login/logout"><i class="mdi-action-settings-power"></i>Salir</a>
                     </li>
                 </ul>
                 <p class="user-roal left"><?php echo strtoupper($this->session->userdata('tipo')); ?></p>
             </div>
         </div>
         </li>
         <li class="bold"><a href="<?php echo base_url(); ?>home" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Inicio</a>
         </li>
         <?php if($this->session->userdata('tipo') == 'administrador' || $this->session->userdata('tipo') == 'parroquia' ){?>
         <li class="bold"><a href="<?php echo base_url(); ?>email" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Enviar Email's</a>
         </li>

             <li class="no-padding">
                 <ul class="collapsible collapsible-accordion">
                     <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-group"></i>Fieles</a>
                         <div class="collapsible-body" style="">
                             <ul>
                                 <li><a href="<?php echo base_url(); ?>users/faithfulRegister" class="waves-effect waves-cyan"><i class="mdi-social-person-add"></i>Registro de Fiel</a>
                                 </li>                            
                                 <li><a href="<?php echo base_url(); ?>faithful/faithfulList" class="waves-effect waves-cyan"><i class="mdi-action-search"></i>Busqueda Fiel</a>
                                 </li>
                                 <li><a href="<?php echo base_url(); ?>users/listFiel" class="waves-effect waves-cyan"><i class="mdi-content-content-paste"></i>Lista de Fiel</a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 </ul>
             </li>
         <li class="no-padding">
             <ul class="collapsible collapsible-accordion">
                 <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-file-folder-shared"></i> Registro Canónico</a>
                     <div class="collapsible-body" style="">
                         <ul>
                             <li><a href="<?php echo base_url(); ?>baptism/baptismCreate"><i class=" mdi-editor-format-color-fill"></i>Bautizo</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>firstCommunion"><i class="mdi-action-accessibility"></i>P. Comunión</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>confirmacion"><i class="mdi-social-whatshot"></i>Confirmación</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>Matrimonio"><i class="mdi-action-favorite"></i>Matrimonio</a>
                             </li>
                         </ul>
                     </div>
                 </li>
             </ul>
         </li>
         <li class="no-padding">
             <ul class="collapsible collapsible-accordion">
                 <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-content-content-paste"></i> Lista de Sacramentos</a>
                     <div class="collapsible-body" style="">
                         <ul>
                             <li><a href="<?php echo base_url(); ?>baptism/listBaptism"><i class=" mdi-editor-format-color-fill"></i>Bautizados</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>firstCommunion/listComunion"><i class="mdi-action-accessibility"></i>P. Comunión</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>confirmacion/listConfirmacion"><i class="mdi-social-whatshot"></i>Confirmados</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>matrimonio/listMarried"><i class="mdi-action-favorite"></i>Casados</a>
                             </li>
                         </ul>
                     </div>
                 </li>
             </ul>
         </li>
          <?php if($this->session->userdata('tipo') == 'administrador'){?>

           <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                   <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-person-add"></i>Usuarios</a>
                       <div class="collapsible-body" style="">
                           <ul>
                               <li class="bold"><a href="<?php echo base_url(); ?>users/usuarioRegister" class="waves-effect waves-cyan"><i class="mdi-social-person-add"></i>Usuario</a>
                               </li>
                               <li class="bold"><a href="<?php echo base_url(); ?>jurisdiccion/parroquiaAccount" class="waves-effect waves-cyan"><i class="mdi-social-person-add"></i>Parroquia</a>
                               </li>
                               <li class="bold"><a href="<?php echo base_url(); ?>users/listUser" class="waves-effect waves-cyan"><i class="mdi-content-content-paste"></i>Lista Usuarios</a>
                               </li>
                               <!--<li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-action-find-in-page"></i> Buscar Parroco</a>
                               </li>-->
                           </ul>
                       </div>
                   </li>
                </ul>
           </li>

         <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
                 <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-location-city"></i>Parroquias</a>
                     <div class="collapsible-body" style="">
                         <ul>
                             <li class="bold"><a href="<?php echo base_url(); ?>Jurisdiccion/parroquiaCreate" class="waves-effect waves-cyan"><i class="mdi-social-location-city"></i> Registrar Parroquia</a>
                             </li>
                             <li class="bold"><a href="<?php echo base_url(); ?>Jurisdiccion/listParroquia" class="waves-effect waves-cyan"><i class="mdi-content-content-paste "></i> Lista Parroquia</a>
                             </li>
                            <!-- <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi-action-find-in-page"></i> Buscar Parroquia</a>
                             </li>-->
                         </ul>
                     </div>
                 </li>
              </ul>
         </li>
        <!-- <li class="bold"><a href="<?php echo base_url(); ?>peticiones" class="waves-effect waves-cyan"><i class="mdi-action-perm-contact-cal"></i>Peticiones</a>
         </li>-->
         <?php } ?>
         <?php }else{?>
          <!-- <li class="bold"><a href="<?php echo base_url(); ?>home" class="waves-effect waves-cyan"><i class="mdi-communication-quick-contacts-mail"></i>Solicitar Certificado</a>
          </li>-->
           <li class="bold"><a href="<?php echo base_url(); ?>faithful/faithfulList" class="waves-effect waves-cyan"><i class="mdi-action-pageview"></i>Realizar Busqueda</a>
           </li>
         </li>
        <?php } ?>
         <li class="li-hover"><div class="divider"></div></li><br>
         <li><a href="<?php echo base_url(); ?>login/logout"><i class="mdi-action-settings-power"></i>CERRAR SESIÓN</a>
         </li><br>

         <li class="li-hover"><div class="divider"></div></li>

     <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 926px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 659px;"></div></div></ul>
     <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
     </aside>
            <!-- END LEFT SIDEBAR NAV-->
