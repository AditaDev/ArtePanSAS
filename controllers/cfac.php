<?php
    require_once("models/mfac.php");

    $mfac = new Mfac();


    //------------Factura-----------
    $fecact = date("Y-m-d H:i:s");

    $idfac = isset($_REQUEST['idfac']) ? $_REQUEST['idfac']:NULL;
    $nofac = isset($_POST['nofac']) ? $_POST['nofac']:NULL;
    $fifac = date("Y-m-d H:i:s");
    $confac = isset($_POST['confac']) ? $_POST['confac']:NULL;
    $fffac = date("Y-m-d H:i:s");
    $estfac = isset($_REQUEST['estfac']) ? $_REQUEST['estfac']:1;
    $idemp = isset($_POST['idemp']) ? $_POST['idemp']:NULL;
    $idper = isset($_POST['idper']) ? $_POST['idper']:NULL;
    $fefac = isset($_POST['fefac']) ? $_POST['fefac']:NULL;
    $fvfac = isset($_POST['fvfac']) ? $_POST['fvfac']:NULL;
    $forpag = isset($_POST['forpag']) ? $_POST['forpag']:NULL;
    $tipfac = isset($_POST['tipfac']) ? $_POST['tipfac']:NULL;
    
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;
    $datALL = NULL;
    $dattpe = $mfac->getAllDom(1);
    $dattip = $mfac->getAllDom(2);

    $mfac->setIdfac($idfac);

    //------------Factura-----------
    if($ope=="save"){
        $mfac->setNofac($nofac);
        $mfac->setFifac($fifac);
        $mfac->setConfac($confac);
        $mfac->setFffac($fffac);
        $mfac->setEstfac($estfac);
        $mfac->setIdemp($idemp);
        $mfac->setIdper($idper);
        $mfac->setFefac($fefac);
        $mfac->setFvfac($fvfac);
        $mfac->setTipfac($tipfac);
        $mfac->setForpag($forpag);
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
        if($estfac==4) $mfac->setFffac($fecact);
        $mfac->editEst();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

?>
<!-- if($ope=='act' && $idmod && $actmod){
        $mmod->setActmod($actmod);
        $mmod->editAct();
    } -->