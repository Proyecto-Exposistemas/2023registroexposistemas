<?php
    //setlocale(LC_ALL, "es_ES");
    //importar la libreria
    require 'vendor/autoload.php';

    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xls;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    // use PhpOffice\PhpSpreadsheet\IOFactory;

    //instancia del CRUD
    include_once("../CRUD/CRUD_bd_general.php");
    $obj = new CRUD_general();
    $obj->conexionBD();

    //instanciar la clase
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $spreadsheet->getProperties()->setTitle("Reporte de asistencia Exposistemas " . date("Y"))->setCreator("Academia ISC")
        ->setCategory("Constancias")->setCompany("Instituto Tecnológico Superior Zacatecas Sur")->setLastModifiedBy("");

    //---------------------- esto es para la hoja de laumnos------------------------------
    $spreadsheet->setActiveSheetIndex(0) -> setTitle("Alumnos");
    $hoja_alumnos = $spreadsheet->getActiveSheet();

    //poner los encabezados de las columnas
    $hoja_alumnos -> setCellValue('A1', "Nombre(s)") -> setCellValue("B1", "Apellido paterno") -> setCellValue("C1", "Apellido materno") ->
    setCellValue("D1", "No. de control") -> setCellValue("E1", "Semestre") -> setCellValue("F1", "Registro 1") -> 
    setCellValue("G1", "Registro 2")->setCellValue("H1", "Registro 3");

    //insertar los datos de los alumnos
    
    $consulta = "SELECT * FROM total_alumnos";
    $parametro = [":selecion" => "10"];
    $resultado = $obj->Mostrar($consulta);
    $iter = 0;

    for ($i = 0; $i < count($resultado); $i++) {
        $nc = $resultado[$i]['no_control'];
        $querry_verificacion = "SELECT * FROM registros_alumnos
            WHERE no_control = '$nc'";

        $resp  = $obj->MOSTRAR($querry_verificacion);
        $no_registros = count($resp);
        $registros = ["", "", ""];
        $hora_ant = "";
        $counter = 0;

        for ($j = 0; $j < count($resp); $j++) {

            $hora = qutarSec($resp[$j]["hora"]);
            $hora_ant = qutarSec($hora_ant);

            if ($hora == $hora_ant) {
                $no_registros = $no_registros - 1;
            } else {
                //echo 'Si entra aquí con el alumno '. $resp[$j]["no_control"]. ' a las '. $resp[$j]["hora"]. '<br>';
                $registros[$counter] = $resp[$j]["hora"];
                $counter++;
            }
            $hora_ant = $resp[$j]["hora"];
            //echo $hora_ant. '<br>';
        }

            $hoja_alumnos->setCellValue('A'.$iter+2, $resultado[$i]['nombre'])->setCellValue('B' . $iter+2, $resultado[$i]['paterno'])
            ->setCellValue('C' . $iter+2, $resultado[$i]['materno'])->setCellValue('D' . $iter+2, $resultado[$i]['no_control'])->
            setCellValue('E' . $iter+2, $resultado[$i]['semestre'])->setCellValue('F' . $iter+2, $registros[0])->
            setCellValue('G' . $iter+2, $registros[1])->setCellValue('H' . $iter + 2, $registros[2]);

            $iter++;
    }

    //definir propiedades de la hoja alumnos
    $spreadsheet->getDefaultStyle()->getFont()->setName("Arial")->setSize(12);
    $hoja_alumnos->getColumnDimension('A')->setWidth(19);
    $hoja_alumnos->getColumnDimension('B')->setWidth(16);
    $hoja_alumnos->getColumnDimension('C')->setWidth(16);
    $hoja_alumnos->getColumnDimension('D')->setWidth(17);
    $hoja_alumnos->getColumnDimension('E')->setWidth(10);
    $hoja_alumnos->getColumnDimension('F')->setWidth(10);
    $hoja_alumnos->getColumnDimension('G')->setWidth(10);


    //---------------------- esto es para la hoja de externos------------------------------
    $spreadsheet->createSheet(1);
    $spreadsheet->setActiveSheetIndex(1)->setTitle("Externos");
    $hoja_externos = $spreadsheet->getActiveSheet();

    //poner los encabezados de las columnas
    $hoja_externos->setCellValue('A1', "Nombre(s)")->setCellValue("B1", "Apellido paterno")->setCellValue("C1", "Apellido materno")->
    setCellValue("D1", "Procedencia")->setCellValue("E1", "Registro 1")->setCellValue("F1", "Registro 2")->setCellValue("G1", "Registro 3");

    //insertar los datos de los espectadores externos

    $consulta = "SELECT * FROM espectadores_externos";
    $parametro = [":selecion" => "10"];
    $resultado = $obj->Mostrar($consulta);
    $iter = 0;

    for ($i = 0; $i < count($resultado); $i++) {
        $nc = $resultado[$i]['correo'];
        $querry_verificacion = "SELECT * FROM registros_externos
                WHERE correo = '$nc'";

        $resp  = $obj->MOSTRAR($querry_verificacion);
        $no_registros = count($resp);
        $registros = ["", "", ""];
        $hora_ant = "";
        $counter = 0;

        for ($j = 0; $j < count($resp); $j++) {

            $hora = qutarSec($resp[$j]["hora"]);
            $hora_ant = qutarSec($hora_ant);

            if ($hora == $hora_ant) {
                $no_registros = $no_registros - 1;
            } else {
                //echo 'Si entra aquí con el alumno '. $resp[$j]["no_control"]. ' a las '. $resp[$j]["hora"]. '<br>';
                $registros[$counter] = $resp[$j]["hora"];
                $counter++;
            }
            $hora_ant = $resp[$j]["hora"];
            //echo $hora_ant. '<br>';
        }

            $hoja_externos->setCellValue('A' . $iter + 2, $resultado[$i]['nombre'])->setCellValue('B' . $iter + 2, $resultado[$i]['paterno'])
                ->setCellValue('C' . $iter + 2, $resultado[$i]['materno'])->setCellValue('D' . $iter + 2, $resultado[$i]['procedencia'])->
                setCellValue('E' . $iter+2, $registros[0])->setCellValue('F' . $iter+2, $registros[1])->setCellValue('G' . $iter + 2, $registros[2]);

            $iter++;
    }

    //insertar los datos de los ponentes externos

    $consulta = "SELECT * FROM ponentes_externos";
    $parametro = [":selecion" => "10"];
    $resultado = $obj->Mostrar($consulta);
    

    for ($i = 0; $i < count($resultado); $i++) {
        $nc = $resultado[$i]['correo'];
        $querry_verificacion = "SELECT * FROM registros_ponentes_ext
                    WHERE correo = '$nc'";

        $resp  = $obj->MOSTRAR($querry_verificacion);
        $no_registros = count($resp);
        $registros = ["", ""];
        $hora_ant = "";
        $counter = 0;

        for ($j = 0; $j < count($resp); $j++) {

            $hora = qutarSec($resp[$j]["hora"]);
            $hora_ant = qutarSec($hora_ant);

            if ($hora == $hora_ant) {
                $no_registros = $no_registros - 1;
            } else {
                //echo 'Si entra aquí con el alumno '. $resp[$j]["no_control"]. ' a las '. $resp[$j]["hora"]. '<br>';
                $registros[$counter] = $resp[$j]["hora"];
                $counter++;
            }
            $hora_ant = $resp[$j]["hora"];
            //echo $hora_ant. '<br>';
        }

        if ($no_registros <= 2) {
            $hoja_externos->setCellValue('A' . $iter + 2, $resultado[$i]['nombre'])->setCellValue('B' . $iter + 2, $resultado[$i]['paterno'])
                ->setCellValue('C' . $iter + 2, $resultado[$i]['materno'])->setCellValue('E' . $iter + 2, $registros[0])->setCellValue('F' . $iter + 2, $registros[1]);

            $iter++;
        }
    }

    //definir propiedades de la hoja externos
    $spreadsheet->getDefaultStyle()->getFont()->setName("Arial")->setSize(12);
    $hoja_externos->getColumnDimension('A')->setWidth(19);
    $hoja_externos->getColumnDimension('B')->setWidth(16);
    $hoja_externos->getColumnDimension('C')->setWidth(16);
    $hoja_externos->getColumnDimension('D')->setWidth(17);
    $hoja_externos->getColumnDimension('E')->setWidth(10);
    $hoja_externos->getColumnDimension('F')->setWidth(10);



    //guardar el archivo
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte de asistencia Exposistemas ' . date("Y") . '.xls"');
    header('Cache-Control: max-age=0');

    $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save('php://output');

    //funcion para quitar los segundos
    function qutarSec($cadena)
    {
        $cad = substr($cadena, 0, -3);

        return $cad;
    }
