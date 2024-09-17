<?php
require_once ("../models/seguridad.php");
require_once ('../models/conexion.php');
require_once ('../models/malm.php');

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


$datfec = $malm->getOne();
$datper = $malm->getAllDatPed();
$datpedhoy = $malm->getAllPed();

$sheet = $spreadsheet->getActiveSheet();

// Agregar titulo hoja
$sheet->setTitle('ALMUERZOS');


// Agregar titulo
$sheet->setCellValue('A1', 'BASE DE DATOS');
$sheet->mergeCells('A1:N1');
$style = $sheet->getStyle('A1');
$style->getFont()->setBold(true)->setSize(30);
$style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('B8CCE4');

// Agregar encabezados
$sheet->setCellValue('A2', 'DATOS DE TRABAJADOR');
$sheet->mergeCells('A2:B2');
$sheet->setCellValue('C2', 'DATOS DE DIAS POR QUINCENA');
$sheet->mergeCells('C2:N2');
$style = $sheet->getStyle('A2:N2');
$style->getFont()->setBold(true)->setSize(18);
$style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('B7DEE8');

// Agregar titulos

$titulo = [ 'CEDULA' ,'NOMBRE', 'TOTAL ALM X PER', 'FECHA', 'FECHA', 'FECHA', 'FECHA', 'FECHA', 'FECHA', 'FECHA', 'FECHA', 'FECHA', 'FECHA', 'FECHA'];


$sheet->fromArray([$titulo], NULL, 'A3');
$style = $sheet->getStyle('A3:N3');
$style->getFont()->setBold(true);

//información
$datos = [];


if ($datper) {
     foreach ($datper as $dat) {
        $filaDatos = [$dat['ndper'], $dat['nomper'],];

//         if ($asg == "equ") $filaDatos[] = $dat['tpe'];

//         $filaDatos = array_merge($filaDatos, [ $dat['marca'], $dat['modelo'], $dat['serialeq'],]);

//         if ($asg == "equ") {
//             $filaDatos[] = $dat['nomred'];
//             // Obtener y agregar datos adicionales de $mequ
//             $mequ->setIdequ($dat["idequ"]);
//             $prgs = $mequ->getOnePxE();
//             if ($prgs) {
//                 foreach ($prgs as $pr) {
//                     $filaDatos[] = $pr['nomval'].' '.$pr['verprg'];
//                 }
//             } else $filaDatos = array_merge($filaDatos, [ '', '',]);
//         } elseif ($asg == "cel") {
//             $filaDatos = array_merge($filaDatos, [ $dat['numcel'], $dat['operador'],]);
//         }

//         // Agregar marcadores 'X' según la condición
//         $datAxE = $masg->getAllAxE($dat["ideqxpr"]);
//         if ($datAcc) {
//             foreach ($datAcc as $dac) {
//                 $marcadorEncontrado = false;
//                 if ($datAxE){    
//                     foreach ($datAxE as $dae) {
//                         if ($dac['idval'] == $dae['idvacc']) {
//                             $filaDatos[] = 'X';
//                             $marcadorEncontrado = true;
//                             break; // Terminar el bucle interno si se encuentra el marcador
//                         }
//                     }
//                 } if (!$marcadorEncontrado) {
//                     $filaDatos[] = ''; // Opcional: dejar en blanco si no hay coincidencia
//                 }
//             }
//         }

//         // Agregar datos finales
//         $filaDatos = array_merge($filaDatos, [ $dat['fecent'], $dat['pent'], $dat['cpent'], $dat['prec'], $dat['cprec'], $dat['observ'], $dat['fecdev'], $dat['pentd'], $dat['cpentd'], $dat['precd'], $dat['cprecd'], $dat['observd'],
//         ]);

//         // Agregar la fila completa al array $datos
//         $datos[] = $filaDatos;
    }
}



$fechas = $malm->getAllDatPed();
                if ($fechas) {
                    foreach ($fechas as $fc) {
                        $filaDatos[] = $fc['fecalm'];
                    }
                } else $filaDatos = '';





 $datos[] = $filaDatos;


    
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
$range = 'A1:N'.($fila - 1); // Rango que cubre todos los datos
$sheet->getStyle($range)->applyFromArray($styleArray);
$sheet->getStyle($range)->applyFromArray($alignmentStyle);

// Ajustar la altura de las filas y el ancho de las columnas
foreach (range('A','N') as $columnID) $sheet->getColumnDimension($columnID)->setAutoSize(true);

foreach (range(1, $fila - 1) as $rowID) $sheet->getRowDimension($rowID)->setRowHeight(-1);
     
    
// Agregar imagen
$drawing = new Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('../img/logoartepan_sinfondo.png'); // Ruta a tu imagen
$drawing->setHeight(50); // Altura de la imagen
$drawing->setCoordinates('A1'); // Celda donde se ubicará la imagen
$drawing->setWorksheet($sheet);


$filename = "RELACIÓN ALMUERZOS ARTEPAN ";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=".$filename.$nmfl.".xlsx");
header('Cache-Control: max-age=0');

// Crear el archivo Excel y enviarlo al navegador
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;

?>