<?php
require_once "vendor/autoload.php";

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("../GeneradorConstancias/templates/template.docx");
//colocamos la variables que estan en la constancia
$templateProcessor->setValues(
    [
       "numerodecontrol"=> "Z20020000",
       "nombrecompleto"=>"Zzz"
    ]
);

$templateProcessor->setImageValue(
    "firma",[
        "path"=>'imagen.jpg',
        "width"=>20,
        'height'=>20,
        'ratio'=>false
    ]
);

$pathToSave = "../GeneradorConstancias/constancias/result.docx";
$templateProcessor->saveAs($pathToSave);

#header("Content-Description: File Transfer");
#header("Content-Disposition: attachment; filename=result.docx");
#header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
#readfile($pathToSave);
?>