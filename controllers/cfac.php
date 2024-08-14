<?php
    require_once("models/mfac.php");

    $mfac = new Mfac();

    //------------Factura-----------
    $fecact = date("Y-m-d H:i:s"); // fecha actual
    $idfac = isset($_REQUEST['idfac']) ? $_REQUEST['idfac']:NULL;
    $nofac = isset($_POST['nofac']) ? $_POST['nofac']:NULL;
    $confac = isset($_POST['confac']) ? $_POST['confac']:NULL;
    $estfac = isset($_REQUEST['estfac']) ? $_REQUEST['estfac']:52;
    $idemp = isset($_POST['idemp']) ? $_POST['idemp']:NULL;
    $fefac = isset($_POST['fefac']) ? $_POST['fefac']:NULL; // fecha emision
    $fvfac = isset($_POST['fvfac']) ? $_POST['fvfac']:NULL; // fecha vencimiento
    $forpag = isset($_POST['forpag']) ? $_POST['forpag']:NULL;
    $tipfac = isset($_REQUEST['tipfac']) ? $_REQUEST['tipfac']:NULL;
    $arcpdf = isset($_FILES['arcpdf']) ? $_FILES['arcpdf']:NULL;
    $arcspt = isset($_FILES['arcspt']) ? $_FILES['arcspt']:NULL;
    $rutpdf = NULL;
    $rutspt = NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;
    $datALL = NULL;
    $dattpe = $mfac->getAllDom(1);
    $dattip = $mfac->getAllDom(2);

    $mfac->setIdfac($idfac);
    
    if($idemp) $infoemp = $mfac->getOneEmp($idemp);
    if($arcpdf && $infoemp && $infoemp[0]['razsoem']) $rutpdf = opti($arcpdf, $nofac."_".$confac, "arc/facturas/".$infoemp[0]['razsoem'], $nmfl); 
    if($arcspt) $rutspt = opti($arcpdf, "nombre", "ruta", "id"); 

    //------------Factura-----------
    if($ope=="save"){
        $mfac->setNofac($nofac);
        $mfac->setFifac($fecact);
        $mfac->setConfac($confac);
        $mfac->setEstfac($estfac);
        $mfac->setIdemp($idemp);
        $mfac->setFefac($fefac);
        $mfac->setFvfac($fvfac);
        $mfac->setTipfac($tipfac);
        $mfac->setForpag($forpag);
        $mfac->setRutpdf($rutpdf);
        $mfac->setRutspt($rutspt);
        $mfac->setIdpercre($_SESSION['idper']); 

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
        if ($estfac == 53 && ($tipfac == 14 OR $tipfac == 15 OR $tipfac == 16 OR $tipfac == 17 OR $tipfac == 18)) $estfac=54;
        $mfac->setEstfac($estfac);
        $mfac->setFecha($fecact);
        $mfac->setIdper($_SESSION['idper']);
        $mfac->editAct(); 
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    // function diasres($fvfac) {
    //     $fecact = new DateTime();
    //     $fvfac = new DateTime($fvfac);
    //     $intervalo = $fecact->diff($fvfac);
    //     return $intervalo->days;
    // }

?>