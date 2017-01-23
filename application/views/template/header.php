
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
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">
                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="<?php echo base_url(); ?>assets/demo/images/materialize-logo.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1></li>
                    </ul>

                    <ul class="right hide-on-med-and-down">

                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                        </a>
                        </li>
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                    <!-- translation-button -->
                    <!-- notifications-dropdown -->
                    <ul id="notifications-dropdown" class="dropdown-content">
                      <li>
                        <h5>NOTIFICATIONS <span class="new badge">5</span></h5>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                      </li>
                    </ul>
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
                 <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Joel Rojas<i class="mdi-navigation-arrow-drop-down right"></i></a><ul id="profile-dropdown" class="dropdown-content">
                     <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                     </li>
                     <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                     </li>
                     <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                     </li>
                     <li class="divider"></li>
                     <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                     </li>
                     <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                     </li>
                 </ul>
                 <p class="user-roal">Administrator</p>
             </div>
         </div>
         </li>
         <li class="bold"><a href="index.html" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Inicio</a>
         </li>
         <li class="bold"><a href="app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Enviar Email's</a>
         </li>
         <li class="bold"><a href="<?php echo base_url(); ?>home/priestCreate" class="waves-effect waves-cyan"><i class="mdi-social-person-add"></i> Registrar Sacerdote</a>
         </li>
         <li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-action-find-in-page"></i> Buscar Parroco</a>
         </li>
         <li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-social-people"></i> Buscar Casados</a>
         </li>
         <li class="no-padding">
             <ul class="collapsible collapsible-accordion">
                 <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i> Registro Canonico</a>
                     <div class="collapsible-body" style="">
                         <ul>
                             <li><a href="<?php echo base_url(); ?>baptism/baptismCreate"><i class="mdi-social-whatshot"></i>Bautizo</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>firstCommunion"><i class="mdi-action-accessibility"></i>P. Comunion</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>confirmacion"><i class="mdi-action-wallet-giftcard"></i>Confirmacion</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>matrimonio"><i class="mdi-action-favorite"></i>Matrimonio</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i> Otras Opciones</a>
                     <div class="collapsible-body" style="">
                         <ul>
                             <li><a href="ui-alerts.html">Alerts</a>
                             </li>
                             <li><a href="ui-buttons.html">Buttons</a>
                             </li>
                             <li><a href="ui-badges.html">Badges</a>
                             </li>
                             <li><a href="ui-breadcrumbs.html">Breadcrumbs</a>
                             </li>
                             <li><a href="ui-collections.html">Collections</a>
                             </li>
                             <li><a href="ui-collapsibles.html">Collapsibles</a>
                             </li>
                             <li><a href="ui-tabs.html">Tabs</a>
                             </li>
                             <li><a href="ui-navbar.html">Navbar</a>
                             </li>
                             <li><a href="ui-pagination.html">Pagination</a>
                             </li>
                             <li><a href="ui-preloader.html">Preloader</a>
                             </li>
                             <li><a href="ui-toasts.html">Toasts</a>
                             </li>
                             <li><a href="ui-tooltip.html">Tooltip</a>
                             </li>
                             <li><a href="ui-waves.html">Waves</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="bold "><a class="collapsible-header waves-effect waves-cyan "><i class="mdi-av-queue"></i> Advanced UI <span class="new badge"></span></a>
                     <div class="collapsible-body" style="display: block;">
                         <ul>
                             <li><a href="advanced-ui-chips.html">Chips</a>
                             </li>
                             <li class="active"><a href="advanced-ui-cards.html">Cards</a>
                             </li>
                             <li><a href="advanced-ui-modals.html">Modals</a>
                             </li>
                             <li><a href="advanced-ui-media.html">Media</a>
                             </li>
                             <li><a href="advanced-ui-range-slider.html">Range Slider</a>
                             </li>
                             <li><a href="advanced-ui-sweetalert.html">SweetAlert</a>
                             </li>
                             <li><a href="advanced-ui-nestable.html">Shortable &amp; Nestable</a>
                             </li>
                             <li><a href="advanced-ui-translation.html">Language Translation</a>
                             </li>
                             <li><a href="advanced-ui-highlight.html">Highlight</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="bold"><a href="app-widget.html" class="waves-effect waves-cyan"><i class="mdi-device-now-widgets"></i> Widgets</a>
                 </li>

             </ul>
         </li>
         <li class="li-hover"><div class="divider"></div></li>
         <li class="li-hover"><p class="ultra-small margin more-text">MORE</p></li>
         <li><a href="angular-ui.html"><i class="mdi-hardware-keyboard-tab"></i>SALIR</a>
         </li>
         <li><a href="css-grid.html"><i class="mdi-image-grid-on"></i> Grid</a>
         </li>
         <li><a href="css-color.html"><i class="mdi-editor-format-color-fill"></i> Color</a>
         </li>
         <li><a href="css-helpers.html"><i class="mdi-communication-live-help"></i> Helpers</a>
         </li>
         <li><a href="changelogs.html"><i class="mdi-action-swap-vert-circle"></i> Changelogs</a>
         </li>
         <li class="li-hover"><div class="divider"></div></li>

     <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 926px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 659px;"></div></div></ul>
     <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
     </aside>
            <!-- END LEFT SIDEBAR NAV-->
