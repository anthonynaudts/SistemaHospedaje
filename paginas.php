<?php require("assets/incluir/header.php"); ?>

<div class="pagetitle">
      <h1>Mantenimiento páginas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Mantenimientos</a></li>
          <li class="breadcrumb-item">Páginas</li>
          <li class="breadcrumb-item active">Registro</li>
        </ol>
      </nav>
    </div>


    <section class="section">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registrar o actualizar páginas</h5>

              <form id="formularioRegistrarPaginas" onsubmit="(event)" class="row g-3 needs-validation" novalidate>
        
                    <div class="d-flex">
                        <div class="me-2" style="width:20%;">
                            <label for="URLPagina" class="form-label">ID</label><input id="idPagina" type="text" class="form-control" disabled>
                        </div>

                        <div class="flex-grow-1 flex-shrink-1">
                            <label for="URLPagina" class="form-label">URL página (Ej. paginas, registro)</label>
                            <input type="text" name="name" class="form-control" id="URLPagina" required>
                            <div class="invalid-feedback">¡Por favor, escriba el URL de la página!</div>
                        </div>
                    </div>
                        
                    <div class="card-body">
                        <h5 class="card-title pb-0">Personal con acceso</h5>
                        <div id="paginaPosiciones" class="w-100">                 
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                      <button style="width:30%;" class="btn btn-outline-primary w-40" type="reset">Limpiar</button>
                      <button class="btn btn-primary flex-grow-1 flex-shrink-1 ms-2" type="submit">Registrar</button>
                    </div>
                  </form>
              </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Páginas</h5>

              <table class="table table-striped">
                <thead>
                  <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Página</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody id="listarPaginas">
                  <!-- <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td><a href="#">Seleccionar</a></td>
                  </tr> -->
                </tbody>
              </table>
              
              </div>
          </div>
        </div>
      </div>
    </section>




<?php require("assets/incluir/footer.php"); ?>