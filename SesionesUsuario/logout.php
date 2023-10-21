<?php
    include_once 'user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();
    //elimina la ruta anterior para dirigirnos a la ruta que tiene el index.php
    $host  = $_SERVER['HTTP_HOST'];
    header_remove("http://$host/SesionesUsuario");
    
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: https://fabricaitszas.com/RegistroExposistemas/");
    exit;    

?>