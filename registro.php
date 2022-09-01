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
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registrar usuarios</h5>


              <form id="formularioRegistro" onsubmit="ActualizarUsuario(event)" class="row g-3 needs-validation" novalidate>
              
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">¡Por favor, escriba su nombre!</div>
                    </div>

                    <div class="col-12">
                        <label class="col-sm-2 col-form-label">Posición</label>
                            <select class="form-select" aria-label="Default select example" name="YourPosition" id="YourPosition" required>
                                <option value="" selected>-Seleccionar posición</option>
                                <!-- <option value="1">One</option> -->
                                <?php mostrarPosiciones(); ?>
                            </select>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Correo</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">¡Por favor, introduce una dirección de correo electrónico válida!</div>
                    </div>

                    <div class="col-12 has-validation">
                      <label for="yourUsername" class="form-label">Nombre de usuario</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" required disabled>
                      <div class="invalid-feedback">Por favor, elija un nombre de usuario.</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">¡Por favor, introduzca su contraseña!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Estoy de acuerdo y acepto los <a href="#">términos y condiciones</a></label>
                        <div class="invalid-feedback">Debe estar de acuerdo antes de enviar.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Crear una cuenta</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">¿Ya tienes una cuenta? <a href="pages-login.html">Acceder</a></p>
                    </div>
                  </form>


              </div>
          </div>
        </div>




<?php require("assets/incluir/footer.php"); ?>