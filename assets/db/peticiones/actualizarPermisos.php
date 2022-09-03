<?php
    require("../consultas.php");
    echo ActualizarPermisos($_POST["idPagina"], $_POST["idPosicion"], $_POST["estado"]);
?>