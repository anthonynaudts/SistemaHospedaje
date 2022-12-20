<?php
    require 'conexion.php';
    
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

    function mostrarTipoDocumento(){
        $datos = json_decode(consultaGeneral("SELECT * FROM tipoDocumentos order by idTipoDocumento ASC"), true);
        foreach ($datos as $item) {
            echo "<option value='".$item["idTipoDocumento"]."'>".$item["desTipoDocumento"]."</option>";
        }
    }

    function mostrarCaracteristicasHab(){
        $datos = json_decode(consultaGeneral("SELECT idCaracteristica, descCaracteristica FROM caracteristicasHab order by descCaracteristica ASC"), true);
        foreach ($datos as $item) {
            echo "<option value='".$item["idCaracteristica"]."'>".$item["descCaracteristica"]."</option>";
        }
    }

    function mostrarTipoHab(){
        $datos = json_decode(consultaGeneral("SELECT idTipoHab, nombreTipoHab FROM tipoHabitaciones order by idTipoHab ASC"), true);
        foreach ($datos as $item) {
            echo "<option value='".$item["idTipoHab"]."'>".$item["nombreTipoHab"]."</option>";
        }
    }

    function mostrarNivelHab(){
        $datos = json_decode(consultaGeneral("SELECT idNivel, nivelTexto, nivelNum FROM edificioNiveles order by idNivel ASC"), true);
        foreach ($datos as $item) {
            echo "<option value='".$item["idNivel"]."'>".$item["nivelNum"]. " - " .$item["nivelTexto"]."</option>";
        }
    }

    function mostrarEstadosHab(){
        $datos = json_decode(consultaGeneral("SELECT idEstadoHab, desEstado FROM estadosHab order by idEstadoHab ASC"), true);
        foreach ($datos as $item) {
            echo "<option value='".$item["idEstadoHab"]."'>".$item["desEstado"]."</option>";
        }
    }

    function mostrarProvincias(){
        $datos = json_decode(consultaGeneral("SELECT * FROM provincias order by nombreProvincia ASC"), true);
        foreach ($datos as $item) {
            echo "<option value='".$item["idProvincia"]."'>".$item["nombreProvincia"]."</option>";
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
                $_SESSION['celular'] = $row["celular"];
                $_SESSION['nombreProvincia'] = $row["nombreProvincia"];
            }
            echo isset($_SESSION['session_id']);
            
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }catch(Exception $e){
            echo("Error " . $e);
        }
    }
    
    function loginCliente($correoCliente, $contrasenaCliente){
        session_start();
        try{
            $conn = conectarBD();
            $sql = "SELECT * FROM clientes WHERE correoCliente = '".$correoCliente."' AND contrasenaCliente = '".md5($contrasenaCliente)."'";
            $obtenerDatos = sqlsrv_query($conn, $sql);
            if($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $_SESSION['idCliente'] = $row["idCliente"];
                $_SESSION['nombreCliente'] = $row["nombreCliente"];
                $_SESSION['apellidosCliente'] = $row["apellidosCliente"];
                $_SESSION['correoCliente'] = $row["correoCliente"];
            }
            echo isset($_SESSION['idCliente']);
            
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

    function consultaCaracteristicasHab(){
        try{
            $query = "SELECT * FROM caracteristicasHab order by descCaracteristica ASC";
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

    function consultaTipoHab(){
        try{
            $query = "SELECT * FROM tipoHabitaciones order by idTipoHab ASC";
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

    function consultaUsuarios(){
        try{
            $query = "SELECT * FROM listarUsuarios order by idUsuario ASC";
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
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }
    
    function consultaClientes(){
        try{
            $query = "SELECT *, (select COUNT(idReserva) from reservas where reservas.idCliente=listarClientes.idCliente) cantReservas from listarClientes order by idCliente ASC";
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
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function consultaMaximoPersonas($tipoPersona){
        try{
            $query = "SELECT MAX(cantidadAdultosHab)maxcantidadAdultosHab, MAX(cantidadNinosHab)maxcantidadNinosHab FROM habitaciones";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                // $datos[$cont] = $row;
                $datos['maxcantidadAdultosHab'] = $row["maxcantidadAdultosHab"];
                $datos['maxcantidadNinosHab'] = $row["maxcantidadNinosHab"];
                $cont++;
            }

            if($tipoPersona == "Adultos"){
                return $datos['maxcantidadAdultosHab'];
            }else{
                return $datos['maxcantidadNinosHab'];
            }
            // return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function datosDashboard($totalInfo){
        try{
            switch ($totalInfo) {
                case 'totalClientes':
                    $query = "SELECT COUNT(idCliente)info FROM clientes";
                    break;
                case 'totalHab':
                    $query = "SELECT COUNT(idHabitacion)info FROM habitaciones";
                    break;
                case 'totalReservas':
                    $query = "SELECT COUNT(idReserva)info FROM reservas";
                    break;
            }
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont] = $row;
                $cont++;
            }
            return json_encode($datos[0]["info"]);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }


    function buscarCaracteristica($idCaracteristica){
        $datos = json_decode(consultaGeneral("SELECT descCaracteristica, iconoCaracteristica FROM caracteristicasHab WHERE idCaracteristica = '".$idCaracteristica."'"), true);
        foreach ($datos as $item) {
            return $item['descCaracteristica'].','.$item['iconoCaracteristica'];
        }
    }
    
    function consultaHabitaciones(){
        try{
            $query = "SELECT * FROM listarHabitaciones order by nivelNum, idHabitacion ASC";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                // $datos[$cont] = $row;
                $datos[$cont]['idHabitacion'] = $row["idHabitacion"];
                $datos[$cont]['nombreTipoHab'] = $row["nombreTipoHab"];
                $datos[$cont]['imagen'] = $row["imagen"];
                $datos[$cont]['precioTempAlta'] = $row["precioTempAlta"];
                $datos[$cont]['precioTempBaja'] = $row["precioTempBaja"];
                // $datos[$cont]['incluye'] = explode(",",$row["incluye"]);
                $listaIncluye = explode(",", $row["incluye"]);
                $elementIconos = [];
                for($i=0; $i < count($listaIncluye); $i++) { 
                    $elementIconos[$i] = buscarCaracteristica($listaIncluye[$i]);
                }
                $datos[$cont]['incluye'] = $elementIconos;
                $datos[$cont]['idNivel'] = $row["idNivel"];
                $datos[$cont]['nivelNum'] = $row["nivelNum"];
                $datos[$cont]['desEstado'] = $row["desEstado"];
                $datos[$cont]['colorEstado'] = $row["colorEstado"];
                $datos[$cont]['cantidadAdultosHab'] = $row["cantidadAdultosHab"];
                $datos[$cont]['cantidadNinosHab'] = $row["cantidadNinosHab"];
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function consultarReservas(){
        try{
            $query = "SELECT *, (select SUM(precioHab) from detalleReserva where detalleReserva.idReserva = mostrarReservas.idReserva)totalPrecio from mostrarReservas WHERE fecha_llegada >= GETDATE() order by fecha_llegada ASC";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                // $datos[$cont] = $row;
                $datos[$cont]['idReserva'] = $row["idReserva"];
                $datos[$cont]['nombreCliente'] = $row["nombreCliente"];
                $datos[$cont]['apellidosCliente'] = $row["apellidosCliente"];
                $datos[$cont]['fecha_llegada'] = $row["fecha_llegada"];
                $datos[$cont]['fecha_partida'] = $row["fecha_partida"];
                $datos[$cont]['totalPrecio'] = $row["totalPrecio"];
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function consultarTopHabitaciones(){
        try{
            $query = "SELECT t.cantReservas, t.idHabitacion, t.idNivel, lh.nombreTipoHab, lh.imagen from top5Hab t, listarHabitaciones lh where t.idHabitacion = lh.idHabitacion and t.idNivel= lh.idNivel";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                // $datos[$cont] = $row;
                $datos[$cont]['cantReservas'] = $row["cantReservas"];
                $datos[$cont]['idHabitacion'] = $row["idHabitacion"];
                $datos[$cont]['idNivel'] = $row["idNivel"];
                $datos[$cont]['nombreTipoHab'] = $row["nombreTipoHab"];
                $datos[$cont]['imagen'] = $row["imagen"];
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function cargarHabitacionesparaLimpieza(){
        try{
            $query = "SELECT * FROM listarHabitacionesParaLimpieza WHERE idEstadoHab = 4 order by nivelNum, idHabitacion ASC";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                // $datos[$cont] = $row;
                $datos[$cont]['idHabitacion'] = $row["idHabitacion"];
                $datos[$cont]['nombreTipoHab'] = $row["nombreTipoHab"];
                $datos[$cont]['imagen'] = $row["imagen"];
                $datos[$cont]['idNivel'] = $row["idNivel"];
                $datos[$cont]['nivelNum'] = $row["nivelNum"];
                $datos[$cont]['nivelTexto'] = $row["nivelTexto"];
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function datosTemporales($fechaLlegada, $fechaSalida){
        try{
            $query = "EXEC datosTemporales '".$fechaLlegada."', '".$fechaSalida."'";
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
            // return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error". $e);
        }
    }


    function cargarHabitacionesDisponibles($fechaLlegada, $fechaSalida){
        try{
            if($fechaLlegada == "" || $fechaSalida == ""){
                $query = "EXEC listarHabxTemporada";
            }else{
                datosTemporales($fechaLlegada, $fechaSalida);
                // $query = "EXEC listarHabxTemporada3 '2022-12-15', '2022-12-30'";
                $query = "EXEC listarHabxTemporada3 '".$fechaLlegada."', '".$fechaSalida."'";
                
            }
            $datos = [];
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont]['idHabitacion'] = $row["idHabitacion"];
                $datos[$cont]['nombreTipoHab'] = $row["nombreTipoHab"];
                $datos[$cont]['descripcionTipoHab'] = $row["descripcionTipoHab"];
                $datos[$cont]['imagen'] = $row["imagen"];
                $datos[$cont]['precioHab'] = $row["precioHab"];
                // $datos[$cont]['incluye'] = explode(",",$row["incluye"]);
                $listaIncluye = explode(",", $row["incluye"]);
                $elementIconos = [];
                for($i=0; $i < count($listaIncluye); $i++) { 
                    $elementIconos[$i] = buscarCaracteristica($listaIncluye[$i]);
                }
                $datos[$cont]['incluye'] = $elementIconos;
                $datos[$cont]['idNivel'] = $row["idNivel"];
                $datos[$cont]['nivelNum'] = $row["nivelNum"];
                $datos[$cont]['desEstado'] = $row["desEstado"];
                $datos[$cont]['colorEstado'] = $row["colorEstado"];
                $datos[$cont]['cantidadAdultosHab'] = $row["cantidadAdultosHab"];
                $datos[$cont]['cantidadNinosHab'] = $row["cantidadNinosHab"];
                $cont++;
            }
            return json_encode($datos);
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function buscarUsuario($idUsuario){
        try{
            $query = "SELECT * FROM usuarios WHERE idUsuario = '".$idUsuario."'";
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
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function buscarHabitacion($idHab, $idNivel){
        try{
            $query = "SELECT * FROM habitaciones WHERE idHabitacion = '".$idHab."' AND idNivel = '".$idNivel."'";
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
                $datos[$cont] = $row["idPosicion"];
                $cont++;
            }
            if(!empty($datos))
                echo json_encode($datos);
            else
                echo json_encode("NULL"); 
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
            // return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function consultaPermisosGeneral(){
        try{
            session_start();
            $query = "select * FROM paginasSinAcceso(".$_SESSION["idPosicion"].")";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont] = $row;
                $cont++;
            }
            if(!empty($datos))
                echo json_encode($datos);
            else
                echo json_encode("NULL"); 
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    
    // Eliminar datos
    function eliminarGeneral($query){
        try{
            $resultado = false;
            $conn = conectarBD();
            $insertReview = sqlsrv_query($conn, $query);
            if($insertReview == FALSE)
                die(print_r(sqlsrv_errors(),true));
            else
                $resultado = true;

            sqlsrv_free_stmt($insertReview);
            sqlsrv_close($conn);
            return $resultado;
        }
        catch(Exception $e){
            echo("Error". $e);
        }
    }

    function eliminarPagina($idPagina){
        //[ ] eliminar datos tambien de la tabla permisos_paginas
        $datos = json_decode(eliminarGeneral("DELETE FROM paginas WHERE idPagina = '".$idPagina."'; DELETE FROM permisos_paginas WHERE idPagina = '".$idPagina."' "), true);
        echo ($datos);
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

    function actualizarEstadoHab($idHab, $idNivel, $idEstado){
        $datos = json_decode(insertarGeneral("UPDATE habitaciones SET idEstadoHab = '".intval($idEstado)."' WHERE idNivel ='".$idNivel."' AND idHabitacion = '".$idHab."'"), true);
        echo 1;
    }

    function actualizarClientes($idCliente, $nombreCliente, $apellidosCliente, $correoCliente, $contrasenaCliente, $telefonoCliente, $idTipoDocumento, $numDocumento){
        $contrasenaCliente = ($contrasenaCliente!="")?md5($contrasenaCliente):"";
        $datos = json_decode(insertarGeneral("EXEC actualizarClientes '".intval($idCliente)."','".$nombreCliente."','".$apellidosCliente."','".$correoCliente."','".$contrasenaCliente."', '".$telefonoCliente."', '".intval($idTipoDocumento)."', '".$numDocumento."'"), true);
        echo ($datos[0]["idCliente"] > 0)? true : false;
    }   
    function actualizarUsuarios($idUsuario, $nombre, $idPosicion, $correo, $usuario, $contrasena, $imagenPerfil, $horaEntrada, $horaSalida, $idProvincia, $estado, $celular){
        $contrasena = ($contrasena!="")?md5($contrasena):"";
        $datos = json_decode(insertarGeneral("EXEC ActualizarUsuarios '".intval($idUsuario)."','".$nombre."','".$correo."','".$usuario."','".$contrasena."', '".$imagenPerfil."', '".intval($idPosicion)."', '".$horaEntrada."', '".$horaSalida."', '".$idProvincia."', '".$celular."', '".$estado."'"), true);
        echo ($datos[0]["idUsuario"] > 0)? true : false;
    } 

    function actualizarPaginas($idPagina, $pagina){
        $datos = json_decode(insertarGeneral("EXEC ActualizarPaginas '".intval($idPagina)."','".$pagina."'"), true);
        echo $datos[0]["idPagina"];
    }

    function ActualizarHab($idHabitacion, $idTipoHab, $imagen, $precioTempAlta, $precioTempBaja, $incluye, $idNivel, $idEstadoHab, $cantidadAdultosHab, $cantidadNinosHab){
        $datos = json_decode(insertarGeneral("EXEC actualizarHab '".intval($idHabitacion)."','".intval($idTipoHab)."','".$imagen."','".$precioTempAlta."','".$precioTempBaja."','".$incluye."','".$idNivel."','".intval($idEstadoHab)."', '".intval($cantidadAdultosHab)."', '".intval($cantidadNinosHab)."'"), true);
        echo $datos[0]["idHabitacion"];
    }

    function ActualizarTipoHab($idTipoHab, $nombreTipoHab, $descripcionTipoHab){
        $datos = json_decode(insertarGeneral("EXEC ActualizarTipoHab '".intval($idTipoHab)."','".$nombreTipoHab."' ,'".$descripcionTipoHab."'"), true);
        echo $datos;
    }

    function ActualizarPermisos($idPagina, $idPosicion, $estado){
        $datos = json_decode(insertarGeneral("EXEC ActualizarPermisos '".intval($idPagina)."','".intval($idPosicion)."', '".$estado."'"), true);
        echo $datos;
    }

    function ActualizarCaracteristicaHab($idCaracteristica, $descCaracteristica, $iconoCaracteristica){
        $datos = json_decode(insertarGeneral("EXEC ActualizarCaracteristicaHab '".intval($idCaracteristica)."','".$descCaracteristica."', '".$iconoCaracteristica."'"), true);
        echo $datos;
    }

    function ActualizarReservas($idReserva, $idCliente, $fecha_llegada, $fecha_partida){
        $datos = json_decode(insertarGeneral("EXEC ActualizarReservas '".intval($idReserva)."','".intval($idCliente)."', '".$fecha_llegada."', '".$fecha_partida."'"), true);
        echo $datos[0]["idReserva"];
    }

    function GuardarDetalleReserva($idReserva, $idHab, $idNivel, $precioHab){
        $datos = json_decode(insertarGeneral("INSERT INTO detalleReserva(idReserva, idHabitacion, idNivel, precioHab) VALUES('".intval($idReserva)."','".intval($idHab)."', '".intval($idNivel)."', '".$precioHab."')"), true);
        echo $datos[0]["idReserva"];
    }

    // Funcionar para manejo de eventos

    function cargarEventos(){
        try{
            $query = "SELECT * FROM cargarEventos";
            $conn = conectarBD();
            $obtenerDatos = sqlsrv_query($conn, $query);
            if ($obtenerDatos == FALSE)
                die(print_r(sqlsrv_errors(),true));
                $cont = 0;
            while($row = sqlsrv_fetch_array($obtenerDatos, SQLSRV_FETCH_ASSOC)){
                $datos[$cont]["id"]=$row["id"];
                $datos[$cont]["title"]=$row["title"];
                $datos[$cont]["backgroundColor"]=$row["backgroundColor"];
                $datos[$cont]["borderColor"]=$row["backgroundColor"];                
                $datos[$cont]["start"]=($row["start"] == NULL)? 0 :$row["start"]->format('Y-m-d H:i:s');
                $datos[$cont]["end"]=($row["end"] == NULL)? "" :$row["end"]->format('Y-m-d H:i:s');
                // $datos[$cont] = $row;
                $cont++;
            }
            
            sqlsrv_free_stmt($obtenerDatos);
            sqlsrv_close($conn);
            // print_r($datos[0]["start"]->format('Y-m-d H:i:s'));
            // echo json_encode($datos);
            return json_encode($datos);
        }
        catch(Exception $e){
            echo("Error " . $e);
        }
    }

    function ActualizarGeneral($query){
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
            return true;
        }
        catch(Exception $e){
            echo("Error". $e);
        }
    }

    function ActualizarFechaEvento($idEvento, $fechaInicio, $fechaFinal){
        $datos = ActualizarGeneral("UPDATE eventos SET inicia='".$fechaInicio."', finaliza='".$fechaFinal."' WHERE idEvento = '".$idEvento."'");
        echo $datos;
    }
?>