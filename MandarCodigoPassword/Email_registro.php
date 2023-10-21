<?php
include_once("Email.php");

class EmailRegistroExposistemas extends Email{

    public function CrearEmail($destinatario,$asunto,$cuerpo)
    {
        $remitente = "nohayexposistemasqr@gmail.com";
        // $destinatario= "tetillamas@gmail.com";
        $this->MensajeEmail($remitente,$destinatario,$cuerpo,$asunto);
          
    }

}


?>
