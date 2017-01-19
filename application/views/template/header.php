
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
                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize"/>
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown"><img src="images/flag-icons/United-States.png" alt="USA" /></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                        </a>
                        </li>
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                    <!-- translation-button -->
                    <ul id="translation-dropdown" class="dropdown-content">
                      <li>
                        <a href="#!"><img src="images/flag-icons/United-States.png" alt="English" />  <span class="language-select">English</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="images/flag-icons/France.png" alt="French" />  <span class="language-select">French</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="images/flag-icons/China.png" alt="Chinese" />  <span class="language-select">Chinese</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="images/flag-icons/Germany.png" alt="German" />  <span class="language-select">German</span></a>
                      </li>

                    </ul>
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
                 <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
             </div>
             <div class="col col s8 m8 l8">

                 <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a><ul id="profile-dropdown" class="dropdown-content">
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
                             <li><a href="css-animations.html"><i class="mdi-action-accessibility"></i>P. Comunion</a>
                             </li>
                             <li><a href="<?php echo base_url(); ?>confirmacion/confirmacionCreate"><i class="mdi-action-wallet-giftcard"></i>Confirmacion</a>
                             </li>
                             <li><a href="css-shadow.html"><i class="mdi-action-favorite"></i>Matrimonio</a>
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
         <li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>
         <li class="li-hover">
             <div class="row">
                 <div class="col s12 m12 l12">
                     <div class="sample-chart-wrapper">
                         <div class="ct-chart ct-golden-section" id="ct2-chart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-labels"><foreignObject style="overflow: visible;" x="45" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">1</span></foreignObject><foreignObject style="overflow: visible;" x="66" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">2</span></foreignObject><foreignObject style="overflow: visible;" x="87" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">3</span></foreignObject><foreignObject style="overflow: visible;" x="108" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">4</span></foreignObject><foreignObject style="overflow: visible;" x="129" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">5</span></foreignObject><foreignObject style="overflow: visible;" x="150" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">6</span></foreignObject><foreignObject style="overflow: visible;" x="171" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">7</span></foreignObject><foreignObject style="overflow: visible;" x="192" y="105" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">8</span></foreignObject><foreignObject style="overflow: visible;" y="85" x="-5" height="21.11111111111111" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">0</span></foreignObject><foreignObject style="overflow: visible;" y="67.72727272727272" x="-5" height="21.11111111111111" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">2</span></foreignObject><foreignObject style="overflow: visible;" y="50.45454545454545" x="-5" height="21.11111111111111" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">4</span></foreignObject><foreignObject style="overflow: visible;" y="33.18181818181818" x="-5" height="21.11111111111111" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">6</span></foreignObject><foreignObject style="overflow: visible;" y="15.909090909090907" x="-5" height="21.11111111111111" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">8</span></foreignObject></g><g class="ct-grids"><line x1="45" x2="45" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line x1="66" x2="66" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line x1="87" x2="87" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line x1="108" x2="108" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line x1="129" x2="129" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line x1="150" x2="150" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line x1="171" x2="171" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line x1="192" x2="192" y1="5" y2="100" class="ct-grid ct-horizontal"></line><line y1="100" y2="100" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="82.72727272727272" y2="82.72727272727272" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="65.45454545454545" y2="65.45454545454545" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="48.18181818181818" y2="48.18181818181818" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="30.909090909090907" y2="30.909090909090907" x1="45" x2="213" class="ct-grid ct-vertical"></line></g><g class="ct-series ct-series-a"><path d="M45,100L45,56.818C48.5,51.061,59,25.152,66,22.273C73,19.394,80,38.106,87,39.545C94,40.985,101,28.03,108,30.909C115,33.788,122,49.621,129,56.818C136,64.015,143,74.091,150,74.091C157,74.091,164,58.258,171,56.818C178,55.379,188.5,64.015,192,65.455L192,100" class="ct-area" values="5,9,7,8,5,3,5,4"></path><path d="M45,56.818C48.5,51.061,59,25.152,66,22.273C73,19.394,80,38.106,87,39.545C94,40.985,101,28.03,108,30.909C115,33.788,122,49.621,129,56.818C136,64.015,143,74.091,150,74.091C157,74.091,164,58.258,171,56.818C178,55.379,188.5,64.015,192,65.455" class="ct-line" values="5,9,7,8,5,3,5,4"></path><line x1="45" y1="56.81818181818182" x2="45.01" y2="56.81818181818182" class="ct-point" value="5"></line><line x1="66" y1="22.272727272727266" x2="66.01" y2="22.272727272727266" class="ct-point" value="9"></line><line x1="87" y1="39.54545454545455" x2="87.01" y2="39.54545454545455" class="ct-point" value="7"></line><line x1="108" y1="30.909090909090907" x2="108.01" y2="30.909090909090907" class="ct-point" value="8"></line><line x1="129" y1="56.81818181818182" x2="129.01" y2="56.81818181818182" class="ct-point" value="5"></line><line x1="150" y1="74.0909090909091" x2="150.01" y2="74.0909090909091" class="ct-point" value="3"></line><line x1="171" y1="56.81818181818182" x2="171.01" y2="56.81818181818182" class="ct-point" value="5"></line><line x1="192" y1="65.45454545454545" x2="192.01" y2="65.45454545454545" class="ct-point" value="4"></line></g></svg></div>
                     </div>
                 </div>
             </div>
         </li>
     <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 926px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 659px;"></div></div></ul>
     <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
     </aside>
            <!-- END LEFT SIDEBAR NAV-->
