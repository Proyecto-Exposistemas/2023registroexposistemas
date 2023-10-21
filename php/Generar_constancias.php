<?php
require_once("../GeneradorConstancias/Generar_constancias_participantes.php");

$data = ["mensaje"=>"No se han podido generar las constancias", "error"=>true];

$generador = new Constancias_participantes();
$generar = isset($_POST['generar']) ? $_POST['generar'] : false;

if($generar){

    $error = false;
    $resultado1 = $generador->Constancias_alumnos();
    $resultado2 =$generador->Constancias_docentes();
    $resultado3 =$generador->Constancias_externos();

    $mensaje = "Se ha generado las constancias con exito";
    
    if(!file_exists("../GeneradorConstancias/templates/template.docx")){
        $mensaje = "Para generar las constancias debe subir una plantilla";
        $error = true;
    }
    $data = ["mensaje"=>$mensaje, "error"=>$error];
}

header("Content-Type: application/json");
echo json_encode($data);


?>