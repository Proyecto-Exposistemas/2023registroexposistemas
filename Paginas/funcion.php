<?php
        include_once("../CRUD/CRUD_bd_general.php");
        $conexion = new CRUD_general();
        $conexion->conexionBD();

        $recurso = $_POST['text'];
        $cadena = explode(";", $recurso);
    
        $hora = date_create('now', timezone_open('America/Mexico_City'))->format('Y-m-d H:i:s');
        /* conectar con la base de datos */
        //$conexion = mysqli_connect("localhost", "root", "", "exposistemas");

        if($cadena[0] == "registros_alumnos"){
          $sql = "INSERT INTO registros_alumnos (no_control, hora) VALUES(:con,:hora)";
          $parametros = [":con"=>$cadena[1], ":hora"=>$hora];
          $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);  
        
        if($resultado){
            $mensaje = "Registro exitoso";
        }else{
            $mensaje = "No se ha podido realizar el registro";
        }
            }


        if($cadena[0] == "registros_docentes"){
          $sql = "INSERT INTO registros_docentes (RFC, hora) VALUES(:rfc,:hora)";
          $parametros = [":rfc"=>$cadena[1], ":hora"=>$hora];
          $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);  
        
        if($resultado){
            $mensaje = "Registro exitoso";
        }else{
            $mensaje = "No se ha podido realizar el registro";
        }   
            }


        if($cadena[0] == "registros_externos"){
            $sql = "INSERT INTO registros_externos (correo, hora) VALUES(:cor,:hora)";
          $parametros = [":cor"=>$cadena[1], ":hora"=>$hora];
          $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);  
        
        if($resultado){
            $mensaje = "Registro exitoso";
        }else{
            $mensaje = "No se ha podido realizar el registro";
        }
            }


        if($cadena[0] == "registros_ponentes_ext"){
            $sql = "INSERT INTO registros_ponentes_ext (correo, hora) VALUES(:cor,:hora)";
          $parametros = [":cor"=>$cadena[1], ":hora"=>$hora];
          $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);  
        
        if($resultado){
            $mensaje = "Registro exitoso";
        }else{
            $mensaje = "No se ha podido realizar el registro";
        }
            }

        ?>