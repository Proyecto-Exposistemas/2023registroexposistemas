<?php

require_once "vendor/autoload.php";
require_once "../CRUD/CRUD_bd_general.php";

class Constancias_participantes extends CRUD_general{

    protected $contador_constancias = 0;

    /**
     * crea una constancia para cada tipo de usuario,
     * para eso se debe pasar un array con los datos dependiendo de si es externo, docente o alumno
     * @param datos es un array que contiene los datos necesarios para cada contancia
     */
    public function Crear_docx_contancia(array $datos): bool
    {   
        $ruta_plantilla = "../GeneradorConstancias/templates/template.docx";

        if(file_exists($ruta_plantilla)){

            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($ruta_plantilla);
    
            $templateProcessor->setValues($datos);
    
            $pathToSave = "../GeneradorConstancias/constancias/result".$this->contador_constancias .".docx";
            $templateProcessor->saveAs($pathToSave);
    
            if(file_exists($pathToSave)){
                $this->contador_constancias+=1;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }

    public function Constancias_docentes()
    {
        $this->conexionBD();
        $resultados =$this->MOSTRAR(
            "SELECT nombre, paterno, materno, funcion,titulo
             FROM docentes WHERE rfc <> 'QWER12345678'");
        $this->CERRAR_CONEXION();

        if(count($resultados) > 0 && file_exists("../GeneradorConstancias/templates/template.docx")){

            foreach ($resultados as $fila) {

                $titulo = $this->Acronimo($fila["titulo"]);

                $nombre_completo = $titulo ." ".$fila["nombre"]." ".$fila["paterno"] . " " . $fila["materno"];
                $actividad = "como";
                $evento = $fila["funcion"];
                $this->Crear_docx_contancia(
                    [
                        "nombrecompleto"=>$nombre_completo,
                        "como"=>$actividad,
                        "que"=>$evento
                    ]
                );
            }
            $respuesta = $this->Fusionar_constancias("Docentes");
            return $respuesta;
        }else{
            return false;
        }

    }

    public function Constancias_alumnos()
    {
        $this->conexionBD();
        $resultados =$this->MOSTRAR(
            "SELECT alumnos.nombre, alumnos.paterno, alumnos.materno, evento.evento 
            FROM evento_alumnos,evento, alumnos 
            WHERE evento.no_evento = evento_alumnos.no_evento 
            AND alumnos.no_control = evento_alumnos.no_control");
        $this->CERRAR_CONEXION();

        if(count($resultados) > 0 && file_exists("../GeneradorConstancias/templates/template.docx")){

            foreach ($resultados as $fila) {

                $nombre_completo = $fila["nombre"]." ".$fila["paterno"] . " " . $fila["materno"];
                $actividad = "con el proyecto";
                $evento = $fila["evento"];
                $this->Crear_docx_contancia(
                    [
                        "nombrecompleto"=>$nombre_completo,
                        "como"=>$actividad,
                        "que"=>$evento
                    ]
                );

            }
            $respuesta = $this->Fusionar_constancias("Alumnos");
            return $respuesta;
        }else{
            return false;
        }

    }
    public function Constancias_externos()
    {
        $this->conexionBD();
        $resultados =$this->MOSTRAR(
            "SELECT ponentes_externos.nombre, ponentes_externos.paterno, ponentes_externos.materno,
            ponentes_externos.rol, ponentes_externos.titulo, evento.evento 
            FROM ponentes_externos,evento,evento_externos 
            WHERE evento_externos.correo = ponentes_externos.correo 
            AND evento_externos.no_evento = evento.no_evento");
        $this->CERRAR_CONEXION();

        if(count($resultados) > 0 && file_exists("../GeneradorConstancias/templates/template.docx")){

            foreach ($resultados as $fila) {

                $titulo = $this->Acronimo($fila["titulo"]);

                $nombre_completo = $titulo ." ".$fila["nombre"]." ".$fila["paterno"] . " " . $fila["materno"];
                $actividad = "como " . strtolower($fila["rol"]);
                $evento = $fila["evento"];
                $this->Crear_docx_contancia(
                    [
                        "nombrecompleto"=>$nombre_completo,
                        "como"=>$actividad,
                        "que"=>$evento
                    ]
                );

            }
            $respuesta = $this->Fusionar_constancias("Externos");
            return $respuesta;
        }else{
            return false;
        }
    }

    public function Fusionar_constancias($tipo)
    {
        $archivo_temporal = "temp.docx";
        $archivo1 = "../GeneradorConstancias/constancias/result0.docx";
        $archivo2 = "../GeneradorConstancias/constancias/result1.docx";
        

        for ($i=1; $i < $this->contador_constancias ; $i++) { 

            $mainTemplateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($archivo1);
            //$mainTemplateProcessor ->setValue('var_name', $value);
            
            $innerTemplateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($archivo2);
            //$innerTemplateProcessor->setValue('var2_name', $value2);
            
            // extract internal xml from template that will be merged inside main template
            $innerXml = $innerTemplateProcessor->gettempDocumentMainPart();
            $innerXml = preg_replace('/^[\s\S]*<w:body>(.*)<\/w:body>.*/', '$1', $innerXml);
            
            // remove tag containing header, footer, images
            $innerXml = preg_replace('/<w:sectPr>.*<\/w:sectPr>/', '', $innerXml);
            
            // inject internal xml inside main template
            $mainXml = $mainTemplateProcessor->gettempDocumentMainPart();
            $mainXml = preg_replace('/<\/w:body>/','<w:p><w:r><w:br w:type="page" /><w:lastRenderedPageBreak/></w:r></w:p>' . $innerXml . '</w:body>', $mainXml);
            $mainTemplateProcessor->settempDocumentMainPart($mainXml);
           
            if(($i+1) == ($this->contador_constancias-1) ||  ($i+1) == $this->contador_constancias){
                $archivo_temporal = "../GeneradorConstancias/constancias/Constancias".$tipo.".docx";
            }
            $mainTemplateProcessor->saveAs($archivo_temporal);
            unlink($archivo2);
            $archivo1 = $archivo_temporal;
            $archivo2 = "../GeneradorConstancias/constancias/result".($i+1).".docx";

            if($archivo_temporal == "temp.docx"){
                $archivo_temporal = "temp2.docx";
            }else if($archivo_temporal == "temp2.docx"){
                $archivo_temporal = "temp.docx";
            }

        }
        unlink("../GeneradorConstancias/constancias/result0.docx");
        
        if(file_exists("temp2.docx")){
            unlink("temp2.docx");
        }
        if(file_exists("temp.docx")){
            unlink("temp.docx");
        }
        
        if(file_exists("../GeneradorConstancias/constancias/Constancias".$tipo.".docx")){
            $this->contador_constancias = 0;
            return true;
        }else{
            return false;
        } 

        
    }

    public function Acronimo($titulo): string
    {
        if((preg_match('#^Inge#i', $titulo) === 1)){
            $titulo = "Ing.";
        }else if((preg_match('#^Doctor#i', $titulo) === 1)){
            $titulo = "Dr.";
        }else if((preg_match('#^Doctora#i', $titulo) === 1)){
            $titulo = "Dra.";
        }else if((preg_match('#^Lic#i', $titulo) === 1)){
            $titulo = "Lic.";
        }

        return $titulo;
    }


}










?>