<?php
require_once("../CRUD/CRUD_bd_general.php");
$conexion = new CRUD_general();
$conexion->conexionBD();
$mensaje_evento = "No se encontro evento con ese numero";
$error = true;

$lista_evento = array();
$lista_alumnos_llaves = array();
$lista_alumnos = array();
$lista_maestros = array();
$lista_maestros_llaves = array();

if (isset($_POST["NumeroActividad"])) {

    $no_evento = $_POST["NumeroActividad"];


    $sql_evento = "SELECT no_evento, evento, hora_inicio, hora_fin, descripcion FROM evento WHERE no_evento=:numero";
    $parametros_eventos = [":numero" => $no_evento];
    $resultado_evento = $conexion->MOSTRAR($sql_evento, $parametros_eventos);


    if (count($resultado_evento) > 0) {


        $sql_maestros = "SELECT docentes.nombre, docentes.paterno, 
        docentes.materno, asesores_evento.rfc, 
        asesores_evento.materia 
        FROM asesores_evento, docentes 
        WHERE asesores_evento.no_evento = :numero 
        AND docentes.rfc = asesores_evento.rfc";

        $resultado_maestros = $conexion->MOSTRAR($sql_maestros, $parametros_eventos);

        $sql_alumnos = "SELECT alumnos.nombre, alumnos.paterno, alumnos.materno, alumnos.no_control 
                    FROM alumnos,evento_alumnos 
                    WHERE alumnos.no_control = evento_alumnos.no_control 
                    AND evento_alumnos.no_evento = :numero";

        $resultado_alumnos = $conexion->MOSTRAR($sql_alumnos, $parametros_eventos);

        $sql_externos = "SELECT ponentes_externos.nombre, ponentes_externos.paterno, ponentes_externos.materno, ponentes_externos.correo 
                        FROM ponentes_externos,evento_externos 
                        WHERE ponentes_externos.correo = evento_externos.correo 
                        AND evento_externos.no_evento = :numero";

        $resultados_externos = $conexion->MOSTRAR($sql_externos, $parametros_eventos);


        for ($i = 0; $i < count($resultado_evento); $i++) {
            //array_push($lista_evento,$resultado_evento[$i][0]. " ".$resultado_evento[$i][1] ." ".$resultado_evento[$i][2] );
            array_push($lista_evento, $resultado_evento[$i][0]);
            array_push($lista_evento, $resultado_evento[$i][1]);
            array_push($lista_evento, $resultado_evento[$i][2]);
            array_push($lista_evento, $resultado_evento[$i][3]);
            array_push($lista_evento, $resultado_evento[$i][4]);
        }

        for ($i = 0; $i < count($resultado_alumnos); $i++) {
            array_push($lista_alumnos, $resultado_alumnos[$i][0] . " " . $resultado_alumnos[$i][1] . " " . $resultado_alumnos[$i][2]);
            array_push($lista_alumnos_llaves, $resultado_alumnos[$i][3]);
        }
        for ($i = 0; $i < count($resultados_externos); $i++) {
            array_push($lista_alumnos, $resultados_externos[$i][0] . " " . $resultados_externos[$i][1] . " " . $resultados_externos[$i][2]);
            array_push($lista_alumnos_llaves, $resultados_externos[$i][3]);
        }

        for ($i = 0; $i < count($resultado_maestros); $i++) {
            array_push($lista_maestros, $resultado_maestros[$i][0] . " " . $resultado_maestros[$i][1] . " " . $resultado_maestros[$i][2]);
            array_push($lista_maestros_llaves, $resultado_maestros[$i][3]);
        }
        array_push($lista_evento,$resultado_maestros[0][4]);
        $mensaje_evento = null;
        $error = false;
    } else {
        $mensaje_evento = "No se encontro el evento";
    }
}


$data = [
    "mensaje" => $mensaje_evento, "evento" => $lista_evento, "alumnos" => $lista_alumnos, "alumnos_llaves" => $lista_alumnos_llaves,
    "mestros" => $lista_maestros, "maestros_llaves" => $lista_maestros_llaves, "error"=>$error
];

header("Content-Type: application/json");
echo json_encode($data);
