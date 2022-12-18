<?php
    require("../sesion.php");
    unset($_SESSION['idCliente']);
    unset($_SESSION['nombreCliente']);
    unset($_SESSION['apellidosCliente']);
    unset($_SESSION['correoCliente']);
    echo true;
?>