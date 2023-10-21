<?php

$data = ["mensaje"=>"No se pudo subir archivo", "error"=>true];

if(isset($_FILES["file"]["name"]) && isset($_FILES["file"]["tmp_name"])){


    if(strcmp($_FILES["file"]["name"],"template.docx") === 0){

        if(file_exists("../GeneradorConstancias/templates/template.docx")){
            
            unlink("../GeneradorConstancias/templates/template.docx");
        }
        $url = "../GeneradorConstancias/templates/".basename($_FILES["file"]["name"]);
        $resultado =move_uploaded_file($_FILES["file"]["tmp_name"],$url);
        
        if($resultado){
            $data = ["mensaje"=>"El archivo se subio con exito", "error"=>false];
        }
     
    }else{
        $data = ["mensaje"=>"El archivo debe llamarse template.docx", "error"=>true];
    }   
    
   

}


header("Content-Type: application/json");
echo json_encode($data);

?>