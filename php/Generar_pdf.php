<?php
    include '../fpdf-easytable/libreria-pdf/fpdf.php';
    include '../fpdf-easytable/exfpdf.php';
    include '../fpdf-easytable/easyTable.php';

    class PDF extends exFPDF{
        function Header(){
            // Arial bold 15
            $this -> SetFont('Arial','B',15);
            // Movernos a la derecha
            $this -> Cell(80);
            // Título
            $this -> Cell(30,10,'Cronograma de Exposistemas',0   ,0,'C');
            // Salto de línea
            $this -> Ln(20);
        }

        function Footer(){
            // Posición: a 1,5 cm del final
            $this -> SetY(-15);
            // Arial italic 8
            $this -> SetFont('Arial','I',8);
            // Número de página
            $this -> Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
        }
    }

    include_once("../CRUD/CRUD_bd_general.php");
    $con = new CRUD_general();
    $con->conexionBD();

    $consulta_evento  = "SELECT DISTINCT evento.no_evento, evento.evento, evento.descripcion, 
    evento.hora_inicio, asesores_evento.materia 
    FROM evento, asesores_evento 
    WHERE evento.no_evento = asesores_evento.no_evento ORDER BY evento.no_evento ASC";
    $resultadoE = $con->MOSTRAR($consulta_evento);

    $consulta_asesores = "SELECT DISTINCT docentes.nombre, docentes.paterno 
    FROM asesores_evento, docentes, evento WHERE evento.no_evento = :numero 
    AND evento.no_evento = asesores_evento.no_evento 
    AND docentes.rfc = asesores_evento.rfc";
    

    $consulta_alumnos = "SELECT DISTINCT alumnos.nombre, alumnos.paterno
    FROM evento, evento_alumnos, alumnos 
    WHERE evento.no_evento = :numero
    AND evento.no_evento = evento_alumnos.no_evento 
    AND evento_alumnos.no_control = alumnos.no_control";

    $consulta_externos = "SELECT DISTINCT ponentes_externos.nombre, ponentes_externos.paterno
    FROM evento, ponentes_externos, evento_externos 
    WHERE evento.no_evento = :numero AND evento.no_evento = evento_externos.no_evento 
    AND evento_externos.correo = ponentes_externos.correo";

    $pdf = new PDF('P','mm','Letter');
    $pdf->SetFont('helvetica','',10);
    $pdf->AddFont('FontUTF8','','Arimo-Regular.php');
    $pdf->AddFont('FontUTF8','B','Arimo-Bold.php');
    $pdf->AddFont('FontUTF8','I','Arimo-Italic.php');
    $pdf->AddFont('FontUTF8','BI','Arimo-BoldItalic.php');

    $pdf->AddPage();
    $ancho_total = $pdf->GetPageWidth();
    $ancho_celda = $ancho_total / 7;

    $table = new easyTable($pdf, '{'.$ancho_celda.', '.$ancho_celda.', '.$ancho_celda.', '.$ancho_celda.', '.$ancho_celda.', '.$ancho_celda.', '.$ancho_celda.'}');
    $table -> rowStyle('align:{CCCCCCC}; valign:M; border-color:#000; border:1; paddingY:2; bgcolor:#668588; font-color:#fff; font-family:FontUTF8; font-size:12; font-style:B');
    $table -> easyCell(utf8_decode('No. Evento'));
    $table -> easyCell(utf8_decode('Evento'));
    $table -> easyCell(utf8_decode('Descripcion'));
    $table -> easyCell(utf8_decode('Hora de Inicio'));
    $table -> easyCell(utf8_decode('Expositores'));
    $table -> easyCell(utf8_decode('Asesores'));
    $table -> easyCell(utf8_decode('Materia'));
    $table -> printRow();

    foreach($resultadoE as $rowE){
        $resultadoA = $con->MOSTRAR($consulta_alumnos,[":numero"=>$rowE['no_evento']]);
        $resultadoB = $con->MOSTRAR($consulta_asesores,[":numero"=>$rowE['no_evento']]);
        $resultadoC = $con->MOSTRAR($consulta_externos,[":numero"=>$rowE['no_evento']]);
        
        $table -> rowStyle('align:{CCCCCCC}; valign:M; border-color:#000; border:1; paddingY:2;');
        $table -> easyCell(utf8_decode($rowE['no_evento']));
        $table -> easyCell(utf8_decode($rowE['evento']));
        $table -> easyCell(utf8_decode($rowE['descripcion']));
        $table -> easyCell(utf8_decode($rowE['hora_inicio']));
        
        foreach($resultadoA as $rowA){
            $table -> easyCell(utf8_decode($rowA['nombre'].' '.$rowA['paterno']));
        }

        foreach($resultadoB as $rowB){
            $table -> easyCell(utf8_decode($rowB['nombre'].' '.$rowB['paterno']));
        }

        foreach($resultadoC as $rowC){
            $table -> easyCell(utf8_decode($rowC['nombre'].' '.$rowC['paterno']));
        }

        $table -> easyCell(utf8_decode($rowE['materia']));
        $table -> printRow();
    }

    $pdf->Output(); 
?>