<?php
/*
* Este archivo crea las consultas para una base de datos en phpmyadmin
*/
define("HOST", "mysql:host=localhost;");
define("DBNAME", "dbname=exposistemas");
define("USUARIO", "root");
define("PASSWORD", '');


class CRUD_general{

    private $conexion;

    public function conexionBD(){

        try {
            
            $this->conexion = new PDO(HOST. DBNAME,USUARIO,PASSWORD );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec("SET CHARACTER SET UTF8");
            
            return $this->conexion;
        } catch (Exception $e) {

            die("Error:".$e->getMessage());
            echo "Linea del error " . $e->getLine();
        }

        
    }

    public function MOSTRAR($consultaEscrita, ?array $arrayAsociativo = null){

        
        try{

            if($arrayAsociativo == null){
                $sentencia = $this->conexion->query($consultaEscrita);
            }else{
                $sentencia = $this->conexion->prepare($consultaEscrita);
                $sentencia->execute($arrayAsociativo);
        
            }
            
            $filas=$sentencia->fetchAll();
            $sentencia = null;
    
            #var_dump($filas);
            return $filas;

        } catch (Exception $e) {

            die("Error:".$e->getMessage());
            echo "Linea del error " . $e->getLine();
        }
    }

    public function INSERTAR_ELIMINAR_ACTUALIZAR($consultaEscrita, $arrayAsociativo){
        try{
            $resultados=$this->conexion->prepare($consultaEscrita);
            $resultados->execute($arrayAsociativo);
            $resultados = null;
            
            return true;
        }catch (Exception $e) {

            die("Error:".$e->getMessage());
            echo "Linea del error " . $e->getLine();
        }
       

    }



    public function CERRAR_CONEXION()
    {
        $this->conexion = null;
    }

    


}







?>