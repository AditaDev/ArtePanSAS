<?php
    require_once("models/mper.php");
    require ('vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\IOFactory;

    $mper = new Mper();

    //------------Persona-----------
    $idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
    $nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
    $apeper = isset($_POST['apeper']) ? $_POST['apeper']:NULL;
    $ndper = isset($_POST['ndper']) ? $_POST['ndper']:NULL;
    $area = isset($_POST['area']) ? $_POST['area']:NULL;
    $emaper = isset($_POST['emaper']) ? strtolower($_POST['emaper']):NULL;
    $actper = isset($_REQUEST['actper']) ? $_REQUEST['actper']:1;

    $pasper = strtoupper(substr($nomper, 0, 1)).strtolower(substr($apeper, 0, 1)).$ndper."ATP";
    // Convierte el valor extraido en mayuscula(Extrae (del nombre de la persona, desde la posición 0, hasta la 1))
    // Convierte el valor extraido en minuscula(Extrae (del apellido de la persona, desde la posición 0, hasta la 1))
    //y las letricas de despues se ponen ahi?
    //upper, MAYUSCULA, lower - MINUSCULA SI?
    // Juan David Chapar...... 1072642921 = Jc1072642ATP

    $arc = isset($_FILES["arc"]["name"]) ? $_FILES["arc"]["name"] : NULL;
    $arc = substr($arc, 0, strpos($arc, ".xls"));

    //------------Perfil-----------
    $idpef = isset($_POST['idpef']) ? $_POST['idpef']:5;
    $datOne = NULL;
    $pg = 106;

    $mper->setIdper($idper);
    //------------Persona-----------
    if($ope=="save"){
        $mper->setNomper($nomper);
        $mper->setApeper($apeper);
        $mper->setEmaper($emaper);
        $mper->setNdper($ndper);
        $mper->setArea($area);
        $mper->setActper($actper);
        $mper->setPasper($pasper);
        if(!$idper) {
            $mper->save();
            $per = $mper->getOneSPxF($ndper); 
            $mper->savePxFAut($per[0]['idper'],$idpef);
        }
        else{
            $mper->edit();
            if($idper == $_SESSION["idper"]){
                $_SESSION['nomper'] = $nomper;
                $_SESSION['apeper'] = $apeper;
                $_SESSION['emaper'] = $emaper;
                $_SESSION['ndper'] = $ndper;
                $_SESSION['area'] = $area;
            };
        } 
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    if($ope=="act" && $idper && $actper){
        $mper->setActper($actper);
        $mper->editAct();
    }

    if($ope=="eli"&& $idper) $mper->del();
    if($ope=="edi"&& $idper) $datOne=$mper->getOne();

    //------------Perfil-----------
    if($ope=="savepxf"){
        if($idper) $mper->delPxF();
        if($idpef){ foreach ($idpef as $pf) {
            if($pf){
                $mper->setIdpef($pf);
                $mper->savePxF();
            }
        }}
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }
     //------------Traer valores-----------
    $datAll = $mper->getAll();
    $datarea = $mper->getAllDom(5);


        //------------Importar empleados-----------
        if ($ope=="carper" && $arc) {
            $dat = opti($_FILES["arc"], $arc, "arc/xls", $nomarc);
            $inputFileType = IOFactory::identify($dat);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($dat);
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 3; $row <= $highestRow; $row++) {
                // obtengo el valor de la celda

                $ndper = $sheet->getCell("B" . $row)->getValue();
                $nomper = $sheet->getCell("C" . $row)->getValue();
                $apeper = $sheet->getCell("D" . $row)->getValue();
                $emaper = $sheet->getCell("E" . $row)->getValue();
                $area = $sheet->getCell("F" . $row)->getValue();
                $mper->setIdval($area);
                $carea = $mper->CompVal();
                $area = $carea[0]['idval'];
                $actper = $sheet->getCell("G" . $row)->getValue();
                $pasper = strtoupper(substr($nomper, 0, 1)).strtolower(substr($apeper, 0, 1)).$ndper."ATP";
                $mper->setNomper($nomper);
                $mper->setApeper($apeper);
                $mper->setNdper($ndper);
                $mper->setEmaper($emaper);
                $mper->setArea($area);
                $mper->setActper($actper);
                $mper->setPasper($pasper);
                $existingData = $mper->selectUsu();
                $idper = $existingData[0]['idper'];
                $mper->setIdper($idper);
                if (!empty($ndper)) {
                    if ($existingData[0]['sum'] == 0) $mper->savePerXls();
                    else $mper->EditPerXls();
                }else{
                    $reg = $row;
                    $row = $highestRow+5;
                }
            }
            if($row>$highestRow+5) echo '<script>err("Ooops... Algo esta mal en la fila #'.$reg.', corrígelo y vuelve a subir el archivo");</script>';
            else echo '<script>satf("Todos los datos han sido registrados con exito, por favor espere un momento");</script>';
            echo "<script>setTimeout(function(){ window.location='home.php?pg=".$pg."';}, 7000);</script>";
        }
    

?>
