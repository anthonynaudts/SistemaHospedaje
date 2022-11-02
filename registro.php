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
                      <label for="yourName" class="form-label">Nombre</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">¡Por favor, escriba su nombre!</div>
                    </div>

                    <div class="col-6">
                        <label class="col-sm-2 col-form-label pt-0">Posición</label>
                            <select class="form-select" aria-label="Default select example" name="YourPosition" id="YourPosition" required>
                                <option value="" selected>-Seleccionar posición</option>
                                <!-- <option value="1">One</option> -->
                                <?php mostrarPosiciones(); ?>
                            </select>
                    </div>

                    <div class="col-6">
                      <label for="yourEmail" class="form-label">Correo</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">¡Por favor, introduce una dirección de correo electrónico válida!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourEmail" class="form-label">Celular</label>
                      <input type="text" name="text" class="form-control" id="yourPhone" required>
                      <div class="invalid-feedback">¡Por favor, introduce el número de celular!</div>
                    </div>

                    <div class="col-6 has-validation">
                      <label for="yourUsername" class="form-label">Nombre de usuario</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" required disabled>
                      <div class="invalid-feedback">Por favor, elija un nombre de usuario.</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">¡Por favor, introduzca su contraseña!</div>
                    </div>

                    <div class="col-6 has-validation d-flex flex-wrap justify-content-around">
                      <div class="pe-2 w-50">
                        <label for="yourUsername" class="form-label">Hora de entrada</label>
                        <input type="time" name="username" class="form-control" id="horaEntrada" required>
                        <div class="invalid-feedback">Por favor, elija un nombre de usuario.</div>
                      </div>
                      <div class="w-50">
                        <label for="yourUsername" class="form-label">Hora de Salida</label>
                        <input type="time" name="username" class="form-control" id="horaSalida" required>
                        <div class="invalid-feedback">Por favor, elija un nombre de usuario.</div>
                      </div>
                    </div>

                    <!-- <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms">
                        <label class="form-check-label" for="acceptTerms">Este usuario puede <a href="#">acceder</a> a la web.</label>
                        <div class="invalid-feedback">Debe estar de acuerdo antes de enviar.</div>
                      </div>
                    </div> -->

                    
                    

                    <!-- <div class="col-6 has-validation">
                      <label for="yourUsername" class="form-label">Hora de salida</label>
                      <input type="time" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Por favor, elija un nombre de usuario.</div>
                    </div> -->

                    <div class="col-12">
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms">
                          <label class="form-check-label" for="acceptTerms">Este usuario puede <a href="#">acceder</a> a la web.</label>
                          <div class="invalid-feedback">Debe estar de acuerdo antes de enviar.</div>
                        </div>
                      </div>
                      <button class="btn btn-primary col-6" type="submit">Registrar usuario</button>
                    </div>
                  </form>


              </div>
          </div>
        </div>


        <div class="col-12">
              <div class="card recent-sales overflow-auto">

              

                <div class="card-body">
                  <h5 class="card-title">Usuarios <span>| Listado de usuarios</span></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Aprobado</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pendiente</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pendiente</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pendiente</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pendiente</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Aprobado</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rechazado</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Aprobado</span></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>

      </div>
    </section>



<?php require("assets/incluir/footer.php"); ?>