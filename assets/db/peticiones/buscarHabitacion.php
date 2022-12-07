<?php
    require("../consultas.php");
    echo buscarHabitacion($_POST["idHab"], $_POST["idNivel"]);
?>