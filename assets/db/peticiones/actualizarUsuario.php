<?php
    require("../consultas.php");
    echo actualizarUsuarios($_POST["idUsuario"], $_POST["nombre"], $_POST["idPosicion"], $_POST["correo"], $_POST["usuario"], $_POST["contrasena"], $_POST["imagenPerfil"], $_POST["horaEntrada"], $_POST["horaSalida"], $_POST["idProvincia"], $_POST["estado"], $_POST["celular"]);
?>