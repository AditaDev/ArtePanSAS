<?php
    require_once("models/mdot.php");
    // require ('vendor/autoload.php');

    $mdot = new Mdot();

    // use PhpOffice\PhpSpreadsheet\IOFactory;

    //------------Asignar-----------
    $ident = isset($_POST['ident']) ? $_POST['ident']:NULL;
    $idperent = isset($_POST['idperent']) ? $_POST['idperent']:NULL;
    $idperrec = isset($_POST['idperrec']) ? $_POST['idperrec']:NULL;
    $fecent = isset($_POST['fecent']) ? $_POST['fecent']:NULL;
    $observ = isset($_POST['observ']) ? $_POST['observ']:NULL;
    $fecdev = isset($_POST['fecdev']) ? $_POST['fecdev']:NULL;
    $observd = isset($_POST['observd']) ? $_POST['observd']:NULL;
    $estent = isset($_POST['estent']) ? $_POST['estent']:1;
    $firpent = isset($_FILES['firpent']) ? $_FILES['firpent']:NULL;
    $firprec = isset($_FILES['firprec']) ? $_FILES['firprec']:NULL;
   
    $firma = NULL;

    
    //------------Elementos-----------
    $idvdot = isset($_POST['idvdot']) ? $_POST['idvdot']:NULL;
    $idvtal = isset($_POST['idvtal']) ? $_POST['idvtal']:NULL;
    
    // $arc = isset($_FILES["arc"]["name"]) ? $_FILES["arc"]["name"] : NULL;
    // $arc = substr($arc, 0, strpos($arc, ".xls"));
    
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
    
    $datOne = NULL;
    $datTxD = NULL;
 
    $pg = 111;
    
    $mdot->setIdEnt($ident);
    //------------Asignar-----------
    if($ope=="save"){   
        $mdot->setIdperent($idperent);
        $mdot->setIdperrec($idperrec);
        $mdot->setFecent($fecent);
        $mdot->setObserv($observ);
        $mdot->setEstent($estent);    
        $mdot->setDifent($nmfl);    
        if(!$ident){
            $mdot->save();
            $id = $mdot->getOneAsg($nmfl);
            $ident = $id[0]['ident'];
        }
        if($ident) $mdot->delExD();
        if($idvdot && $ident){ foreach($idvdot AS $index=>$ida){
            $mdot->setIdent($ident);
            $mdot->setIdvdot($ida);
            $mdot->setIdvtal($idvtal[$index]);
            $mdot->saveExD();
        }}
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    // if($ope=="dev" && $ideqxpr && $idequ){
    //     $masg->setIdperentd($idperentd);
    //     $masg->setIdperrecd($idperrecd);
    //     $masg->setFecdev($fecdev);
    //     $masg->setObservd($observd);
    //     $masg->setEstexp($estexp);
    //     $masg->dev();
    //     $mequ->setIdequ($idequ);
    //     $mequ->setActequ(1);
    //     $mequ->editAct();
    //     echo "<script>window.location='home.php?pg=".$pg."&asg=".$asg."';</script>";
    // }

    // if($ope=="edi" && $ideqxpr) {
    //     $datOneA = $masg->getOne();
    //     $datAxE = $masg->getAllAxE($ideqxpr);
    // }
    
    //------------Traer valores-----------

    $datAllD = $mdot->getAllD();
    $datPer = $mdot->getAllPer($ope);
    $datDot = $mdot->getAllDot(7);
    $datTalS = $mdot->getAllDot(8); 
    $datTalP = $mdot->getAllDot(9); 
    $datTalZ = $mdot->getAllDot(10);
    $datTalG = $mdot->getAllDot(11);
   
?>