<?php
require_once("../CRUD/CRUD_bd_general.php");
$conexion = new CRUD_general();
$conexion->conexionBD();

$mensaje = "Debes seleccionar un rol";
$existe = false;
$identificador = "";
$error = true;
if(isset($_POST["identidad"])){
  $identidad = $_POST["identidad"];
  
  if($identidad == 1 && isset($_POST["numeroControl"])){

    $numero_control = $_POST["numeroControl"];

    $registros = $conexion->MOSTRAR("SELECT nombre FROM alumnos WHERE no_control=:no_con", [":no_con"=>$numero_control]);

    if(count($registros) > 0){

      $identificador = "registros_alumnos;".$numero_control;
      $existe = true;
      $error = false;
      $mensaje = "Código generado con exito";
    }else{
      $mensaje = "Debes registrarte primero para poder generar tu código qr";
    }
    

  }if($identidad == 2 && isset($_POST["roles"]) && isset($_POST["email"])){

    $correo = $_POST["email"];
    $rol = $_POST["roles"];
    if(strcmp($rol,"Espectador") == 0){

      $registros = $conexion->MOSTRAR("SELECT nombre FROM espectadores_externos WHERE correo=:correo", [":correo"=>$correo]);

      if(count($registros) > 0){

        $identificador = "registros_externos;".$correo;
        $existe = true;
        $error = false;
        $mensaje = "Código generado con exito";
      }else{
        $mensaje = "Debes registrarte primero para poder generar tu código qr";
      }

    }else if(strcmp($rol,"0") != 0){

      $registros = $conexion->MOSTRAR("SELECT nombre FROM ponentes_externos WHERE correo=:correo", [":correo"=>$correo]);

      if(count($registros) > 0){

        $identificador = "registros_ponentes_ext;".$correo;
        $existe = true;
        $error = false;
        $mensaje = "Código generado con exito";
      }else{
        $mensaje = "Debes registrarte primero para poder generar tu código qr";
      }

    }
    
    

  }
}
$conexion->CERRAR_CONEXION();
//regresa el tipo JSON con el mensaje
$data = ["mensaje"=> $mensaje,"error"=>$error, "identificador"=>$identificador, "existe"=>$existe];
header("Content-Type: application/json");
echo json_encode($data);

?>