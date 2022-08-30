<?php
    require("../consultas.php");
    echo login($_POST["usuario"], $_POST["contrasena"]);
?>