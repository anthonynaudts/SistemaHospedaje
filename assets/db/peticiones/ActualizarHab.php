<?php
    require("../consultas.php");

try {
    if(isset($_FILES['file']['name'])){
        $directorio ="../../img/habitaciones/";
        $nombreGuardado = date('dmy-hisNy');

        $archivo = $_FILES['file']['name'];
        $tipo = $_FILES['file']['type'];
        $tipo = explode("/",$tipo)[1];
        $temp = $_FILES['file']['tmp_name'];

        $nombreGuardado = $nombreGuardado.'.'.$tipo;

        if(move_uploaded_file($temp, $directorio.$nombreGuardado)) {
            chmod($directorio.$nombreGuardado, 0777);
        }
        
    }else{
        $nombreGuardado = NULL;
    }

    echo ActualizarHab($_POST["idHab"], $_POST["selectTipoHab"], $nombreGuardado, $_POST["precioTempAlta"], $_POST["precioTempBaja"], $_POST["listaIncluye"], $_POST["selectNivelHab"], $_POST["selectEstadoHab"], $_POST["cantidadAdultosHab"], $_POST["cantidadNinosHab"]);

} catch(Exception $e){
    return 0;
}
  
?>