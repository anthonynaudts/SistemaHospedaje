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
      <div class="row d-flex justify-content-center">
        <div class="col-12">
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
                      <button id="accionUsuarios" class="btn btn-success col-4" type="submit">Registrar usuario</button>
                    </div>
                  </form>
              </div>
          </div>
        </div>

        
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
                              <option value="HTML">HTML</option>
                              <option value="Jquery">Jquery</option>
                              <option value="CSS">CSS</option>
                              <option value="Bootstrap 3">Bootstrap 3</option>
                              <option value="Bootstrap 4">Bootstrap 4</option>
                              <option value="Java">Java</option>
                              <option value="Javascript">Javascript</option>
                              <option value="Angular">Angular</option>
                              <option value="Python">Python</option>
                              <option value="Hybris">Hybris</option>
                              <option value="SQL">SQL</option>
                              <option value="NOSQL">NOSQL</option>
                              <option value="NodeJS">NodeJS</option>
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
                      <button id="accionUsuarios" class="btn btn-success col-8" type="submit">Registrar tipo hab.</button>
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

      <!-- <div class="col-12" id="listarUsuariosRegistrados">

        </div> -->
    </section>

<?php require("assets/incluir/footer.php"); ?>