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
    /* max-height: 130vh; */
    min-height: 1235px;
  }

</style>
<section class="section">
<!-- <section class="section" style="max-height: 80vh;"> -->
    <div class="row d-flex justify-content-center">

    <!-- Modal eventos -->

    <button id="abrirModal" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Launch static backdrop modal
    </button>

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <!-- <div class="modal-content modal-content-custom" style="border-color: #03a9f4;"> -->
          <div class="modal-content modal-content-custom">
            <div class="modal-header modal-header-custom">
              <h5 class="modal-title-custom" id="staticBackdropLabel"><i class="bi bi-info-circle text-primary"></i> Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="datosEvento" class="modal-body">
              <h5>Titulo evento</h5>
              <p class="m-0"><i class="bi bi-calendar-week-fill text-primary"></i>&nbsp;Hora inicio - hora final</p>
              <p class="m-0"><i class="bi bi-person-square text-primary"></i>&nbsp;Persona</p>
              
              <p class="m-0"><i class="bi bi-door-open-fill text-primary"></i>&nbsp;habitacion</p>
              <p class="m-0"><i class="bi bi-tags-fill text-primary"></i>&nbsp;habitacion</p>

              <!-- //ERROR corrector ortografico extension -->
            </div>
            <div class="modal-footer p-0">
              <button type="button" class="border-0 w-50 py-2 m-0 text-danger"><i class="bi bi-trash-fill"></i>&nbsp;Borrar</button>

              <button type="button" class="border-0 w-50 py-2 m-0 text-warning" data-bs-dismiss="modal"><i class="bi bi-pencil-fill"></i>&nbsp;Editar</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Fin modal eventos -->

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