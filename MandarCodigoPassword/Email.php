<?php

class Email{

    private $codigo;

    public function MensajeEmail($remitente,$destinatario,$cuerpo, $asunto)
    {
        //manda el correo electronico
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $headers = "From:" . $remitente . " \r\n";
        $headers .= "Cc:afgh@somedomain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html\r\n";
        $resultado = mail($destinatario,$asunto,$cuerpo, $headers);
        if($resultado){
            echo "Se mando con exito";
        }else{
            echo "no se mando el correo";
        }
    }

    public function setCode($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCode()
    {
        return $this->codigo;
    }
    


}





?>