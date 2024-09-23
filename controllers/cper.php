<?php
    require_once("models/mper.php");

    $mper = new Mper();

    //------------Persona-----------
    $idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
    $nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
    $apeper = isset($_POST['apeper']) ? $_POST['apeper']:NULL;
    $ndper = isset($_POST['ndper']) ? $_POST['ndper']:NULL;
    $area = isset($_POST['area']) ? $_POST['area']:NULL;
    $emaper = isset($_POST['emaper']) ? strtolower($_POST['emaper']):NULL;
    $actper = isset($_REQUEST['actper']) ? $_REQUEST['actper']:1;

    $pasper = strtoupper(substr($nomper, 0, 1)).strtolower(substr($apeper, 0, 1)).$ndper;
    
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
        // if ($ope=="cargm" && $arc) {
        //     $dat = opti($_FILES["arc"], $arc, "arc/xls", $nomarc);
        //     $inputFileType = IOFactory::identify($dat);
        //     $objReader = IOFactory::createReader($inputFileType);
        //     $objPHPExcel = $objReader->load($dat);
        //     $sheet = $objPHPExcel->getSheet(0);
        //     $highestRow = $sheet->getHighestRow();
        //     $highestColumn = $sheet->getHighestColumn();
        //     for ($row = 3; $row <= $highestRow; $row++) {
        //         // obtengo el valor de la celda
        //         $nomper = $sheet->getCell("B" . $row)->getValue();
        //         $apeper = $sheet->getCell("C" . $row)->getValue();
        //         $idvtpd = $sheet->getCell("D" . $row)->getValue();
        //         $mper->setIdvtpd($idvtpd); 
        //         $idvtpd = $mper->CompValTp(); 
        //         $idvtpd = $idvtpd[0]['idval'];
        //         $ndper = $sheet->getCell("E" . $row)->getValue();
        //         $emaper = $sheet->getCell("F" . $row)->getValue();
        //         $cargo = $sheet->getCell("G" . $row)->getValue();
        //         $usured = $sheet->getCell("H" . $row)->getValue();
        //         $actper = $sheet->getCell("I" . $row)->getValue();
        //         $idpef = $sheet->getCell("J" . $row)->getValue();
        //         $idpef = str_replace(' ', '', $idpef);
        //         $idpefA = explode(".", $idpef);
        //         foreach($idpefA AS $pa){
        //             $mper->setIdpef($pa); 
        //             $pef = $mper->CompPef();
        //         }
        //         $pasper = strtoupper(substr($nomper, 0, 1)).strtolower(substr($apeper, 0, 1)).$ndper."GLQ";
        //         $mper->setNomper($nomper);
        //         $mper->setApeper($apeper);
        //         $mper->setIdvtpd($idvtpd);
        //         $mper->setNdper($ndper);
        //         $mper->setEmaper($emaper);
        //         $mper->setCargo($cargo);
        //         $mper->setUsured($usured);
        //         $mper->setActper($actper);
        //         $mper->setPasper($pasper);
        //         $mper->setIdpef($idpef);
        //         $existingData = $mper->selectUsu();
        //         $idper = $existingData[0]['idper'];
        //         $mper->setIdper($idper);
        //         if ($idvtpd && $pef) {
        //             if (!empty($ndper)) {
        //                 if ($existingData[0]['sum'] == 0) {
        //                     // Datos ya existen, por lo tanto, actualiza en lugar de guardar
        //                     $mper->save();
        //                     $per = $mper->getOneSPxF($ndper);
        //                     $mper->setIdper($per[0]['idper']);
        //                 }else {
        //                     $mper->edit();
        //                     $mper->delPxF();
        //                 }if($idpefA){ foreach ($idpefA as $pf) {
        //                     if($pf){
        //                         $mper->setIdpef($pf);
        //                         $mper->savePxF();
        //                     }
        //                 }}
        //             }
        //         }else{
        //             $reg = $row;
        //             $row = $highestRow+5;
        //         }
        //     }
        //     if($row>$highestRow+5) echo '<script>err("Ooops... Algo esta mal en la fila #'.$reg.', corrígelo y vuelve a subir el archivo");</script>';
        //     else echo '<script>satf("Todos los datos han sido registrados con exito, por favor espere un momento");</script>';
        //     echo "<script>setTimeout(function(){ window.location='home.php?pg=".$pg."';}, 7000);</script>";
        // }
    

?>
