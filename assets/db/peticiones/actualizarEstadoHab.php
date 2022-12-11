<?php
    require("../consultas.php");
    echo actualizarEstadoHab($_POST["idHab"], $_POST["idNivel"], $_POST["idEstado"]);
?>