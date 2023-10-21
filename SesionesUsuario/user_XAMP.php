<?php

//validar que existe el usuario
include_once 'CRUD/CRUD_bd_general.php';
class User extends CRUD_general {
    private $nombre;
    private $username;
    private $apellido_paterno;

    public function userExist($user, $pass){
        
        $query = $this->conexionBD()->prepare("SELECT * FROM administradores WHERE rfc=:user");
        $query->execute(['user'=>$user]);
        $datos = $query->fetchAll();
        
        if(count($datos) > 0){
            if(password_verify($pass,trim($datos[0]["password"]))){

                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    
    }

    public function setUser($user)
    {
        $query = $this->conexionBD()->prepare("SELECT * FROM docentes WHERE rfc=:user");
        $query->execute(['user'=>$user]);
        foreach ($query as $currentUser) {
            $this->username = $currentUser['rfc'];
            $this->nombre = $currentUser['nombre'];
            $this->apellido_paterno = $currentUser['paterno'];
            
           
        }
        $this->CERRAR_CONEXION();
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidoP(){
        return $this->apellido_paterno;
    }

    public function getUserName()
    {
        return $this->username;
    }
    
}


?>