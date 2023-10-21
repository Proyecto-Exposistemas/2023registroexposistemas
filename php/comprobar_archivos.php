<?php

$template = false;
$constancia = false;
if(file_exists("../GeneradorConstancias/templates/template.docx")){
    $template = true;
}
if(file_exists("../GeneradorConstancias/constancias/ConstanciasAlumnos.docx") 
    && file_exists("../GeneradorConstancias/constancias/ConstanciasDocentes.docx")
    && file_exists("../GeneradorConstancias/constancias/ConstanciasExternos.docx")){

        $constancia = true;
}
$data = ["template"=>$template, "constancias"=>$constancia];
header("Content-Type: application/json");
echo json_encode($data);
/* //regresa a ventana anterior
$host  = $_SERVER['HTTP_HOST'];
header_remove("http://$host/php/comprobar_archivos.php");
   
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'Paginas/constancias.html';
header("Location: http://$host/$extra");
exit;   */  



?>