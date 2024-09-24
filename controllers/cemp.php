<?php
    require_once("models/memp.php");
    require ('vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\IOFactory;

    $memp = new Memp();

    date_default_timezone_set('America/Bogota');
    $fecha = date("Y-m-d H:i:s");

    $idemp = isset($_REQUEST['idemp']) ? $_REQUEST['idemp'] : NULL;
    $nitemp = isset($_POST['nitemp']) ? $_POST['nitemp'] : NULL;
    $razsoem = isset($_POST['razsoem']) ? $_POST['razsoem'] : NULL;
    $actemp = isset($_REQUEST['actemp']) ? $_REQUEST['actemp'] : 1;
    $tipemp = isset($_REQUEST['tipemp']) ? $_REQUEST['tipemp'] : 1;

    $arc = isset($_FILES["arc"]["name"]) ? $_FILES["arc"]["name"] : NULL;
    $arc = substr($arc, 0, strpos($arc, ".xls"));

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

    $datOne = NULL;
    $datALL = $memp->getAll();

    $memp->setIdemp($idemp);
    if ($ope == "save") {
        $memp->setNitemp($nitemp);
        $memp->setRazsoem($razsoem);
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
        
    $memp->setActemp($actemp);
    if (!$idemp) $memp->save();
    else $memp->edit();

    }
   

if ($ope == "act" && $idemp && $actemp) {
    $memp->setActemp($actemp);
    $memp->editActEmp();
    echo "<script>window.location='home.php?pg=".$pg."';</script>";
}
if ($ope == "eli" && $idemp) {
    $memp->del();
    echo "<script>window.location='home.php?pg=".$pg."';</script>";}

if ($ope == "edi" && $idemp) $datOne = $memp->getOne();


//------------Importar provedoress-----------

if ($ope=="caremp" && $arc) {
    $dat = opti($_FILES["arc"], $arc, "arc/xls", $nomarc);
    $inputFileType = IOFactory::identify($dat);
    $objReader = IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($dat);
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
     // Inicia a recoger el excel desde la fila 3 hasta la ultima con info
    for ($row = 3; $row <= $highestRow; $row++) {
        $comp = 2;
    
        
        $nitemp = $sheet->getCell("B" . $row)->getValue();
        $razsoem = $sheet->getCell("C" . $row)->getValue();
        $actemp = $sheet->getCell("D" . $row)->getValue();
        $tipemp = $sheet->getCell("E" . $row)->getValue();

        // Se capturan las variables para enviarlas al modelo
        $memp->setNitemp($nitemp);
        $memp->setRazsoem($razsoem);
        $memp->setActemp($actemp);
        $memp->setTipemp($tipemp);
     
        $existingData = $memp->CompEmp();
        $idemp = $existingData[0]['idemp'];
        $memp->setIdemp($idemp);
        if ($existingData[0]['sum'] == 0) $memp->saveEmpXls();
        else $memp->EditEmpXls();
    }
    echo '<script>satf("Todos los datos han sido registrados con exito, por favor espere un momento");</script>';
    echo "<script>setTimeout(function(){ window.location='home.php?pg=".$pg."';}, 7000);</script>";
}
 

?>  







