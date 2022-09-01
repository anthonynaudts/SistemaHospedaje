<?php
    include("consultas.php");
    session_start();    
    $url= $_SERVER["REQUEST_URI"];  
     
    if($url == '/registro2'){
        if(isset($_SESSION['session_id'])){
            header("Location: tablero");
        }
        return;
    }

    if($url == '/' || $url == '/index' || $url == '/index.php'){
        if(isset($_SESSION['session_id'])){
            header("Location: tablero");
        }
    }else{
        if(!isset($_SESSION['session_id'])){
            header("Location: /");
        }
    }


    // Accesos
    function PermisosPagina(){
        if(isset($_SESSION['session_id'])){
            try{
                $url= $_SERVER["REQUEST_URI"];
                $pagina = str_replace('/', '', $url);

                $permiso = false;
                $conn = conectarBD();
                $sql = "SELECT * FROM obtenerPermisos WHERE idPosicion = '".$_SESSION['idPosicion']."' AND pagina ='".$pagina."'";
                $obtenerDatos = sqlsrv_query($conn, $sql);
                if($obtenerDatos == FALSE)
                    die(print_r(sqlsrv_errors(),true));
                while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                    $permiso = true;
                }
                return $permiso;
                
                sqlsrv_free_stmt($obtenerDatos);
                sqlsrv_close($conn);
            }catch(Exception $e){
                echo("Error " . $e);
            }
        }
    }
?>