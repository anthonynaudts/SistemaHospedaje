<?php require("../assets/db/sesion.php"); 
(isset($_SESSION['idCliente']))? $clienteActual = $_SESSION['nombreCliente']. ' '. $_SESSION['apellidosCliente'] : $clienteActual = "Acceder";
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Contacto</title>
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
                      <li class="active"><a href="contacts">Contacto</a>
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
                  <h3>Ponerse en contacto</h3>
                  <p>Estamos disponibles 24/7 por correo electrónico o por teléfono. También puede utilizar nuestro formulario de contacto rápido para hacer una pregunta sobre nuestros servicios. Estaremos encantados de responder a sus preguntas.</p>
                  <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                    <div class="range range-sm-bottom spacing-20">
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                          <label class="form-label" for="contact-first-name">Nombre</label>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="contact-last-name" type="text" name="phone" data-constraints="@Numeric">
                          <label class="form-label" for="contact-last-name">Teléfono</label>
                        </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                          <label class="form-label" for="contact-message">Mensaje</label>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                          <label class="form-label" for="contact-email">Correo</label>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <button class="button button-primary button-square button-block button-effect-ujarak" type="submit"><span>Enviar mensaje</span></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="cell-sm-4">
                <aside class="contact-box-aside text-left">
                  <div class="range range-50">
                    <!-- <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> get Social</p>
                      <hr class="divider divider-left divider-custom">
                      <ul class="list-inline">
                        <li><a class="icon icon-sm icon-gray-3 fa fa-instagram" href="#"></a></li>
                        <li><a class="icon icon-sm icon-gray-3 fa fa-facebook" href="#"></a></li>
                        <li><a class="icon icon-sm icon-gray-3 fa fa-twitter" href="#"></a></li>
                        <li><a class="icon icon-sm icon-gray-3 fa fa-youtube" href="#"></a></li>
                      </ul>
                    </div> -->
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> Telefono</p>
                      <hr class="divider divider-left divider-custom">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div class="unit__left"><span class="text-middle icon icon-sm mdi mdi-phone icon-primary"></span></div>
                        <div class="unit__body"><a class="text-middle link link-gray-dark" href="tel:#">(809) 158-1234</a></div>
                      </div>
                    </div>
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> Dirección</p>
                      <hr class="divider divider-left divider-custom">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div class="unit__left"><span class="text-middle icon icon-sm mdi mdi-map-marker icon-primary"></span></div>
                        <div class="unit__body"><a class="text-middle link link-gray-dark" href="contacts.html">Av. Juan pablo duarte 87, Santiago de los caballeros</a></div>
                      </div>
                    </div>
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> Hora de apertura</p>
                      <hr class="divider divider-left divider-custom">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div class="unit__left"><span class="text-middle icon icon-sm mdi mdi-clock icon-primary"></span></div>
                        <div class="unit__body text-gray-darker">
                          <p>Estamos abierto las 24 horas todos los dias de la semana</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </aside>
              </div>
            </div>
          </div>
        </section>
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
    <section id="datosReservacion" class="datosReservacion d-flex align-items-center p-4 d-none">
      <div class="row w-100">
        <div class="col-md-9 d-flex justify-content-between align-items-center text-dark">
          <div class="d-flex justify-content-between flex-column align-items-start">
            <p id="datosReservacionGeneralListaHab"></p>
            <span id="datosReservacionGeneralCantHabSeleccionadas"></span>
          </div>
          <span><strong>Total:<span id="datosReservacionGeneralPrecioTotal" class="text-primary" style="font-size: 18px;"></span></strong></span>
        </div>
        <div class="col-md-3 d-flex justify-content-end align-items-center">
				  <button class="button btn btn-success col-8" type="submit">Continuar</button>
        </div>

      </div>
    </section>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/simple-notify-master/simple-notify.min.js"></script>
  </body>
</html>