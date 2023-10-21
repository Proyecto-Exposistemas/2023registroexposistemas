<?php

    include_once("SesionesUsuario/user_session.php");
    include_once("SesionesUsuario/user_XAMP.php");

    $user = new User();
    $sesion = new UserSession();


    if(isset($_SESSION['user'])){
        $user->setUser($sesion->getUser());
        include_once("Paginas/administrativo.php");

    }else if(isset($_POST["inputUser"]) && isset($_POST["inputUser"])){
        
        $usuario = $_POST["inputUser"];
        $pass = $_POST["inputPassword"];

        
        if($user->userExist($usuario,$pass)){
            
            $user->setUser($usuario);
            $sesion->setUser($user->getUsername(),$user->getNombre(),$user->getApellidoP());
            include_once("Paginas/administrativo.php");

        }else{
            $errorLogin ="Nombre de usuario y/o password incorrecto";
            include_once("Paginas/login.html");
        }

    }else{
        include_once "Paginas/login.html";
    }

?>
