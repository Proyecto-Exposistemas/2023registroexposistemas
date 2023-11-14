<?php
    //setlocale(LC_ALL, "es_ES");
    //importar la libreria
    require '../Crear _Excel/vendor/autoload.php';

    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xls;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    // use PhpOffice\PhpSpreadsheet\IOFactory;

    //instanciar la clase
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $spreadsheet -> getProperties() -> setTitle("Constancias de Exposistemas " . date("Y")) -> setCreator("Academia ISC")
    -> setCategory("Constancias") -> setCompany("Instituto Tecnológico Superior Zacatecas Sur") -> setLastModifiedBy("");

    $spreadsheet -> setActiveSheetIndex(0);
    $hoja = $spreadsheet -> getActiveSheet();

    //poner los encabezados de las columnas
    $hoja -> setCellValue('A1', "Folio") -> setCellValue("B1", "Fecha de folio") -> setCellValue("C1", "Fecha de documento") ->
    setCellValue("D1", "Tipo de documento Rec./Const./Dip.") -> setCellValue("E1", "A nombre de:") -> 
    setCellValue("F1", "Evento o motivo de expedición");

    include("../CRUD/CRUD_bd_general.php");
    $obj = new CRUD_general();
    $obj->conexionBD();

    //obtener la fecha en español
    $getDate = $_GET["fecha"];

    $date = separarFecha($getDate);
    
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    
    $fecha = $date[2] . ' de ' . $meses[$date[1]-1] . ' de ' . $date[0];

    //sacar los datos para las constancias de alumnos
    $consulta = "SELECT alumnos.nombre as nombre, alumnos.paterno as paterno, alumnos.materno as materno, evento.evento as evento
    FROM alumnos, evento_alumnos, evento 
    WHERE alumnos.no_control = evento_alumnos.no_control
    AND evento_alumnos.no_evento = evento.no_evento";
    
    $parametro = [":selecion" => "10"];
    $resultados_alumnos = $obj->Mostrar($consulta);

    for($i = 0; $i < count($resultados_alumnos); $i++){
        $hoja->setCellValue('C' . strval($i+2), date("d"."/m"."/Y")) -> setCellValue('D' . strval($i+2), "Constancia") -> 
        setCellValue('E' . strval($i+2), $resultados_alumnos[$i]["nombre"] . " " . $resultados_alumnos[$i]["paterno"] . ' ' . 
        $resultados_alumnos[$i]["materno"])
        -> setCellValue('F' . strval($i+2), 'Por su destacada participación con el proyecto '.$resultados_alumnos[$i]["evento"] . 
        ', en el "Evento de Exposistemas '. date("Y") . '" llevado a cabo el día ' . $fecha);

        $hoja->getStyle('F'. strval($i+2))->getAlignment()->setWrapText(true);
    }

    //sacar los datos para las constancias de externos
    $aumento = count($resultados_alumnos) + 2;
    $consulta = "SELECT ponentes_externos.nombre as nombre, ponentes_externos.paterno as paterno, ponentes_externos.materno as 
    materno, evento.evento as evento
    FROM ponentes_externos, evento_externos, evento 
    WHERE ponentes_externos.correo = evento_externos.correo
    AND evento_externos.no_evento = evento.no_evento";

    $parametro = [":selecion" => "10"];
    $resultados_externos = $obj->Mostrar($consulta);

    for ($i = 0; $i < count($resultados_externos); $i++) {
        $hoja->setCellValue('C' . strval($i+$aumento), date("d" . "/m" . "/Y"))->setCellValue('D' . strval($i+$aumento), "Constancia")->
        setCellValue('E' . strval($i+$aumento), $resultados_externos[$i]["nombre"] . " " . $resultados_externos[$i]["paterno"] . ' ' . 
        $resultados_externos[$i]["materno"])
        ->setCellValue('F' . strval($i+$aumento), 'Por su destacada participación con el proyecto ' . $resultados_externos[$i]["evento"] .
            ', en el "Evento de Exposistemas ' . date("Y") . '" llevado a cabo el día ' . $fecha);

        $hoja->getStyle('F' . strval($i+$aumento))->getAlignment()->setWrapText(true);
    }

    //sacar los datos para las constancias de docentes
    $aumento = count($resultados_alumnos) + count($resultados_externos) + 2;
    $consulta = "SELECT * FROM docentes
    WHERE rfc != 'QWER12345678'";
    $parametro = [":selecion" => "10"];
    $resultados_docentes = $obj->Mostrar($consulta);

    for ($i = 0; $i < count($resultados_docentes); $i++) {

        $hoja->setCellValue('C' . strval($i+$aumento), date("d" . "/m" . "/Y"))->setCellValue('D' . strval($i+$aumento), "Constancia")->
        setCellValue('E' . strval($i+$aumento), $resultados_docentes[$i]["nombre"] . " " . $resultados_docentes[$i]["paterno"] . ' ' .
        $resultados_docentes[$i]["materno"])
            ->setCellValue('F' . strval($i+$aumento), 'Por su destacada participación como ' . $resultados_docentes[$i]["funcion"] .
                ', en el "Evento de Exposistemas ' . date("Y") . '" llevado a cabo el día ' . $fecha);

        $hoja->getStyle('F' . strval($i+$aumento))->getAlignment()->setWrapText(true);
    }


    //definir propiedades de la hoja
    $spreadsheet -> getDefaultStyle() -> getFont() -> setName("Arial") -> setSize(12);
    $hoja->getColumnDimension('B')->setWidth(15);
    $hoja->getColumnDimension('C')->setWidth(15);
    $hoja->getColumnDimension('D')->setWidth(15);
    $hoja->getColumnDimension('E')->setWidth(25);
    $hoja->getColumnDimension('F')->setWidth(40);




    //guardar el archivo
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Constancias Exposistemas ' . date("Y") . '.xls"');
    header('Cache-Control: max-age=0');

    $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save('php://output');

    //volver a la ventana
    //include_once("../Paginas/constancias.php");

    function separarFecha($fecha){
        $year = '';
        $mes = '';
        $dia = '';

        

        for($i=0; $i<=3; $i++){
            $year = $year . $fecha[$i];
            //echo $year . '<br>';
        }

        for ($i = 5; $i <= 6; $i++) {
            $mes = $mes . $fecha[$i];
            //echo $mes . '<br>';
        }

        for ($i = 8; $i <= 9; $i++) {
            $dia = $dia . $fecha[$i];
            //echo $dia . '<br>';
        }

        $date = [$year, $mes, $dia,];

        return $date;
    }

?>