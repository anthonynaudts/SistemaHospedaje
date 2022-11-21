<?php
    require("../consultas.php");
    echo ActualizarCaracteristicaHab($_POST["idCaractHab"], $_POST["descCaracteristica"], $_POST["iconoCaracteristica"]);
?>