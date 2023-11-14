<?php
include_once("../CRUD/CRUD_bd_general.php");
$conexion = new CRUD_general();
$conexion->conexionBD();

//borrar externos
$q_reg_externos = "DELETE FROM registros_externos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_reg_externos, null);

$q_esp_externos = "DELETE FROM espectadores_externos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_esp_externos, null);

$q_eve_externos = "DELETE FROM evento_externos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_eve_externos, null);

$q_reg_pon_externos = "DELETE FROM registros_ponentes_ext";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_reg_pon_externos, null);

$q_pon_ext = "DELETE FROM ponentes_externos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_pon_ext, null);

//borrar alumnos
$q_reg_alumnos = "DELETE FROM registros_alumnos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_reg_alumnos, null);

$q_eve_alumnos = "DELETE FROM evento_alumnos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_eve_alumnos, null);

$q_alumnos = "DELETE FROM alumnos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_alumnos, null);

$q_total_alumnos = "DELETE FROM total_alumnos";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_total_alumnos, null);

//borrar docentes
$q_doc_eve = "DELETE FROM asesores_evento";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_doc_eve, null);

$q_docentes = "DELETE FROM docentes WHERE(rfc != 'QWER12345678');";   
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_docentes, null);

//borrar eventos
$q_enentos = "DELETE FROM evento";
$conexion->INSERTAR_ELIMINAR_ACTUALIZAR($q_enentos, null);

//crea json encode y los headers
header('Content-Type: application/json');

echo json_encode("Se limpio la base de datos");
?>