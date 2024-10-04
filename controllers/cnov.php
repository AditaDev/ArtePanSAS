<?php
    require_once("models/mnov.php");

    $mnov = new Mnov();

    $fecact = date("Y-m-d H:i:s"); 
    $idnov = isset($_REQUEST['idnov']) ? $_REQUEST['idnov']:NULL;
    $fecinov = isset($_POST['fecinov']) ? $_POST['fecinov']:NULL;
    $idperg = isset($_POST['idperg']) ? $_POST['idperg']:NULL;
    $fecfnov = isset($_POST['fecfnov']) ? $_POST['fecfnov']:NULL;
    $tipnov = isset($_POST['tipnov']) ? $_POST['tipnov']:32;
    $obsnov = isset($_POST['obsnov']) ? $_POST['obsnov']:NULL;
    $tini = isset($_POST['tini']) ? $_POST['tini']:NULL;
    $tfin = isset($_POST['tfin']) ? $_POST['tfin']:NULL;
    $estnov = isset($_REQUEST['estnov']) ? $_REQUEST['estnov']:48;
    $arcpdf = isset($_FILES['arcpdf']) ? $_FILES['arcpdf']:NULL;
    $rutpdf = NULL;
    $infoper = NULL;
    $tnov = NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
    $nov = isset($_REQUEST['nov']) ? $_REQUEST['nov']:"news";

    $datOne = NULL;
    $pg = 110;

    $mnov->setIdnov($idnov);
    //var_dump($idperg);
    if($idperg) $infoper = $mnov->getOnePer($idperg);
    if($tipnov) $tnov = $mnov->getAllDom($tipnov);
    //var_dump($infoper, $tnov, $arcpdf);
    if($arcpdf && $infoper && $infoper[0]['nomper'] & $infoper[0]['apeper'] && $tnov[0]['nomval']) $rutpdf = opti($arcpdf, $tnov[0]['nomval'],"arc/novedades/".$infoper[0]['nomper'].$infoper[0]['apeper'], $nmfl); 
    //var_dump($rutpdf);
    //------------Novedad-----------

    if($ope=="save"){
        // die;
        $mnov->setIdperg($idperg);
        $mnov->setFecreg($fecact);
        $mnov->setFecinov($fecinov);
        $mnov->setFecfnov($fecfnov);
        $mnov->setTipnov($tipnov);
        $mnov->setEstnov($estnov);
        $mnov->setIdpercre($_SESSION['idper']);
        $mnov->setObsnov($obsnov);
        $mnov->setTini($tini);
        $mnov->setTfin($tfin);
        $mnov->setRutpdf($rutpdf);
        if(!$idnov) $mnov->save($nov);
        else $mnov->edit();
        echo "<script>window.location='home.php?pg=".$pg."&nov=".$nov."';</script>";
    }

    if($ope=="edi" && $idnov) $datOne = $mnov->getOne();
    if($ope=="eli" && $idnov) $mnov->del();

    $datAll = $mnov->getAll($nov);
    $datPer = $mnov->getAllPer();
    $dattip = $mnov->getAllDom(4);

    if($ope=='est' && $idnov && $estnov){
        $mnov->setIdnov($idnov);
        $mnov->setEstnov($estnov); 
        $mnov->setFecha($fecact);
        $mnov->setIdper($_SESSION['idper']);
        $mnov->editAct();
        echo "<script>window.location='home.php?pg=".$pg."&nov=".$nov."';</script>";
    } 

   

        

?>
 
