<?php
include_once("../CRUD/CRUD_bd_general.php");
$conexion = new CRUD_general();
$conexion->conexionBD();

//borrar externos
$q_reg_externos = "DELETE FROM registros_externos";
?>