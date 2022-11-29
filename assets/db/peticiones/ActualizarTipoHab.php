<?php
    require("../consultas.php");
    echo ActualizarTipoHab($_POST["idTipoHab"], $_POST["nombreTipoHab"], $_POST["descripcionTipoHab"]);
?>