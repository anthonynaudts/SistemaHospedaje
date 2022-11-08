<?php require("assets/incluir/header.php"); ?>



<div class="pagetitle">
      <h1>Perfil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/perfil/<?php 
              if(empty($_SESSION["imagenPerfil"]))
                echo "nofoto.png";
              else
                echo $_SESSION["imagenPerfil"]; 
            ?>" alt="Perfil" class="rounded-circle">
              <h2><?php echo $_SESSION["nombre"]; ?></h2>
              <h3><?php echo $_SESSION["posicion"]; ?></h3>
              <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visión general</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar perfil</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Ajustes</button>
                </li> -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar contraseña</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <h5 class="card-title">Detalles del perfil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nombre completo</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["nombre"]; ?></div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                  </div> -->


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Cargo</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["posicion"]; ?></div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">USA</div>
                  </div> -->

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Provincia</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["nombreProvincia"]; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Celular</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["celular"]; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Correo</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["correo"]; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagen de perfil</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="vistaPreviaImagen" class="imagenPerfil" src="assets/img/perfil/<?php 
                        if(empty($_SESSION["imagenPerfil"]))
                            echo "nofoto.png";
                        else
                            echo $_SESSION["imagenPerfil"]; 
                        ?>" alt="Profile">
                        <div class="pt-2">
                          <label for="profilePicture" class="btn btn-primary btn-sm text-white" title="Subir una nueva imagen de perfil"><i class="bi bi-upload"></i></label>
                          <input class="d-none" type="file" name="profilePicture" id="profilePicture" onchange="vistaPreviaImg(event, '#vistaPreviaImagen')">
                          <!-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                          <a onclick="noFoto('#vistaPreviaImagen')" class="btn btn-danger btn-sm" title="Quitar mi foto de perfil"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre completo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $_SESSION["nombre"];?>">
                      </div>
                    </div> -->
<!-- 
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Trabajo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?php echo $_SESSION["posicion"] ?>">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Trabajo</label>
                        <div class="col-md-8 col-lg-9">
                            <select class="form-select" aria-label="Default select example" name="YourPosition" id="YourPosition" required>
                                <option value="" selected>-Seleccionar posición</option>
                                <?php mostrarPosiciones(); ?>
                            </select>
                        </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="USA">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Provincia</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?php echo $_SESSION["nombreProvincia"];?>">
                      </div>
                    </div> -->

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Celular</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $_SESSION["celular"];?>">
                      </div>
                    </div>

                    <!-- <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Correo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $_SESSION["correo"] ?>">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                      </div>
                    </div> -->

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Notificaciónes de Correo Electrónico</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                          Cambios realizados en su cuenta
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                          Información sobre nuevos productos y servicios.
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                          Ofertas promocionales y de marketing
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                          Alertas de seguridad
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="formCambiarContrasena" onsubmit="cambiarContrasena(event)" class="needs-validation" novalidate> 
                    <div class="row mb-3">
                      <label for="contrasenaActual" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="contrasenaActual" type="password" class="form-control" id="contrasenaActual" required>
                        <div class="invalid-feedback">¡Por favor, introduzca su contraseña!</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nuevaContrasena" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nuevaContrasena" type="password" class="form-control" id="nuevaContrasena" required>
                        <div class="invalid-feedback">¡Por favor, introduzca su nueva contraseña!</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="confirmarNuevaContrasena" class="col-md-4 col-lg-3 col-form-label">Confirmar contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirmarNuevaContrasena" type="password" class="form-control" id="confirmarNuevaContrasena" required>
                        <div class="invalid-feedback">¡Por favor, confirme su nueva contraseña!</div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>




<?php require("assets/incluir/footer.php"); ?>