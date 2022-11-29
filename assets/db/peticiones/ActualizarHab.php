<?php
    require("../consultas.php");
    //ERROR Programación de guardar imagen
    // $_POST["imagenHab"]
    echo ActualizarHab($_POST["idTipoHab"], $_POST["selectTipoHab"], 'imagen', $_POST["precioTempAlta"], $_POST["precioTempBaja"], $_POST["listaIncluye"], $_POST["selectNivelHab"], $_POST["selectEstadoHab"]);
?>