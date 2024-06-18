<?php
    require_once("models/mfac.php");

    $mfac = new Mfac();


    //------------Factura-----------
    $idfac = isset($_REQUEST['idfac']) ? $_REQUEST['idfac']:NULL;
    $nofac = isset($_POST['nofac']) ? $_POST['nofac']:NULL;
    $fifac = isset($_POST['fifac']) ? $_POST['fifac']:NULL;
    $confac = isset($_POST['confac']) ? $_POST['confac']:NULL;
    $fffac = isset($_POST['fffac']) ? $_POST['fffac']:NULL;
    $estfac = isset($_POST['estfac']) ? $_POST['estfac']:NULL;
    $idemp = isset($_POST['idemp']) ? $_POST['idemp']:NULL;
    $idper = isset($_POST['idper']) ? $_POST['idper']:NULL;
    
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;
    $datALL = NULL;

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
       
   
        // if($pg==52) $mequ->setPagequ(52);
        // if($pg==54) $mequ->setPagequ(54);
        if(!$idfac) $mfac->save();
        else $mfac->edit();
    }

    // if($ope=="act" && $idfac && $act){
    //     $mequ->setActequ($actequ);
        $mfac->editAct();
    

    if($ope=="edi" && $idfac) $datOne = $mfac->getOne();
    if($ope=="eli" && $idfac) $mfac->del();

 

    $datEmp = $mfac->getAll();
    //------------Traer valores-----------
    $datAll = $mfac->getAll();
    // $dattpe = $mfac->getAllTpEq(2);
    // $dattpc = $mfac->getAllTpCt(4);

    // $dom = $mequ->getAllDom(6,7);

?>