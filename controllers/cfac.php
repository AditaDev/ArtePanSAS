<?php
    require_once("models/mfac.php");

    $mfac = new Mfac();


    //------------Factura-----------
    $fecact = date("Y-m-d H:i:s"); // fecha actual
    $idfac = isset($_REQUEST['idfac']) ? $_REQUEST['idfac']:NULL;
    $nofac = isset($_POST['nofac']) ? $_POST['nofac']:NULL;
    // $fifac = date("Y-m-d H:i:s"); // fecha creada
    $confac = isset($_POST['confac']) ? $_POST['confac']:NULL;
    // $fffac = date("Y-m-d H:i:s"); // fecha entregada
    $estfac = isset($_REQUEST['estfac']) ? $_REQUEST['estfac']:51;
    $idemp = isset($_POST['idemp']) ? $_POST['idemp']:NULL;
    $fefac = isset($_POST['fefac']) ? $_POST['fefac']:NULL; // fecha emision
    $fvfac = isset($_POST['fvfac']) ? $_POST['fvfac']:NULL; // fecha vencimiento
    $forpag = isset($_POST['forpag']) ? $_POST['forpag']:NULL;
    $tipfac = isset($_POST['tipfac']) ? $_POST['tipfac']:NULL;
    // $idpercre = isset($_POST['idpercre']) ? $_POST['idpercre']:NULL;
    // $idperrev = isset($_REQUEST['idperrev']) ? $_REQUEST['idperrev']:NULL;
    // $idperapr = isset($_REQUEST['idperapr']) ? $_REQUEST['idperapr']:NULL;
    // $idperent = isset($_REQUEST['idperent']) ? $_REQUEST['idperent']:NULL;
  
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;
    $datALL = NULL;
    $dattpe = $mfac->getAllDom(1);
    $dattip = $mfac->getAllDom(2);

    $mfac->setIdfac($idfac);

    //------------Factura-----------
    if($ope=="save"){
        $mfac->setNofac($nofac);
        $mfac->setFifac($fecact);
        $mfac->setConfac($confac);
        // $mfac->setFffac($fffac);
        $mfac->setEstfac($estfac);
        $mfac->setIdemp($idemp);
        $mfac->setFefac($fefac);
        $mfac->setFvfac($fvfac);
        $mfac->setTipfac($tipfac);
        $mfac->setForpag($forpag);
        $mfac->setIdpercre($_SESSION['idper']);
        // $mfac->setIdperrev($idperrev);
        // $mfac->setIdperapr($idperapr); //las pongo aca? o arriba?
        // $mfac->setIdperent($idperent);

        if(!$idfac) $mfac->save();
        else $mfac->edit();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }


    if($ope=="edi" && $idfac) $datOne = $mfac->getOne();
    if($ope=="eli" && $idfac) $mfac->del();

    $datEmp = $mfac->getAllEmp();
    $datAll = $mfac->getAll();

    if ($ope == 'est' && $idfac && $estfac) {
        $mfac->setIdfac($idfac);
        $mfac->setEstfac($estfac);
        $mfac->setFecha($fecact);
        $mfac->setIdper($_SESSION['idper']);
        $mfac->editAct(); 
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }
//estas viendo?
?>
<!-- if($ope=='act' && $idmod && $actmod){
        $mmod->setActmod($actmod);
        $mmod->editAct();
    } -->