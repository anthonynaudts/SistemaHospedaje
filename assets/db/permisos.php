<?php
if(!PermisosPagina()){
?>
<div class="w-100 d-flex justify-content-center">
    <div class="mt-5 mb-5 alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Acceso denegado</h4>
        <p>La empresa ha limitado el acceso a esta página web.</p>
        <hr>
        <p class="mb-0">Si cree que es un error, comuniquese con el administrador.</p>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>
</div>
<?php
    include("assets/incluir/footer.php");
    exit;
  }
?>