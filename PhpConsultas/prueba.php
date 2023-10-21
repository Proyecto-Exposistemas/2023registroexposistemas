
<?php
  include_once("../CRUD/CRUD_bd_general.php");
  $base = new CRUD_general();
  $base->conexionBD();

  $consulta = "SELECT nombre, paterno, materno, no_control FROM alumnos WHERE rol != :rol ORDER BY nombre ASC";
  $parametros = [":rol"=>"Espectador"];
  $resultado = $base->Mostrar($consulta, $parametros);
  
  $nombre_completo_Exponentes = array();
  $no_control_Exponentes = array();

  for ($i=0; $i < count($resultado); $i++) { 
    $nombre_completo_Exponentes[$i] = $resultado[$i]["nombre"]." ".$resultado[$i]["paterno"]." ".$resultado[$i]["materno"];
    $no_control_Exponentes[$i] = $resultado[$i]["no_control"];
  }

  $consulta = "SELECT nombre, paterno, materno, correo FROM ponentes_externos ORDER BY nombre ASC";
  $resultado = $base->Mostrar($consulta);
  //agrega a un arreglo
  for($i=0; $i < count($resultado); $i++) {
    array_push($nombre_completo_Exponentes,$resultado[$i]["nombre"]." ".$resultado[$i]["paterno"]." ".$resultado[$i]["materno"]);
    array_push($no_control_Exponentes,$resultado[$i]["correo"]);
  } 

  $consulta = "SELECT nombre, paterno, materno, rfc FROM docentes WHERE nombre != :nombre ORDER BY nombre ASC";
  $parametros = [":nombre"=>"Super"];
  $resultado = $base->Mostrar($consulta,$parametros);

  $nombre_completo_docentes = array();
  $rfc_docentes = array();

  for ($i=0; $i < count($resultado); $i++) { 
    $nombre_completo_docentes[$i] = $resultado[$i]["nombre"]." ".$resultado[$i]["paterno"]." ".$resultado[$i]["materno"];
    $rfc_docentes[$i] = $resultado[$i]["rfc"];
  }

  $base->CERRAR_CONEXION();

   /* Retorna los valores a Javascript */
  $data = ["nombre_completo_Exponentes"=>$nombre_completo_Exponentes, "no_control_Exponentes"=>$no_control_Exponentes, "nombre_completo_docentes"=>$nombre_completo_docentes, "rfc_docentes"=>$rfc_docentes];

  header("Content-Type: application/json");
  echo json_encode($data);
    
  // /* Obten el boton que está siendo presionado */
  // if(isset($_POST['btn-buscar'])){
  // buscarDatos();
  // }else if(isset($_POST['btn-actualizar'])){
  // actualizarDatos();
  // }else if(isset($_POST['btn-enviar'])){
  // insertarDatos();
  // }else if(isset($_POST['btn-eliminar'])){
  // eliminarDatos(); 
  // }else if(isset($_POST['btn-guardarC'])){
  // cambioContraseña();
  // }

  // /* Funcion para buscar los datos */
  // function buscarDatos(){
  // echo "Buscar datos";
  // }

  // /* Funcion para actualizar los datos */
  // function actualizarDatos(){
  // echo "Actualizar datos";
  // }

  // /* Funcion para insertar los datos */
  // function insertarDatos(){
  // // Conexión a la base de datos 

  // /* echo "Insertar datos"; */
  // $nombre_actividad = $_POST['NombreActividad'];
  // $numero_actividad = $_POST['NumeroActividad'];
  // $tema_actividad = $_POST['temaActividad'];
  // $materia = $_POST['Materia'];
  // $hora_inicio = $_POST['HoraInicio'];
  // $hora_fin = $_POST['HoraFinal'];

  // $hora_inicio = $hora_inicio . ":00";
  // $hora_fin = $hora_fin . ":00";

  // $consulta = "INSERT INTO `evento` (`no_evento`, `evento`, `hora_inicio`, `hora_fin`) VALUES ($numero_actividad, '$nombre_actividad', '$hora_inicio', '$hora_fin')";
  // $resultado = mysqli_query($conexion, $consulta);

 
  // /* Convierte los datos de listaRfcAsesoresPhp y de listaNumerosExponentesPhp a un arreglo */
  // $listaRfcAsesoresPhp = json_decode($listaRfcAsesoresPhp);
  // $listaNumerosExponentesPhp = json_decode($listaNumerosExponentesPhp);

  // /* en un ciclo for introduce todos los datos de listaRfcAsesoresPhp a la consulta*/
  // for($i = 0; $i < count($listaRfcAsesoresPhp); $i++){
  //   $consulta = "INSERT INTO asesores_evento (no_evento, rfc, materia) VALUES ($numero_actividad, '$listaRfcAsesoresPhp[$i]', '$materia')";
  //   $resultado = mysqli_query($conexion, $consulta);

  //   /* Prueba que la consulta haya funcionado */
  //   if($resultado){
  //   echo "Se inserto correctamente ". i;
  //   }else{
  //   echo "No se inserto correctamente " . i;
  //   }
  // }

  // /* en un ciclo for introduce todos los datos de listaNumerosExponentesPhp a la consulta*/
  // for($i = 0; $i < count($listaNumerosExponentesPhp); $i++){

  //   $indicador = $listaNumerosExponentesPhp[$i];

  //   if($indicador[0] == 'Z' or $indicador[0] == 'z'){
  //   $consulta = "INSERT INTO evento_alumnos (no_evento, no_control) VALUES ($numero_actividad, '$listaNumerosExponentesPhp[$i]')";
  //   $resultado = mysqli_query($conexion, $consulta);
  //   /* Prueba que la consulta haya funcionado */
  //   if($resultado){
  //       echo "Se inserto correctamente ". $i;
  //   }else{
  //       echo "No se inserto correctamente " . i;
  //   }
  //   }
  //   else{
  //   $consulta = "INSERT INTO evento_externos (no_evento, correo) VALUES ($numero_actividad, '$listaNumerosExponentesPhp[$i]')";
  //   $resultado = mysqli_query($conexion, $consulta);

  //   /* Prueba que la consulta haya funcionado */
  //   if($resultado){
  //       echo "Se inserto correctamente ". i;
  //   }else{
  //       echo "No se inserto correctamente " . i;
  //   }
  //   }
  // }
  // }

  // /* Funcion para eliminar los datos */
  // function eliminarDatos(){
  // echo "Eliminar datos";
  // } 

  // /* Cambio de contrasena */ 
  // function cambioContraseña(){
  // }
?>

















