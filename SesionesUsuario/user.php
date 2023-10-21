
<?php
session_start();
$respuesta = false;
if(isset($_SESSION['user'])){
    $respuesta = true;
}

//regresa el tipo JSON con el mensaje
$data = ["dato"=> $respuesta];
header("Content-Type: application/json");
echo json_encode($data);

?>