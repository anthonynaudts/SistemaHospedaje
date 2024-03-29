<?php require("../assets/db/sesion.php"); 
(isset($_SESSION['idCliente']))? $clienteActual = $_SESSION['nombreCliente']. ' '. $_SESSION['apellidosCliente'] : $clienteActual = "Acceder";
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <!-- Site Title-->
    <title>Habitaciones disponibles</title>
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
                  <div class="rd-navbar-brand fullwidth-brand"><a class="brand-name" href="index.html"><img src="images/logo-default-314x48.png" alt="" width="314" height="48"/></a></div>
                </div>
                <div class="right-side">
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
      <!-- Breadcrumbs & Page title-->
      <section class="section mb-5">
        <div class="shell">
          <div> 
            <div class="cell-lg-4 cell-xl-3 reveal-lg-flex">
              <div class="hotel-booking-form">
                <h3>Consultar disponibilidad</h3>
                <form class="rd-mailform">
                  <div class="range range-sm-bottom spacing-20">
                    <div class="cell-lg-4 cell-md-4 cell-sm-6">
                      <p class="text-uppercase">Llegada</p>
                      <div class="form-wrap">
                        <label class="form-label form-label-icon" for="date-in"><i class="fa-solid fa-calendar-arrow-down"></i>&nbsp;<span>Fecha check-in</span></label>
                        <input class="form-input" id="date-in" data-time-picker="date" type="text" name="date" data-constraints="@Required">
                      </div>
                    </div>
                    <div class="cell-lg-4 cell-md-4 cell-sm-6">
                      <p class="text-uppercase">Partida</p>
                      <div class="form-wrap">
                        <label class="form-label form-label-icon" for="date-out"><i class="fa-solid fa-calendar-arrow-up"></i>&nbsp;<span>Fecha check-out</span></label>
                        <input class="form-input" id="date-out" data-time-picker="date" type="text" name="date" data-constraints="@Required">
                      </div>
                    </div>
                    <!--<div class="cell-lg-2 cell-md-4 cell-xs-6">
                      <p class="text-uppercase">Adultos</p>
                      <div class="form-wrap form-wrap-validation">
                        <select class="form-input select-filter" data-minimum-results-search="-1" data-placeholder="1" data-constraints="@Required">
                          <option value="" selected>0</option>
                          <?php 
                            for ($i=1; $i <= consultaMaximoPersonas("Adultos"); $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                      </div>
                    </div>-->
                    <!-- <div class="cell-lg-2 cell-md-4 cell-xs-6">
                      <p class="text-uppercase">Niños</p>
                      <div class="form-wrap form-wrap-validation">
                        <select class="form-input select-filter" data-minimum-results-search="-1" data-placeholder="0" data-constraints="@Required">
                          <option value="" selected>0</option>
                          <?php 
                            for ($k=1; $k <= consultaMaximoPersonas("Ninos"); $k++) { 
                              echo '<option value="'.$k.'">'.$k.'</option>';
                            }
                            ?>
                        </select>
                      </div>
                    </div> -->
                    <div class="cell-lg-4 cell-md-4">
                      <button onclick="cargarHabitacionesDisponibles()" class="button button-primary button-square button-block button-effect-ujarak" type="button"><span>Consultar disponibilidad</span></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>

          <div class="range range-30 justify-content-lg-evenly" data-lightgallery="group" id="listarHabitacionesDisponibles">
            
          </div>
        </div>
      </section>


      

      <section class="section section-md bg-secondary-3 text-center">
        <div class="shell">
          <h2>Lo que dice la gente</h2>
          <div class="range range-50">
            <div class="cell-xs-12">
              <div class="box-outline box-outline-fullwidth box-outline__mod-1">
                <div class="quote-carousel-wrap">
                  <!-- Slick Carousel-->
                  <div class="slick-slider carousel-parent" data-arrows="false" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
                    <div class="item">
                      <div class="quote-center">
                        <div class="quote-center-title">
                          <h4>Perfect spa resort & services!</h4>
                        </div>
                        <p class="quote-center-body">
                          <q>The minute you walk out of the airport you are greeted with a warm welcome from Royal Villas staff member, and it doesn't stop. The staff truly seems to love their job and want to make sure your visit and stay is everything you expect.</q>
                        </p>
                        <div class="quote-center-cite">
                          <cite>Jane Neddery</cite><span>Office manager</span>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="quote-center">
                        <div class="quote-center-title">
                          <h4>Great atmosphere and level of customer service</h4>
                        </div>
                        <p class="quote-center-body">
                          <q>Got a Royal Villas certificate as a gift a few months ago, and I really had a fantastic spa experience there. I arrived early & was greeted warmly at the door. Surprisingly, I didn't have to wait. Everything was perfect. Highly recommend this amazing place to everybody!</q>
                        </p>
                        <div class="quote-center-cite">
                          <cite>Sam Brown</cite><span>Journalist</span>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="quote-center">
                        <div class="quote-center-title">
                          <h4>Wonderful and friendly environment</h4>
                        </div>
                        <p class="quote-center-body">
                          <q>No better way to rediscover the joy in everyday living than at Royal Villas. Second time to visit and experience was just as powerful as the first. They exceeded all my expectation one again. This is the place to visit if you are looking for a high-quality spa!</q>
                        </p>
                        <div class="quote-center-cite">
                          <cite>Julie Adams</cite><span>Babysitter</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="slick-slider" id="child-carousel" data-for=".carousel-parent" data-arrows="false" data-loop="true" data-dots="false" data-swipe="true" data-center-mode="true" data-sm-center-mode="true" data-md-center-mode="true" data-lg-center-mode="true" data-center-padding="0.50" data-items="1" data-xs-items="1" data-sm-items="3" data-md-items="3" data-lg-items="3" data-slide-to-scroll="1">
                    <div class="item">
                      <figure><img class="img-circle" src="images/about-02-100x100.jpg" alt="" width="100" height="100"/>
                      </figure>
                    </div>
                    <div class="item">
                      <figure><img class="img-circle" src="images/about-04-100x100.jpg" alt="" width="100" height="100"/>
                      </figure>
                    </div>
                    <div class="item">
                      <figure><img class="img-circle" src="images/about-05-100x100.jpg" alt="" width="100" height="100"/>
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
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
				  <a href="confirmar" class="button btn btn-success col-8" type="submit">Continuar</a>
          &nbsp;&nbsp;
          <button onclick="borrarCarrito();" type="button" class="btn-close" aria-label="Close"></button>
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