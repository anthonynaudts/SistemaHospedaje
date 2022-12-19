<?php
    require("../consultas.php");
    echo cargarHabitacionesDisponibles($_POST["fechaLlegada"], $_POST["fechaSalida"]);
?>