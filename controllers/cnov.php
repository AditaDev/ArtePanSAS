<?php
    require_once("models/mnov.php");

    $mnov = new Mnov();

    $fecact = date("Y-m-d H:i:s"); 
    $idnov = isset($_REQUEST['idnov']) ? $_REQUEST['idnov']:NULL;
    $fecinov = isset($_POST['fecinov']) ? $_POST['fecinov']:NULL;
    $idperg = isset($_POST['idperg']) ? $_POST['idperg']:NULL;
    $fecfnov = isset($_POST['fecfnov']) ? $_POST['fecfnov']:NULL;
    $tipnov = isset($_REQUEST['tipnov']) ? $_REQUEST['tipnov']:NULL;
    $obsnov = isset($_POST['obsnov']) ? $_POST['obsnov']:NULL;
    $estnov = isset($_REQUEST['estnov']) ? $_REQUEST['estnov']:1;
    $area = isset($_POST['area']) ? $_POST['area']:NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;

    $mnov->setIdnov($idnov);

    //------------Novedad-----------
    if($ope=="save"){
        $mnov->setIdnov($idnov);
        $mnov->setIdperg($idperg);
        $mnov->setFecreg($fecact);
        $mnov->setFecinov($fecinov);
        $mnov->setFecfnov($fecfnov);
        $mnov->setTipnov($tipnov);
        $mnov->setEstnov($estnov);
        $mnov->setIdpercre($_SESSION['idper']);
        $mnov->setObsnov($obsnov);
        $mnov->setArea($area);
        if(!$idnov) $mnov->save();
        else $mnov->edit();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    if($ope=="edi" && $idnov) $datOne = $mnov->getOne();
    if($ope=="eli" && $idnov) $mnov->del();

    $datAll = $mnov->getAll();
    $datPer = $mnov->getAllPer();
    $dattip = $mnov->getAllDom(4);
    $datarea = $mnov->getAllDom(5);

    if($ope=='act' && $idnov && $estnov){
        $mnov->setIdnov($idnov);
        if ($estnov == 1)
        $mnov->setEstnov($estnov);
        $mnov->setFecrev($fecact);
        $mnov->setIdper($_SESSION['idper']);
        $mnov->editAct();
    } 

?>
 
