<?php require("../assets/db/sesion.php"); 
(isset($_SESSION['idCliente']))? $clienteActual = $_SESSION['nombreCliente']. ' '. $_SESSION['apellidosCliente'] : $clienteActual = "Acceder";
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Confirmar reserva</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700,400italic%7CPoppins:300,400,500,700">
    <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
      <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="../assets/vendor/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="../assets/vendor/simple-notify-master/simple-notify.min.css" rel="stylesheet">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <!-- Page-->
    <div class="text-center page">
      <!-- Page preloader-->
      <div class="page-loader">
      </div>
      <!-- Page Header-->
      <header class="page-header" style="padding-bottom: 24px">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default-with-top-panel" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-lg-device-layout="rd-navbar-fullwidth" data-md-stick-up-offset="90px" data-lg-stick-up-offset="150px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
            <div class="rd-navbar-top-panel rd-navbar-collapse">
              <div class="rd-navbar-top-panel-inner">
                <div class="left-side">
                </div>
                <div class="center-side">
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand fullwidth-brand"><a class="brand-name" href="index"><img src="images/logo-default-314x48.png" alt="" width="314" height="48"/></a></div>
                </div>
                <div class="right-side">
                  <!-- Contact Info-->
                  <div class="contact-info">
                    <div class="unit unit-middle unit-horizontal unit-spacing-xs">
                      <i class="fa-solid fa-circle-user">&nbsp;</i>
                      <div class="unit__body"><a class="text-middle" href="registro"><?php echo $clienteActual; ?></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar collapse toggle-->
                <button class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand mobile-brand"><a class="brand-name" href="index.html"><img src="images/logo-default-314x48.png" alt="" width="314" height="48"/></a></div>
              </div>
              <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-scroll-holder">
                    <ul class="rd-navbar-nav">
                      <li><a href="index">Inicio</a>
                      </li>
                      <li><a href="about-us">Sobre nosotros</a>
                      </li>
                      <li><a href="contacts">Contacto</a>
                      </li>
                      <li><a href="habitaciones">Habitaciones</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <main>
        <section class="section section-md bg-white text-center">
          <div class="shell">
            <div class="range range-50 range-md-center">
              <div class="cell-sm-8">
                <div class="contact-box">
                  <h3>Confirmar reservación</h3>
                  <p>¡Estás a un paso de completar tu reservación!</p>
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title text-left mt-4">Habitaciones seleccionadas</p>
                      <hr class="divider divider-left divider-custom m-0">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div id="listaHabReservar" class="unit__body" style="width: 80%; font-size: 18px">
                          <p class="text-middle link link-gray-dark">267 Park Avenue New York, NY 90210</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="cell-sm-4">
                <aside class="contact-box-aside text-left">
                  <div class="range range-50">
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> Fecha reservación</p>
                      <hr class="divider divider-left divider-custom m-0">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top d-flex flex-column align-items-start">
                        <div class="unit__body fz-6" id="fechaLlegadaConfirmar"></div>
                        <div class="unit__body fz-6" id="fechaSalidaConfirmar"></div>
                      </div>
                    </div>
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> Total a pagar</p>
                      <hr class="divider divider-left divider-custom m-0">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div class="unit__body fz-6" id="totalPagarConfirmar"></div>
                      </div>
                    </div>
                    <div class="cell-xs-6 cell-sm-12">
                      <a onclick="agendarReserva()" class="button btn btn-success col-8" type="submit">Reservar</a>
                    </div>
                  </div>
                </aside>
              </div>
            </div>
          </div>
        </section>
        <!-- Page Footer-->
        <footer class="page-footer text-left text-sm-left">
        <div class="shell-wide">
          <div class="page-footer-minimal">
            <div class="shell-wide">
              <div class="range range-50">
                <div class="cell-sm-6 cell-md-3 cell-lg-6 wow fadeInUp" data-wow-delay=".1s">
                  <div class="page-footer-minimal-inner">
                    <h4>Hora de apertura</h4>
                    <ul class="list-unstyled">
                      <li>
                        <div class="group-xs"> 
                          <div>
                            <dl class="list-desc">
                              <dt>Estamos abierto las 24 horas todos los dias de la semana </dt>
                            </dl>
                          </div>
                        </div>
                      </li>
                      <li>
                        <p class="rights"><span>&copy;&nbsp;</span><span>2019</span><span>&nbsp;</span><span class="copyright-year"></span>Royal Villas. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="cell-sm-6 cell-md-5 cell-lg-6 wow fadeInUp" data-wow-delay=".2s">
                  <div class="page-footer-minimal-inner">
                    <h4>Dirección</h4>
                    <ul class="list-unstyled">
                      <li>
                        <dl class="list-desc">
                          <dt><span class="icon icon-sm mdi mdi-map-marker"></span></dt>
                          <dd><a class="link link-gray-darker" href="#">Av. Juan pablo duarte 87, Santiago de los caballeros</a></dd>
                        </dl>
                      </li>
                      <li>
                        <dl class="list-desc">
                          <dt><span class="icon icon-sm mdi mdi-phone"></span></dt>
                          <dd class="text-gray-darker">Llamanos: <a class="link link-gray-darker" href="tel:#">+1 (809) 158-1234</a>
                          </dd>
                        </dl>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      </main>
    </div>
    <!-- PANEL-->
    <!-- END PANEL-->
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- PhotoSwipe Gallery-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__cent"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/simple-notify-master/simple-notify.min.js"></script>
  </body>
</html>