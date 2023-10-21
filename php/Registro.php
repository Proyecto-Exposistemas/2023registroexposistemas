<?php
include_once("../CRUD/CRUD_bd_general.php");
/* require_once("CRUD/CRUD_bd_general.php"); */

$conexion = new CRUD_general();
$conexion->conexionBD();
$identificador = "no hay";
if(isset($_POST['identdad']) && isset($_POST['nombre']) && isset($_POST['ap']) && isset($_POST['am']) && isset($_POST['correo'])){

    $nivel = $_POST['identdad'];
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['ap'];
    $ap_materno = $_POST['am'];
    $correo = $_POST['correo'];


    if($nivel == 1 && isset($_POST['telefono']) && isset($_POST['numeroControl']) && isset($_POST['semestre']) && isset($_POST["rolEstudiante"])){
        //es un alumno
        $semestre = $_POST['semestre'];
        $numero_control = $_POST['numeroControl'];
        $telefono = $_POST['telefono'];
        $roles_estudiantes = ["Espectador", "Expositor"];
        $numero_rol = $_POST['rolEstudiante'];

        if($numero_rol == 0){

            $mensaje = "Debes seleccionar un rol";
            $error = true;
            

        }else{
            //tabla total alumnos
            //tabla alumnos
            $sql = "INSERT INTO alumnos (nombre, paterno, materno, semestre, no_control, rol, correo, telefono) VALUES(:nom,:pa,:ma,:semestre,:noControl,:rol,:correo,:tele)";
            $parametros = [":nom"=>$nombre, ":pa"=>$ap_paterno, ":ma"=>$ap_materno, ":semestre"=>$semestre, ":noControl"=>$numero_control,":rol"=>$roles_estudiantes[$numero_rol-1] ,":correo"=>$correo, ":tele"=>$telefono];
        
            $registros = $conexion->MOSTRAR("SELECT nombre FROM alumnos WHERE no_control=:no_con", [":no_con"=>$numero_control]);
            
            if(count($registros) > 0){

                $mensaje = "El alumno ya esta registrado";
                $error=true;

            }else{

                $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);  
        
                if($resultado){
                    $mensaje = "Registro exitoso";
                    $error=false;
                    $identificador =  "registros_alumnos;".$numero_control;
                }else{
                    $mensaje = "No se ha podido realizar el registro";
                    $error=true;
                }
            }
        }

    }else if($nivel == 2 && isset($_POST['telefono']) && isset($_POST['titulo']) && isset($_POST['inputFuncion']) && isset($_POST['rfc'])){
        //es un docente
        $telefono = $_POST['telefono'];
        $titulo = $_POST['titulo'];
        $funcion = $_POST['inputFuncion'];
        $rfc = $_POST['rfc'];

        if(strcmp($funcion,"0") != 0){
            //si no elige una funcion 
            //tabla de docentes
            $sql = "INSERT INTO docentes (nombre,paterno,materno,funcion,correo,telefono,rfc,titulo) VALUES(:nom,:apep,:apem,:funcion,:correo,:tele,:rfc,:titulo)";
            $parametros = [":nom"=>$nombre,":apep"=>$ap_paterno,":apem"=>$ap_materno,":funcion"=>$funcion,":correo"=>$correo,":tele"=>$telefono,":rfc"=>$rfc,":titulo"=>$titulo];

            $registros = $conexion->MOSTRAR("SELECT nombre FROM docentes WHERE rfc=:rfc", [":rfc"=>$rfc]);

            if(count($registros) > 0){

                $mensaje = "El docente ya esta registrado";
                $error=true;

            }else{

                $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);  
        
                if($resultado){
                    $mensaje = "Registro exitoso";
                    $error=false;
                    $identificador = "registros_docentes;";
                }else{
                    $mensaje = "No se ha podido realizar el registro";
                    $error=true;
                }
            }
        }else{
            $mensaje = "Debes elegir la función del docente";
            $error=true;

        }

        

    }else if($nivel == 3 && isset($_POST['roles']) && isset($_POST['procedencia'])){
        //externos 
        $roles = $_POST["roles"];
        $procedencia = $_POST['procedencia'];


        if($roles == 1){
            //se trata de un espectador externo
            //tabla de espectadores externos
            $sql = "INSERT INTO espectadores_externos (nombre,paterno,materno,correo,procedencia) VALUES(:nom,:apep,:apem,:correo,:procedencia)";
            $parametros = [":nom"=>$nombre,":apep"=>$ap_paterno,":apem"=>$ap_materno,":correo"=>$correo, ":procedencia"=>$procedencia];

            $registros = $conexion->MOSTRAR("SELECT nombre FROM espectadores_externos WHERE correo=:correo", [":correo"=>$correo]);

        }else if($roles > 1){
            $tipos_externos = ["Expositor", "Panelista", "Conferencista"];
            $titulo = "Se ignora";
            if(isset($_POST['titulo'])){
                $titulo = $_POST['titulo'];
            }
            
            // se trata de un expositor, panelista, o conferencista
            $sql = "INSERT INTO ponentes_externos (nombre,paterno,materno,rol,titulo,correo) VALUES(:nom,:apep,:apem,:rol,:titulo,:correo)";
            $parametros = [":nom"=>$nombre,":apep"=>$ap_paterno,":apem"=>$ap_materno,":rol"=>$tipos_externos[$roles-2],":titulo"=>$titulo,":correo"=>$correo];

            $registros = $conexion->MOSTRAR("SELECT nombre FROM ponentes_externos WHERE correo=:correo", [":correo"=>$correo]);

        }

        if(count($registros) > 0){

            $mensaje = "Este correo ya esta registrado";
            $error=true;

        }else{

            $resultado = $conexion->INSERTAR_ELIMINAR_ACTUALIZAR($sql,$parametros);  
       
            if($resultado && $roles == 1 ){
                $mensaje = "Registro exitoso";
                $error=false;
                $identificador = "registros_externos;".$correo;

            }else if($resultado && $roles > 1 ){
                $mensaje = "Registro exitoso";
                $error=false;
                $identificador = "registros_ponentes_ext;".$correo;
            }else{
                $mensaje = "No se ha podido realizar el registro";
                $error=true;
            }
        }
        
       

    }
    $conexion->CERRAR_CONEXION();
    //regresa el tipo JSON con el mensaje
    $data = ["mensaje"=> $mensaje,"error"=>$error, "identificador"=>$identificador];
    header("Content-Type: application/json");
    echo json_encode($data);
    
    
}







?>