<?php
require_once ("../models/seguridad.php");
require_once ('../models/conexion.php');
require_once ('../models/mdot.php');

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

$mdot = new Mdot();

$datAll = $mdot->getAllD();

$datTxD = $mdot->getAllTxD($ident);
$datCxD = $mdot->getAllCxc($ident);

$datDot = $mdot->getAllDom(7);
$datTalS = $mdot->getAllDom(8); 
$datTalP = $mdot->getAllDom(9); 
$datTalZ = $mdot->getAllDom(10);
$datTalG = $mdot->getAllDom(11);
$datCol = $mdot->getAllDom(12);
$datDia = $mdot->getAllDom(13);

$sheet = $spreadsheet->getActiveSheet();

// Agregar titulo hoja
$sheet->setTitle('DOTACIONES');


// Agregar titulo
$sheet->setCellValue('A1', 'BASE DE DATOS');
$sheet->mergeCells('A1:Z1');
$style = $sheet->getStyle('A1');
$style->getFont()->setBold(true)->setSize(30);
$style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('B8CCE4');

// Agregar encabezados
$sheet->setCellValue('A2', 'DATOS DEL TRABAJADOR');
$sheet->mergeCells('A2:D2');
$sheet->setCellValue('E2', 'DATOS DE LA DOTACIÓN');
$sheet->mergeCells('E2:N2');
$sheet->setCellValue('O2', 'ENTREGA');
$sheet->mergeCells('O2:T2');
$sheet->setCellValue('U2', 'DEVOLUCIÓN');
$sheet->mergeCells('U2:Z2');
$style = $sheet->getStyle('A2:Z2');
$style->getFont()->setBold(true)->setSize(18);
$style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('B7DEE8');

// Agregar titulos

$titulo = [ 'CEDULA' ,'NOMBRE', 'AREA', 'CORREO', 'PANTALON', 'CANTIDAD', 'CAMISA', 'CANTIDAD', 'CHAQUETA', 'CANTIDAD', 'BOTAS', 'CANTIDAD', 'GUANTES', 'CANTIDAD', 'FECHA ENTREGA', 'NOMBRE ENTREGA', 'AREA', 'NOMBRE RECIBE', 'AREA', 'OBSERVACIONES', 'FECHA DEVOLCIÓN', 'NOMBRE ENTREGA', 'AREA', 'NOMBRE RECIBE', 'AREA', 'OBSERVACIONES'];


$sheet->fromArray([$titulo], NULL, 'A3');
$style = $sheet->getStyle('A3:Z3');
$style->getFont()->setBold(true);






//información
$datos = [];

//SELECT d.ident, d.fecent, d.fecdev, d.observ, d.observd, d.firpent, d.firprec, d.difent, d.estent, d.rutpdf, d.idperent AS pent, CONCAT(pe.nomper,' ',pe.apeper) AS nompent, pe.ndper AS dpent, pe.emaper AS epent, ve.nomval AS apent, d.idperrec AS prec, CONCAT(pr.nomper,' ',pr.apeper) AS nomprec, pr.ndper AS dprec, pr.emaper AS eprec, vr.nomval AS aprec, d.idperentd AS pentd, CONCAT(ped.nomper,' ',ped.apeper) AS nompentd, ped.ndper AS dpentd, ped.emaper AS epentd, ved.nomval AS apentd, d.idperrecd AS precd, CONCAT(prd.nomper,' ',prd.apeper) AS nomprecd, prd.ndper AS dprecd, prd.emaper AS eprecd, vrd.nomval AS aprecd FROM dotacion AS d LEFT JOIN persona AS pe ON d.idperent=pe.idper LEFT JOIN persona AS pr ON d.idperrec=pr.idper LEFT JOIN persona AS ped ON d.idperentd=ped.idper LEFT JOIN persona AS prd ON d.idperrecd=prd.idper LEFT JOIN valor AS ve ON pe.area=ve.idval LEFT JOIN valor AS vr ON pr.area=vr.idval LEFT JOIN valor AS ved ON ped.area=ved.idval LEFT JOIN valor AS vrd ON prd.area=vrd.idval


if ($datAllD) {
    foreach ($datAllD as $dat) {
        $filaDatos = [$dat['dprec'], $dat['nomprec'], $dat['aprec'], $dat['eprec']];

        // Agregar marcadores 'X' según la condición
        $datTxD = $mdot->getAllTxD($dat ["ident"]);
        if ($dat) {
            foreach ($datDot as $dac) {
                $marcadorEncontrado = false;
                if ($datTxD){    
                    foreach ($datTxD as $dae) {
                        if ($dac['idval'] == $dae['idvdot']) {
                            $filaDatos[] = 'X';
                            $marcadorEncontrado = true;
                            break; // Terminar el bucle interno si se encuentra el marcador
                        }
                    }
                } if (!$marcadorEncontrado) {
                    $filaDatos[] = ''; // Opcional: dejar en blanco si no hay coincidencia
                }
            }
        }

        // Agregar datos finales
        $filaDatos = array_merge($filaDatos, [ $dat['fecent'], $dat['pent'], $dat['cpent'], $dat['prec'], $dat['cprec'], $dat['observ'], $dat['fecdev'], $dat['pentd'], $dat['cpentd'], $dat['precd'], $dat['cprecd'], $dat['observd'],
        ]);

        // Agregar la fila completa al array $datos
        $datos[] = $filaDatos;
    }
}
    
// Agregar datos dinámicos
$fila = 4; // Comienza en la fila 3 porque la fila 1 y 2 tiene encabezados
foreach ($datos as $dato) {
    $sheet->fromArray($dato, NULL, 'A' . $fila);
    $sheet->getStyle('D'.$fila.':Z'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
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
$range = 'A1:Z'.($fila - 1); // Rango que cubre todos los datos
$sheet->getStyle($range)->applyFromArray($styleArray);
$sheet->getStyle($range)->applyFromArray($alignmentStyle);

// Ajustar la altura de las filas y el ancho de las columnas
foreach (range('A','Z') as $columnID) $sheet->getColumnDimension($columnID)->setAutoSize(true);

foreach (range(1, $fila - 1) as $rowID) $sheet->getRowDimension($rowID)->setRowHeight(-1);
     
    
// Agregar imagen
$drawing = new Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('../img/logoartepan_sinfondo.png'); // Ruta a tu imagen
$drawing->setHeight(50); // Altura de la imagen
$drawing->setCoordinates('A1'); // Celda donde se ubicará la imagen
$drawing->setWorksheet($sheet);


$filename = "DOTACIONES ARTEPAN ";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=".$filename.$nmfl.".xlsx");
header('Cache-Control: max-age=0');

// Crear el archivo Excel y enviarlo al navegador
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;

?>