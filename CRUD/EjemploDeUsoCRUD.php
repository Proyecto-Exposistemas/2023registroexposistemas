<?php

    /* include_once("CRUD_bd_general.php");
    $base = new CRUD_general();
    $base->conexionBD();

    // $sql = "INSERT INTO alunmos (nombre,paterno,materno,semestre,no_control,correo,telefono) VALUES(:nom, :apep, :apem, :se,:con, :correo, :tele)";
    // $base->INSERTAR_ELIMINAR_ACTUALIZAR($sql, [":nom"=>"maria", ":apep"=>"llamas", ":apem"=>"Marquez", ":se"=>"2",":con"=>"Z20020020", ":correo"=>"solo@gmail.com",":tele"=>"4371023438"]);
    // $base->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE FROM datos_usuarios WHERE id=:id", [":id"=>"6"]);
    // $base->INSERTAR_ELIMINAR_ACTUALIZAR("UPDATE datos_usuarios SET Direccion=:midir WHERE id=:mid", [":mid"=>"4", ":midir"=>"sierra madre"]);
    // $base->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE FROM datos_usuarios WHERE id=:id", [":id"=>"4"]);
    // $base->MOSTRAR("SELECT * FROM datos_usuarios where id=:id", [":id"=>"1"]);
    
    $sql = "INSERT INTO docentes (nombre,paterno,materno,funcion,correo,telefono,rfc,titulo) VALUES(:nom,:apep,:apem,:funcion,:correo,:tele,:rfc,:titulo)";
    $parametros = [":nom"=>"Arturo",":apep"=>"de leon",":apem"=>"Montero",":funcion"=>"Admin",":correo"=>"solo@gmail.com",":tele"=>"2341567879",":rfc"=>"ae46dhho09876",":titulo"=>"Inge"];
    $resultado = $base->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);

    if($resultado){
        echo "se inserto con exito";
    }else{
        echo "No se pudo insertar";
    }
    $base->CERRAR_CONEXION(); */
    
    /*include_once("CRUD_bd_general.php");
    $perro=new CRUD_general();
    $perro->conexionBD();

    $consulta="SELECT * FROM evento,alumnos";
    $parametro=[":selecion"=>"10"];
    $resultado=$perro->Mostrar($consulta);
    var_dump($resultado);

    for ($i=0; $i <count($resultado) ; $i++) { 
        # code...
        echo "<br>";
        echo $resultado[$i]["no_evento"]."<br>";
        echo $resultado[$i]["evento"]."<br>";
        echo $resultado[$i]["hora_inicio"]."<br>";
        echo $resultado[$i]["hora_fin"]."<br>";
        echo $resultado[$i]["descripcion"]."<br>";
    }

    for ($i=0; $i <count($resultado) ; $i++) { 
        echo "<br>";
        echo $resultado[$i][0];
    }
     */ 
    


?>
