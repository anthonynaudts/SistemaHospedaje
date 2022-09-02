<?php
    date_default_timezone_set('America/Santo_Domingo');

    // Conexión base de datos SQLServer
    function conectarBD(){
        $Servidor = "DESKTOP-J873FE6";
        $Basededatos = "ReservasHoteleras";
        $Usuario = "usuario1";
        $contrasena = "usuario1";
        
        $connectionOptions = array("Database"=>$Basededatos,
            "Uid"=>$Usuario, "PWD"=> $contrasena, "CharacterSet" => "UTF-8");
        $conexion = sqlsrv_connect($Servidor, $connectionOptions);
        if($conexion == false)
            die(print_r(sqlsrv_errors(),true));
    
        return $conexion;
    }

    // Consultas
    function consultaGeneral($query){
        try{
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont] = $row;
                $cont++;
            }
            // return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
            return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function mostrarPosiciones(){
        $datos = json_decode(consultaGeneral("SELECT * FROM posiciones order by nombrePuesto ASC"), true);
        foreach ($datos as $item) {
            echo "<option value='".$item["idPosicion"]."'>".$item["nombrePuesto"]."</option>";
        }
    }
    
    function login($usuario, $contrasena){
        session_start();
        try{
            $conn = conectarBD();
            $sql = "SELECT * FROM datosLogin WHERE usuario = '".$usuario."' AND contrasena = '".md5($contrasena)."'";
            $obtenerDatos = sqlsrv_query($conn, $sql);
            if($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $_SESSION['session_id'] = session_id();
                $_SESSION['idUsuario'] = $row["idUsuario"];
                $_SESSION['nombre'] = $row["nombre"];
                $_SESSION['correo'] = $row["correo"];
                $_SESSION['usuario'] = $row["usuario"];
                $_SESSION['imagenPerfil'] = $row["imagenPerfil"];
                $_SESSION['idPosicion'] = $row["idPosicion"];
                $_SESSION['posicion'] = $row["posicion"];
            }
            echo isset($_SESSION['session_id']);
            
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }catch(Exception $e){
            echo("Error " . $e);
        }
    }


    function consultaPosiciones(){
        try{
            $query = "SELECT * FROM posiciones order by nombrePuesto ASC";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont] = $row;
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
            // return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function consultaPaginas(){
        try{
            $query = "SELECT * FROM paginas order by pagina ASC";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont] = $row;
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
            // return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }
    
    function consultaPermisos($idPagina){
        try{
            $query = "SELECT idPosicion FROM permisos_paginas WHERE idPagina = '".$idPagina."'";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont] = $row;
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
            // return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    // Procedimientos almacenados
    function insertarGeneral($query){
        try{
            $conn = conectarBD();
            $insertReview = sqlsrv_query($conn, $query);
            if($insertReview == FALSE)
                die(print_r(sqlsrv_errors(),true));
            $cont = 0;
            while($row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC)){
                $datos[$cont] = $row;
                $cont++;
            }

            sqlsrv_free_stmt($insertReview);
            sqlsrv_close($conn);
            return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error". $e);
        }
    }

    function actualizarUsuarios($idUsuario, $nombre, $idPosicion, $correo, $usuario, $contrasena, $imagenPerfil){
        $datos = json_decode(insertarGeneral("EXEC ActualizarUsuarios '".intval($idUsuario)."','".$nombre."','".$correo."','".$usuario."','".md5($contrasena)."', '".$imagenPerfil."', '".intval($idPosicion)."'"), true);
        echo ($datos[0]["idUsuario"] > 0)? true : false;
    }

    function actualizarPaginas($idPagina, $pagina){
        $datos = json_decode(insertarGeneral("EXEC ActualizarPaginas '".intval($idPagina)."','".$pagina."'"), true);
        echo ($datos[0]["idPagina"] > 0)? true : false;
    }
?>