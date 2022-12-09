<?php require("assets/incluir/header.php"); ?>

<div class="pagetitle">
      <h1>Registro</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Habitaciones</li>
          <li class="breadcrumb-item active">Registro</li>
        </ol>
      </nav>
    </div>

    <section class="section">

        <div class="col-xl-12">
             
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="general-habitaciones">
                            <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Estado habitaciones</h5>

                          <div class="d-flex justify-content-around">
                                <div class="card-body p-0 conserjeriaDatos" style="border-color: #00c853;">
                                    <h5 class="card-title text-center">Disponibles</h5>
                                        <div class="px-3">
                                        <h6 class="text-center"><?php echo json_decode(consultaGeneral("select COUNT(idEstadoHab)cantidad from habitaciones where idEstadoHab = 1"), true)[0]["cantidad"]; ?></h6>
                                        </div>
                                    </div>

                                    <div class="card-body p-0 conserjeriaDatos" style="border-color: #0091ea;">
                                    <h5 class="card-title text-center">Ocupadas</h5>
                                        <div class="px-3">
                                        <h6 class="text-center"><?php echo json_decode(consultaGeneral("select COUNT(idEstadoHab)cantidad from habitaciones where idEstadoHab = 2"), true)[0]["cantidad"]; ?></h6>
                                        </div>
                                    </div>

                                    <div class="card-body p-0 conserjeriaDatos" style="border-color: #ffc107;">
                                    <h5 class="card-title text-center">Reservadas</h5>
                                        <div class="px-3">
                                        <h6 class="text-center"><?php echo json_decode(consultaGeneral("select COUNT(idEstadoHab)cantidad from habitaciones where idEstadoHab = 3"), true)[0]["cantidad"]; ?></h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 conserjeriaDatos" style="border-color: #9c27b0;">
                                    <h5 class="card-title text-center">Limpieza</h5>
                                        <div class="px-3">
                                        <h6 class="text-center"><?php echo json_decode(consultaGeneral("select COUNT(idEstadoHab)cantidad from habitaciones where idEstadoHab = 4"), true)[0]["cantidad"]; ?></h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 conserjeriaDatos" style="border-color: #d50000;">
                                    <h5 class="card-title text-center">Mantenimiento</h5>
                                        <div class="px-3">
                                        <h6 class="text-center"><?php echo json_decode(consultaGeneral("select COUNT(idEstadoHab)cantidad from habitaciones where idEstadoHab = 5"), true)[0]["cantidad"]; ?></h6>
                                        </div>
                                    </div>
                                </div>
                          
                          </div>
                      </div>

                      <div class="col-12" id="listarHabitaciones">
                      <div class="card recent-sales overflow-auto">
                      <div class="card-body">

                      <h5 class="card-title">Habitaciones <span>| Pendientes por limpieza</span></h5>
                      <div class="row row-cols-1 row-cols-md-4 g-4">

                         <div class="col">
                          <div class="card h-100">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                              <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                          </div>
                        </div> 
                        
                      </div>
                      </div>
                    </div>
                    </div>

                </div>

              </div><!-- End Bordered Tabs -->
        </div>
    </section>

<?php require("assets/incluir/footer.php"); ?>