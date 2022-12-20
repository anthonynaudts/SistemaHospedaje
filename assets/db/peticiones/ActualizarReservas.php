<?php
    require("../consultas.php");
    session_start();
    echo ActualizarReservas($_POST["idReserva"], $_SESSION["idCliente"], $_POST["fecha_llegada"], $_POST["fecha_partida"]);
?>