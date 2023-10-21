<?php
require_once("../CRUD/CRUD_bd_general.php");
$conexion = new CRUD_general();
$conexion->conexionBD();
$mensaje_evento = "No se pudo eliminar el evento";
$error = true;

if (isset($_POST["NumeroActividad"])) {

    $no_evento = $_POST["NumeroActividad"];
    
    $sql_evento = "SELECT no_evento FROM evento WHERE no_evento=:numero";
    $parametros_eventos = [":numero" => $no_evento];
    $resultado_evento = $conexion->MOSTRAR($sql_evento, $parametros_eventos);

    if(count($resultado_evento) > 0){

        $conexion->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE  FROM evento_alumnos WHERE no_evento=:numero",$parametros_eventos);
        $conexion->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE  FROM evento_externos WHERE no_evento=:numero",$parametros_eventos);
        $conexion->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE  FROM asesores_evento WHERE no_evento=:numero",$parametros_eventos);
        
        $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE FROM evento WHERE no_evento=:numero",$parametros_eventos);

        if($resultado){
            $mensaje_evento = "El evento se elimino con exito";
            $error = false;
        }
    }else{
        $mensaje_evento = "El evento que usted intenta eliminar no existe";
    }



}
$data = ["mensaje"=>$mensaje_evento, "error"=>$error];
header("Content-Type: application/json");
echo json_encode($data);

?>

