
<?php require("../assets/db/sesion.php"); 
(isset($_SESSION['idCliente']))? $clienteActual = $_SESSION['nombreCliente']. ' '. $_SESSION['apellidosCliente'] : $clienteActual = "Acceder";
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Home</title>
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
                  <div class="rd-navbar-brand fullwidth-brand"><a class="brand-name" href="index.html"><img src="images/logo-default-314x48.png" alt="" width="314" height="48"/></a></div>
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
                      <li class="active"><a href="index">Inicio</a>
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
      <section class="section">
        <div class="shell-wide">
          <div class="range range-30 range-xs-center">
            <div class="cell-lg-8 cell-xl-9">
              <!-- Classic slider-->
              <section class="section">
                <!-- Swiper -->
                <div class="swiper-container swiper-slider swiper-style-2" data-loop="false" data-autoplay="5500" data-simulate-touch="false" data-slide-effect="slide" data-direction="vertical">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide" data-slide-bg="images/slide-01.webp">
                      <div class="swiper-slide-caption">
                        <div class="shell text-sm-left">
                          <h1 data-caption-animate="slideInDown" data-caption-delay="100">Tu Retiro Ideal</h1>
                          <div class="slider-subtitle-group">
                            <div class="decoration-line" data-caption-animate="slideInDown" data-caption-delay="400"></div>
                            <h4 data-caption-animate="slideInLeft" data-caption-delay="700">Disfruta de la relajación</h4>
                            <h3 data-caption-animate="slideInLeft" data-caption-delay="800">y tranquilidad del mundo!</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
              </section>
            </div>
            <div class="cell-lg-4 cell-xl-3 reveal-lg-flex">
              <div class="hotel-booking-form d-flex justify-content-center flex-column align-items-center">
                <h3>Reservar una habitación</h3>
                
                <button class="button button-primary button-square button-block button-effect-ujarak" type="submit"><span>Consultar disponibilidad</span></button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- About us-->
      <section class="section section-md bg-white text-center text-sm-left">
        <div class="shell-wide">
          <div class="range range-50 range-xs-center overflow-hidden">
            <div class="cell-sm-10 cell-md-8 cell-lg-7 wow fadeInUp" data-wow-delay=".1s">
              <div class="post-video post-video-border">
                <div class="post-video__image"><img src="images/slide-02.webp" alt="" width="1020" height="525"/>
                </div>
              </div>
            </div>
            <div class="cell-sm-10 cell-md-8 cell-lg-5 reveal-flex wow fadeInUp" data-wow-delay=".3s">
              <div class="bg-primary section-wrap-content-var-1">
                <div class="section-wrap-content-var-1-inner">
                  <h2>Sobre nosotros</h2>
                  <p>Comprometidos con todos los que buscan energía y emoción, ofrecemos infinitas posibilidades para relajarse y recuperar energías.</p>
                  <a class="button button-effect-ujarak button-lg button-secondary-outline button-square" href="about-us"><span>Reservar ahora</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-md bg-white text-center text-sm-left">
        <div class="shell-wide">
          <div class="range range-10 range-middle">
            <div class="cell-sm-6">
              <h3>Nuestra galería</h3>
            </div>
            <!-- <div class="cell-sm-6 text-sm-right"><a class="heading-link link-gray-darker" href="#">See All Photos</a></div> -->
          </div>
          <hr>
          <div class="isotope-wrap">
            <!-- Isotope Content-->
            <div class="row isotope" data-isotope-layout="masonry" data-isotope-group="gallery" data-lightgallery="group">
              <div class="col-xs-12 col-sm-6 col-md-3 grid-sizer"></div>
              <div class="col-xs-12 col-sm-6 col-md-3 isotope-item wow fadeInUp" data-filter="Category 1" data-wow-delay=".1s"><a class="portfolio-item thumbnail-classic" href="images/slide-03.webp" data-size="533x800" data-lightgallery="item"><img src="images/slide-03.webp" alt="" width="420" height="584"/>
                  <figure></figure>
                  <div class="caption"><span class="icon mdi-thumb-up-outline">346</span><span class="icon mdi-eye">220</span></div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 isotope-item wow fadeInUp" data-filter="Category 1" data-wow-delay=".2s"><a class="portfolio-item thumbnail-classic" href="images/slide-02.webp" data-size="1199x800" data-lightgallery="item"><img src="images/slide-02.webp" alt="" width="420" height="278"/>
                  <figure></figure>
                  <div class="caption"><span class="icon mdi-thumb-up-outline">346</span><span class="icon mdi-eye">220</span></div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 isotope-item wow fadeInUp" data-filter="Category 1" data-wow-delay=".4s"><a class="portfolio-item thumbnail-classic" href="images/slide-01.webp" data-size="584x800" data-lightgallery="item"><img src="images/slide-01.webp" alt="" width="420" height="584"/>
                  <figure></figure>
                  <div class="caption"><span class="icon mdi-thumb-up-outline">346</span><span class="icon mdi-eye">220</span></div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 isotope-item wow fadeInUp" data-filter="Category 1" data-wow-delay=".5s"><a class="portfolio-item thumbnail-classic" href="images/724e7cdc-e469-43af-8550-bc48e81c8cda.jpeg" data-size="1200x800" data-lightgallery="item"><img src="images/724e7cdc-e469-43af-8550-bc48e81c8cda.jpeg" alt="" width="420" height="278"/>
                  <figure></figure>
                  <div class="caption"><span class="icon mdi-thumb-up-outline">346</span><span class="icon mdi-eye">220</span></div></a>
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
                <div class="cell-sm-6 cell-md-3 cell-lg-4 wow fadeInUp" data-wow-delay=".1s">
                  <div class="page-footer-minimal-inner">
                    <h4>Opening Hours</h4>
                    <ul class="list-unstyled">
                      <li>
                        <div class="group-xs"> 
                          <div>
                            <dl class="list-desc">
                              <dt>Weekdays: </dt>
                              <dd class="text-gray-darker"><span>8:00–20:00</span></dd>
                            </dl>
                          </div>
                          <div>
                            <dl class="list-desc">
                              <dt>Weekends: </dt>
                              <dd class="text-gray-darker"><span>9:00–18:00</span></dd>
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
                <div class="cell-sm-6 cell-md-5 cell-lg-4 wow fadeInUp" data-wow-delay=".2s">
                  <div class="page-footer-minimal-inner">
                    <h4>Address</h4>
                    <ul class="list-unstyled">
                      <li>
                        <dl class="list-desc">
                          <dt><span class="icon icon-sm mdi mdi-map-marker"></span></dt>
                          <dd><a class="link link-gray-darker" href="#">6036 Richmond hwy., Alexandria, VA, 2230</a></dd>
                        </dl>
                      </li>
                      <li>
                        <dl class="list-desc">
                          <dt><span class="icon icon-sm mdi mdi-phone"></span></dt>
                          <dd class="text-gray-darker">Call Us: <a class="link link-gray-darker" href="tel:#">+1 (409) 987–5874</a>
                          </dd>
                        </dl>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="cell-sm-8 cell-md-4 wow fadeInUp" data-wow-delay=".3s">
                  <div class="page-footer-minimal-inner-subscribe">
                    <h4>Join Our Newsletter</h4>
                    <!-- RD Mailform-->
                    <form class="rd-mailform rd-mailform-inline form-center" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                      <div class="form-wrap">
                        <input class="form-input" id="subscribe-email" type="email" name="email" data-constraints="@Email @Required">
                        <label class="form-label" for="subscribe-email">Enter your e-mail</label>
                      </div>
                      <button class="button button-primary-2 button-effect-ujarak button-square" type="submit"><span>Subscribe</span></button>
                    </form>
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
				  <button class="button btn btn-success col-8" type="submit">Continuar</button>
        </div>

      </div>
    </section>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/simple-notify-master/simple-notify.min.js"></script>
    <!--Coded by Drel-->
  </body>
</html>