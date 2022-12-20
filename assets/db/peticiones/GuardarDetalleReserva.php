<?php
    require("../consultas.php");
    echo GuardarDetalleReserva($_POST["idReserva"], $_POST["idHab"], $_POST["idNivel"], $_POST["precioHab"]);
?>