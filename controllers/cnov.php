<?php
    require_once("models/mnov.php");

    $mnov = new Mnov();


    $idnov = isset($_REQUEST['idnov']) ? $_REQUEST['idnov']:NULL;
    $fereg = date("Y-m-d H:i:s");
    $fecinov = isset($_POST['fecinov']) ? $_POST['fecinov']:NULL;
    $fecfnov = isset($_POST['fecfnov']) ? $_POST['fecfnov']:NULL;
    $fecrev = isset($_POST['fecrev']) ? $_POST['fecrev']:NULL;
    $tipnov = isset($_POST['tipnov']) ? $_POST['tipnov']:NULL;
    $idper = isset($_POST['idper']) ? $_POST['idper']:NULL;
    $obsnov = isset($_POST['obsnov']) ? $_POST['obsnov']:NULL;
    $estnov = isset($_POST['estnov']) ? $_POST['estnov']:1;
    $area = isset($_POST['area']) ? $_POST['area']:NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;
    $datALL = NULL;
    $datarea = $mnov->getAllDom(5);
    $dattip = $mnov->getAllDom(4);

    $mnov->setIdnov($idnov);

    //------------Factura-----------
    if($ope=="save"){
        $mnov->setIdnov($idnov);
        $mnov->setFereg($fereg);
        $mnov->setFecinov($fecinov);
        $mnov->setFecfnov($fecfnov);
        $mnov->setFecrev($fecrev);
        $mnov->setTipnov($tipnov);
        $mnov->setEstnov($estnov);
        $mnov->setIdper($idper);
        $mnov->setArea($area);
        $mnov->setObsnov($obsnov);
        if(!$idnov) $mnov->save();
        else $mnov->edit();
    }

    if($ope=="edi" && $idnov) $datOne = $mnov->getOne();
    if($ope=="eli" && $idnov) $mnov->del();

    $datAll = $mnov->getAll();
    $datPer = $mnov->getAll();

?>
<!-- if($ope=='act' && $idmod && $actmod){
        $mmod->setActmod($actmod);
        $mmod->editAct();
    } -->
