<?php
include_once 'CRUD_bd_general.php';

class User_password extends CRUD_general{

    public function BuscarAdmin($user)
    {
        # busca si ya hay un registro con ese nombre
        $query = $this->conexionBD()->prepare("SELECT * FROM administradores WHERE rfc=:user");
        $query->execute(['user'=>$user]);
        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function InsertarAdministrador($user, $pass){
        /** se hace uso de las transacciones para poder insertar en dos tablas a al vez */

        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        
        $ya_existe = $this->BuscarAdmin($user); 

        if($ya_existe){
            //si ya existe netonces no lo pudiste insertar
            return false;
        }else{
            // si no existe entonces lo insertamos
            $resultado = $this->Insertar_Eliminar_Actualizar("INSERT INTO administradores (rfc,password) VALUES(?,?)", array($user,$password_hash));

            return $resultado;
        }

    }
}
/*
$user = new User_password();
$user->conexionBD();
$user->InsertarAdministrador("QWER12345678", "123");
$user->CERRAR_CONEXION();

*/
?>