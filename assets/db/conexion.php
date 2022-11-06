<?php
date_default_timezone_set('America/Santo_Domingo');
 function conectarBD(){
    $Servidor = "DESKTOP-J873FE6";
    $Basededatos = "SisHospedaje";
    $Usuario = "usuario1";
    $contrasena = "usuario1";
    
    $connectionOptions = array("Database"=>$Basededatos,
        "Uid"=>$Usuario, "PWD"=> $contrasena, "CharacterSet" => "UTF-8");
    $conexion = sqlsrv_connect($Servidor, $connectionOptions);
    if($conexion == false)
        die(print_r(sqlsrv_errors(),true));

    return $conexion;
}
?>
