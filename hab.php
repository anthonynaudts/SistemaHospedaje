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
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered bg-white">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#general-habitaciones">Habitaciones</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#general-TipoHab">Tipo habitaciones</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#general-caracHab">Características Hab.</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar contraseña</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="general-habitaciones">
                            <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Registro/Modificación</h5>

                          <form id="formularioRegistroHab" onsubmit="" class="row g-3 needs-validation" novalidate>

                                <div class="col-6">
                                  <label for="idHab" class="form-label">Cod. Hab</label>
                                  <input type="text" name="idHab" class="form-control" id="idHab" disabled>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Tipo de habitación</label>
                                        <select class="form-select" aria-label="Default select example" name="selectTipoHab" id="selectTipoHab" required>
                                            <option value="" selected>-Seleccionar tipo habitación</option>
                                            <!-- <option value="1">One</option> -->
                                            <?php mostrarPosiciones(); ?>
                                        </select>
                                        <div class="invalid-feedback">¡Por favor, seleccione un tipo de habitación!</div>
                                </div>

                                <div class="col-6">
                                  <label for="" class="form-label">Imágenes</label>
                                  <input type="file" name="" class="form-control" id="">
                                </div>
                                
                                <div class="col-6">
                                    <label class="form-label">Estado habitaciónn</label>
                                        <select class="form-select" aria-label="Default select example" name="selectTipoHab" id="selectTipoHab" required>
                                            <option value="" selected>-Seleccionar el estado de habitación</option>
                                            <!-- <option value="1">One</option> -->
                                            <?php mostrarPosiciones(); ?>
                                        </select>
                                        <div class="invalid-feedback">¡Por favor, seleccione el estado de la habitación!</div>
                                </div>

                                <div class="col-6 has-validation d-flex flex-wrap justify-content-around">
                                  <div class="col-6 pe-2">
                                    <label for="" class="form-label">Precio temp baja RD$</label>
                                    <input type="text" name="" class="form-control" id="" placeholder="0.00" pattern="^[0-9]+">
                                  </div>
                                  <div class="col-6">
                                    <label for="" class="form-label">Precio temp alta RD$</label>
                                    <input type="text" name="" class="form-control" id="" placeholder="0.00" pattern="^[0-9]+">
                                  </div>
                                </div>

                                <!-- <div class="col-6">
                                  <label for="" class="form-label">Precio grupos RD$</label>
                                  <input type="text" name="" class="form-control" id="" placeholder="0.00" pattern="^[0-9]+">
                                </div> -->
                                
                                <div class="col-12 d-flex justify-content-end">
                                  <button class="btn btn-outline-danger col-2 me-2" type="reset" onclick="$('#accionUsuarios').text('Registrar usuario')">Limpiar</button>
                                  <button id="accionUsuarios" class="btn btn-success col-4" type="submit">Guardar</button>
                                </div>
                              </form>
                          </div>
                      </div>
                </div>

                <div class="tab-pane fade general-TipoHab pt-3" id="general-TipoHab">
                  <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Tipo habitación</h5>

                        <form id="formularioRegistroTipoHab" onsubmit="" class="row g-3 needs-validation" novalidate>
                          <div class="col-12">
                              <div class="col-12">
                                <label for="idEmpleado" class="form-label">Cod. Tipo Hab.</label>
                                <input type="text" name="idEmpleado" class="form-control" id="idEmpleado" disabled>
                              </div>
                        
                              <div class="col-12 mt-2">
                                <label for="yourName" class="form-label">Nombre</label>
                                <input type="text" name="yourName" class="form-control" id="yourName" pattern="^[a-zA-Z ]+$" minlength="8" required>
                                <div class="invalid-feedback">¡Por favor, escriba el nombre del tipo de habitación!</div>
                              </div>

                              <div class="col-12 mt-2">
                                <label for="yourName" class="form-label">Descripción</label>
                                <!-- Quill Editor Default -->
                                <div class="quill-editor-default">
                                  <!-- <p>Hello World!</p>
                                  <p>This is Quill <strong>default</strong> editor</p> -->
                                </div>
                                <!-- End Quill Editor Default -->
                              </div>
                              
                              <div class="col-12 mt-2">
                                <label for="habIncluye" class="form-label">Incluye</label>
                                  <select class="form-select rounded" id="choices-multiple-remove-button" placeholder="Seleccionar" multiple>
                                    <?php mostrarCaracteristicasHab(); ?>
                                    </select> 
                              </div>

                              <script>
                                var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                                  removeItemButton: true,
                                }); 
                              </script>

                            </div>
                              <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-outline-danger col-4 me-2" type="reset" onclick="$('#accionUsuarios').text('Registrar usuario')">Limpiar</button>
                                <button id="accionUsuarios" class="btn btn-success col-8" type="submit">Guardar</button>
                              </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Lista tipo habitaciones</h5>

                        <div class="accordion accordion-flush" id="listadoTipoHab">
                        </div>
                        
                        </div>
                    </div>
                </div>
                </div>
                </div>

                <div class="tab-pane fade general-caracHab pt-3" id="general-caracHab">
                  <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Características</h5>

                        <form id="formularioRegistroCaracteristicas" onsubmit="ActualizarCaracteristicaHab(event)" class="row g-3 needs-validation" novalidate>
                          <div class="col-12">
                              <div class="col-12">
                                <label for="idCaractHab" class="form-label">Cod. Característica</label>
                                <input type="text" name="idCaractHab" class="form-control" id="idCaractHab" disabled>
                              </div>
                        
                              <div class="col-12 mt-2">
                                <label for="descCaracteristica" class="form-label">Nombre</label>
                                <input type="text" name="descCaracteristica" class="form-control" id="descCaracteristica" pattern="^[a-zA-Z ]+$" required>
                                <div class="invalid-feedback">¡Por favor, escriba el nombre de la característica!</div>
                              </div>

                              <div class="col-12 mt-2">
                                <label for="iconoCaracteristica" class="form-label">Cod. ícono</label>
                                <input type="text" name="iconoCaracteristica" class="form-control" id="iconoCaracteristica" required>
                                <div class="invalid-feedback">¡Por favor, escriba el código del ícono!</div>
                              </div>
                              

                            </div>
                              <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-outline-danger col-4 me-2" type="reset">Limpiar</button>
                                <button class="btn btn-success col-8" type="submit">Guardar</button>
                              </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Características</h5>
                      <table class="table">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Ícono</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody id="listarCaracteristicasHab">
                        </tbody>
                      </table>
                      
                      </div>
                  </div>
                </div>


                </div>


                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  a
                </div>

              </div><!-- End Bordered Tabs -->

        </div>
    </section>

<?php require("assets/incluir/footer.php"); ?>