<?php

include_once("Email.php");

$email = new EmailProyectoEscolar();
$email->GeneradorCodigo();
$email->CrearEmailProyectoEscolar("tetillamas@gmail.com");

include_once("pagina.php");

?>