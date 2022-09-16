<?php
    require("../consultas.php");
    echo ActualizarFechaEvento($_POST["idEvento"], $_POST["fechaInicio"], $_POST["fechaFinal"]);
?>