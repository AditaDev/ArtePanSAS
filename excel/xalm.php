<?php
require_once ("../models/seguridad.php");
require_once ('../models/conexion.php');
ob_start();
require_once ('../models/malm.php');
ob_end_clean();
require ('../vendor/autoload.php');

ini_set('memory_limit', '4096M');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
 
$spreadsheet = new Spreadsheet();
$writer = new Xlsx($spreadsheet);
$drawing = new Drawing();
 
date_default_timezone_set('America/Bogota');
$nmfl = date('d-m-Y H-i-s');

$malm = new Malm();

$datfec = $malm->totalfec();
$datper = $malm->totalper();

$sheet = $spreadsheet->getActiveSheet();

// Agregar titulo hoja
$sheet->setTitle('ALMUERZOS');


// Agregar titulo
$sheet->setCellValue('A1', 'BASE DE DATOS');
$sheet->mergeCells('A1:P1');
$style = $sheet->getStyle('A1');
$style->getFont()->setBold(true)->setSize(30);
$style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('B8CCE4');

// Agregar encabezados
$sheet->setCellValue('A2', 'DATOS DEL TRABAJADOR');
$sheet->mergeCells('A2:B2');
$sheet->setCellValue('C2', 'DATOS DE QUINCENA');
$sheet->mergeCells('C2:P2');
$style = $sheet->getStyle('A2:P2');
$style->getFont()->setBold(true)->setSize(18);
$style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('B7DEE8');

// Agregar titulos
$datalm = $malm->totalfec();

$fechas = [];
if ($datalm) {
    foreach ($datalm as $dalm) {
        // Verificar si la fecha ya está en el arreglo de fechas
        if (!in_array($dalm['fecalm'], $fechas)) {
            $fechas[] = $dalm['fecalm']; // Si no está, agregarla
        }
    }
    // Ahora que tenemos todas las fechas, generamos el título
    $titulo = ['CEDULA', 'NOMBRE', 'TOTAL ALM X PER'];
    $titulo = array_merge($titulo, $fechas); 
}

$sheet->fromArray([$titulo], NULL, 'A3');
$style = $sheet->getStyle('A3:P3');
$style->getFont()->setBold(true);


//información
$datos = [];
if ($datper) {
    foreach ($datper as $dper) {
        $filaDatos = [$dper['ndper'], $dper['nomper'], ' '];

        $datPxF = $malm->getAllPxF($dper['idper']);  
        if ($datalm) {    
            foreach ($datalm as $dalm) {
                $marcadorEncontrado = false;
                foreach ($datPxF as $dae) {
                    if (strtotime($dalm['fecalm']) == strtotime($dae['fecped'])) {
                        $marcadorEncontrado = true;
                        $filaDatos[] = $dae['canalm'];  
                        break; 
                    }
                }
                if (!$marcadorEncontrado) {
                    $filaDatos[] = ' ';
                }
            }
        }
        // Agregar la fila completa al array $datos
        $datos[] = $filaDatos;
    }
}

$startRow = 4; 
$reg = count($datper);
$endRow = $startRow + $reg - 1; 

// Aplicar fórmulas a cada fila de datos
foreach (range($startRow, $endRow) as $row) {
    $sheet->setCellValue("C$row", "=SUM(D$row:I$row)"); // Suma de D a I en cada fila
}

// Sumar los valores de la columna C al final
$sheet->setCellValue("C" . ($endRow + 1), "=SUM(C$startRow:C$endRow)");

// Agregar datos dinámicos
$fila = 4; // Comienza en la fila 3 porque la fila 1 y 2 tiene encabezados
foreach ($datos as $dato) {
    $sheet->fromArray($dato, NULL, 'A' . $fila);
    $sheet->getStyle('D'.$fila.':E'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
    $fila++;
}


// Definir estilo de borde
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => '00000000'],
        ],
    ],
];

// Definir estilo de alineación
$alignmentStyle = [
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
    ],
];


// Aplicar estilo de borde y alineación a todo el rango de datos
$range = 'A1:P'.($fila - 1); // Rango que cubre todos los datos
$sheet->getStyle($range)->applyFromArray($styleArray);
$sheet->getStyle($range)->applyFromArray($alignmentStyle);

// Ajustar la altura de las filas y el ancho de las columnas
foreach (range('A','P') as $columnID) $sheet->getColumnDimension($columnID)->setAutoSize(true);

foreach (range(1, $fila - 1) as $rowID) $sheet->getRowDimension($rowID)->setRowHeight(-1);
     
    
// Agregar imagen
$drawing = new Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('../img/logoartepan_sinfondo.png'); // Ruta a tu imagen
$drawing->setHeight(50); // Altura de la imagen
$drawing->setCoordinates('A1'); // Celda donde se ubicará la imagen
$drawing->setWorksheet($sheet);


$filename = "RELACIÓN ALMUERZOS ";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=".$filename.$nmfl.".xlsx");
header('Cache-Control: max-age=0');

// Crear el archivo Excel y enviarlo al navegador
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;

?>