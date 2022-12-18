<?php
    require("../consultas.php");    
    echo actualizarClientes($_POST["idCliente"], $_POST["nombreCliente"], $_POST["apellidosCliente"], $_POST["correoCliente"], $_POST["contrasenaCliente"], $_POST["telefonoCliente"], $_POST["idTipoDocumento"], $_POST["numDocumento"]);
?>