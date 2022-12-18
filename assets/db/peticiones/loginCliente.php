<?php
    require("../consultas.php");
    echo loginCliente($_POST["correoCliente"], $_POST["contrasenaCliente"]);
?>