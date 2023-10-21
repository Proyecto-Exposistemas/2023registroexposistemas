<?php
require_once("../CRUD/CRUD_bd_general.php");
$conexion = new CRUD_general();
$conexion->conexionBD();
$mensaje_evento = "No se pudo registrar el evento";
$error = true;

if( isset($_POST["Alumnos"]) && isset($_POST["Maestros"]) 
    && isset($_POST["NombreActividad"])  && isset($_POST["NumeroActividad"])
    && isset($_POST["temaActividad"]) && isset($_POST["Materia"]) && isset($_POST["HoraInicio"])
    && isset($_POST["HoraFinal"])){
    
    $mensaje_evento = "si entra";
    $lista_alumnos = $_POST["Alumnos"];
    $lista_maestros = $_POST["Maestros"];
    $nombre_evento = $_POST["NombreActividad"];
    $numero_evento = $_POST["NumeroActividad"];
    $descripcion = $_POST["temaActividad"];
    $materia = $_POST["Materia"];
    $hora_inicio = $_POST["HoraInicio"] . ":00";
    $hora_fin = $_POST["HoraFinal"] . ":00";


    $sql_evento = "SELECT no_evento FROM evento WHERE no_evento=:numero";
    $parametros_eventos = [":numero" => $numero_evento];
    $resultado_evento = $conexion->MOSTRAR($sql_evento, $parametros_eventos);

    if(count($resultado_evento)>0){
        $mensaje_evento = "El evento que intenta registrar ya existe";
    }else{

        $sql_evento  = "INSERT INTO evento (no_evento,evento,hora_inicio,hora_fin,descripcion)VALUES(:numero,:nombre,:inicio,:fin,:descripcion)";
        $parametros_evento = [":numero"=>$numero_evento, ":nombre"=>$nombre_evento,
                            ":inicio"=>$hora_inicio, ":fin"=>$hora_fin, ":descripcion"=>$descripcion];
        $resultado_evento = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql_evento,$parametros_evento);

        for ($i=0; $i < count($lista_maestros) ; $i++) { 

            $sql_evento_asesores = "INSERT INTO asesores_evento (no_evento, rfc,materia) VALUES (:numero,:rfc,:materia)";
            $parametros_asesores = [":numero"=>$numero_evento,":rfc"=>$lista_maestros[$i] , ":materia"=>$materia];
            $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql_evento_asesores,$parametros_asesores);
        }
        
        for ($i=0; $i < count($lista_alumnos) ; $i++) { 

            if(preg_match('/^[a-zA-Z0-9]{9}$/', $lista_alumnos[$i]) === 1){
                $sql_evento_alumnos = "INSERT INTO evento_alumnos (no_evento,no_control) VALUES(:numero,:numerocontrol)";
                $parametros_alumnos = [":numero"=>$numero_evento,":numerocontrol"=>$lista_alumnos[$i]];
                $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql_evento_alumnos,$parametros_alumnos);
                
            }else{
                $sql_evento_externos = "INSERT INTO evento_externos (no_evento,correo) VALUES (:numero,:correo)";
                $parametros_externos = [":numero"=>$numero_evento,":correo"=>$lista_alumnos[$i]];
                $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql_evento_externos,$parametros_externos);
                
            }
        } 


        if($resultado_evento){
            $mensaje_evento = "Se registro el evento con exito";
            $error = false;
        } 

    }

    
                        
}

$data =["mensaje"=>$mensaje_evento, "error"=>$error];
header("Content-Type: application/json");
echo json_encode($data);


?>