<?php
    class UserSession{

        public function __construct(){
            session_start();

        }
        public function setUser($user,$nombre,$apellido_paterno){
            $_SESSION['user'][0] = $user;
            $_SESSION['user'][1] = $nombre;
            $_SESSION['user'][2] = $apellido_paterno;
        }

        public function getUser(){
            return $_SESSION["user"][0];
        }

        public function getUserNombre(){
            return $_SESSION["user"][1];
        }

        public function getApellidoPaterno(){
            return $_SESSION["user"][2];
        }

        public function closeSession(){
            session_unset();//borra lo que hay dentro de la sesion
            session_destroy();//destruye la secion
        }
    }
?>