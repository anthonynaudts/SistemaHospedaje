<?php require("assets/incluir/header.php"); ?>

<link href='assets/calendario_lib/main.css' rel='stylesheet'/>
<script src='assets/calendario_lib/main.js'></script>
<script src='assets/calendario_lib/locales-all.js'></script>


<!-- //[p] Notificacion 2 horas antes de la salida -->
<!-- //[p] Colores de estados de reservas (Verde confirmada, amarillo pendiente, rojo cancelada) -->

<style>

  /* body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  } */

  #calendar {
    max-width: 100%;
    margin: 0 auto;
    max-height: 80vh;
  }

</style>
<section class="section">
<!-- <section class="section" style="max-height: 80vh;"> -->
    <div class="row d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Calendario de reservas</h5>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</section>

<?php require("assets/incluir/footer.php"); ?>
<script src="assets/js/eventos.js"></script>