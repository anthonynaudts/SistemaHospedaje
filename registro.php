<?php require("assets/incluir/header.php"); ?>

<div class="pagetitle">
      <h1>Registro</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Registro</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row d-flex justify-content-center">
        <div class="col">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registrar usuarios</h5>

              <form id="formularioRegistro" onsubmit="ActualizarUsuario(event)" class="row g-3 needs-validation" novalidate>

                    <div class="col-6">
                      <label for="idEmpleado" class="form-label">Código usuario</label>
                      <input type="text" name="idEmpleado" class="form-control" id="idEmpleado" disabled>
                    </div>
              
                    <div class="col-6">
                      <label for="yourName" class="form-label">Nombre completo</label>
                      <input type="text" name="yourName" class="form-control" id="yourName" pattern="^[a-zA-Z ]+$" minlength="8" required>
                      <div class="invalid-feedback">¡Por favor, escriba su nombre!</div>
                    </div>

                    <div class="col-6">
                        <label class="col-sm-2 col-form-label pt-0">Cargo</label>
                            <select class="form-select" aria-label="Default select example" name="YourPosition" id="YourPosition" required>
                                <option value="" selected>-Seleccionar cargo</option>
                                <!-- <option value="1">One</option> -->
                                <?php mostrarPosiciones(); ?>
                            </select>
                            <div class="invalid-feedback">¡Por favor, seleccione un cargo!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourEmail" class="form-label">Correo</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">¡Por favor, introduce una dirección de correo electrónico válida!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPhone" class="form-label">Celular</label>
                      <input type="text" name="text" class="form-control" id="yourPhone" pattern="^[0-9]+$" minlength="8" required>
                      <div class="invalid-feedback">¡Por favor, introduce el número de celular!</div>
                    </div>

                    <div class="col-6 has-validation">
                      <label for="yourUsername" class="form-label">Nombre de usuario</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" required disabled>
                      <div class="invalid-feedback">Por favor, elija un nombre de usuario.</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" minlength="8">
                      <div class="invalid-feedback">¡Por favor, introduzca su contraseña!</div>
                    </div>

                    <div class="col-6 has-validation d-flex flex-wrap justify-content-around">
                      <div class="pe-2 w-50">
                        <label for="horaEntrada" class="form-label">Hora de entrada</label>
                        <input type="time" name="horaEntrada" class="form-control" id="horaEntrada" required>
                        <div class="invalid-feedback">Por favor, elija el horario de entrada.</div>
                      </div>
                      <div class="w-50">
                        <label for="horaSalida" class="form-label">Hora de Salida</label>
                        <input type="time" name="horaSalida" class="form-control" id="horaSalida" required>
                        <div class="invalid-feedback">Por favor, elija el horario de salida.</div>
                      </div>
                    </div>

                    <div class="col-6">
                        <label class="col-sm-2 col-form-label pt-0">Provincia</label>
                            <select class="form-select" aria-label="Default select example" name="SelectProvincia" id="SelectProvincia" required>
                                <option value="" selected>-Seleccionar Provincia</option>
                                <?php mostrarProvincias(); ?>
                            </select>
                            <div class="invalid-feedback">¡Por favor, seleccione una provincia!</div>
                    </div>

                    <div class="col-6 ">
                    <label for="horaSalida" class="form-label">Estado del usuario</label>
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="estadoUsuario">Activo</label>
                        <input class="form-check-input" name="estadoUsuario" type="checkbox" id="estadoUsuario">
                      </div>
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                      <button class="btn btn-outline-danger col-2 me-2" type="reset" onclick="$('#accionUsuarios').text('Registrar usuario')">Limpiar</button>
                      <button id="accionUsuarios" class="btn btn-success col-4" type="submit">Registrar usuario</button>
                    </div>
                  </form>


              </div>
          </div>
        </div>


        <div class="col-12" id="listarUsuariosRegistrados">

        </div>
      </div>
    </section>


<?php require("assets/incluir/footer.php"); ?>